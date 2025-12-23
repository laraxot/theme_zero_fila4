<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey254378Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey254378
 *
 * @method static CachedBuilder|LimeSurvey254378 all($columns = [])
 * @method static CachedBuilder|LimeSurvey254378 avg($column)
 * @method static CachedBuilder|LimeSurvey254378 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey254378 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey254378 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey254378 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey254378 exists()
 * @method static LimeSurvey254378Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey254378 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey254378 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey254378 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey254378 insert(array $values)
 * @method static CachedBuilder|LimeSurvey254378 isCachable()
 * @method static CachedBuilder|LimeSurvey254378 max($column)
 * @method static CachedBuilder|LimeSurvey254378 min($column)
 * @method static CachedBuilder|LimeSurvey254378 newModelQuery()
 * @method static CachedBuilder|LimeSurvey254378 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey254378 query()
 * @method static CachedBuilder|LimeSurvey254378 sum($column)
 * @method static CachedBuilder|LimeSurvey254378 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string|null $token
 * @property Carbon|null $submitdate
 * @property int|null $lastpage
 * @property string $startlanguage
 * @property string|null $seed
 * @property string|null $254378X899X31376
 * @property string|null $254378X899X31373
 * @property string|null $254378X899X31374
 * @property string|null $254378X889X313541_SQ001
 * @property string|null $254378X889X313541_SQ002
 * @property string|null $254378X889X313542_SQ001
 * @property string|null $254378X889X313542_SQ002
 * @property string|null $254378X889X313543_SQ001
 * @property string|null $254378X889X313543_SQ002
 * @property string|null $254378X889X313544_SQ001
 * @property string|null $254378X889X313544_SQ002
 * @property string|null $254378X889X313545_SQ001
 * @property string|null $254378X889X313545_SQ002
 * @property string|null $254378X889X313546_SQ001
 * @property string|null $254378X889X313546_SQ002
 * @property string|null $254378X889X313547_SQ001
 * @property string|null $254378X889X313547_SQ002
 * @property string|null $254378X890X31355
 * @property string|null $254378X892X31360
 * @property string|null $254378X892X313611
 * @property string|null $254378X892X313612
 * @property string|null $254378X892X313613
 * @property string|null $254378X892X313614
 * @property string|null $254378X892X313615
 * @property string|null $254378X892X313616
 * @property string|null $254378X892X31361other
 * @property string|null $254378X892X3136211_SQ001
 * @property string|null $254378X892X3136211_SQ002
 * @property string|null $254378X892X3136212_SQ001
 * @property string|null $254378X892X3136212_SQ002
 * @property string|null $254378X892X3136213_SQ001
 * @property string|null $254378X892X3136213_SQ002
 * @property string|null $254378X892X3136214_SQ001
 * @property string|null $254378X892X3136214_SQ002
 * @property string|null $254378X892X3136215_SQ001
 * @property string|null $254378X892X3136215_SQ002
 * @property string|null $254378X893X31363
 * @property string|null $254378X893X313641
 * @property string|null $254378X893X313642
 * @property string|null $254378X893X313643
 * @property string|null $254378X893X31364other
 * @property string|null $254378X893X3136513_SQ001
 * @property string|null $254378X893X3136513_SQ002
 * @property string|null $254378X893X3144113_SQ001
 * @property string|null $254378X893X3144113_SQ002
 * @property string|null $254378X894X31366
 * @property string|null $254378X894X3136713_SQ001
 * @property string|null $254378X894X3136713_SQ002
 * @property string|null $254378X896X31369SQ001
 * @property string|null $254378X896X31369SQ002
 * @property string|null $254378X896X31369SQ003
 * @property string|null $254378X896X31369SQ004
 * @property string|null $254378X896X31369SQ005
 * @property string|null $254378X896X31369SQ006
 * @property string|null $254378X896X31369SQ007
 * @property string|null $254378X896X31369SQ008
 * @property string|null $254378X896X31369other
 * @property string|null $254378X898X31371
 * @property string|null $254378X898X31372
 * @property string|null $254378X898X31377
 *
 * @method static CachedBuilder|LimeSurvey254378 where254378X889X313541SQ001($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X889X313541SQ002($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X889X313542SQ001($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X889X313542SQ002($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X889X313543SQ001($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X889X313543SQ002($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X889X313544SQ001($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X889X313544SQ002($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X889X313545SQ001($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X889X313545SQ002($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X889X313546SQ001($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X889X313546SQ002($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X889X313547SQ001($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X889X313547SQ002($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X890X31355($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X892X31360($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X892X313611($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X892X313612($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X892X313613($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X892X313614($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X892X313615($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X892X313616($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X892X31361other($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X892X3136211SQ001($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X892X3136211SQ002($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X892X3136212SQ001($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X892X3136212SQ002($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X892X3136213SQ001($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X892X3136213SQ002($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X892X3136214SQ001($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X892X3136214SQ002($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X892X3136215SQ001($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X892X3136215SQ002($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X893X31363($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X893X313641($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X893X313642($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X893X313643($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X893X31364other($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X893X3136513SQ001($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X893X3136513SQ002($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X893X3144113SQ001($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X893X3144113SQ002($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X894X31366($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X894X3136713SQ001($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X894X3136713SQ002($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X896X31369SQ001($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X896X31369SQ002($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X896X31369SQ003($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X896X31369SQ004($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X896X31369SQ005($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X896X31369SQ006($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X896X31369SQ007($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X896X31369SQ008($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X896X31369other($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X898X31371($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X898X31372($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X898X31377($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X899X31373($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X899X31374($value)
 * @method static CachedBuilder|LimeSurvey254378 where254378X899X31376($value)
 * @method static CachedBuilder|LimeSurvey254378 whereId($value)
 * @method static CachedBuilder|LimeSurvey254378 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey254378 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey254378 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey254378 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey254378 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey254378 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_254378';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', '254378X899X31376', '254378X899X31373', '254378X899X31374', '254378X889X313541_SQ001', '254378X889X313541_SQ002', '254378X889X313542_SQ001', '254378X889X313542_SQ002', '254378X889X313543_SQ001', '254378X889X313543_SQ002', '254378X889X313544_SQ001', '254378X889X313544_SQ002', '254378X889X313545_SQ001', '254378X889X313545_SQ002', '254378X889X313546_SQ001', '254378X889X313546_SQ002', '254378X889X313547_SQ001', '254378X889X313547_SQ002', '254378X890X31355', '254378X892X31360', '254378X892X313611', '254378X892X313612', '254378X892X313613', '254378X892X313614', '254378X892X313615', '254378X892X313616', '254378X892X31361other', '254378X892X3136211_SQ001', '254378X892X3136211_SQ002', '254378X892X3136212_SQ001', '254378X892X3136212_SQ002', '254378X892X3136213_SQ001', '254378X892X3136213_SQ002', '254378X892X3136214_SQ001', '254378X892X3136214_SQ002', '254378X892X3136215_SQ001', '254378X892X3136215_SQ002', '254378X893X31363', '254378X893X313641', '254378X893X313642', '254378X893X313643', '254378X893X31364other', '254378X893X3136513_SQ001', '254378X893X3136513_SQ002', '254378X893X3144113_SQ001', '254378X893X3144113_SQ002', '254378X894X31366', '254378X894X3136713_SQ001', '254378X894X3136713_SQ002', '254378X896X31369SQ001', '254378X896X31369SQ002', '254378X896X31369SQ003', '254378X896X31369SQ004', '254378X896X31369SQ005', '254378X896X31369SQ006', '254378X896X31369SQ007', '254378X896X31369SQ008', '254378X896X31369other', '254378X898X31371', '254378X898X31372', '254378X898X31377',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', '254378X899X31376' => 'string', '254378X899X31373' => 'string', '254378X899X31374' => 'string', '254378X889X313541_SQ001' => 'string', '254378X889X313541_SQ002' => 'string', '254378X889X313542_SQ001' => 'string', '254378X889X313542_SQ002' => 'string', '254378X889X313543_SQ001' => 'string', '254378X889X313543_SQ002' => 'string', '254378X889X313544_SQ001' => 'string', '254378X889X313544_SQ002' => 'string', '254378X889X313545_SQ001' => 'string', '254378X889X313545_SQ002' => 'string', '254378X889X313546_SQ001' => 'string', '254378X889X313546_SQ002' => 'string', '254378X889X313547_SQ001' => 'string', '254378X889X313547_SQ002' => 'string', '254378X890X31355' => 'string', '254378X892X31360' => 'string', '254378X892X313611' => 'string', '254378X892X313612' => 'string', '254378X892X313613' => 'string', '254378X892X313614' => 'string', '254378X892X313615' => 'string', '254378X892X313616' => 'string', '254378X892X31361other' => 'string', '254378X892X3136211_SQ001' => 'string', '254378X892X3136211_SQ002' => 'string', '254378X892X3136212_SQ001' => 'string', '254378X892X3136212_SQ002' => 'string', '254378X892X3136213_SQ001' => 'string', '254378X892X3136213_SQ002' => 'string', '254378X892X3136214_SQ001' => 'string', '254378X892X3136214_SQ002' => 'string', '254378X892X3136215_SQ001' => 'string', '254378X892X3136215_SQ002' => 'string', '254378X893X31363' => 'string', '254378X893X313641' => 'string', '254378X893X313642' => 'string', '254378X893X313643' => 'string', '254378X893X31364other' => 'string', '254378X893X3136513_SQ001' => 'string', '254378X893X3136513_SQ002' => 'string', '254378X893X3144113_SQ001' => 'string', '254378X893X3144113_SQ002' => 'string', '254378X894X31366' => 'string', '254378X894X3136713_SQ001' => 'string', '254378X894X3136713_SQ002' => 'string', '254378X896X31369SQ001' => 'string', '254378X896X31369SQ002' => 'string', '254378X896X31369SQ003' => 'string', '254378X896X31369SQ004' => 'string', '254378X896X31369SQ005' => 'string', '254378X896X31369SQ006' => 'string', '254378X896X31369SQ007' => 'string', '254378X896X31369SQ008' => 'string', '254378X896X31369other' => 'string', '254378X898X31371' => 'string', '254378X898X31372' => 'string', '254378X898X31377' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
