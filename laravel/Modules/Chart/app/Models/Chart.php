<?php

declare(strict_types=1);

namespace Modules\Chart\Models;

use ErrorException;
use Modules\Chart\Database\Factories\ChartFactory;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;

/**
 * Modules\Chart\Models\Chart.
 *
 * @property int|null $height
 * @property string|null $type
 * @property int|null $width
 * @property string|null $color
 * @property string|null $bg_color
 * @property int|null $font_family
 * @property int|null $font_size
 * @property int|null $font_style
 * @property int|null $y_grace
 * @property bool|null $yaxis_hide
 * @property string|null $list_color
 * @property int|null $grace
 * @property int|null $x_label_angle
 * @property bool|null $show_box
 * @property int|null $x_label_margin
 * @property int|null $plot_perc_width
 * @property int|null $plot_value_show
 * @property string|null $plot_value_format
 * @property int|null $plot_value_pos
 * @property string|null $plot_value_color
 * @property string|null $group_by
 * @property string|null $sort_by
 * @property int|null $transparency
 * @property array<string, mixed>|null $colors
 * @property string|null $post_id
 * @property string|null $post_type
 * @property string|null $chart_type
 *
 * @method static ChartFactory factory($count = null, $state = [])
 * @method static Builder|Chart newModelQuery()
 * @method static Builder|Chart newQuery()
 * @method static Builder|Chart query()
 *
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 *
 * @mixin \Eloquent
 */
class Chart extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'id',
        'post_id',
        'post_type',
        'type',
        'width', 'height',
        'color',
        'bg_color',
        'font_family',
        'font_size',
        'font_style',
        'y_grace',
        'yaxis_hide',
        'list_color',
        'grace',
        'x_label_angle',
        'show_box',
        'x_label_margin',
        'plot_perc_width',
        'plot_value_show',
        'plot_value_format',
        'plot_value_pos',
        'plot_value_color',
        'group_by',
        'sort_by',
        'transparency',
        'colors',
    ];

    /** @var array<string, mixed> */
    protected $attributes = [
        'list_color' => '#d60021',
        'color' => '#d60021',
        'font_family' => 15,
        'font_style' => 9002,
        'font_size' => 12,
        'x_label_angle' => 0,
        'show_box' => false,
        'x_label_margin' => 10,
        'plot_perc_width' => 90,
        'plot_value_show' => 1,
        'plot_value_pos' => 1,
        'plot_value_color' => '#000000',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'colors' => 'array',
        ];
    }

    public function getPanelRow(string $parent_field, string $my_field): int|string|null
    {
        $panel_row = $this;
        $value = null;

        try {
            $value = $panel_row->{$parent_field};
            $this->{$my_field} = $value;
            $this->save();
        } catch (ErrorException $errorException) {
            $msg = [
                'message' => $errorException->getMessage(),
                'line' => $errorException->getLine(),
                'file' => $errorException->getFile(),
                'panel_row_class' => $panel_row::class,
            ];
            $value = null;
        }

        /** @var int|string|null */
        return $value;
    }

    public function getTypeAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }

        $res = $this->attributes['type'] ?? (string) $this->getPanelRow('chart_type', 'type');
        Assert::string($res);

        return $res;
    }

    public function getWidthAttribute(?string $value): ?int
    {
        if ($value === null) {
            return (int) $this->getPanelRow('width', 'width');
        }

        if ((int) $value === 0) {
            return (int) $this->getPanelRow('width', 'width');
        }

        return (int) $value;
    }

    public function getHeightAttribute(?string $value): ?int
    {
        if ($value === null) {
            return (int) $this->getPanelRow('height', 'height');
        }
        if ((int) $value === 0) {
            return (int) $this->getPanelRow('height', 'height');
        }

        return (int) $value;
    }

    /**
     * Get chart settings as array of chart configurations.
     *
     * @return array<string, array<int|string, mixed>>
     */
    public function getSettings(): array
    {
        Assert::notNull($this->type, '['.__FILE__.']['.__LINE__.']');
        
        if (Str::startsWith($this->type, 'mixed')) {
            $parz = \array_slice(explode(':', $this->type), 1);
            $mixed_id = implode('|', $parz);
            $mixed = MixedChart::firstWhere(['id' => $mixed_id]);
            Assert::notNull($mixed, '['.__FILE__.']['.__LINE__.']');
            Assert::isInstanceof($mixed->charts, Collection::class);

            /** @var array<string, array<int|string, mixed>> $chartsArray */
            $chartsArray = $mixed->charts->toArray();
            return $chartsArray;
        }

        /** @var array<string, array<int|string, mixed>> $result */
        $result = ['chart' => $this->toArray()];
        return $result;
    }
}
