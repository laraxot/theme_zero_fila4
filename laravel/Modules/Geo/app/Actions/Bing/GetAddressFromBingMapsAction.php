<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\Bing;

use Illuminate\Support\Facades\Http;
use Modules\Geo\Datas\AddressData;
use Modules\Geo\Datas\BingMapData;
use Modules\Geo\Exceptions\InvalidLocationException;

/**
 * Classe per ottenere l'indirizzo da Bing Maps.
 */
class GetAddressFromBingMapsAction
{
    private const BASE_URL = 'http://dev.virtualearth.net/REST/v1/Locations';

    /**
     * Ottiene l'indirizzo da coordinate geografiche.
     *
     * @throws InvalidLocationException Se la richiesta fallisce o i dati non sono validi
     */
    public function execute(float $latitude, float $longitude): AddressData
    {
        $apiKey = $this->getApiKey();
        $response = $this->makeApiRequest($latitude, $longitude, $apiKey);
        $data = $this->parseResponse($response);

        return $this->mapResponseToAddressData($data);
    }

    /**
     * Get the Bing Maps API key from configuration.
     *
     * @return non-empty-string
     * @throws InvalidLocationException
     */
    private function getApiKey(): string
    {
        /** @var string|null $apiKey */
        $apiKey = config('services.bing.maps_api_key');

        if (empty($apiKey)) {
            throw InvalidLocationException::invalidData('API key di Bing Maps non configurata');
        }

        // We've already checked that $apiKey is not empty
        /** @var non-empty-string $apiKey */
        return $apiKey;
    }

    /**
     * Make an API request to Bing Maps.
     *
     * @param float $latitude
     * @param float $longitude
     * @param non-empty-string $apiKey
     * @return array<string, mixed>
     * @throws InvalidLocationException
     */
    private function makeApiRequest(float $latitude, float $longitude, string $apiKey): array
    {
        $response = Http::get(self::BASE_URL, [
            'point' => "{$latitude},{$longitude}",
            'key' => $apiKey,
            'includeEntityTypes' => 'Address',
            'maxResults' => 1,
        ]);

        if (!$response->successful()) {
            throw InvalidLocationException::invalidData('Richiesta a Bing Maps fallita');
        }

        /** @var array<string, mixed> $jsonResponse */
        $jsonResponse = $response->json();
        return $jsonResponse;
    }

    private function parseResponse(array $response): BingMapData
    {
        $resourceSets = $response['resourceSets'] ?? [];
        $resources = $resourceSets[0]['resources'] ?? [];
        $location = $resources[0] ?? null;

        if (empty($location)) {
            throw InvalidLocationException::invalidData('Nessun risultato trovato');
        }

        return new BingMapData($location);
    }

    private function mapResponseToAddressData(BingMapData $data): AddressData
    {
        $res = $data->toArray();

        return new AddressData(
            latitude: (float) ($res['point']['coordinates'][0] ?? 0),
            longitude: (float) ($res['point']['coordinates'][1] ?? 0),
            country: $res['address']['countryRegion'] ?? null,
            city: $res['address']['locality'] ?? null,
            country_code: strtoupper($res['address']['countryRegionIso2'] ?? 'IT'),
            postal_code: (int) ($res['address']['postalCode'] ?? 0),
            locality: $res['address']['locality'] ?? null,
            county: $res['address']['adminDistrict2'] ?? null,
            street: $res['address']['addressLine'] ?? null,
            street_number: $res['address']['houseNumber'] ?? null,
            district: $res['address']['neighborhood'] ?? null,
            state: $res['address']['adminDistrict'] ?? null,
        );
    }
}
