<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Exception;

class WeatherController extends Controller
{
    //default coordinates for New York
    private const DEFAULT_COORDINATES = [
        'latitude' => 40.7128,
        'longitude' => -74.0060
    ];

    public function __construct(
        private WeatherService $weatherService
    ) {}

    public function index()
    {
        try {
            $weatherData = $this->weatherService->getWeatherData(
                self::DEFAULT_COORDINATES['latitude'],
                self::DEFAULT_COORDINATES['longitude']
            );

            return view('welcome', ['weather' => $weatherData]);
        } catch (Exception $e) {
            return view('welcome', ['error' => $e->getMessage()]);
        }
    }
}
