<?php

declare(strict_types=1);

namespace Modules\Quaeris\Models;

use Modules\Quaeris\Database\Factories\ContactFactory;
use Modules\Xot\Models\Extra;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Support\Carbon;
use Spatie\ModelStatus\Status;

/**
 * Modules\Quaeris\Models\Contact
 *
 * @property int                                                       $id
 * @property string|null                                               $email
 * @property string|null                                               $mobile_phone
 * @property Carbon|null                                               $created_at
 * @property Carbon|null                                               $updated_at
 * @property string|null                                               $created_by
 * @property string|null                                               $updated_by
 * @property string|null                                               $sms_sent_at
 * @property int|null                                                  $sms_count
 * @property string|null                                               $mail_sent_at
 * @property int|null                                                  $mail_count
 * @property string|null                                               $survey_pdf_id
 * @property string|null                                               $token
 * @property string|null                                               $first_name
 * @property string|null                                               $last_name
 * @property string|null                                               $attribute_1
 * @property string|null                                               $attribute_2
 * @property string|null                                               $attribute_3
 * @property string|null                                               $attribute_4
 * @property string|null                                               $attribute_5
 * @property string|null                                               $attribute_6
 * @property string|null                                               $attribute_7
 * @property string|null                                               $attribute_8
 * @property string|null                                               $attribute_9
 * @property string|null                                               $attribute_10
 * @property string|null                                               $attribute_11
 * @property string|null                                               $attribute_12
 * @property string|null                                               $attribute_13
 * @property string|null                                               $attribute_14
 * @property string|null                                               $usesleft
 * @property string|null                                               $sms_status_code
 * @property string|null                                               $sms_status_txt
 * @property int|null                                                  $duplicate_count
 * @property int|null                                                  $order_column
 * @property bool                                                      $allow_multiple_invite
 * @property string                                                    $email_cell
 * @property string                                                    $info_cell
 * @property string|null                                               $lang
 * @property string|null                                               $language
 * @property string|null                                               $logo_src
 * @property string                                                    $mail_body
 * @property string|null                                               $mail_from
 * @property string|null                                               $mail_from_email
 * @property string|null                                               $mail_subject
 * @property array|null                                                $notify_via
 * @property string                                                    $sms_body
 * @property string                                                    $sms_cell
 * @property string|null                                               $sms_from
 * @property int|null                                                  $survey_id
 * @property DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property int|null                                                  $notifications_count
 * @property Collection<int, Status>                                   $statuses
 * @property int|null                                                  $statuses_count
 * @property SurveyPdf|null $surveyPdf
 *
 * @method static CachedBuilder                                  all($columns = [])
 * @method static CachedBuilder                                  avg($column)
 * @method static CachedBuilder                                  cache(array $tags = [])
 * @method static CachedBuilder                                  cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder                                  count($columns = '*')
 * @method static CachedBuilder                                  currentStatus(...$names)
 * @method static CachedBuilder disableCache()
 * @method static CachedBuilder                                  disableModelCaching()
 * @method static CachedBuilder                                  exists()
 * @method static ContactFactory factory($count = null, $state = [])
 * @method static CachedBuilder                                  flushCache(array $tags = [])
 * @method static CachedBuilder getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder                                  hasAnswer($survey_id)
 * @method static CachedBuilder                                  inRandomOrder($seed = '')
 * @method static CachedBuilder                                  insert(array $values)
 * @method static CachedBuilder                                  isCachable()
 * @method static CachedBuilder                                  max($column)
 * @method static CachedBuilder                                  min($column)
 * @method static CachedBuilder                                  missingToken()
 * @method static CachedBuilder                                  newModelQuery()
 * @method static CachedBuilder                                  newQuery()
 * @method static CachedBuilder                                  noInvited()
 * @method static CachedBuilder                                  noToken()
 * @method static CachedBuilder                                  otherCurrentStatus(...$names)
 * @method static CachedBuilder                                  query()
 * @method static CachedBuilder                                  sum($column)
 * @method static CachedBuilder                                  truncate()
 * @method static CachedBuilder                                  whereAttribute1($value)
 * @method static CachedBuilder                                  whereAttribute10($value)
 * @method static CachedBuilder                                  whereAttribute11($value)
 * @method static CachedBuilder                                  whereAttribute12($value)
 * @method static CachedBuilder                                  whereAttribute13($value)
 * @method static CachedBuilder                                  whereAttribute14($value)
 * @method static CachedBuilder                                  whereAttribute2($value)
 * @method static CachedBuilder                                  whereAttribute3($value)
 * @method static CachedBuilder                                  whereAttribute4($value)
 * @method static CachedBuilder                                  whereAttribute5($value)
 * @method static CachedBuilder                                  whereAttribute6($value)
 * @method static CachedBuilder                                  whereAttribute7($value)
 * @method static CachedBuilder                                  whereAttribute8($value)
 * @method static CachedBuilder                                  whereAttribute9($value)
 * @method static CachedBuilder                                  whereCreatedAt($value)
 * @method static CachedBuilder                                  whereCreatedBy($value)
 * @method static CachedBuilder                                  whereDuplicateCount($value)
 * @method static CachedBuilder                                  whereEmail($value)
 * @method static CachedBuilder                                  whereFirstName($value)
 * @method static CachedBuilder                                  whereId($value)
 * @method static CachedBuilder                                  whereLastName($value)
 * @method static CachedBuilder                                  whereMailCount($value)
 * @method static CachedBuilder                                  whereMailSentAt($value)
 * @method static CachedBuilder                                  whereMobilePhone($value)
 * @method static CachedBuilder                                  whereOrderColumn($value)
 * @method static CachedBuilder                                  whereSmsCount($value)
 * @method static CachedBuilder                                  whereSmsSentAt($value)
 * @method static CachedBuilder                                  whereSmsStatusCode($value)
 * @method static CachedBuilder                                  whereSmsStatusTxt($value)
 * @method static CachedBuilder                                  whereSurveyPdfId($value)
 * @method static CachedBuilder                                  whereToken($value)
 * @method static CachedBuilder                                  whereUpdatedAt($value)
 * @method static CachedBuilder                                  whereUpdatedBy($value)
 * @method static CachedBuilder                                  whereUsesleft($value)
 * @method static CachedBuilder withCacheCooldownSeconds(?int $seconds = null)
 * @method static CachedBuilder                                  withMail()
 * @method static CachedBuilder                                  whereLanguage($value)
 *
 * @property-read Extra|null $extra
 *
 * @mixin \Eloquent
 */
class ContactSimple extends Model
{
    /** @var string */
    protected $connection = 'quaeris';
    /** @var string */
    protected $table = 'contacts';

    /** @var list<string> */
    protected $fillable = [
        'id',
        'survey_pdf_id',
        'mobile_phone', 'sms_sent_at', 'sms_count',
        'email', 'mail_sent_at', 'mail_count',
        'language', 'usesleft',
        'token',
        'first_name', 'last_name',
        'attribute_1', 'attribute_2', 'attribute_3', 'attribute_4',
        'attribute_5', 'attribute_6', 'attribute_7', 'attribute_8',
        'attribute_9', 'attribute_10', 'attribute_11', 'attribute_12',
        'attribute_13', 'attribute_14',
        'sms_status_code', 'sms_status_txt',
        'duplicate_count',
        'order_column',
    ];

    /** @var list<string> */
    protected $appends = [
        // 'q',
    ];
}
