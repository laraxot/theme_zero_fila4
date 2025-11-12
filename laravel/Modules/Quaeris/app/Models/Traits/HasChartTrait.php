<?php

declare(strict_types=1);

namespace Modules\Quaeris\Models\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Str;
use Modules\Chart\Models\Chart;
use Modules\Chart\Models\MixedChart;
use Modules\Quaeris\Models\QuestionChart;

trait HasChartTrait
{
    /**
     * @return MorphOne<Chart>
     */
    public function chart(): MorphOne
    {
        $morphMap = [
            'question_chart' => QuestionChart::class,
            'chart' => Chart::class,
        ];

        $className = class_basename($this);
        if (Str::endsWith($className, 'Tmp')) {
            $className = Str::beforeLast($className, 'Tmp');
        }

        //dddx();
        $k = Str::snake($className);
        $v = $this::class;
        $morphMap[$k] = $v;
        Relation::morphMap($morphMap);

        return $this->morphOne(Chart::class, 'post')
            ->withDefault([
                'x_label_angle' => '0',
                'color' => '#d60021',
                'list_color' => 'darkgreen,darkgray',
            ]);
    }

    public function mixedChart(): BelongsTo
    {
        return $this->belongsTo(MixedChart::class);
    }

    public function charts(): HasManyThrough
    {
        return $this->hasManyThrough(
            related:Chart::class,
            through:MixedChart::class,
            firstKey:'id',
            secondKey:'post_id',
            localKey:'mixed_chart_id',
            secondLocalKey:'id',
        )
            ->where(
                'post_type',
                //array_search(static::class, Relation::morphMap()) ?: static::class
                'mixed_chart'
            );
    }
}
