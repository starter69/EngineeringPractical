<?php

namespace App\Services;

use App\DTOs\WeatherData;
use Illuminate\Http\Client\Factory as HttpClient;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\JsonResponse;

class OpenMeteoWeatherService
{
    private const API_URL = 'https://api.open-meteo.com/v1/forecast';

    public function __construct(
        private readonly HttpClient $http
    ) {}

    /**
     * @inheritDoc
     */
    public function getWeatherForecast(float $latitude, float $longitude): JsonResponse
    {
        try {
            $response = $this->http->get(self::API_URL, [
                'latitude' => $latitude,
                'longitude' => $longitude,
                'current' => 'temperature_2m,wind_speed_10m,relative_humidity_2m,weather_code',
                'timezone' => 'auto'
            ]);

            if ($response->failed()) {
                throw new RequestException($response);
            }

            return $response->json();
        } catch (\Exception $e) {
            \Log::error('Weather API Error: ' . $e->getMessage());
            throw new \Exception('Unable to fetch weather data: ' . $e->getMessage());
        }
    }
}
