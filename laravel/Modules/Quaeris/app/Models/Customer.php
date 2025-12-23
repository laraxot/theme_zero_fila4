<?php

declare(strict_types=1);

namespace Modules\Quaeris\Models;

use Modules\Quaeris\Database\Factories\CustomerFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Modules\User\Models\BaseTenant;
use Modules\User\Models\Team;
use Modules\User\Models\TeamInvitation;
use Modules\User\Models\User;

/**
 * Model Customer.
 *
 * @property int                                                $id
 * @property string|null                                        $email
 * @property string|null                                        $slug
 * @property string|null                                        $mobile_phone
 * @property Carbon|null                                        $created_at
 * @property Carbon|null                                        $updated_at
 * @property string|null                                        $created_by
 * @property string|null                                        $updated_by
 * @property string|null                                        $name
 * @property int                                                $team_id
 * @property Collection<int, User>                              $members
 * @property int|null                                           $members_count
 * @property User|null                                          $owner
 * @property Collection<int, SurveyPdf> $surveyPdfs
 * @property int|null                                           $survey_pdfs_count
 * @property Team|null                                          $team
 * @property Collection<int, TeamInvitation>                    $teamInvitations
 * @property int|null                                           $team_invitations_count
 * @property Collection<int, User>                              $users
 * @property int|null                                           $users_count
 *
 * @method static CustomerFactory factory($count = null, $state = [])
 * @method static Builder|Customer                                    newModelQuery()
 * @method static Builder|Customer                                    newQuery()
 * @method static Builder|Customer                                    query()
 * @method static Builder|Customer                                    whereCreatedAt($value)
 * @method static Builder|Customer                                    whereCreatedBy($value)
 * @method static Builder|Customer                                    whereEmail($value)
 * @method static Builder|Customer                                    whereId($value)
 * @method static Builder|Customer                                    whereMobilePhone($value)
 * @method static Builder|Customer                                    whereName($value)
 * @method static Builder|Customer                                    whereTeamId($value)
 * @method static Builder|Customer                                    whereUpdatedAt($value)
 * @method static Builder|Customer                                    whereUpdatedBy($value)
 *
 * @property string $user_id
 *
 * @method static Builder|Customer whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Customer extends BaseTenant
{
    /** @var string */
    protected $connection = 'quaeris';

    /** @var list<string> */
    protected $fillable = [
        'id',
        'email',
        'mobile_phone',
        'name',
        'slug',
    ];

    /** @var list<string> */
    protected $with = [
    ];


    public function surveyPdfs(): HasMany
    {
        return $this->hasMany(SurveyPdf::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * @return Collection<int, SurveyPdf>
     */
    public function surveyPdfsActive()
    {
        return $this->surveyPdfs->filter(static fn ($item): bool => $item->info?->active !== 'N');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',

            'created_by' => 'string',
            'updated_by' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
