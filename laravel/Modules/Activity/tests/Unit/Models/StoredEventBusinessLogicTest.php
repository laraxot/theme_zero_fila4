<?php

declare(strict_types=1);

use Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Activity\Models\StoredEvent;

describe('StoredEvent Business Logic', function () {
    test('stored event has correct connection configured', function () {
        $storedEvent = new StoredEvent();

        expect($storedEvent->getConnectionName())->toBe('activity');
    });

    test('stored event has correct table configured', function () {
        $storedEvent = new StoredEvent();

        expect($storedEvent->getTable())->toBe('stored_events');
    });

    test('stored event has expected fillable fields for event sourcing', function () {
        $storedEvent = new StoredEvent();
        $expectedFillable = [
            'id',
            'aggregate_uuid',
            'aggregate_version',
            'event_version',
            'event_class',
            'event_properties',
            'meta_data',
            'created_at',
            'updated_by',
            'created_by',
        ];

        expect($storedEvent->getFillable())->toEqual($expectedFillable);
    });

    test('stored event extends eloquent stored event for event sourcing', function () {
        expect(is_subclass_of(
            StoredEvent::class,
            EloquentStoredEvent::class,
        ))->toBeTrue();
    });

    test('stored event has factory trait for testing', function () {
        $traits = class_uses(StoredEvent::class);

        expect($traits)->toHaveKey(HasFactory::class);
    });

    test('stored event has after version scope method', function () {
        expect(method_exists(StoredEvent::class, 'scopeAfterVersion'))->toBeTrue();
    });

    test('stored event has where aggregate root scope method', function () {
        expect(method_exists(StoredEvent::class, 'scopeWhereAggregateRoot'))->toBeTrue();
    });

    test('stored event has where event scope method', function () {
        expect(method_exists(StoredEvent::class, 'scopeWhereEvent'))->toBeTrue();
    });
});
