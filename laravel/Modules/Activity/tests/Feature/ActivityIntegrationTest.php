<?php

declare(strict_types=1);

use Illuminate\Support\Str;
use Modules\Activity\Models\Activity;
use Modules\Activity\Models\Snapshot;
use Modules\Activity\Models\StoredEvent;
use Modules\User\Models\User;

test('activity module models work together in integrated scenarios', function () {
    $user = User::factory()->create();

    $activity = Activity::factory()->create([
        'causer_type' => User::class,
        'causer_id' => $user->id,
        'subject_type' => User::class,
        'subject_id' => $user->id,
        'properties' => [
            'action' => 'user_registration',
            'details' => ['source' => 'web', 'campaign' => 'test'],
        ],
    ]);

    $aggregateUuid = Str::uuid();

    $snapshot = Snapshot::factory()->create([
        'aggregate_uuid' => $aggregateUuid,
        'state' => [
            'user' => $user->toArray(),
            'activities' => [$activity->toArray()],
            'metadata' => ['version' => '1.0.0'],
        ],
    ]);

    $storedEvent = StoredEvent::factory()->create([
        'aggregate_uuid' => $aggregateUuid,
        'event_class' => 'App\\Events\\UserProfileUpdated',
        'event_properties' => [
            'user_id' => $user->id,
            'activity_id' => $activity->id,
            'snapshot_id' => $snapshot->id,
            'changes' => ['profile_completed' => true],
        ],
    ]);

    expect($activity->causer->id)->toBe($user->id);
    expect($snapshot->state['user']['id'])->toBe($user->id);
    expect($storedEvent->event_properties['user_id'])->toBe($user->id);

    $relatedActivities = Activity::causedBy($user)->get();
    expect($relatedActivities)->toContain($activity);

    $relatedSnapshots = Snapshot::uuid($aggregateUuid)->get();
    expect($relatedSnapshots)->toContain($snapshot);

    $relatedEvents = StoredEvent::whereAggregateUuid($aggregateUuid)->get();
    expect($relatedEvents)->toContain($storedEvent);
});

test('activity batch processing with multiple models', function () {
    $batchUuid = Str::uuid();
    $aggregateUuid = Str::uuid();

    $user = User::factory()->create();

    $activities = Activity::factory()
        ->count(5)
        ->create([
            'batch_uuid' => $batchUuid,
            'causer_type' => User::class,
            'causer_id' => $user->id,
        ]);

    $snapshot = Snapshot::factory()->create([
        'aggregate_uuid' => $aggregateUuid,
        'state' => [
            'batch_id' => $batchUuid,
            'activities_count' => $activities->count(),
            'user_id' => $user->id,
        ],
    ]);

    $storedEvents = StoredEvent::factory()
        ->count(3)
        ->create([
            'aggregate_uuid' => $aggregateUuid,
            'event_properties' => [
                'batch_id' => $batchUuid,
                'processed_activities' => $activities->pluck('id')->toArray(),
            ],
        ]);

    $batchActivities = Activity::forBatch($batchUuid)->get();
    expect($batchActivities)->toHaveCount(5);

    $snapshotState = $snapshot->fresh()->state;
    expect($snapshotState['activities_count'])->toBe(5);
    expect($snapshotState['user_id'])->toBe($user->id);

    $aggregateEvents = StoredEvent::whereAggregateUuid($aggregateUuid)->get();
    expect($aggregateEvents)->toHaveCount(3);

    $firstEvent = $aggregateEvents->first();
    expect($firstEvent->event_properties['batch_id'])->toBe($batchUuid);
});

test('activity module handles concurrent operations correctly', function () {
    $user = User::factory()->create();

    $concurrentActivities = [];
    $concurrentSnapshots = [];

    $promises = [];

    for ($i = 0; $i < 10; $i++) {
        $promises[] = function () use ($user, &$concurrentActivities, &$concurrentSnapshots, $i) {
            $activity = Activity::factory()->create([
                'causer_type' => User::class,
                'causer_id' => $user->id,
                'properties' => ['iteration' => $i, 'timestamp' => now()->toISOString()],
            ]);

            $concurrentActivities[] = $activity->id;

            if (($i % 2) === 0) {
                $snapshot = Snapshot::factory()->create([
                    'state' => [
                        'activity_id' => $activity->id,
                        'iteration' => $i,
                        'user_id' => $user->id,
                    ],
                ]);

                $concurrentSnapshots[] = $snapshot->id;
            }

            return true;
        };
    }

    $results = array_map(fn($promise) => $promise(), $promises);

    expect($results)->toHaveCount(10)->each->toBeTrue();

    $userActivities = Activity::causedBy($user)->get();
    expect($userActivities)->toHaveCount(10);

    $createdSnapshots = Snapshot::whereIn('id', $concurrentSnapshots)->get();
    expect($createdSnapshots)->toHaveCount(5);
});

test('activity module supports complex query patterns', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();

    $securityActivities = Activity::factory()
        ->count(3)
        ->create([
            'log_name' => 'security',
            'causer_type' => User::class,
            'causer_id' => $user1->id,
        ]);

    $auditActivities = Activity::factory()
        ->count(2)
        ->create([
            'log_name' => 'audit',
            'causer_type' => User::class,
            'causer_id' => $user2->id,
        ]);

    $applicationActivities = Activity::factory()
        ->count(4)
        ->create([
            'log_name' => 'application',
            'causer_type' => User::class,
            'causer_id' => $user1->id,
        ]);

    $complexQuery = Activity::query()
        ->where('causer_type', User::class)
        ->whereIn('log_name', ['security', 'audit'])
        ->where(function ($query) use ($user1, $user2) {
            $query->where('causer_id', $user1->id)->orWhere('causer_id', $user2->id);
        })
        ->orderBy('created_at', 'desc');

    $results = $complexQuery->get();

    expect($results)->toHaveCount(5);

    $securityResults = $results->where('log_name', 'security');
    $auditResults = $results->where('log_name', 'audit');

    expect($securityResults)->toHaveCount(3);
    expect($auditResults)->toHaveCount(2);

    $user1Results = $results->where('causer_id', $user1->id);
    $user2Results = $results->where('causer_id', $user2->id);

    expect($user1Results)->toHaveCount(3);
    expect($user2Results)->toHaveCount(2);
});

test('activity module handles data consistency across models', function () {
    $user = User::factory()->create();
    $aggregateUuid = Str::uuid();

    $activity = Activity::factory()->create([
        'causer_type' => User::class,
        'causer_id' => $user->id,
        'properties' => ['action' => 'data_consistency_test'],
    ]);

    $snapshot = Snapshot::factory()->create([
        'aggregate_uuid' => $aggregateUuid,
        'state' => [
            'activity_id' => $activity->id,
            'user_id' => $user->id,
            'consistent' => true,
        ],
    ]);

    $storedEvent = StoredEvent::factory()->create([
        'aggregate_uuid' => $aggregateUuid,
        'event_properties' => [
            'activity_id' => $activity->id,
            'snapshot_id' => $snapshot->id,
            'user_id' => $user->id,
            'consistent' => true,
        ],
    ]);

    $activity->update(['properties' => array_merge($activity->properties->toArray(), ['verified' => true])]);

    $snapshot->update(['state' => array_merge($snapshot->state, ['verified' => true])]);

    $storedEvent->update(['event_properties' => array_merge($storedEvent->event_properties, ['verified' => true])]);

    $freshActivity = $activity->fresh();
    $freshSnapshot = $snapshot->fresh();
    $freshEvent = $storedEvent->fresh();

    expect($freshActivity->properties)->toHaveKey('verified', true);
    expect($freshSnapshot->state)->toHaveKey('verified', true);
    expect($freshEvent->event_properties)->toHaveKey('verified', true);

    expect($freshActivity->properties['action'])->toBe('data_consistency_test');
    expect($freshSnapshot->state['consistent'])->toBeTrue();
    expect($freshEvent->event_properties['consistent'])->toBeTrue();
});

test('activity module supports bulk operations efficiently', function () {
    $user = User::factory()->create();

    $activitiesData = [];
    for ($i = 0; $i < 100; $i++) {
        $activitiesData[] = [
            'log_name' => 'bulk_operation',
            'description' => "Bulk activity {$i}",
            'causer_type' => User::class,
            'causer_id' => $user->id,
            'properties' => ['index' => $i, 'batch' => 'bulk_test'],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    Activity::insert($activitiesData);

    $bulkActivities = Activity::where('log_name', 'bulk_operation')->get();

    expect($bulkActivities)->toHaveCount(100);

    $firstActivity = $bulkActivities->first();
    $lastActivity = $bulkActivities->last();

    expect($firstActivity->properties['index'])->toBe(0);
    expect($lastActivity->properties['index'])->toBe(99);
    expect($firstActivity->causer_id)->toBe($user->id);
    expect($lastActivity->causer_id)->toBe($user->id);

    $userActivities = Activity::causedBy($user)->where('log_name', 'bulk_operation')->get();
    expect($userActivities)->toHaveCount(100);
});
