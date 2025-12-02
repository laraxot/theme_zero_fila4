<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

// use Laravel\Scout\Searchable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Xot\Actions\Factory\GetFactoryAction;
use Modules\Xot\Models\Traits\HasExtraTrait;

/**
 * Class BaseModel.
 */
abstract class BaseModel extends Model
{
    // use Updater;
    // use Searchable;
    use Cachable;
    use HasFactory;
    use HasExtraTrait;

    /** @var bool */
    public $incrementing = true;

    /** @var bool */
    public $timestamps = false;

    /** @var string */
    protected $connection = 'limesurvey';

    /** @var list<string> */
    protected $fillable = [
        'id',
    ];

    /** @var array<string, string> */
    protected $casts = [
        // 'published_at' => 'datetime:Y-m-d', // da verificare
    ];

    /**
     * @var array<string>
     */
    protected $dates = [];

    /** @var string */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $hidden = [
        // 'password'
    ];

    /** @var array<int, string> */
    protected $appends = [
    ];

    /** @var array<string > */
    protected $with = [
        'extra',
    ];

    /**
     * Scope a query to only include popular users.
     */
    public function scopeOfFilterData(Builder $query, AnswersFilterData $answersFilterData): void
    {
        $query->when(
            $answersFilterData->date_from,
            static function ($q1) use ($answersFilterData): void {
                $q1->where('submitdate', '>=', $answersFilterData->date_from);
            }
        )->when(
            $answersFilterData->date_to,
            static function ($q1) use ($answersFilterData): void {
                $q1->where('submitdate', '<=', $answersFilterData->date_to);
            }
        )
        /*
        ->when(
            $answersFilterData->question_filter,
            function ($q1) use ( $answersFilterData) {
                $filter_field -- da fare !
                $q1->where($filter_field, $answersFilterData->question_filter);
            }
        )
        */;
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return app(GetFactoryAction::class)->execute(static::class);
    }
}
