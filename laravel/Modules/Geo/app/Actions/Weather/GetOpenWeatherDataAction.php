<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\Weather;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GetOpenWeatherDataAction
{
    private const ENDPOINT = 'https://api.openweathermap.org/data/2.5/weather';

    public function execute(float $latitude, float $longitude): null|array
    {
        try {
            $response = Http::get(self::ENDPOINT, [
                'lat' => $latitude,
                'lon' => $longitude,
                'appid' => config('services.openweather.api_key'),
                'units' => 'metric',
                'lang' => 'it',
            ]);

            if (!$response->successful()) {
                return null;
            }

            $data = $response->json();

            if (!is_array($data)) {
                return null;
            }

            return [
                'temperature' => Arr::get($data, 'main.temp'),
                'feels_like' => Arr::get($data, 'main.feels_like'),
                'humidity' => Arr::get($data, 'main.humidity'),
                'pressure' => Arr::get($data, 'main.pressure'),
                'weather' => [
                    'main' => Arr::get($data, 'weather.0.main'),
                    'description' => Arr::get($data, 'weather.0.description'),
                    'icon' => Arr::get($data, 'weather.0.icon'),
                ],
                'wind' => [
                    'speed' => Arr::get($data, 'wind.speed'),
                    'direction' => Arr::get($data, 'wind.deg'),
                ],
                'clouds' => Arr::get($data, 'clouds.all'),
                'timestamp' => Arr::get($data, 'dt'),
            ];
        } catch (Exception $e) {
            Log::error('OpenWeather API error: ' . $e->getMessage());

            return null;
        }
    }
}
