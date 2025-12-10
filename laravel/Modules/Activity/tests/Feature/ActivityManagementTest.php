<?php

declare(strict_types=1);

use Modules\Activity\Models\Activity;
use Modules\User\Models\User;

test('user can create activity', function () {
    $user = User::factory()->create();

    $activityData = [
        'name' => 'Test Activity',
        'description' => 'Test Description',
        'user_id' => $user->id,
    ];

    $activity = createActivity($activityData);

    expect($activity)
        ->toBeActivity()
        ->and($activity->name)
        ->toBe('Test Activity')
        ->and($activity->user_id)
        ->toBe($user->id);
});

test('activity can be updated', function () {
    $activity = createActivity();

    $activity->update([
        'name' => 'Updated Activity',
        'description' => 'Updated Description',
    ]);

    expect($activity->fresh())->name->toBe('Updated Activity')->description->toBe('Updated Description');
});

test('activity can be deleted', function () {
    $activity = createActivity();

    $activity->delete();

    expect(Activity::find($activity->id))->toBeNull();
});

test('activity belongs to user', function () {
    $user = User::factory()->create();
    $activity = createActivity(['user_id' => $user->id]);

    expect($activity->user)->toBeInstanceOf(User::class)->and($activity->user->id)->toBe($user->id);
});
