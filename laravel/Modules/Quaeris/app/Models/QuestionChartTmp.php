<?php

declare(strict_types=1);

namespace Modules\Quaeris\Models;

use Modules\Quaeris\Database\Factories\QuestionChartTmpFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\Extra;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Modules\Chart\Models\Chart;
use Modules\Limesurvey\Models\LimeQuestion;

/**
 * Modules\Quaeris\Models\QuestionChartTmp
 *
 * @property int $id
 * @property int|null $survey_pdf_id
 * @property string|null $question
 * @property string|null $subquestion
 * @property string|null $width
 * @property string|null $height
 * @property string|null $group_by
 * @property int|null $take
 * @property string|null $chart_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $sort_by
 * @property int|null $pos
 * @property string|null $max
 * @property string|null $min
 * @property string|null $img_src
 * @property Carbon|null $generated_at
 * @property int|null $col_size
 * @property string|null $question_txt
 * @property string|null $answer_value
 * @property string|null $title
 * @property string|null $subtitle
 * @property string|null $answer_value_txt
 * @property string|null $answer_value_no_txt
 * @property string|null $group_name
 * @property string|null $list_color
 * @property string|null $question_type
 * @property string|null $sub_question_type
 * @property string|null $question_title
 * @property string|null $page_type
 * @property string|null $data_type
 * @property string|null $add_nulls
 * @property string|null $interval
 * @property int $show_on_pdf
 * @property int $show_tot_invited
 * @property string $field_name
 * @property string $group_title
 *
 * @property-read Chart $chart
 * @property-read Collection<int, Contact> $contacts
 * @property-read int|null $contacts_count
 * @property-read array<mixed> $charts
 * @property-read string|null $date_from
 * @property-read string|null $date_to
 * @property-read string|null $full_question_txt
 * @property-read string|null $group_by_sql
 * @property-read string|null $mandatory
 * @property-read string $parent_qid
 * @property-read string|null $sort_by_sql
 *
 * @property string|null $subquestion_type
 *
 * @property-read string $survey_id
 * @property-read LimeQuestion|null $limeQuestion
 * @property-read LimeQuestion|null $props
 * @property-read SurveyPdf|null $surveyPdf
 *
 * @method static CachedBuilder all($columns = [])
 * @method static CachedBuilder avg($column)
 * @method static CachedBuilder cache(array $tags = [])
 * @method static CachedBuilder cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder count($columns = '*')
 * @method static CachedBuilder disableCache()
 * @method static CachedBuilder disableModelCaching()
 * @method static CachedBuilder exists()
 * @method static QuestionChartTmpFactory factory($count = null, $state = [])
 * @method static CachedBuilder flushCache(array $tags = [])
 * @method static CachedBuilder getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder inRandomOrder($seed = '')
 * @method static CachedBuilder insert(array $values)
 * @method static CachedBuilder isCachable()
 * @method static CachedBuilder max($column)
 * @method static CachedBuilder min($column)
 * @method static CachedBuilder newModelQuery()
 * @method static CachedBuilder newQuery()
 * @method static CachedBuilder query()
 * @method static CachedBuilder sum($column)
 * @method static CachedBuilder truncate()
 * @method static CachedBuilder whereAddNulls($value)
 * @method static CachedBuilder whereAnswerValue($value)
 * @method static CachedBuilder whereAnswerValueNoTxt($value)
 * @method static CachedBuilder whereAnswerValueTxt($value)
 * @method static CachedBuilder whereChartType($value)
 * @method static CachedBuilder whereColSize($value)
 * @method static CachedBuilder whereCreatedAt($value)
 * @method static CachedBuilder whereCreatedBy($value)
 * @method static CachedBuilder whereDataType($value)
 * @method static CachedBuilder whereFieldName($value)
 * @method static CachedBuilder whereGeneratedAt($value)
 * @method static CachedBuilder whereGroupBy($value)
 * @method static CachedBuilder whereGroupName($value)
 * @method static CachedBuilder whereGroupTitle($value)
 * @method static CachedBuilder whereHeight($value)
 * @method static CachedBuilder whereId($value)
 * @method static CachedBuilder whereImgSrc($value)
 * @method static CachedBuilder whereInterval($value)
 * @method static CachedBuilder whereListColor($value)
 * @method static CachedBuilder whereMax($value)
 * @method static CachedBuilder whereMin($value)
 * @method static CachedBuilder wherePageType($value)
 * @method static CachedBuilder wherePos($value)
 * @method static CachedBuilder whereQuestion($value)
 * @method static CachedBuilder whereQuestionTitle($value)
 * @method static CachedBuilder whereQuestionTxt($value)
 * @method static CachedBuilder whereQuestionType($value)
 * @method static CachedBuilder whereShowOnPdf($value)
 * @method static CachedBuilder whereShowTotInvited($value)
 * @method static CachedBuilder whereSortBy($value)
 * @method static CachedBuilder whereSubQuestionType($value)
 * @method static CachedBuilder whereSubquestion($value)
 * @method static CachedBuilder whereSubtitle($value)
 * @method static CachedBuilder whereSurveyPdfId($value)
 * @method static CachedBuilder whereTake($value)
 * @method static CachedBuilder whereTitle($value)
 * @method static CachedBuilder whereUpdatedAt($value)
 * @method static CachedBuilder whereUpdatedBy($value)
 * @method static CachedBuilder whereWidth($value)
 * @method static CachedBuilder withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property string|null $chart_color
 * @property string|null $chart_font_family
 * @property string|null $chart_font_size
 * @property string|null $chart_font_style
 *
 * @method static CachedBuilder whereChartColor($value)
 * @method static CachedBuilder whereChartFontFamily($value)
 * @method static CachedBuilder whereChartFontSize($value)
 * @method static CachedBuilder whereChartFontStyle($value)
 * @method static CachedBuilder whereSubquestionType($value)
 *
 * @property-read Extra|null $extra
 *
 * @mixin \Eloquent
 */
class QuestionChartTmp extends QuestionChart
{
    protected $table = 'question_charts';
}
