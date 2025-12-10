<?php

declare(strict_types=1);

namespace Modules\UI\Actions\Datetime;

use RuntimeException;
use BladeUI\Icons\Factory as IconFactory;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Spatie\QueueableAction\QueueableAction;

class GetDaysMappingAction
{
    use QueueableAction;

    public function execute(): array
    {
        $days = collect([
            Carbon::MONDAY,
            Carbon::TUESDAY,
            Carbon::WEDNESDAY,
            Carbon::THURSDAY,
            Carbon::FRIDAY,
            Carbon::SATURDAY,
        ])->mapWithKeys(function ($day) {
            $carbon = Carbon::create();
            if ($carbon === null) {
                throw new RuntimeException('Failed to create Carbon instance');
            }
            
            $dayKey = strtolower(
                $carbon
                    ->startOfWeek()
                    ->addDays($day - 1)
                    ->format('l'),
            );
            
            $dayLabel = ucfirst(
                $carbon
                    ->startOfWeek()
                    ->addDays($day - 1)
                    ->isoFormat('dddd'),
            );

            return [$dayKey => $dayLabel];
        });

        return $days->toArray();
    }
}
