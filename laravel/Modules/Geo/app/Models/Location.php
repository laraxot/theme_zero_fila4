<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Override;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;

/**
 * Class Location.
 *
 * @property int                  $id
 * @property string|null          $model_type
 * @property string|null          $model_id
 * @property string|null          $name
 * @property float|null           $lat
 * @property float|null           $lng
 * @property string|null          $street
 * @property string|null          $city
 * @property string|null          $state
 * @property string|null          $zip
 * @property string|null          $formatted_address
 * @property string|null          $description
 * @property bool|null            $processed
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property string|null          $deleted_at
 * @property string|null          $deleted_by
 * @property array                $location
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static Builder|Location query()
 * @method static Builder|Location whereCity(string $value)
 * @method static Builder|Location whereLat(float $value)
 * @method static Builder|Location whereLng(float $value)
 * @method static Builder|Location whereProcessed(bool $value)
 * @method static Builder|Location whereState(string $value)
 * @method static Builder|Location whereZip(string $value)
 * @method static Builder<static>|Location newModelQuery()
 * @method static Builder<static>|Location newQuery()
 * @method static Builder<static>|Location withinDistance(float $latitude, float $longitude, float $distanceInKm)
 * @method static Builder<static>|Location whereCreatedAt($value)
 * @method static Builder<static>|Location whereCreatedBy($value)
 * @method static Builder<static>|Location whereDeletedAt($value)
 * @method static Builder<static>|Location whereDeletedBy($value)
 * @method static Builder<static>|Location whereDescription($value)
 * @method static Builder<static>|Location whereFormattedAddress($value)
 * @method static Builder<static>|Location whereId($value)
 * @method static Builder<static>|Location whereModelId($value)
 * @method static Builder<static>|Location whereModelType($value)
 * @method static Builder<static>|Location whereName($value)
 * @method static Builder<static>|Location whereStreet($value)
 * @method static Builder<static>|Location whereUpdatedAt($value)
 * @method static Builder<static>|Location whereUpdatedBy($value)
 * @mixin IdeHelperLocation
 * @mixin \Eloquent
 */
class Location extends BaseModel
{
    protected $fillable = [
        'name',
        'lat',
        'lng',
        'street',
        'city',
        'state',
        'zip',
        'formatted_address',
        'processed',
        'description',
    ];

    protected $appends = [
        'location',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    #[Override]
    protected function casts(): array
    {
        return [
            'lat' => 'float',
            'lng' => 'float',
            'processed' => 'bool',
        ];
    }

    /**
     * Accessor for the "location" attribute.
     */
    protected function location(): Attribute
    {
        return Attribute::make(
            get: fn(): array => [
                'lat' => (float) $this->lat,
                'lng' => (float) $this->lng,
            ],
            set: function (null|array $value): void {
                if (is_array($value)) {
                    $this->attributes['lat'] = $value['lat'] ?? null;
                    $this->attributes['lng'] = $value['lng'] ?? null;
                }
            },
        );
    }

    /**
     * Get the latitude and longitude attributes.
     */
    public static function getLatLngAttributes(): array
    {
        return [
            'lat' => 'lat',
            'lng' => 'lng',
        ];
    }

    /**
     * Get the computed location attribute name.
     */
    public static function getComputedLocation(): string
    {
        return 'location';
    }

    /**
     * Scope to filter by a specific distance from a given point.
     */
    public function scopeWithinDistance(Builder $query, float $latitude, float $longitude, float $distanceInKm): Builder
    {
        $haversine = "(6371 * acos(cos(radians({$latitude})) * cos(radians(lat)) * cos(radians(lng) - radians({$longitude})) + sin(radians({$latitude})) * sin(radians(lat))))";

        return $query->whereRaw("{$haversine} <= ?", [$distanceInKm]);
    }
}
