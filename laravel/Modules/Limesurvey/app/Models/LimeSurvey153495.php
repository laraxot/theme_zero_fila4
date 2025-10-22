<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey153495Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey153495
 *
 * @method static CachedBuilder|LimeSurvey153495 all($columns = [])
 * @method static CachedBuilder|LimeSurvey153495 avg($column)
 * @method static CachedBuilder|LimeSurvey153495 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey153495 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey153495 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey153495 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey153495 exists()
 * @method static LimeSurvey153495Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey153495 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey153495 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey153495 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey153495 insert(array $values)
 * @method static CachedBuilder|LimeSurvey153495 isCachable()
 * @method static CachedBuilder|LimeSurvey153495 max($column)
 * @method static CachedBuilder|LimeSurvey153495 min($column)
 * @method static CachedBuilder|LimeSurvey153495 newModelQuery()
 * @method static CachedBuilder|LimeSurvey153495 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey153495 query()
 * @method static CachedBuilder|LimeSurvey153495 sum($column)
 * @method static CachedBuilder|LimeSurvey153495 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string|null $token
 * @property Carbon|null $submitdate
 * @property int|null $lastpage
 * @property string $startlanguage
 * @property string|null $seed
 * @property string|null $153495X878X31352
 * @property string|null $153495X878X31176
 * @property string|null $153495X878X31177
 * @property string|null $153495X868X310691_SQ001
 * @property string|null $153495X868X310691_SQ002
 * @property string|null $153495X868X310692_SQ001
 * @property string|null $153495X868X310692_SQ002
 * @property string|null $153495X868X310693_SQ001
 * @property string|null $153495X868X310693_SQ002
 * @property string|null $153495X868X310694_SQ001
 * @property string|null $153495X868X310694_SQ002
 * @property string|null $153495X868X310695_SQ001
 * @property string|null $153495X868X310695_SQ002
 * @property string|null $153495X868X310696_SQ001
 * @property string|null $153495X868X310696_SQ002
 * @property string|null $153495X868X310697_SQ001
 * @property string|null $153495X868X310697_SQ002
 * @property string|null $153495X868X310698_SQ001
 * @property string|null $153495X868X310698_SQ002
 * @property string|null $153495X868X310699_SQ001
 * @property string|null $153495X868X310699_SQ002
 * @property string|null $153495X868X3106910_SQ001
 * @property string|null $153495X868X3106910_SQ002
 * @property string|null $153495X868X313381_SQ001
 * @property string|null $153495X868X313381_SQ002
 * @property string|null $153495X869X31093
 * @property string|null $153495X870X31094
 * @property string|null $153495X870X3109513_SQ001
 * @property string|null $153495X870X3109513_SQ002
 * @property string|null $153495X870X31108
 * @property string|null $153495X870X3110913_SQ001
 * @property string|null $153495X870X3110913_SQ002
 * @property string|null $153495X871X31113
 * @property string|null $153495X871X311141
 * @property string|null $153495X871X311142
 * @property string|null $153495X871X311143
 * @property string|null $153495X871X311144
 * @property string|null $153495X871X311145
 * @property string|null $153495X871X311146
 * @property string|null $153495X871X31114other
 * @property string|null $153495X871X3112318_SQ001
 * @property string|null $153495X871X3112318_SQ002
 * @property string|null $153495X871X3112319_SQ001
 * @property string|null $153495X871X3112319_SQ002
 * @property string|null $153495X871X3112320_SQ001
 * @property string|null $153495X871X3112320_SQ002
 * @property string|null $153495X871X3112321_SQ001
 * @property string|null $153495X871X3112321_SQ002
 * @property string|null $153495X871X3112322_SQ001
 * @property string|null $153495X871X3112322_SQ002
 * @property string|null $153495X872X31142
 * @property string|null $153495X872X311431
 * @property string|null $153495X872X311432
 * @property string|null $153495X872X311433
 * @property string|null $153495X872X31143other
 * @property string|null $153495X872X3115313_SQ001
 * @property string|null $153495X872X3115313_SQ002
 * @property string|null $153495X873X31157
 * @property string|null $153495X873X3115813_SQ001
 * @property string|null $153495X873X3115813_SQ002
 * @property string|null $153495X874X31162
 * @property string|null $153495X875X31163SQ001
 * @property string|null $153495X875X31163SQ002
 * @property string|null $153495X875X31163SQ003
 * @property string|null $153495X875X31163SQ004
 * @property string|null $153495X875X31163SQ005
 * @property string|null $153495X875X31163SQ006
 * @property string|null $153495X875X31163SQ007
 * @property string|null $153495X875X31163SQ008
 * @property string|null $153495X875X31163other
 * @property string|null $153495X876X31173
 * @property string|null $153495X877X31174
 * @property string|null $153495X877X31175
 * @property string|null $153495X877X31353
 *
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X3106910SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X3106910SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X310691SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X310691SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X310692SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X310692SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X310693SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X310693SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X310694SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X310694SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X310695SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X310695SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X310696SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X310696SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X310697SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X310697SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X310698SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X310698SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X310699SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X310699SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X313381SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X868X313381SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X869X31093($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X870X31094($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X870X3109513SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X870X3109513SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X870X31108($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X870X3110913SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X870X3110913SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X871X31113($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X871X311141($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X871X311142($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X871X311143($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X871X311144($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X871X311145($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X871X311146($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X871X31114other($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X871X3112318SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X871X3112318SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X871X3112319SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X871X3112319SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X871X3112320SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X871X3112320SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X871X3112321SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X871X3112321SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X871X3112322SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X871X3112322SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X872X31142($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X872X311431($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X872X311432($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X872X311433($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X872X31143other($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X872X3115313SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X872X3115313SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X873X31157($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X873X3115813SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X873X3115813SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X874X31162($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X875X31163SQ001($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X875X31163SQ002($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X875X31163SQ003($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X875X31163SQ004($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X875X31163SQ005($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X875X31163SQ006($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X875X31163SQ007($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X875X31163SQ008($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X875X31163other($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X876X31173($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X877X31174($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X877X31175($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X877X31353($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X878X31176($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X878X31177($value)
 * @method static CachedBuilder|LimeSurvey153495 where153495X878X31352($value)
 * @method static CachedBuilder|LimeSurvey153495 whereId($value)
 * @method static CachedBuilder|LimeSurvey153495 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey153495 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey153495 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey153495 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey153495 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey153495 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_153495';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', '153495X878X31352', '153495X878X31176', '153495X878X31177', '153495X868X310691_SQ001', '153495X868X310691_SQ002', '153495X868X310692_SQ001', '153495X868X310692_SQ002', '153495X868X310693_SQ001', '153495X868X310693_SQ002', '153495X868X310694_SQ001', '153495X868X310694_SQ002', '153495X868X310695_SQ001', '153495X868X310695_SQ002', '153495X868X310696_SQ001', '153495X868X310696_SQ002', '153495X868X310697_SQ001', '153495X868X310697_SQ002', '153495X868X310698_SQ001', '153495X868X310698_SQ002', '153495X868X310699_SQ001', '153495X868X310699_SQ002', '153495X868X3106910_SQ001', '153495X868X3106910_SQ002', '153495X868X313381_SQ001', '153495X868X313381_SQ002', '153495X869X31093', '153495X870X31094', '153495X870X3109513_SQ001', '153495X870X3109513_SQ002', '153495X870X31108', '153495X870X3110913_SQ001', '153495X870X3110913_SQ002', '153495X871X31113', '153495X871X311141', '153495X871X311142', '153495X871X311143', '153495X871X311144', '153495X871X311145', '153495X871X311146', '153495X871X31114other', '153495X871X3112318_SQ001', '153495X871X3112318_SQ002', '153495X871X3112319_SQ001', '153495X871X3112319_SQ002', '153495X871X3112320_SQ001', '153495X871X3112320_SQ002', '153495X871X3112321_SQ001', '153495X871X3112321_SQ002', '153495X871X3112322_SQ001', '153495X871X3112322_SQ002', '153495X872X31142', '153495X872X311431', '153495X872X311432', '153495X872X311433', '153495X872X31143other', '153495X872X3115313_SQ001', '153495X872X3115313_SQ002', '153495X873X31157', '153495X873X3115813_SQ001', '153495X873X3115813_SQ002', '153495X874X31162', '153495X875X31163SQ001', '153495X875X31163SQ002', '153495X875X31163SQ003', '153495X875X31163SQ004', '153495X875X31163SQ005', '153495X875X31163SQ006', '153495X875X31163SQ007', '153495X875X31163SQ008', '153495X875X31163other', '153495X876X31173', '153495X877X31174', '153495X877X31175', '153495X877X31353',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', '153495X878X31352' => 'string', '153495X878X31176' => 'string', '153495X878X31177' => 'string', '153495X868X310691_SQ001' => 'string', '153495X868X310691_SQ002' => 'string', '153495X868X310692_SQ001' => 'string', '153495X868X310692_SQ002' => 'string', '153495X868X310693_SQ001' => 'string', '153495X868X310693_SQ002' => 'string', '153495X868X310694_SQ001' => 'string', '153495X868X310694_SQ002' => 'string', '153495X868X310695_SQ001' => 'string', '153495X868X310695_SQ002' => 'string', '153495X868X310696_SQ001' => 'string', '153495X868X310696_SQ002' => 'string', '153495X868X310697_SQ001' => 'string', '153495X868X310697_SQ002' => 'string', '153495X868X310698_SQ001' => 'string', '153495X868X310698_SQ002' => 'string', '153495X868X310699_SQ001' => 'string', '153495X868X310699_SQ002' => 'string', '153495X868X3106910_SQ001' => 'string', '153495X868X3106910_SQ002' => 'string', '153495X868X313381_SQ001' => 'string', '153495X868X313381_SQ002' => 'string', '153495X869X31093' => 'string', '153495X870X31094' => 'string', '153495X870X3109513_SQ001' => 'string', '153495X870X3109513_SQ002' => 'string', '153495X870X31108' => 'string', '153495X870X3110913_SQ001' => 'string', '153495X870X3110913_SQ002' => 'string', '153495X871X31113' => 'string', '153495X871X311141' => 'string', '153495X871X311142' => 'string', '153495X871X311143' => 'string', '153495X871X311144' => 'string', '153495X871X311145' => 'string', '153495X871X311146' => 'string', '153495X871X31114other' => 'string', '153495X871X3112318_SQ001' => 'string', '153495X871X3112318_SQ002' => 'string', '153495X871X3112319_SQ001' => 'string', '153495X871X3112319_SQ002' => 'string', '153495X871X3112320_SQ001' => 'string', '153495X871X3112320_SQ002' => 'string', '153495X871X3112321_SQ001' => 'string', '153495X871X3112321_SQ002' => 'string', '153495X871X3112322_SQ001' => 'string', '153495X871X3112322_SQ002' => 'string', '153495X872X31142' => 'string', '153495X872X311431' => 'string', '153495X872X311432' => 'string', '153495X872X311433' => 'string', '153495X872X31143other' => 'string', '153495X872X3115313_SQ001' => 'string', '153495X872X3115313_SQ002' => 'string', '153495X873X31157' => 'string', '153495X873X3115813_SQ001' => 'string', '153495X873X3115813_SQ002' => 'string', '153495X874X31162' => 'string', '153495X875X31163SQ001' => 'string', '153495X875X31163SQ002' => 'string', '153495X875X31163SQ003' => 'string', '153495X875X31163SQ004' => 'string', '153495X875X31163SQ005' => 'string', '153495X875X31163SQ006' => 'string', '153495X875X31163SQ007' => 'string', '153495X875X31163SQ008' => 'string', '153495X875X31163other' => 'string', '153495X876X31173' => 'string', '153495X877X31174' => 'string', '153495X877X31175' => 'string', '153495X877X31353' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
