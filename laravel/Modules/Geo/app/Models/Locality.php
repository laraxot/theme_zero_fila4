<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Sushi\Sushi;
use Override;
use Filament\Schemas\Components\Utilities\Get;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

use function Safe\json_decode;

/**
 * @property int|null $region_id
 * @property int|null $province_id
 * @property string|null $name
 * @property int $id
 * @property string|null $postal_code
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @method static Builder<static>|Locality newModelQuery()
 * @method static Builder<static>|Locality newQuery()
 * @method static Builder<static>|Locality query()
 * @method static Builder<static>|Locality whereId($value)
 * @method static Builder<static>|Locality whereName($value)
 * @method static Builder<static>|Locality wherePostalCode($value)
 * @method static Builder<static>|Locality whereProvinceId($value)
 * @method static Builder<static>|Locality whereRegionId($value)
 * @mixin IdeHelperLocality
 * @mixin \Eloquent
 */
class Locality extends BaseModel
{
    use Sushi;

    protected array $schema = [
        'region_id' => 'integer',
        'province_id' => 'integer',
        'id' => 'integer',
        'name' => 'string',
        'postal_code' => 'json',
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
            'region_id' => 'integer',
            'province_id' => 'integer',
            'id' => 'integer',
            'name' => 'string',
            'postal_code' => 'array',
        ];
    }

    public function getRows(): array
    {
        $rows = Comune::select(
            'regione->codice as region_id',
            'provincia->codice as province_id',
            'nome as name',
            'codice as id',
            'cap as postal_code',
        )
            ->distinct()
            ->orderBy('nome')
            ->get()
            ->map(fn ($row) => $row);

        return $rows->toArray();
    }

    public static function getOptions(Get $get): array
    {
        $region = $get('administrative_area_level_1') ?? $get('region');
        if (!$region) {
            return [];
        }
        $province = $get('administrative_area_level_2') ?? $get('province');
        if (!$province) {
            return [];
        }

        $city = $get('locality');
        $res = self::where('region_id', $region)
            ->where('province_id', $province)
            ->pluck('name', 'id')
            ->toArray();

        /*
         * ->when($city !== null, fn($query) => $query->where('id', $city))
         * ->select('postal_code')
         * ->distinct()
         * ->orderBy('postal_code')
         * ->get()
         * ->pluck('postal_code', 'postal_code')
         * ->toArray();
         *
         *
         *
         * return $res ?? [];
         */
        return $res;
    }

    public static function getPostalCodeOptions(Get $get): array
    {
        $region = $get('administrative_area_level_1') ?? $get('region');
        if (!$region) {
            return [];
        }
        $province = $get('administrative_area_level_2') ?? $get('province');
        if (!$province) {
            return [];
        }

        $city = $get('locality');
        $res = self::where('region_id', $region)
            ->where('province_id', $province)
            ->when($city !== null, fn($query) => $query->where('id', $city))
            ->select('postal_code')
            ->distinct()
            ->orderBy('postal_code')
            ->get()//->pluck('postal_code', 'postal_code')
        //->toArray()
        ;
        /** @var array<int, array<string, mixed>> $arr */
        $arr = $res->toArray();
        $arr = Arr::mapWithKeys($arr, function (array $item) {
            if (!isset($item['postal_code']) || !is_array($item['postal_code'])) {
                return [];
            }
            /** @var array<int, string> $postalCodes */
            $postalCodes = array_values((array) $item['postal_code']);
            /** @var array<string, string> $result */
            $result = array_combine($postalCodes, $postalCodes);
            return $result;
        });

        return $arr ?? [];
    }
}
