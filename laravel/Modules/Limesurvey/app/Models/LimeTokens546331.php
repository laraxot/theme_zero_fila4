<?php
declare(strict_types=1);
namespace Modules\Limesurvey\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Limesurvey\Database\Factories\LimeTokens546331Factory;

class LimeTokens546331 extends BaseModel
{
    use HasFactory;

    /** @var bool */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        0 => 'tid',
        1 => 'participant_id',
        2 => 'firstname',
        3 => 'lastname',
        4 => 'email',
        5 => 'emailstatus',
        6 => 'token',
        7 => 'language',
        8 => 'blacklisted',
        9 => 'sent',
        10 => 'remindersent',
        11 => 'remindercount',
        12 => 'completed',
        13 => 'usesleft',
        14 => 'validfrom',
        15 => 'validuntil',
        16 => 'mpid',
    ];

    /**  @var string   */
    protected $primaryKey = 'tid';

    /**  @var string   */
    protected $table = 'lime_tokens_546331';

    protected static function newFactory(): LimeTokens546331Factory
    {
        //return LimeTokens946595Factory::new();
    }
}
