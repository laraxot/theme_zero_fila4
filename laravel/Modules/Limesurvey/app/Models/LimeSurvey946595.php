<?php
declare(strict_types=1);
namespace Modules\Limesurvey\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;
use Modules\Limesurvey\Database\Factories\LimeSurvey946595Factory;

class LimeSurvey946595 extends BaseModel implements LimeSurveyXXXContract
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    /**  @var string   */
    protected $table = 'lime_survey_946595';

    /**  @var string   */
    protected $primaryKey = 'id';

    protected static function newFactory(): LimeSurvey946595Factory
    {
        //return LimeSurvey946595Factory::new();
    }
}
