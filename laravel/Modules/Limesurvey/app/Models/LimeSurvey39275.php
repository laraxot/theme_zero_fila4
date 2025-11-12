<?php
declare(strict_types=1);
namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey39275Factory;

class LimeSurvey39275 extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    protected $table = 'lime_survey_39275';

    protected static function newFactory(): LimeSurvey39275Factory
    {
        //return LimeSurvey39275Factory::new();
    }
}
