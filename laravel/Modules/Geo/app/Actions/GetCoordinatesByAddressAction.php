<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Modules\Geo\Datas\CoordinatesData;

class GetCoordinatesByAddressAction
{
    public function execute(string $address): null|CoordinatesData
    {
        // Prova con Google Maps
        $coordinates = $this->getFromGoogle($address);

        if (!$coordinates) {
            // Prova con Bing Maps
            $coordinates = $this->getFromBing($address);
        }

        if (!$coordinates) {
            // Prova con OpenCage
            $coordinates = $this->getFromOpenCage($address);
        }

        if (!$coordinates) {
            // Prova con OpenStreetMap Nominatim
            $coordinates = $this->getFromNominatim($address);
        }

        if (!$coordinates) {
            // Prova con OpenAPI Geocoding
            $coordinates = $this->getFromOpenApi($address);
        }

        if (!$coordinates) {
            Notification::make()
                ->title('Error')
                ->body('Failed to fetch coordinates from all providers.')
                ->danger()
                ->persistent()
                ->send();
        }

        return $coordinates;
    }

    /**
     * Ottiene la risposta dall'API di Google Maps.
     *
     * @return array{results: array<int, array{geometry: array{location: array{lat: float, lng: float}}}>}
     */
    private function getGoogleResponse(string $address): array
    {
        $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'address' => $address,
            'key' => config('services.google.maps_api_key'),
        ]);

        if (!$response->successful()) {
            return ['results' => []];
        }

        /** @var array{results?: array<int, array{geometry: array{location: array{lat: float, lng: float}}}>} $data */
        $data = $response->json() ?? [];

        if (!isset($data['results'])) {
            return ['results' => []];
        }

        return ['results' => $data['results']];
    }

    private function getFromGoogle(string $address): null|CoordinatesData
    {
        $data = $this->getGoogleResponse($address);

        if (empty($data['results'])) {
            return null;
        }

        $firstResult = $data['results'][0] ?? [];
        $location = $firstResult['geometry']['location'] ?? null;

        if (!is_array($location) || !isset($location['lat'], $location['lng'])) {
            return null;
        }

        return CoordinatesData::from([
            'latitude' => (float) $location['lat'],
            'longitude' => (float) $location['lng'],
        ]);
    }

    /**
     * Ottiene la risposta dall'API di Bing Maps.
     *
     * @return array<string, mixed>
     */
    private function getBingResponse(string $address, string $apiKey): array
    {
        $response = Http::get('http://dev.virtualearth.net/REST/v1/Locations', [
            'q' => $address,
            'key' => $apiKey,
        ]);

        if (!$response->successful()) {
            return [];
        }

        $data = $response->json();

        if (!is_array($data) || !isset($data['resourceSets'])) {
            return ['resourceSets' => []];
        }

        return ['resourceSets' => $data['resourceSets']];
    }

    private function getFromBing(string $address): null|CoordinatesData
    {
        $apiKey = config('services.bing.maps_api_key');
        if (!is_string($apiKey) || $apiKey === '') {
            return null;
        }

        $data = $this->getBingResponse($address, $apiKey);

        // Type-safe navigation attraverso la struttura Bing response
        if (!isset($data['resourceSets']) || !is_array($data['resourceSets'])) {
            return null;
        }

        $resourceSets = $data['resourceSets'];
        if (empty($resourceSets[0]) || !is_array($resourceSets[0])) {
            return null;
        }

        $firstResourceSet = $resourceSets[0];
        if (!isset($firstResourceSet['resources']) || !is_array($firstResourceSet['resources'])) {
            return null;
        }

        $resources = $firstResourceSet['resources'];
        if (empty($resources[0]) || !is_array($resources[0])) {
            return null;
        }

        $firstResource = $resources[0];
        if (!isset($firstResource['point']) || !is_array($firstResource['point'])) {
            return null;
        }

        $point = $firstResource['point'];
        if (!isset($point['coordinates']) || !is_array($point['coordinates'])) {
            return null;
        }

        $coordinates = $point['coordinates'];
        if (count($coordinates) < 2) {
            return null;
        }

        return new CoordinatesData(
            latitude: (float) ($coordinates[0] ?? 0),
            longitude: (float) ($coordinates[1] ?? 0),
        );
    }

    /**
     * Ottiene la risposta dall'API di OpenCage.
     *
     * @return array{results: array<int, array{geometry: array{lat: float, lng: float}}>}
     */
    private function getOpenCageResponse(string $address, string $apiKey): array
    {
        $response = Http::get('https://api.opencagedata.com/geocode/v1/json', [
            'q' => $address,
            'key' => $apiKey,
        ]);

        if (!$response->successful()) {
            return ['results' => []];
        }

        /** @var array{results?: array<int, array{geometry: array{lat: float, lng: float}}>} $data */
        $data = $response->json();

        if (!is_array($data) || !isset($data['results'])) {
            return ['results' => []];
        }

        return ['results' => $data['results']];
    }

    private function getFromOpenCage(string $address): null|CoordinatesData
    {
        $apiKey = config('services.opencage.api_key');
        if (!is_string($apiKey) || $apiKey === '') {
            return null;
        }

        $data = $this->getOpenCageResponse($address, $apiKey);

        if (empty($data['results'])) {
            return null;
        }

        $location = $data['results'][0]['geometry'] ?? [];

        if (!isset($location['lat'], $location['lng'])) {
            return null;
        }

        return CoordinatesData::from([
            'latitude' => (float) $location['lat'],
            'longitude' => (float) $location['lng'],
        ]);
    }

    /**
     * @return array<int, array{lat: string, lon: string}>
     */
    private function getNominatimResponse(string $address): array
    {
        $response = Http::get('https://nominatim.openstreetmap.org/search', [
            'q' => $address,
            'format' => 'json',
            'limit' => 1,
        ]);

        if (!$response->successful()) {
            return [];
        }

        /** @var array<int, array{lat: string, lon: string}>|null $data */
        $data = $response->json();
        return is_array($data) ? array_values(array_filter($data, 'is_array')) : [];
    }

    private function getFromNominatim(string $address): null|CoordinatesData
    {
        $data = $this->getNominatimResponse($address);

        if (empty($data[0])) {
            return null;
        }

        $location = $data[0];

        if (!isset($location['lat'], $location['lon'])) {
            return null;
        }

        return CoordinatesData::from([
            'latitude' => (float) $location['lat'],
            'longitude' => (float) $location['lon'],
        ]);
    }

    /**
     * @return array{results: array<int, array{latitude: float, longitude: float}>}
     */
    private function getOpenApiResponse(string $address): array
    {
        $response = Http::get('https://api.open-meteo.com/v1/geocoding', [
            'name' => $address,
            'count' => 1,
        ]);

        if (!$response->successful()) {
            return ['results' => []];
        }

        /** @var array{results?: array<int, array{latitude: float, longitude: float}>} $data */
        $data = $response->json() ?? [];

        if (!isset($data['results'])) {
            return ['results' => []];
        }

        return ['results' => $data['results']];
    }

    private function getFromOpenApi(string $address): null|CoordinatesData
    {
        $data = $this->getOpenApiResponse($address);

        if (empty($data['results'])) {
            return null;
        }

        $firstResult = $data['results'][0] ?? [];

        if (!isset($firstResult['latitude'], $firstResult['longitude'])) {
            return null;
        }

        return CoordinatesData::from([
            'latitude' => (float) $firstResult['latitude'],
            'longitude' => (float) $firstResult['longitude'],
        ]);
    }
}
