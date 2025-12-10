<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurveysLanguagesettingFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeSurveysLanguagesetting
 *
 * @method static CachedBuilder|LimeSurveysLanguagesetting all($columns = [])
 * @method static CachedBuilder|LimeSurveysLanguagesetting avg($column)
 * @method static CachedBuilder|LimeSurveysLanguagesetting cache(array $tags = [])
 * @method static CachedBuilder|LimeSurveysLanguagesetting cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurveysLanguagesetting count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurveysLanguagesetting disableModelCaching()
 * @method static CachedBuilder|LimeSurveysLanguagesetting exists()
 * @method static LimeSurveysLanguagesettingFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurveysLanguagesetting flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurveysLanguagesetting getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurveysLanguagesetting inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurveysLanguagesetting insert(array $values)
 * @method static CachedBuilder|LimeSurveysLanguagesetting isCachable()
 * @method static CachedBuilder|LimeSurveysLanguagesetting max($column)
 * @method static CachedBuilder|LimeSurveysLanguagesetting min($column)
 * @method static CachedBuilder|LimeSurveysLanguagesetting newModelQuery()
 * @method static CachedBuilder|LimeSurveysLanguagesetting newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurveysLanguagesetting query()
 * @method static CachedBuilder|LimeSurveysLanguagesetting sum($column)
 * @method static CachedBuilder|LimeSurveysLanguagesetting truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $surveyls_survey_id
 * @property string $surveyls_language
 * @property string $surveyls_title
 * @property string|null $surveyls_description
 * @property string|null $surveyls_welcometext
 * @property string|null $surveyls_endtext
 * @property string|null $surveyls_policy_notice
 * @property string|null $surveyls_policy_error
 * @property string|null $surveyls_policy_notice_label
 * @property string|null $surveyls_url
 * @property string|null $surveyls_urldescription
 * @property string|null $surveyls_email_invite_subj
 * @property string|null $surveyls_email_invite
 * @property string|null $surveyls_email_remind_subj
 * @property string|null $surveyls_email_remind
 * @property string|null $surveyls_email_register_subj
 * @property string|null $surveyls_email_register
 * @property string|null $surveyls_email_confirm_subj
 * @property string|null $surveyls_email_confirm
 * @property int $surveyls_dateformat
 * @property string|null $surveyls_attributecaptions
 * @property string|null $email_admin_notification_subj
 * @property string|null $email_admin_notification
 * @property string|null $email_admin_responses_subj
 * @property string|null $email_admin_responses
 * @property int $surveyls_numberformat
 * @property string|null $attachments
 *
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereAttachments($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereEmailAdminNotification($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereEmailAdminNotificationSubj($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereEmailAdminResponses($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereEmailAdminResponsesSubj($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsAttributecaptions($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsDateformat($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsDescription($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsEmailConfirm($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsEmailConfirmSubj($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsEmailInvite($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsEmailInviteSubj($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsEmailRegister($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsEmailRegisterSubj($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsEmailRemind($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsEmailRemindSubj($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsEndtext($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsLanguage($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsNumberformat($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsPolicyError($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsPolicyNotice($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsPolicyNoticeLabel($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsSurveyId($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsTitle($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsUrl($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsUrldescription($value)
 * @method static CachedBuilder|LimeSurveysLanguagesetting whereSurveylsWelcometext($value)
 *
 * @mixin \Eloquent
 */
class LimeSurveysLanguagesetting extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_surveys_languagesettings';

    /**  @var string   */
    protected $primaryKey = 'surveyls_survey_id';

    /** @var array<int, string>  */
    protected $fillable = [
        'surveyls_survey_id',
        'surveyls_language', 'surveyls_title', 'surveyls_description', 'surveyls_welcometext', 'surveyls_endtext', 'surveyls_policy_notice', 'surveyls_policy_error', 'surveyls_policy_notice_label', 'surveyls_url', 'surveyls_urldescription', 'surveyls_email_invite_subj', 'surveyls_email_invite', 'surveyls_email_remind_subj', 'surveyls_email_remind', 'surveyls_email_register_subj', 'surveyls_email_register', 'surveyls_email_confirm_subj', 'surveyls_email_confirm', 'surveyls_dateformat', 'surveyls_attributecaptions', 'email_admin_notification_subj', 'email_admin_notification', 'email_admin_responses_subj', 'email_admin_responses', 'surveyls_numberformat', 'attachments',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'surveyls_survey_id' => 'int', 'surveyls_language' => 'string', 'surveyls_title' => 'string', 'surveyls_description' => 'string', 'surveyls_welcometext' => 'string', 'surveyls_endtext' => 'string', 'surveyls_policy_notice' => 'string', 'surveyls_policy_error' => 'string', 'surveyls_policy_notice_label' => 'string', 'surveyls_url' => 'string', 'surveyls_urldescription' => 'string', 'surveyls_email_invite_subj' => 'string', 'surveyls_email_invite' => 'string', 'surveyls_email_remind_subj' => 'string', 'surveyls_email_remind' => 'string', 'surveyls_email_register_subj' => 'string', 'surveyls_email_register' => 'string', 'surveyls_email_confirm_subj' => 'string', 'surveyls_email_confirm' => 'string', 'surveyls_dateformat' => 'int', 'surveyls_attributecaptions' => 'string', 'email_admin_notification_subj' => 'string', 'email_admin_notification' => 'string', 'email_admin_responses_subj' => 'string', 'email_admin_responses' => 'string', 'surveyls_numberformat' => 'int', 'attachments' => 'string',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array<string>
     */
    protected $dates = [
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
