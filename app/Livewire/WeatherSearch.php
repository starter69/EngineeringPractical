<?php

namespace App\Livewire;

use App\Enums\Cities;
use App\Services\OpenMeteoWeatherService;
use Livewire\Component;

class WeatherSearch extends Component
{
    public ?string $selectedCity = null;
    public ?array $weatherData = null;
    public bool $isLoading = false;
    public ?string $error = null;

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

    public function mount()
    {
        $this->selectedCity = Cities::NEW_YORK->value;
        $this->searchWeather();
    }

    public function updatedSelectedCity()
    {
        $this->searchWeather();
    }

    public function getWeatherIcon(int $code): string
    {
        return match ($this->weatherConditions[$code] ?? 'Unknown') {
            'Clear', 'Mainly Clear' => 'fas fa-sun text-yellow-500',
            'Partly Cloudy' => 'fas fa-cloud-sun text-gray-500',
            'Overcast' => 'fas fa-cloud text-gray-500',
            'Rain', 'Light Rain', 'Heavy Rain', 'Drizzle', 'Light Drizzle', 'Heavy Drizzle' => 'fas fa-cloud-rain text-blue-500',
            'Light Showers', 'Showers', 'Heavy Showers' => 'fas fa-cloud-showers-heavy text-blue-500',
            default => 'fas fa-cloud text-gray-500',
        };
    }

    public function searchWeather()
    {
        $this->isLoading = true;
        $this->error = null;

        try {
            if (!$this->selectedCity) {
                throw new \Exception('Please select a city');
            }

            $cityEnum = Cities::from($this->selectedCity);
            $coordinates = $cityEnum->coordinates();

            $weatherService = app(OpenMeteoWeatherService::class);
            $weatherData = $weatherService->getWeatherForecast(
                $coordinates['latitude'],
                $coordinates['longitude']
            );

            $this->weatherData = [
                'current' => [
                    'temperature' => $weatherData['current']['temperature_2m'],
                    'wind_speed' => $weatherData['current']['wind_speed_10m'],
                    'humidity' => $weatherData['current']['relative_humidity_2m'],
                    'condition' => $this->weatherConditions[$weatherData['current']['weather_code']] ?? 'Unknown',
                    'icon' => $this->getWeatherIcon($weatherData['current']['weather_code']),
                ]
            ];
        } catch (\Exception $e) {
            $this->error = 'Unable to fetch weather data. Please try again.';
            $this->weatherData = null;
        } finally {
            $this->isLoading = false;
        }
    }

    public function render()
    {
        return view('livewire.weather-search', [
            'cities' => Cities::getCities()
        ]);
    }
}
