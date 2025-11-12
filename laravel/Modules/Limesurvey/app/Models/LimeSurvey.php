<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurveyFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use stdClass;

/**
 * Modules\Limesurvey\Models\LimeSurvey
 *
 * @property-read array $attributedescriptions
 * @property-read string|null $title
 * @property-read \Illuminate\Database\Eloquent\Collection<int, LimeGroup> $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, LimeGroupL10n> $groups_l10n
 * @property-read int|null $groups_l10n_count
 * @property-read LimeSurveysLanguagesetting|null $lang
 * @property-read \Illuminate\Database\Eloquent\Collection<int, LimeQuestion> $questions
 * @property-read int|null $questions_count
 *
 * @method static CachedBuilder|LimeSurvey all($columns = [])
 * @method static CachedBuilder|LimeSurvey avg($column)
 * @method static CachedBuilder|LimeSurvey cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey disableModelCaching()
 * @method static CachedBuilder|LimeSurvey exists()
 * @method static LimeSurveyFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey insert(array $values)
 * @method static CachedBuilder|LimeSurvey isCachable()
 * @method static CachedBuilder|LimeSurvey max($column)
 * @method static CachedBuilder|LimeSurvey min($column)
 * @method static CachedBuilder|LimeSurvey newModelQuery()
 * @method static CachedBuilder|LimeSurvey newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey query()
 * @method static CachedBuilder|LimeSurvey sum($column)
 * @method static CachedBuilder|LimeSurvey truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $sid
 * @property int $owner_id
 * @property int|null $gsid
 * @property string|null $admin
 * @property string $active
 * @property Carbon|null $expires
 * @property Carbon|null $startdate
 * @property string|null $adminemail
 * @property string $anonymized
 * @property string|null $faxto
 * @property string|null $format
 * @property string $savetimings
 * @property string|null $template
 * @property string|null $language
 * @property string|null $additional_languages
 * @property string $datestamp
 * @property string $usecookie
 * @property string $allowregister
 * @property string $allowsave
 * @property int $autonumber_start
 * @property string $autoredirect
 * @property string $allowprev
 * @property string $printanswers
 * @property string $ipaddr
 * @property string $refurl
 * @property Carbon|null $datecreated
 * @property int|null $showsurveypolicynotice
 * @property string $publicstatistics
 * @property string $publicgraphs
 * @property string $listpublic
 * @property string $htmlemail
 * @property string $sendconfirmation
 * @property string $tokenanswerspersistence
 * @property string $assessments
 * @property string $usecaptcha
 * @property string $usetokens
 * @property string|null $bounce_email
 * @property string|null $emailresponseto
 * @property string|null $emailnotificationto
 * @property int $tokenlength
 * @property string|null $showxquestions
 * @property string|null $showgroupinfo
 * @property string|null $shownoanswer
 * @property string|null $showqnumcode
 * @property int|null $bouncetime
 * @property string|null $bounceprocessing
 * @property string|null $bounceaccounttype
 * @property string|null $bounceaccounthost
 * @property string|null $bounceaccountpass
 * @property string|null $bounceaccountencryption
 * @property string|null $bounceaccountuser
 * @property string|null $showwelcome
 * @property string|null $showprogress
 * @property int $questionindex
 * @property int $navigationdelay
 * @property string|null $nokeyboard
 * @property string|null $alloweditaftercompletion
 * @property string|null $googleanalyticsstyle
 * @property string|null $googleanalyticsapikey
 * @property array|null $tokenencryptionoptions
 * @property string $ipanonymize
 *
 * @method static CachedBuilder|LimeSurvey whereActive($value)
 * @method static CachedBuilder|LimeSurvey whereAdditionalLanguages($value)
 * @method static CachedBuilder|LimeSurvey whereAdmin($value)
 * @method static CachedBuilder|LimeSurvey whereAdminemail($value)
 * @method static CachedBuilder|LimeSurvey whereAlloweditaftercompletion($value)
 * @method static CachedBuilder|LimeSurvey whereAllowprev($value)
 * @method static CachedBuilder|LimeSurvey whereAllowregister($value)
 * @method static CachedBuilder|LimeSurvey whereAllowsave($value)
 * @method static CachedBuilder|LimeSurvey whereAnonymized($value)
 * @method static CachedBuilder|LimeSurvey whereAssessments($value)
 * @method static CachedBuilder|LimeSurvey whereAttributedescriptions($value)
 * @method static CachedBuilder|LimeSurvey whereAutonumberStart($value)
 * @method static CachedBuilder|LimeSurvey whereAutoredirect($value)
 * @method static CachedBuilder|LimeSurvey whereBounceEmail($value)
 * @method static CachedBuilder|LimeSurvey whereBounceaccountencryption($value)
 * @method static CachedBuilder|LimeSurvey whereBounceaccounthost($value)
 * @method static CachedBuilder|LimeSurvey whereBounceaccountpass($value)
 * @method static CachedBuilder|LimeSurvey whereBounceaccounttype($value)
 * @method static CachedBuilder|LimeSurvey whereBounceaccountuser($value)
 * @method static CachedBuilder|LimeSurvey whereBounceprocessing($value)
 * @method static CachedBuilder|LimeSurvey whereBouncetime($value)
 * @method static CachedBuilder|LimeSurvey whereDatecreated($value)
 * @method static CachedBuilder|LimeSurvey whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey whereEmailnotificationto($value)
 * @method static CachedBuilder|LimeSurvey whereEmailresponseto($value)
 * @method static CachedBuilder|LimeSurvey whereExpires($value)
 * @method static CachedBuilder|LimeSurvey whereFaxto($value)
 * @method static CachedBuilder|LimeSurvey whereFormat($value)
 * @method static CachedBuilder|LimeSurvey whereGoogleanalyticsapikey($value)
 * @method static CachedBuilder|LimeSurvey whereGoogleanalyticsstyle($value)
 * @method static CachedBuilder|LimeSurvey whereGsid($value)
 * @method static CachedBuilder|LimeSurvey whereHtmlemail($value)
 * @method static CachedBuilder|LimeSurvey whereIpaddr($value)
 * @method static CachedBuilder|LimeSurvey whereIpanonymize($value)
 * @method static CachedBuilder|LimeSurvey whereLanguage($value)
 * @method static CachedBuilder|LimeSurvey whereListpublic($value)
 * @method static CachedBuilder|LimeSurvey whereNavigationdelay($value)
 * @method static CachedBuilder|LimeSurvey whereNokeyboard($value)
 * @method static CachedBuilder|LimeSurvey whereOwnerId($value)
 * @method static CachedBuilder|LimeSurvey wherePrintanswers($value)
 * @method static CachedBuilder|LimeSurvey wherePublicgraphs($value)
 * @method static CachedBuilder|LimeSurvey wherePublicstatistics($value)
 * @method static CachedBuilder|LimeSurvey whereQuestionindex($value)
 * @method static CachedBuilder|LimeSurvey whereRefurl($value)
 * @method static CachedBuilder|LimeSurvey whereSavetimings($value)
 * @method static CachedBuilder|LimeSurvey whereSendconfirmation($value)
 * @method static CachedBuilder|LimeSurvey whereShowgroupinfo($value)
 * @method static CachedBuilder|LimeSurvey whereShownoanswer($value)
 * @method static CachedBuilder|LimeSurvey whereShowprogress($value)
 * @method static CachedBuilder|LimeSurvey whereShowqnumcode($value)
 * @method static CachedBuilder|LimeSurvey whereShowsurveypolicynotice($value)
 * @method static CachedBuilder|LimeSurvey whereShowwelcome($value)
 * @method static CachedBuilder|LimeSurvey whereShowxquestions($value)
 * @method static CachedBuilder|LimeSurvey whereSid($value)
 * @method static CachedBuilder|LimeSurvey whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey whereTemplate($value)
 * @method static CachedBuilder|LimeSurvey whereTokenanswerspersistence($value)
 * @method static CachedBuilder|LimeSurvey whereTokenencryptionoptions($value)
 * @method static CachedBuilder|LimeSurvey whereTokenlength($value)
 * @method static CachedBuilder|LimeSurvey whereUsecaptcha($value)
 * @method static CachedBuilder|LimeSurvey whereUsecookie($value)
 * @method static CachedBuilder|LimeSurvey whereUsetokens($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_surveys';

    /**  @var string   */
    protected $primaryKey = 'sid';

    /** @var array<int, string>  */
    protected $fillable = [
        'owner_id',
        'gsid',
        'admin',
        'active',
        'expires',
        'startdate',
        'adminemail',
        'anonymized',
        'faxto',
        'format',
        'savetimings',
        'template',
        'language',
        'additional_languages',
        'datestamp',
        'usecookie',
        'allowregister',
        'allowsave',
        'autonumber_start',
        'autoredirect',
        'allowprev',
        'printanswers',
        'ipaddr',
        'refurl',
        'datecreated',
        'showsurveypolicynotice',
        'publicstatistics',
        'publicgraphs',
        'listpublic',
        'htmlemail',
        'sendconfirmation',
        'tokenanswerspersistence',
        'assessments',
        'usecaptcha',
        'usetokens',
        'bounce_email',
        'attributedescriptions',
        'emailresponseto',
        'emailnotificationto',
        'tokenlength',
        'showxquestions',
        'showgroupinfo',
        'shownoanswer',
        'showqnumcode',
        'bouncetime',
        'bounceprocessing',
        'bounceaccounttype',
        'bounceaccounthost',
        'bounceaccountpass',
        'bounceaccountencryption',
        'bounceaccountuser',
        'showwelcome',
        'showprogress',
        'questionindex',
        'navigationdelay',
        'nokeyboard',
        'alloweditaftercompletion',
        'googleanalyticsstyle',
        'googleanalyticsapikey',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'sid' => 'int',
        'owner_id' => 'int',
        'gsid' => 'int',
        'admin' => 'string',
        'active' => 'string',
        'expires' => 'datetime',
        'startdate' => 'datetime',
        'adminemail' => 'string',
        'anonymized' => 'string',
        'faxto' => 'string',
        'format' => 'string',
        'savetimings' => 'string',
        'template' => 'string',
        'language' => 'string',
        'additional_languages' => 'string',
        'datestamp' => 'string',
        'usecookie' => 'string',
        'allowregister' => 'string',
        'allowsave' => 'string',
        'autonumber_start' => 'int',
        'autoredirect' => 'string',
        'allowprev' => 'string',
        'printanswers' => 'string',
        'ipaddr' => 'string',
        'refurl' => 'string',
        'datecreated' => 'datetime',
        'showsurveypolicynotice' => 'int',
        'publicstatistics' => 'string',
        'publicgraphs' => 'string',
        'listpublic' => 'string',
        'htmlemail' => 'string',
        'sendconfirmation' => 'string',
        'tokenanswerspersistence' => 'string',
        'assessments' => 'string',
        'usecaptcha' => 'string',
        'usetokens' => 'string',
        'bounce_email' => 'string',
        'attributedescriptions' => 'array',
        'emailresponseto' => 'string',
        'emailnotificationto' => 'string',
        'tokenlength' => 'int',
        'showxquestions' => 'string',
        'showgroupinfo' => 'string',
        'shownoanswer' => 'string',
        'showqnumcode' => 'string',
        'bouncetime' => 'int',
        'bounceprocessing' => 'string',
        'bounceaccounttype' => 'string',
        'bounceaccounthost' => 'string',
        'bounceaccountpass' => 'string',
        'bounceaccountencryption' => 'string',
        'bounceaccountuser' => 'string',
        'showwelcome' => 'string',
        'showprogress' => 'string',
        'questionindex' => 'int',
        'navigationdelay' => 'int',
        'nokeyboard' => 'string',
        'alloweditaftercompletion' => 'string',
        'googleanalyticsstyle' => 'string',
        'googleanalyticsapikey' => 'string',
        'tokenencryptionoptions' => 'array',
    ];

    // Scopes...
    // Relations ...
    /**
     * @return \Illuminate\Database\Eloquent\Collection|array<LimeQuestion>
     */
    public function questions(): HasMany
    {
        return $this->hasMany(LimeQuestion::class, 'sid', 'sid');
    }

    public function groups(): HasMany
    {
        if (env('LIMEVERSION') >= 5) {
            return $this->hasMany(LimeGroup::class, 'sid', 'sid')
                ->with('labels');
        }
        return $this->hasMany(LimeGroup::class, 'sid', 'sid');
        // ->with('labels')
    }

    public function groups_l10n(): HasManyThrough
    {
        return $this->hasManyThrough(LimeGroupL10n::class, LimeGroup::class, 'sid', 'gid');
    }

    public function lang(): HasOne
    {
        return $this->hasOne(LimeSurveysLanguagesetting::class, 'surveyls_survey_id', 'sid');
    }

    // --- mutators ---
    public function getTitleAttribute(?string $value): ?string
    {
        return optional($this->lang)->surveyls_title;
    }

    /**
     * Undocumented function.
     *
     * @param  string|array|null  $value
     */
    public function getAttributedescriptionsAttribute($value): array
    {
        if ($value === null) {
            return [];
        }

        if (is_array($value)) {
            return $value;
        }

        if (isJson($value)) {
            return json_decode($value, true, 512, JSON_THROW_ON_ERROR);
        }

        dddx($value);
    }

    public function getTrans(): array
    {
        $attribute = $this->attributedescriptions;
        $trans = [];
        foreach ($attribute as $k => $v) {
            if (! isset($v['description'])) {
                continue;
            }
            if ($v['description'] === '') {
                continue;
            }
            $trans[$k] = $v['description'] ?? '';
        }

        return $trans;
    }

    // Functions ...
    public function answers(): Collection
    {
        // dddx($this->sid);
        $model_class = \Modules\LimeSurvey\Models\LimeSurvey::class.$this->sid;
        $model = app($model_class);
        // $fillable=$model->getFillable();
        // dddx($fillable);
        /*
        $trans=collect($fillable)->filter(function($item,$k){
            $piece=explode('X',$item);
            return $piece[0]==$this->sid;
        });

        dddx($trans);
        */
        $rows = $model->where('submitdate', '!=', null)->get();
        $rows = collect($rows->toArray());
        // dddx($this->questions);
        $questions = $this->questions->pluck('title', 'qid')->all();
        $first_row = $rows->first();
        $head = collect($first_row)->map(function ($item, $key) use ($questions) {
            $piece = explode('X', $key);
            if ($piece[0] === $this->sid) {
                $qid[0] = $piece[2];
                $qid[1] = '';
                if (Str::contains($piece[2], 'oth')) {
                    $qid[0] = Str::before($piece[2], 'oth');
                    $qid[1] = 'oth'.Str::after($piece[2], 'oth');
                }

                if (Str::contains($piece[2], 'SQ0')) {
                    $qid[0] = Str::before($piece[2], 'SQ0');
                    $qid[1] = 'SQ0'.Str::after($piece[2], 'SQ0');
                }

                $key = $questions[$qid[0]];

                if ($qid[1] !== '') {
                    $key .= '['.$qid[1].']';
                }
            }

            return $key;
        })->values()
            ->all();

        // dddx($head);

        /*
        $rows=$rows->map(function($item) use($questions){
            $item=collect($item)->mapWithKeys(function($field,$key) use($questions){
                $piece=explode('X',$key);
                if($piece[0]==$this->sid){
                    $qid[0]=$piece[2];
                    $qid[1]='';
                    if(Str::contains($piece[2],'oth')){
                        $qid[0]=Str::before($piece[2],'oth');
                        $qid[1]='oth'.Str::after($piece[2],'oth');
                    }
                    if(Str::contains($piece[2],'SQ0')){
                        $qid[0]=Str::before($piece[2],'SQ0');
                        $qid[1]='SQ0'.Str::after($piece[2],'SQ0');
                    }

                    $key=$questions[$qid[0]];

                    if($qid[1]!=''){
                        $key.='['.$qid[1].']';
                    }

                }

                return [$key=>$field];
            });
            return $item;
        });
        */

        $rows = $rows->map(static fn ($item): stdClass => (object) array_combine($head, $item));

        // dddx($rows->first()->{'Q11'});

        return $rows;
    }
}
