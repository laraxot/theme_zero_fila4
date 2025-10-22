<?php

declare(strict_types=1);

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Modules\Activity\Models\Activity;
use Modules\Activity\Models\Snapshot;
use Modules\Activity\Models\StoredEvent;
use Modules\User\Models\User;

test('activity event sourcing lifecycle works correctly', function () {
    $user = User::factory()->create();

    $activityData = [
        'log_name' => 'user_actions',
        'description' => 'User performed test action',
        'subject_type' => User::class,
        'subject_id' => $user->id,
        'causer_type' => User::class,
        'causer_id' => $user->id,
        'properties' => ['action' => 'test', 'result' => 'success'],
        'event' => 'created',
    ];

    $activity = Activity::create($activityData);

    expect($activity)
        ->toBeInstanceOf(Activity::class)
        ->log_name->toBe('user_actions')
        ->description->toBe('User performed test action')
        ->subject_type->toBe(User::class)
        ->subject_id->toBe($user->id)
        ->causer_type->toBe(User::class)
        ->causer_id->toBe($user->id)
        ->properties->toHaveKey('action', 'test')
        ->properties->toHaveKey('result', 'success')
        ->event->toBe('created');
});

test('activity can be queried with complex scopes', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();

    $activity1 = Activity::factory()->create([
        'log_name' => 'security',
        'event' => 'login',
        'causer_type' => User::class,
        'causer_id' => $user1->id,
    ]);

    $activity2 = Activity::factory()->create([
        'log_name' => 'security',
        'event' => 'logout',
        'causer_type' => User::class,
        'causer_id' => $user2->id,
    ]);

    $activity3 = Activity::factory()->create([
        'log_name' => 'audit',
        'event' => 'update',
        'causer_type' => User::class,
        'causer_id' => $user1->id,
    ]);

    $securityActivities = Activity::inLog('security')->get();
    $user1Activities = Activity::causedBy($user1)->get();
    $loginActivities = Activity::forEvent('login')->get();

    expect($securityActivities)->toHaveCount(2);
    expect($user1Activities)->toHaveCount(2);
    expect($loginActivities)->toHaveCount(1)->first()->id->toBe($activity1->id);
});

test('snapshot creation and retrieval works correctly', function () {
    $aggregateUuid = Str::uuid();

    $snapshotData = [
        'aggregate_uuid' => $aggregateUuid,
        'aggregate_version' => 5,
        'state' => [
            'balance' => 1000,
            'transactions' => [
                ['id' => 1, 'amount' => 100, 'type' => 'credit'],
                ['id' => 2, 'amount' => 50, 'type' => 'debit'],
            ],
            'status' => 'active',
        ],
    ];

    $snapshot = Snapshot::create($snapshotData);

    expect($snapshot)
        ->aggregate_uuid->toBe($aggregateUuid)
        ->aggregate_version->toBe(5)
        ->state->toHaveKey('balance', 1000)
        ->state->toHaveKey('status', 'active')
        ->state->transactions->toHaveCount(2);

    $retrievedSnapshot = Snapshot::uuid($aggregateUuid)->first();

    expect($retrievedSnapshot->id)->toBe($snapshot->id);
});

test('stored event creation and event reconstruction works', function () {
    $eventClass = 'App\\Events\\TestEvent';
    $aggregateUuid = Str::uuid();

    $eventProperties = [
        'user_id' => 1,
        'action' => 'test_action',
        'metadata' => [
            'ip' => '127.0.0.1',
            'user_agent' => 'Test Browser',
        ],
    ];

    $storedEvent = StoredEvent::create([
        'aggregate_uuid' => $aggregateUuid,
        'aggregate_version' => 1,
        'event_version' => 1,
        'event_class' => $eventClass,
        'event_properties' => $eventProperties,
        'meta_data' => ['processed' => true, 'retry_count' => 0],
    ]);

    expect($storedEvent)
        ->event_class->toBe($eventClass)
        ->aggregate_uuid->toBe($aggregateUuid)
        ->event_properties->toHaveKey('user_id', 1)
        ->event_properties->toHaveKey('action', 'test_action')
        ->meta_data->processed->toBeTrue()
        ->meta_data->retry_count->toBe(0);
});

test('activity batch operations work correctly', function () {
    $batchUuid = Str::uuid();

    $activities = Activity::factory()
        ->count(3)
        ->create([
            'batch_uuid' => $batchUuid,
            'log_name' => 'batch_operation',
        ]);

    $batchActivities = Activity::forBatch($batchUuid)->get();

    expect($batchActivities)
        ->toHaveCount(3)
        ->each->batch_uuid->toBe($batchUuid)
        ->each->log_name->toBe('batch_operation');
});

test('activity with batch scope returns correct results', function () {
    $withBatch = Activity::factory()->create(['batch_uuid' => Str::uuid()]);
    $withoutBatch = Activity::factory()->create(['batch_uuid' => null]);

    $activitiesWithBatch = Activity::hasBatch()->get();

    expect($activitiesWithBatch)->toHaveCount(1)->first()->id->toBe($withBatch->id);
});

test('activity properties support complex nested structures', function () {
    $complexProperties = [
        'user' => [
            'id' => 1,
            'name' => 'Test User',
            'roles' => ['admin', 'user'],
            'permissions' => ['read', 'write', 'delete'],
        ],
        'action' => 'complex_operation',
        'context' => [
            'request' => [
                'method' => 'POST',
                'url' => '/api/test',
                'headers' => ['Content-Type' => 'application/json'],
            ],
            'response' => [
                'status' => 200,
                'data' => ['success' => true, 'message' => 'Operation completed'],
            ],
        ],
        'timestamps' => [
            'started_at' => now()->subMinutes(5)->toISOString(),
            'completed_at' => now()->toISOString(),
            'duration' => 300,
        ],
    ];

    $activity = Activity::factory()->create(['properties' => $complexProperties]);

    expect($activity->fresh()->properties)
        ->toBeInstanceOf(Collection::class)
        ->toHaveKey('user')
        ->toHaveKey('action')
        ->toHaveKey('context')
        ->toHaveKey('timestamps')
        ->user->toBeArray()->toHaveKeys(['id', 'name', 'roles', 'permissions'])
        ->context->toBeArray()->toHaveKeys(['request', 'response'])
        ->timestamps->toBeArray()->toHaveKeys(['started_at', 'completed_at', 'duration']);
});

test('snapshot state maintains data integrity with large datasets', function () {
    $largeState = [
        'users' => array_map(
            fn($i) => [
                'id' => $i,
                'name' => "User {$i}",
                'email' => "user{$i}@example.com",
                'active' => ($i % 2) === 0,
                'preferences' => [
                    'theme' => ($i % 2) === 0 ? 'dark' : 'light',
                    'notifications' => true,
                    'language' => 'en',
                ],
            ],
            range(1, 100),
        ),
        'metadata' => [
            'generated_at' => now()->toISOString(),
            'version' => '1.0.0',
            'checksum' => md5('test'),
        ],
    ];

    $snapshot = Snapshot::factory()->create(['state' => $largeState]);

    expect($snapshot->fresh()->state)
        ->toBeArray()
        ->toHaveKey('users')
        ->toHaveKey('metadata')
        ->users->toHaveCount(100)
        ->metadata->toBeArray()->toHaveKeys(['generated_at', 'version', 'checksum']);
});

test('stored event handles complex event properties with nested arrays', function () {
    $complexEvent = [
        'order' => [
            'id' => 12345,
            'items' => array_map(
                fn($i) => [
                    'product_id' => $i,
                    'name' => "Product {$i}",
                    'quantity' => rand(1, 5),
                    'price' => rand(1000, 5000) / 100,
                    'attributes' => ['color' => 'red', 'size' => 'M'],
                ],
                range(1, 50),
            ),
            'totals' => [
                'subtotal' => 1234.56,
                'tax' => 123.46,
                'shipping' => 15.00,
                'total' => 1373.02,
            ],
        ],
        'customer' => [
            'id' => 67890,
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'address' => [
                'street' => '123 Main St',
                'city' => 'Anytown',
                'state' => 'CA',
                'zip' => '12345',
                'country' => 'US',
            ],
        ],
        'payment' => [
            'method' => 'credit_card',
            'transaction_id' => 'txn_123456789',
            'status' => 'completed',
            'amount' => 1373.02,
        ],
    ];

    $storedEvent = StoredEvent::factory()->create(['event_properties' => $complexEvent]);

    expect($storedEvent->fresh()->event_properties)
        ->toBeArray()
        ->toHaveKey('order')
        ->toHaveKey('customer')
        ->toHaveKey('payment')
        ->order->toBeArray()->toHaveKeys(['id', 'items', 'totals'])
        ->customer->toBeArray()->toHaveKeys(['id', 'name', 'email', 'address'])
        ->payment->toBeArray()->toHaveKeys(['method', 'transaction_id', 'status', 'amount'])
        ->order->items->toHaveCount(50);
});
