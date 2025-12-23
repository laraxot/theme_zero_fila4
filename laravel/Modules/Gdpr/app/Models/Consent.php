<?php

declare(strict_types=1);

namespace Modules\Gdpr\Models;

use Illuminate\Support\Carbon;
use Modules\Gdpr\Database\Factories\ConsentFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Xot\Contracts\ProfileContract;

/**
 * Modules\Gdpr\Models\Consent.
 *
 * @property string $id
 * @property string $treatment_id
 * @property string $subject_id
 * @property string $id
 * @property string $treatment_id
 * @property string $subject_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null                     $updated_by
 * @property string|null                     $created_by
 * @property Carbon|null $deleted_at
 * @property string|null                     $deleted_by
 * @property Treatment|null                  $treatment
 * @method static ConsentFactory factory($count = null, $state = [])
 * @method static Builder|Consent newModelQuery()
 * @method static Builder|Consent newQuery()
 * @method static Builder|Consent query()
 * @method static Builder|Consent whereCreatedAt($value)
 * @method static Builder|Consent whereCreatedBy($value)
 * @method static Builder|Consent whereDeletedAt($value)
 * @method static Builder|Consent whereDeletedBy($value)
 * @method static Builder|Consent whereId($value)
 * @method static Builder|Consent whereSubjectId($value)
 * @method static Builder|Consent whereTreatmentId($value)
 * @method static Builder|Consent whereUpdatedAt($value)
 * @method static Builder|Consent whereUpdatedBy($value)
 * @property Treatment|null $treatment
 * @method static ConsentFactory factory($count = null, $state = [])
 * @method static Builder|Consent newModelQuery()
 * @method static Builder|Consent newQuery()
 * @method static Builder|Consent query()
 * @method static Builder|Consent whereCreatedAt($value)
 * @method static Builder|Consent whereId($value)
 * @method static Builder|Consent whereSubjectId($value)
 * @method static Builder|Consent whereTreatmentId($value)
 * @method static Builder|Consent whereUpdatedAt($value)
 * @method static Builder|Consent newModelQuery()
 * @method static Builder|Consent newQuery()
 * @method static Builder|Consent query()
 * @method static Builder|Consent whereCreatedAt($value)
 * @method static Builder|Consent whereCreatedBy($value)
 * @method static Builder|Consent whereDeletedAt($value)
 * @method static Builder|Consent whereDeletedBy($value)
 * @method static Builder|Consent whereId($value)
 * @method static Builder|Consent whereSubjectId($value)
 * @method static Builder|Consent whereTreatmentId($value)
 * @method static Builder|Consent whereUpdatedAt($value)
 * @method static Builder|Consent whereUpdatedBy($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property string $user_type
 * @property int $user_id
 * @property string|null $type
 * @property string|null $accepted_at
 * @method static Builder<static>|Consent whereAcceptedAt($value)
 * @method static Builder<static>|Consent whereType($value)
 * @method static Builder<static>|Consent whereUserId($value)
 * @method static Builder<static>|Consent whereUserType($value)
 * @mixin IdeHelperConsent
 * @mixin \Eloquent
 */
class Consent extends BaseModel
{
    use HasUuids;

    // protected $table = 'consent';

    public $incrementing = false;

    public $fillable = ['subject_id', 'treatment_id'];

    public function treatment(): BelongsTo
    {
        return $this->belongsTo(Treatment::class);
    }
}
