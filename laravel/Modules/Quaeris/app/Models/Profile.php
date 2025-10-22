<?php

declare(strict_types=1);

namespace Modules\Quaeris\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\SchemalessAttributes\SchemalessAttributes;
use Modules\User\Models\DeviceUser;
use Modules\User\Models\Device;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\DatabaseNotification;
use Modules\Quaeris\Database\Factories\ProfileFactory;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use Modules\User\Models\BaseProfile;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\User;

/**
 * Modules\Quaeris\Models\Profile.
 *
 * @property Collection<int, Customer> $customers
 * @property int|null                                          $customers_count
 * @property string|null                                       $full_name
 * @property Collection<int, Permission>                       $permissions
 * @property int|null                                          $permissions_count
 * @property Collection<int, Role>                             $roles
 * @property int|null                                          $roles_count
 * @property User|null                                         $user
 *
 * @method static CachedBuilder                                  all($columns = [])
 * @method static CachedBuilder                                  avg($column)
 * @method static CachedBuilder                                  cache(array $tags = [])
 * @method static CachedBuilder                                  cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder                                  count($columns = '*')
 * @method static CachedBuilder disableCache()
 * @method static CachedBuilder                                  disableModelCaching()
 * @method static CachedBuilder                                  exists()
 * @method static CachedBuilder                                  flushCache(array $tags = [])
 * @method static CachedBuilder getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder                                  inRandomOrder($seed = '')
 * @method static CachedBuilder                                  insert(array $values)
 * @method static CachedBuilder                                  isCachable()
 * @method static CachedBuilder                                  max($column)
 * @method static CachedBuilder                                  min($column)
 * @method static CachedBuilder                                  newModelQuery()
 * @method static CachedBuilder                                  newQuery()
 * @method static CachedBuilder                                  permission($permissions)
 * @method static CachedBuilder                                  query()
 * @method static CachedBuilder                                  role($roles, $guard = null)
 * @method static CachedBuilder                                  sum($column)
 * @method static CachedBuilder                                  truncate()
 * @method static CachedBuilder withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int         $id
 * @property string|null $post_type
 * @property string|null $bio
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $deleted_by
 * @property string|null $first_name
 * @property string|null $surname
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property int|null    $user_id
 * @property string|null $last_name
 *
 * @method static CachedBuilder whereAddress($value)
 * @method static CachedBuilder whereBio($value)
 * @method static CachedBuilder whereCreatedAt($value)
 * @method static CachedBuilder whereCreatedBy($value)
 * @method static CachedBuilder whereDeletedBy($value)
 * @method static CachedBuilder whereEmail($value)
 * @method static CachedBuilder whereFirstName($value)
 * @method static CachedBuilder whereId($value)
 * @method static CachedBuilder whereLastName($value)
 * @method static CachedBuilder wherePhone($value)
 * @method static CachedBuilder wherePostType($value)
 * @method static CachedBuilder whereSurname($value)
 * @method static CachedBuilder whereUpdatedAt($value)
 * @method static CachedBuilder whereUpdatedBy($value)
 * @method static CachedBuilder whereUserId($value)
 *
 * @property string|null $gender
 * @property string|null $tax_code
 * @property string|null $vat_number
 * @property string|null $deleted_at
 * @property SchemalessAttributes $extra
 *
 * @property-read string $avatar
 * @property-read Collection<int, DeviceUser> $deviceUsers
 * @property-read int|null $device_users_count
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read Collection<int, DeviceUser> $mobileDeviceUsers
 * @property-read int|null $mobile_device_users_count
 * @property-read Collection<int, Device> $mobileDevices
 * @property-read int|null $mobile_devices_count
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, Customer> $teams
 * @property-read int|null $teams_count
 * @property-read string|null $user_name
 *
 * @method static ProfileFactory factory($count = null, $state = [])
 * @method static Builder|Profile whereDeletedAt($value)
 * @method static Builder|Profile whereGender($value)
 * @method static Builder|Profile whereTaxCode($value)
 * @method static Builder|Profile whereVatNumber($value)
 * @method static Builder|BaseProfile withExtraAttributes()
 * @method static Builder|BaseProfile withoutPermission($permissions)
 * @method static Builder|BaseProfile withoutRole($roles, $guard = null)
 *
 * @mixin \Eloquent
 */
class Profile extends BaseProfile
{
    /** @var string */
    protected $connection = 'quaeris';

    // ------- RELATIONSHIP ----------

    public function customers(): BelongsToMany
    {
        return $this->belongsToManyX(Customer::class);
    }

    // public function surveyPdfs(): HasManyThrough {
    //     $rows = $this->hasManyThrough(SurveyPdf::class, CustomerProfile::class, null, 'customer_id', null, 'customer_id');

    //     return $rows;

    // }
}// end model
