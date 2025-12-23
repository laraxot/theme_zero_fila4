<?php

declare(strict_types=1);

namespace Modules\Gdpr\Models;

use Spatie\SchemalessAttributes\SchemalessAttributes;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Modules\User\Models\DeviceUser;
use Modules\User\Models\Device;
use Modules\Media\Models\Media;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\Team;
use Modules\Xot\Contracts\UserContract;
use Modules\Gdpr\Database\Factories\ProfileFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\User\Models\Membership;
use Modules\Xot\Contracts\ProfileContract;
use Modules\User\Models\BaseProfile;

/**
 * Modules\Gdpr\Models\Profile.
 *
 * @property int                                                                                                           $id
 * @property string|null                                                                                                   $type
 * @property string|null                                                                                                   $first_name
 * @property string|null                                                                                                   $last_name
 * @property string|null                                                                                                   $full_name
 * @property string|null                                                                                                   $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null                                                                                                   $user_id
 * @property string|null                                                                                                   $updated_by
 * @property string|null                                                                                                   $created_by
 * @property Carbon|null $deleted_at
 * @property string|null                                                                                                   $deleted_by
 * @property bool                                                                                                          $is_active
 * @property SchemalessAttributes $extra
 * @property string $avatar
 * @property Collection<int, DeviceUser> $deviceUsers
 * @property int|null                                                                                                      $device_users_count
 * @property Collection<int, Device> $devices
 * @property int|null                                                                                                      $devices_count
 * @property MediaCollection<int, Media> $media
 * @property int|null                                                                                                      $media_count
 * @property Collection<int, DeviceUser> $mobileDeviceUsers
 * @property int|null                                                                                                      $mobile_device_users_count
 * @property Collection<int, Device> $mobileDevices
 * @property int|null                                                                                                      $mobile_devices_count
 * @property DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property int|null                                                                                                      $notifications_count
 * @property Collection<int, Permission> $permissions
 * @property int|null                                                                                                      $permissions_count
 * @property Collection<int, Role> $roles
 * @property int|null                                                                                                      $roles_count
 * @property Collection<int, Team> $teams
 * @property int|null                                                                                                      $teams_count
 * @property UserContract|null $user
 * @property string|null                                                                                                   $user_name
 * @method static ProfileFactory factory($count = null, $state = [])
 * @method static Builder|Profile newModelQuery()
 * @method static Builder|Profile newQuery()
 * @method static Builder|BaseProfile permission($permissions, $without = false)
 * @method static Builder|Profile query()
 * @method static Builder|BaseProfile role($roles, $guard = null, $without = false)
 * @method static Builder|Profile whereCreatedAt($value)
 * @method static Builder|Profile whereCreatedBy($value)
 * @method static Builder|Profile whereDeletedAt($value)
 * @method static Builder|Profile whereDeletedBy($value)
 * @method static Builder|Profile whereEmail($value)
 * @method static Builder|Profile whereFirstName($value)
 * @method static Builder|Profile whereFullName($value)
 * @method static Builder|Profile whereId($value)
 * @method static Builder|Profile whereIsActive($value)
 * @method static Builder|Profile whereLastName($value)
 * @method static Builder|Profile whereType($value)
 * @method static Builder|Profile whereUpdatedAt($value)
 * @method static Builder|Profile whereUpdatedBy($value)
 * @method static Builder|Profile whereUserId($value)
 * @method static Builder|BaseProfile withExtraAttributes()
 * @method static Builder|BaseProfile withoutPermission($permissions)
 * @method static Builder|BaseProfile withoutRole($roles, $guard = null)
 * @property string|null $deleted_by
 * @property int         $is_active
 * @method static ProfileFactory factory($count = null, $state = [])
 * @method static Builder|Profile newModelQuery()
 * @method static Builder|Profile newQuery()
 * @method static Builder|BaseProfile permission($permissions, $without = false)
 * @method static Builder|Profile query()
 * @method static Builder|BaseProfile role($roles, $guard = null, $without = false)
 * @method static Builder|Profile whereCreatedAt($value)
 * @method static Builder|Profile whereCreatedBy($value)
 * @method static Builder|Profile whereDeletedAt($value)
 * @method static Builder|Profile whereDeletedBy($value)
 * @method static Builder|Profile whereEmail($value)
 * @method static Builder|Profile whereFirstName($value)
 * @method static Builder|Profile whereFullName($value)
 * @method static Builder|Profile whereId($value)
 * @method static Builder|Profile whereIsActive($value)
 * @method static Builder|Profile whereLastName($value)
 * @method static Builder|Profile whereType($value)
 * @method static Builder|Profile whereUpdatedAt($value)
 * @method static Builder|Profile whereUpdatedBy($value)
 * @method static Builder|Profile whereUserId($value)
 * @method static Builder|BaseProfile withExtraAttributes()
 * @method static Builder|BaseProfile withoutPermission($permissions)
 * @method static Builder|BaseProfile withoutRole($roles, $guard = null)
 * @property string|null $deleted_by
 * @property int         $is_active
 * @method static ProfileFactory factory($count = null, $state = [])
 * @method static Builder|Profile newModelQuery()
 * @method static Builder|Profile newQuery()
 * @method static Builder|Profile query()
 * @method static Builder|Profile whereCreatedAt($value)
 * @method static Builder|Profile whereCreatedBy($value)
 * @method static Builder|Profile whereDeletedAt($value)
 * @method static Builder|Profile whereDeletedBy($value)
 * @method static Builder|Profile whereEmail($value)
 * @method static Builder|Profile whereFirstName($value)
 * @method static Builder|Profile whereFullName($value)
 * @method static Builder|Profile whereId($value)
 * @method static Builder|Profile whereIsActive($value)
 * @method static Builder|Profile whereLastName($value)
 * @method static Builder|Profile whereType($value)
 * @method static Builder|Profile whereUpdatedAt($value)
 * @method static Builder|Profile whereUpdatedBy($value)
 * @method static Builder|Profile whereUserId($value)
 * @property DeviceUser $pivot
 * @property Membership $membership
 * @property string $credits
 * @property string|null                                 $slug
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static Builder|Profile whereCredits($value)
 * @method static Builder|Profile whereExtra($value)
 * @method static Builder|Profile whereSlug($value)
 * @property int $oauth_enable
 * @property int $credentials_enable
 * @method static Builder|Profile whereCredentialsEnable($value)
 * @method static Builder|Profile whereOauthEnable($value)
 * @property string $uuid
 * @method static Builder|Profile whereUuid($value)
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $city
 * @property string|null $country
 * @property string|null $postal_code
 * @property string|null $bio
 * @method static Builder<static>|Profile whereAddress($value)
 * @method static Builder<static>|Profile whereAvatar($value)
 * @method static Builder<static>|Profile whereBio($value)
 * @method static Builder<static>|Profile whereCity($value)
 * @method static Builder<static>|Profile whereCountry($value)
 * @method static Builder<static>|Profile wherePhone($value)
 * @method static Builder<static>|Profile wherePostalCode($value)
 * @mixin IdeHelperProfile
 * @mixin \Eloquent
 */
class Profile extends BaseProfile
{
    /** @var string */
    protected $connection = 'gdpr';
}
