<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

use InvalidArgumentException;
use Modules\Geo\Traits\HandlesCoordinates;
use Webmozart\Assert\Assert;

/**
 * Action per filtrare le coordinate in base alla distanza da un punto.
 */
class FilterCoordinatesAction
{
    use HandlesCoordinates;

    /**
     * Filtra le coordinate che si trovano entro un certo raggio da un punto.
     *
     * @param  array<array{latitude: float|string, longitude: float|string}>  $coordinates  Lista delle coordinate da filtrare
     * @param  float  $centerLat  Latitudine del punto centrale
     * @param  float  $centerLng  Longitudine del punto centrale
     * @param  float  $radiusKm  Raggio in chilometri
     * @return array<array{latitude: float, longitude: float, distance: float}> Coordinate filtrate con distanza
     *
     * @throws InvalidArgumentException Se le coordinate non sono valide
     */
    public function execute(array $coordinates, float $centerLat, float $centerLng, float $radiusKm): array
    {
        $this->validateInput($centerLat, $centerLng, $radiusKm);

        return collect($coordinates)
            ->map(function (array $coord) use ($centerLat, $centerLng): array {
                $lat = (float) $coord['latitude'];
                $lng = (float) $coord['longitude'];

                Assert::range($lat, -90, 90, 'Latitudine non valida');
                Assert::range($lng, -180, 180, 'Longitudine non valida');

                return [
                    'latitude' => $lat,
                    'longitude' => $lng,
                    'distance' => $this->calculateDistance($centerLat, $centerLng, $lat, $lng),
                ];
            })
            ->filter(fn(array $coord): bool => $coord['distance'] <= $radiusKm)
            ->sortBy('distance')
            ->values()
            ->all();
    }

    /**
     * Valida i dati di input.
     *
     * @throws InvalidArgumentException Se i dati non sono validi
     */
    private function validateInput(float $latitude, float $longitude, float $radius): void
    {
        Assert::range($latitude, -90, 90, 'Latitudine centrale non valida');
        Assert::range($longitude, -180, 180, 'Longitudine centrale non valida');
        Assert::greaterThan($radius, 0, 'Il raggio deve essere maggiore di 0');
        Assert::lessThan($radius, 20000, 'Il raggio non può essere maggiore della circonferenza terrestre');
    }
}
