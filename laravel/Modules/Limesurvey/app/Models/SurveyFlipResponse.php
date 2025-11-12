<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Datas\DashboardFilterData;
use Modules\Quaeris\Datas\AlertDashboardFilterData;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class SurveyFlipResponse.
 */
class SurveyFlipResponse extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'survey_id',      // ID dell'indagine
        'question_id',    // ID della domanda
        'question_type',    // Typè della domanda
        'answer',         // Valore della risposta
        'value',          // Valore da aggiungere per le risposte
        'participant_id', // ID del partecipante
        'submitdate',     // Data di invio della risposta
        'fieldname',      // Nome del campo della risposta
        'token',
        'old_id',
        'feedback',
    ];

    /** @var array<string, string> */
    protected $casts = [
        'survey_id' => 'string',
        'question_id' => 'string',
        'question_type' => 'string',
        'answer' => 'string',
        'value' => 'string',
        'participant_id' => 'string',
        'submitdate' => 'datetime',
        'fieldname' => 'string',
        'old_id' => 'string',
        'feedback' => 'string',
    ];

    /**
     * Relazione con il modello LimeQuestion.
     *
     * @return BelongsTo
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(LimeQuestion::class, 'question_id');
    }

    /**
     * Relazione con il modello Survey.
     *
     * @return BelongsTo
     */
    public function survey(): BelongsTo
    {
        return $this->belongsTo(LimeSurvey::class, 'survey_id');
    }

    /*
     * Relazione con il modello Participant dalla tabella lime_tokens_<survey_id>.
     *
     * @return HasOne
    
    public function participant(): HasOne
    {
        // Costruisce dinamicamente il nome della tabella
        $table = 'lime_tokens_' . $this->survey_id;
    
        return $this->hasOne($table, 'token', 'participant_id'); // Relazione 1 a 1
    }
    */
    /**
     * Restituisce i partecipanti per un determinato survey_id.
     *
     * @param string $survey_id
     *
     * @return Collection
     */
    public static function getParticipants(string $survey_id): Collection
    {
        $table = 'lime_tokens_' . $survey_id;

        return DB::table($table)->get(); // Ottieni tutti i partecipanti per il survey_id specificato
    }

    /**
     * Ottiene le risposte per un determinato survey_id.
     *
     * @param string $survey_id
     *
     * @return Collection
     */
    public static function getResponsesBySurveyId(string $survey_id): Collection
    {
        return self::where('survey_id', $survey_id)->get();
    }

    /**
     * Scope a query to filter responses based on provided filter data.
     */
    public function scopeOfFilterData(Builder $query, AnswersFilterData $answersFilterData): void
    {
        $query->when(
            $answersFilterData->date_from,
            static function (Builder $q1) use ($answersFilterData): void {
                $q1->where('submitdate', '>=', $answersFilterData->date_from);
            }
        )->when(
            $answersFilterData->date_to,
            static function (Builder $q1) use ($answersFilterData): void {
                $q1->where('submitdate', '<=', $answersFilterData->date_to);
            }
        )->when(
            $answersFilterData->question_filter,
            static function (Builder $q1) use ($answersFilterData): void {
                $q1->where('fieldname', $answersFilterData->question_filter);
            }
        );
    }

    public function scopeOfDashboardFilterData(Builder $query,DashboardFilterData $filter): Builder{

        $query=$query->where('submitdate', '>=', $filter->startDate)
            ->where('submitdate', '<=', $filter->endDate)
        ;

        if ($filter->question_filter !== null) {
            $filter_field = $filter->question_filter_fieldname;
            if ($filter_field !== null) {
                $query = $query->where($filter_field, $filter->question_filter);
            }
        }

        return $query;
    }

    public function scopeOfAlertDashboardFilterData(Builder $query, AlertDashboardFilterData $filter): Builder
    {
        $dashboard_filter_data = $filter->getDashboardFilterData();
    
        $query = $query->ofDashboardFilterData($dashboard_filter_data)
            // ->whereNull('value')  // Filtro principale: solo record con value NULL
            // Verifica che answer contenga solo numeri (con possibili zeri iniziali)
            ->whereRaw('answer REGEXP "^[0-9]+$"')
            // Filtro base: solo valori numerici tra 0 e 10
            ->whereRaw('CAST(REGEXP_REPLACE(answer, "^0+", "") AS DECIMAL) >= 0')
            ->whereRaw('CAST(REGEXP_REPLACE(answer, "^0+", "") AS DECIMAL) <= 10')
            ->when(
                $filter->min_value,
                function (Builder $query, int $value): Builder {
                    return $query->whereRaw('CAST(REGEXP_REPLACE(answer, "^0+", "") AS DECIMAL) >= ?', [$value]);
                }
            )
            ->when(
                $filter->max_value,
                function (Builder $query, int $value): Builder {
                    return $query->whereRaw('CAST(REGEXP_REPLACE(answer, "^0+", "") AS DECIMAL) <= ?', [$value]);
                }
            );
    
        return $query;
    }

    public function scopeOfAlertDashboardFilterDataOLD(Builder $query, AlertDashboardFilterData $filter): Builder
    {
        $dashboard_filter_data = $filter->getDashboardFilterData();
    
        $query = $query->ofDashboardFilterData($dashboard_filter_data)
            ->when(
                $filter->min_value,
                function (Builder $query, int $value): Builder {
                    return $query->where(function (Builder $q) use ($value) {
                        $q->whereNull('value')
                            ->whereRaw('answer REGEXP "^-?[0-9]+(\.[0-9]+)?$"')
                            ->where('answer', '>=', $value)
                            ->orWhere(function (Builder $q) use ($value) {
                                $q->whereNotNull('value')
                                    ->whereRaw('value REGEXP "^-?[0-9]+(\.[0-9]+)?$"')
                                    ->where('value', '>=', $value);
                            });
                    });
                }
            )
            ->when(
                $filter->max_value,
                function (Builder $query, int $value): Builder {
                    return $query->where(function (Builder $q) use ($value) {
                        $q->whereNull('value')
                            ->whereRaw('answer REGEXP "^-?[0-9]+(\.[0-9]+)?$"')
                            ->where('answer', '<=', $value)
                            ->orWhere(function (Builder $q) use ($value) {
                                $q->whereNotNull('value')
                                    ->whereRaw('value REGEXP "^-?[0-9]+(\.[0-9]+)?$"')
                                    ->where('value', '<=', $value);
                            });
                    });
                }
            );
    
        return $query;
    }
    
}
