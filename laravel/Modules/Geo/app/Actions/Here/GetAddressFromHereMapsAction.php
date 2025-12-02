<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\Here;

use Exception;
use Illuminate\Support\Facades\Http;
use Modules\Geo\Datas\AddressData;
use Modules\Geo\Datas\HereMap\HereMapResponseData;

class GetAddressFromHereMapsAction
{
    private const BASE_URL = 'https://geocode.search.hereapi.com/v1/geocode';

    public function execute(string $address): null|AddressData
    {
        $apiKey = config('services.here.key');

        if (empty($apiKey)) {
            throw new Exception('Here Maps API key not configured');
        }

        $response = Http::get(self::BASE_URL, [
            'q' => $address,
            'apiKey' => $apiKey,
            'limit' => 1,
        ]);

        if (!$response->successful()) {
            return null;
        }

        $responseData = HereMapResponseData::from($response->json());

        if (empty($responseData->position) || empty($responseData->address)) {
            return null;
        }

        return AddressData::from([
            'latitude' => (float) ($responseData->position['lat'] ?? 0),
            'longitude' => (float) ($responseData->position['lng'] ?? 0),
            'country' => $responseData->address['countryName'] ?? 'Italia',
            'city' => $responseData->address['city'] ?? '',
            'postal_code' => (int) ($responseData->address['postalCode'] ?? 0),
            'street' => $responseData->address['street'] ?? '',
            'street_number' => $responseData->address['houseNumber'] ?? '',
        ]);
    }
}
