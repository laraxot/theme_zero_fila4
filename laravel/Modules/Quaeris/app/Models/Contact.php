<?php

declare(strict_types=1);

namespace Modules\Quaeris\Models;

use Exception;
use Modules\Quaeris\Database\Factories\ContactFactory;
use Modules\Xot\Models\Extra;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Modules\Limesurvey\Models\LimeSurvey;
use Modules\Limesurvey\Models\SurveyResponse;
use Modules\Notify\Contracts\CanThemeNotificationContract;
use Modules\Notify\Datas\NotificationData;
use Modules\Notify\Notifications\Channels\NetfunChannel;
use Modules\Xot\Actions\Generate\GenerateModelByModelClass;
use Modules\Xot\Models\Traits\HasExtraTrait;
use Spatie\ModelStatus\HasStatuses;
use Spatie\ModelStatus\Status;
use Webmozart\Assert\Assert;

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
 * @method static CachedBuilder                                 all($columns = [])
 * @method static CachedBuilder                                 avg($column)
 * @method static CachedBuilder                                 cache(array $tags = [])
 * @method static CachedBuilder                                 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder                                 count($columns = '*')
 * @method static CachedBuilder                                 currentStatus(...$names)
 * @method static CachedBuilder disableCache()
 * @method static CachedBuilder                                 disableModelCaching()
 * @method static CachedBuilder                                 exists()
 * @method static ContactFactory factory($count = null, $state = [])
 * @method static CachedBuilder                                 flushCache(array $tags = [])
 * @method static CachedBuilder getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder                                 hasAnswer($survey_id)
 * @method static CachedBuilder                                 inRandomOrder($seed = '')
 * @method static CachedBuilder                                 insert(array $values)
 * @method static CachedBuilder                                 isCachable()
 * @method static CachedBuilder                                 max($column)
 * @method static CachedBuilder                                 min($column)
 * @method static CachedBuilder                                 missingToken()
 * @method static CachedBuilder                                 newModelQuery()
 * @method static CachedBuilder                                 newQuery()
 * @method static CachedBuilder                                 noInvited()
 * @method static CachedBuilder                                 noToken()
 * @method static CachedBuilder                                 otherCurrentStatus(...$names)
 * @method static CachedBuilder                                 query()
 * @method static CachedBuilder                                 sum($column)
 * @method static CachedBuilder                                 truncate()
 * @method static CachedBuilder                                 whereAttribute1($value)
 * @method static CachedBuilder                                 whereAttribute10($value)
 * @method static CachedBuilder                                 whereAttribute11($value)
 * @method static CachedBuilder                                 whereAttribute12($value)
 * @method static CachedBuilder                                 whereAttribute13($value)
 * @method static CachedBuilder                                 whereAttribute14($value)
 * @method static CachedBuilder                                 whereAttribute2($value)
 * @method static CachedBuilder                                 whereAttribute3($value)
 * @method static CachedBuilder                                 whereAttribute4($value)
 * @method static CachedBuilder                                 whereAttribute5($value)
 * @method static CachedBuilder                                 whereAttribute6($value)
 * @method static CachedBuilder                                 whereAttribute7($value)
 * @method static CachedBuilder                                 whereAttribute8($value)
 * @method static CachedBuilder                                 whereAttribute9($value)
 * @method static CachedBuilder                                 whereCreatedAt($value)
 * @method static CachedBuilder                                 whereCreatedBy($value)
 * @method static CachedBuilder                                 whereDuplicateCount($value)
 * @method static CachedBuilder                                 whereEmail($value)
 * @method static CachedBuilder                                 whereFirstName($value)
 * @method static CachedBuilder                                 whereId($value)
 * @method static CachedBuilder                                 whereLastName($value)
 * @method static CachedBuilder                                 whereMailCount($value)
 * @method static CachedBuilder                                 whereMailSentAt($value)
 * @method static CachedBuilder                                 whereMobilePhone($value)
 * @method static CachedBuilder                                 whereOrderColumn($value)
 * @method static CachedBuilder                                 whereSmsCount($value)
 * @method static CachedBuilder                                 whereSmsSentAt($value)
 * @method static CachedBuilder                                 whereSmsStatusCode($value)
 * @method static CachedBuilder                                 whereSmsStatusTxt($value)
 * @method static CachedBuilder                                 whereSurveyPdfId($value)
 * @method static CachedBuilder                                 whereToken($value)
 * @method static CachedBuilder                                 whereUpdatedAt($value)
 * @method static CachedBuilder                                 whereUpdatedBy($value)
 * @method static CachedBuilder                                 whereUsesleft($value)
 * @method static CachedBuilder withCacheCooldownSeconds(?int $seconds = null)
 * @method static CachedBuilder                                 withMail()
 * @method static CachedBuilder                                 whereLanguage($value)
 *
 * @property-read Extra|null $extra
 *
 * @mixin \Eloquent
 */
class Contact extends BaseModel implements CanThemeNotificationContract
{
    use HasStatuses;
    use Notifiable;
    use HasExtraTrait;

    /** @var list<string> */
    protected $fillable = [
        'id',
        'survey_pdf_id',
        'survey_id',
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

    /** @var list<string> */
    protected $with = [
        'surveyPdf',
        'extra',
    ];

    /**
     * @return string|null
     */
    public function getLangAttribute(?string $value)
    {
        if ($value !== null) {
            return $value;
        }

        if ($this->getKey() === null) {
            return $value;
        }

        $value = app()->getLocale();
        $this->update(['lang' => $value]);

        return $value;
    }

    public function getLanguageAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }

        if ($this->getKey() === null) {
            return $value;
        }

        $value = app()->getLocale();
        $this->update(['lang' => $value]);

        return $value;
    }

    public function getAllowMultipleInviteAttribute(?bool $value): bool
    {
        // dddx($this->getExtraBool('allow_multiple_invite'));
        // if(($value = $this->getExtraBool('allow_multiple_invite')) !== null) {
        //     return $value;
        // }
        // :229   Unreachable statement - code above always terminates.
        $survey_pdf = $this->surveyPdf;
        if ($survey_pdf === null) {
            return true; // default;
        }

        return (bool) $survey_pdf->allow_multiple_invite;
        // $this->setExtra('allow_multiple_invite', $value);
    }

    public function getSurveyId(): ?int
    {
        if ($this->surveyPdf == null) {
            return null;
            //throw new \Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        $value = (int) $this->surveyPdf->survey_id;
        return $value;
    }

    public function getSurveyIdAttribute(?int $value): ?int
    {
        if ($value !== null) {
            return (int) $value;
        }

        $value = $this->getSurveyId();
        $this->update([
            'survey_id' => $value
        ]);
        return $value;
    }

    public function getLogoSrcAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }

        if ($this->surveyPdf === null) {
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        return $this->surveyPdf->logo;
    }

    public function getDuplicateCountAttribute(?int $value): ?int
    {
        if ($value !== null) {
            return $value;
        }

        /*
        $same_email = Contact::where('email', $this->email)
            ->where('id', '<', $this->id)
            ->where('survey_pdf_id', $this->survey_pdf_id)
            ->count();
        $same_phone = Contact::where('mobile_phone', $this->mobile_phone)
            ->where('id', '<', $this->id)
            ->where('survey_pdf_id', $this->survey_pdf_id)
            ->count();
        $val = 0;
        if ('' != $this->email) {
            $val += $same_email;
        }
        if ('' != $this->mobile_phone) {
            $val += $same_phone;
        }
        */
        $rows = self::where('id', '<', $this->id)
            ->where('survey_pdf_id', $this->survey_pdf_id);
        /*
        ->where(function ($q) {
            $q
            ->where('email', '!=', '')
            ->orWhere('mobile_phone', '!=', '');
        });
        */
        if ($this->email !== null && $this->mobile_phone !== null) {
            $rows = $rows->where(function ($q): void {
                $q
                    ->where('email', $this->email)
                    ->orWhere('mobile_phone', $this->mobile_phone);
            });
        }

        if ($this->email === null && $this->mobile_phone !== null) {
            $rows = $rows->where('mobile_phone', $this->mobile_phone);
        }

        if ($this->email !== null && $this->mobile_phone === null) {
            $rows = $rows->where('email', $this->email);
        }
        // dddx([$rows->count(), $this->email, $this->mobile_phone]);
        $value = $rows->count();
        $this->update(['duplicate_count' => $value]);

        return $value;
    }

    public function getEmailCellAttribute(?string $value): string
    {
        $res = '';
        // $res.='<pre>';
        $res .= 'Email: '.$this->email.'<br/>'.PHP_EOL;
        $res .= 'sent at: '.$this->mail_sent_at.'<br/>'.PHP_EOL;

        // $res.='</pre>';
        return $res.('count: '.$this->mail_count.'<br/>'.PHP_EOL);
    }

    public function getSmsCellAttribute(?string $value): string
    {
        $res = '';
        // $res.='<pre>';
        $res .= 'number: '.$this->mobile_phone.'<br/>'.PHP_EOL;
        $res .= 'sent at: '.$this->sms_sent_at.'<br/>'.PHP_EOL;

        // $res.='</pre>';
        return $res.('count: '.$this->sms_count.'<br/>'.PHP_EOL);
    }

    public function getInfoCellAttribute(?string $value): string
    {
        $res = '';
        $res .= 'Allow multiple: '.$this->allow_multiple_invite.'<br/>'.PHP_EOL;
        $res .= 'Duplicate count: '.$this->duplicate_count.'<br/>'.PHP_EOL;

        return $res.('Lang: '.$this->language.'<br/>'.PHP_EOL);
    }

    public function getModel(): Model
    {
        // return $this->model;
        return $this;
    }

    /**
     * @return BelongsTo ;
     */
    public function surveyPdf()
    {
        return $this->belongsTo(SurveyPdf::class);
    }

    public function answer(): BelongsTo
    {
        Assert::classExists($class = LimeSurvey::class.$this->survey_id);
        Assert::isAOf($class, Model::class);
        return $this->belongsTo($class, 'token', 'token');
    }

    public function participant(): BelongsTo
    {
        $class = 'Modules\Limesurvey\Models\LimeTokens'.$this->survey_id;
        if (! class_exists($class)) {
            app(GenerateModelByModelClass::class)
                ->setCustomReplaces(['DummyTable' => 'lime_tokens_'.$this->survey_id])
                ->execute($class);
        }
        Assert::classExists($class);
        Assert::isAOf($class, Model::class);
        return $this->belongsTo($class, 'token', 'token');
    }

    /**
     * Scope a query to only include users of a given type.
     *
     * @param Builder $query
     * @param int     $survey_id
     *
     * @return Builder
     */
    public function scopeHasAnswer($query, $survey_id) // : \Illuminate\Database\Query\Builder
    {
        $tokens = SurveyResponse::getResponsesForSurvey($survey_id)->get()->pluck('token')->all();
        return $query->whereIn('token', $tokens);
    }

    /*
    public function getThemesAttribute(): MorphMany{
        $surveyPdf = $this->surveyPdf;
        if (null == $surveyPdf) {
            throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }
        return $surveyPdf->notifyThemes();
    }
    */

    /**
     * @return MorphMany|null
     */
    public function getEmailData()
    {
        return $this->notifyThemes();
    }

    /**
     * Summary of notifyThemes.
     *
     * @return MorphMany|null
     */
    public function notifyThemes()
    {
        $surveyPdf = $this->surveyPdf;
        if ($surveyPdf === null) {  // belongsthrounghy fa fare test dev01
            // throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
            return null;
        }

        return $surveyPdf->notifyThemes()->where('lang', $this->language);
    }

    public function getSmsFromAttribute(): ?string
    {
        // *
        $surveyPdf = $this->surveyPdf;
        if ($surveyPdf === null) {
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        $themes = $surveyPdf->notifyThemes()
            ->where('type', 'sms')
            // ->where('lang', $this->lang)
            ->where('lang', $this->language);
        $theme = $themes->first();
        if ($theme === null) {
            // throw new \Exception('SQL:['.rowsToSql($themes).']['.__LINE__.']['.class_basename(__CLASS__).']');
            throw new Exception('the sms notification theme is null');
        }

        /*
        $theme = $this->notifyThemes
            ->where('type', 'sms')
            ->first();

        if (null == $theme) {
            throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }
        */

        return $theme->from;
    }

    public function getMailFromAttribute(): ?string
    {
        $surveyPdf = $this->surveyPdf;
        if ($surveyPdf === null) {
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        $themes = $surveyPdf->notifyThemes()
            ->where('type', 'mail')
            // ->where('lang', $this->lang)
            ->where('lang', $this->language);
        $theme = $themes->first();
        // dddx($theme);
        if ($theme === null) {
            // throw new \Exception('SQL:['.rowsToSql($themes).']['.__LINE__.']['.class_basename(__CLASS__).']');
            throw new Exception('the notification email theme is null');
        }

        return $theme->from;
    }

    public function getMailFromEmailAttribute(): ?string
    {
        $surveyPdf = $this->surveyPdf;
        if ($surveyPdf === null) {
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        $themes = $surveyPdf->notifyThemes()
            ->where('type', 'mail')
            // ->where('lang', $this->lang)
            ->where('lang', $this->language);
        $theme = $themes->first();
        // dddx($theme);
        if ($theme === null) {
            // throw new \Exception('SQL:['.rowsToSql($themes).']['.__LINE__.']['.class_basename(__CLASS__).']');
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        return $theme->from_email;
    }

    public function getMailSubjectAttribute(): ?string
    {
        $surveyPdf = $this->surveyPdf;
        if ($surveyPdf === null) {
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        $theme = $surveyPdf->notifyThemes()
            ->where('type', 'mail')
            // ->where('lang', $this->lang)
            ->where('lang', $this->language)
            ->first();

        if ($theme === null) {
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        return $theme->subject;
    }

    public function getSmsBodyAttribute(): string
    {
        $surveyPdf = $this->surveyPdf;
        if ($surveyPdf === null) {
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        $theme = $surveyPdf->notifyThemes()
            ->where('type', 'sms')
            // ->where('lang', $this->lang)
            ->where('lang', $this->language)
            ->first();
        if ($theme === null) {
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        $text = strip_tags((string) $theme->body);
        $replaces = [
            '{{survey_id}}' => $this->survey_id,
            '{{token}}' => $this->token,
            // '{{lang}}' => $this->lang,
            '{{lang}}' => $this->language,
            '&amp;' => '&',
            '##survey_id##' => $this->survey_id,
            '##token##' => $this->token,
            // '##lang##' => $this->lang,
            '##lang##' => $this->language,

            // '##logo##' => '<img src="'.\Request::getSchemeAndHttpHost().'/'.$this->logo_src.'" height="70px">',
            // '##logo##' => '<img src="'.$this->logo_src.'" height="70px">',
            '##logo##' => '<img src="'.asset((string) $this->logo_src).'"  style="height: 105px;">',
            // '##attribute_2##' => $this->attribute_2 ?? '',
            '##attribute_2##' => trans('quaeris::contact.attribute.2.'.$this->attribute_2) ?? '',
        ];
        $text = str_replace(array_keys($replaces), array_values($replaces), $text);

        if (Str::startsWith($text, '\r\n')) {
            $text = Str::after($text, '\r\n');
        }

        $text = str_replace([\chr(13), \chr(10), \chr(9)], '', $text);

        return trim($text);
    }

    public function getMailBodyAttribute(): string
    {
        $surveyPdf = $this->surveyPdf;
        if ($surveyPdf === null) {
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        $theme = $surveyPdf->notifyThemes()
            ->where('type', 'mail')
            // ->where('lang', $this->lang)
            ->where('lang', $this->language)
            ->first();
        if ($theme === null) {
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        if ($this->logo_src === null) {
            throw new Exception('logo_src is null');
        }

        // $text = strip_tags((string) $theme->body);
        // $img_src = Request::getSchemeAndHttpHost().'/'.$this->logo_src;
        /**
         * @var string
         */
        $text = $theme->body_html;
        if ($text === null) {
            throw new Exception('text is null');
        }

        if ($this->logo_src === null) {
            throw new Exception('logo_src is null');
        }

        $replaces = [
            '{{survey_id}}' => $this->survey_id,
            '{{token}}' => $this->token,
            // '{{lang}}' => $this->lang,
            '{{lang}}' => $this->language,
            '&amp;' => '&',
            '##survey_id##' => $this->survey_id,
            '##token##' => $this->token,
            // '##lang##' => $this->lang,
            '##lang##' => $this->language,
            // '##logo##' => '<img src="'.Request::getSchemeAndHttpHost().'/'.$this->logo_src.'" height="70px">',
            '##logo##' => '<img src="'.asset($this->logo_src).'"  style="height: 110px;">',
            // '##attribute_2##' => $this->getAttribute_2() ?? '',
            '##attribute_2##' => trans('quaeris::contact.attribute.2.'.$this->attribute_2) ?? '',
        ];

        /*
        if (Str::startsWith($text, '\r\n')) {
            $text = Str::after($text, '\r\n');
        }

        $text = str_replace([chr(13), chr(10), chr(9)], '', $text);
        $text = trim($text);
         */

        return str_replace(array_keys($replaces), array_values($replaces), $text);
    }

    /**
     * @return array<mixed>
     */
    public function getNotifyVia(): array
    {
        // se il server è lento manderà più notifiche

        // if(($this->sms_count + $this->mail_count) > 1){
        //     return ['database'];
        // }

        if ($this->email !== null) {
            return ['mail'];
        }

        if ($this->mobile_phone !== null) {
            return [NetfunChannel::class];
        }

        return ['database'];
    }

    public function getNotifyViaAttribute(?array $value): ?array
    {
        return $this->getNotifyVia();
    }

    /**
     * @return mixed|void
     */
    public function sendEmailCallback()
    {
        $participant = $this->participant;

        /*if (is_null($participant)) {
            throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }*/
        if ($participant !== null) {
            $participant->update(
                [
                    'sent' => now()->format('Y-m-d H:m'),
                ]
            );
        }

        $this->update(
            [
                'mail_sent_at' => now(),
                'mail_count' => (int) $this->mail_count + 1,
            ]
        );
    }

    /**
     * @return mixed|void
     */
    public function sendSmsCallback()
    {
        $this->update(
            [
                'sms_sent_at' => now(),
                'sms_count' => (int) $this->sms_count + 1,
            ]
        );
    }

    // public function scopeWithMail(Builder $query):Builder {

    public function scopeWithMail(Builder $builder): Builder
    {
        return $builder
            ->where('mail_count', null)
            ->where('sms_count', null)
            ->where(function ($q): void {
                $q
                    ->where('email', '!=', '')
                    ->orWhere('mobile_phone', '!=', '');
            });
    }

    public function scopeNoInvited(Builder $builder): Builder
    {
        if (! method_exists($builder, 'withMail')) {
            throw new Exception('function scope withMail no exists');
        }

        return $builder
            ->withMail()
            ->where('token', '!=', null)
            ->where('token', '!=', '');
    }

    public function scopeMissingToken(Builder $builder): Builder
    {
        if (! method_exists($builder, 'withMail')) {
            throw new Exception('function scope withMail no exists');
        }

        return $builder
            ->withMail()
            ->noToken();
    }

    public function scopeNoToken(Builder $builder): Builder
    {
        return $builder
            ->where(function ($q): void {
                $q
                    ->where('token', '')
                    ->orWhere('token', null);
            });
    }

    public function getNotificationData(string $name, array $view_params = []): NotificationData
    {
        $data = [];

        if ($this->email !== null) {
            $data['channels'] = ['mail'];
        }

        if ($this->email === null && $this->mobile_phone !== null) {
            $data['from'] = $this->sms_from;
            $data['to'] = $this->mobile_phone;
            $data['body'] = $this->sms_body;
            $data['channels'] = [NetfunChannel::class];
        }

        if ($this->email === null && $this->mobile_phone === null) {
            $data['channels'] = ['database'];
        }

        return NotificationData::from($data);
    }

    public function increase(string $what, array $data): void
    {
        $data[$what.'_sent_at'] = now();
        $k = $what.'_count';
        $data[$k] = (int) $this->{$k} + 1;
        $this->update($data);
    }
}
