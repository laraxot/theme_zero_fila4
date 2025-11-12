<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Spatie\SchemalessAttributes\SchemalessAttributes;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Database\Eloquent\Collection;
use Modules\Media\Models\Media;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Modules\User\Contracts\UserContract;
use Modules\User\Database\Factories\ProfileFactory;
use Modules\User\Models\Pivots\DeviceProfile;
use Modules\User\Models\Pivots\ProfileTeam;
use Modules\Xot\Contracts\ProfileContract;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\Permission\Traits\HasRoles;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait as HasSchemalessAttributes;

/**
 * User Profile Model
 *
 * Represents a user profile with relationships to devices, teams, and roles.
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $user_name
 * @property string $email
 * @property string|null $phone
 * @property string|null $bio
 * @property string|null $avatar
 * @property string|null $timezone
 * @property string|null $locale
 * @property array $preferences
 * @property string $status
 * @property SchemalessAttributes $extra
 * @property-read string $avatar
 * @property-read ProfileContract|null $creator
 * @property-read Collection<int, DeviceUser> $deviceUsers
 * @property-read int|null $device_users_count
 * @property-read \Modules\User\Models\ProfileTeam|\Modules\User\Models\DeviceProfile|null $pivot
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property-read string|null $first_name
 * @property-read string|null $full_name
 * @property-read string|null $last_name
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read Collection<int, DeviceUser> $mobileDeviceUsers
 * @property-read int|null $mobile_device_users_count
 * @property-read Collection<int, Device> $mobileDevices
 * @property-read int|null $mobile_devices_count
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property-read Collection<int, Team> $teams
 * @property-read int|null $teams_count
 * @property-read ProfileContract|null $updater
 * @property-read UserContract|null $user
 * @property-read string|null $user_name
 * @method static ProfileFactory factory($count = null, $state = [])
 * @method static Builder<static>|Profile newModelQuery()
 * @method static Builder<static>|Profile newQuery()
 * @method static Builder<static>|Profile permission($permissions, $without = false)
 * @method static Builder<static>|Profile query()
 * @method static Builder<static>|Profile role($roles, $guard = null, $without = false)
 * @method static Builder<static>|Profile withExtraAttributes()
 * @method static Builder<static>|Profile withoutPermission($permissions)
 * @method static Builder<static>|Profile withoutRole($roles, $guard = null)
 * @mixin IdeHelperProfile
 * @mixin \Eloquent
 */
class Profile extends BaseProfile implements HasMedia
{
    use HasRoles;
    use InteractsWithMedia;
    use HasSchemalessAttributes;

    /**
     * The schemaless attributes.
     *
     * @var list<string>
     */
    protected $schemalessAttributes = [
        'extra',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profiles';
}
