<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class WeatherService
{
    private const API_URL = 'https://api.open-meteo.com/v1/forecast';

    private array $weatherConditions = [
        0 => 'Clear',
        1 => 'Mainly Clear',
        2 => 'Partly Cloudy',
        3 => 'Overcast',
        45 => 'Foggy',
        51 => 'Light Drizzle',
        53 => 'Drizzle',
        55 => 'Heavy Drizzle',
        61 => 'Light Rain',
        63 => 'Rain',
        65 => 'Heavy Rain',
        80 => 'Light Showers',
        81 => 'Showers',
        82 => 'Heavy Showers',
    ];

    public function getWeatherData(float $latitude, float $longitude): array
    {
        try {
            $response = Http::get(self::API_URL, [
                'latitude' => $latitude,
                'longitude' => $longitude,
                'current' => 'temperature_2m,weather_code',
                'daily' => 'temperature_2m_max,weather_code',
                'timezone' => 'auto',
                'forecast_days' => 3
            ]);

            if ($response->failed()) {
                throw new Exception('Failed to fetch weather data');
            }

            $data = $response->json();

            return [
                'current' => [
                    'temperature' => $data['current']['temperature_2m'] ?? 0.0,
                    'condition' => $this->getWeatherCondition($data['current']['weather_code'] ?? 0),
                    'icon' => $this->getWeatherIcon($data['current']['weather_code'] ?? 0),
                    'last_updated' => $data['current']['time'] ?? now(),
                ],
                'forecast' => $this->processForecast($data['daily'] ?? [])
            ];
        } catch (Exception $e) {
            \Log::error('Weather API Error: ' . $e->getMessage());
            throw new Exception('Unable to fetch weather data: ' . $e->getMessage());
        }
    }

    private function processForecast(array $dailyData): array
    {
        $forecast = [];

        for ($i = 0; $i < 3; $i++) {
            $forecast[] = [
                'temperature' => $dailyData['temperature_2m_max'][$i] ?? 0.0,
                'condition' => $this->getWeatherCondition($dailyData['weather_code'][$i] ?? 0),
                'icon' => $this->getWeatherIcon($dailyData['weather_code'][$i] ?? 0),
            ];
        }

        return $forecast;
    }

    private function getWeatherCondition(int $code): string
    {
        return $this->weatherConditions[$code] ?? 'Unknown';
    }

    private function getWeatherIcon(int $code): string
    {
        return match ($this->getWeatherCondition($code)) {
            'Clear', 'Mainly Clear' => 'fas fa-sun text-yellow-500',
            'Partly Cloudy' => 'fas fa-cloud-sun text-gray-500',
            'Overcast' => 'fas fa-cloud text-gray-500',
            'Rain', 'Light Rain', 'Heavy Rain', 'Drizzle', 'Light Drizzle', 'Heavy Drizzle' => 'fas fa-cloud-rain text-blue-500',
            'Light Showers', 'Showers', 'Heavy Showers' => 'fas fa-cloud-showers-heavy text-blue-500',
            default => 'fas fa-cloud text-gray-500',
        };
    }
}
