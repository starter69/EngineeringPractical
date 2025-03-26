<div>
    <div class="mb-6">
        <label for="city" class="block text-2xl font-bold mb-4 text-gray-800">Select City</label>
        <select
            wire:model.live="selectedCity"
            id="city"
            class="w-full max-w-xs px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @foreach($cities as $city)
            <option value="{{ $city }}">{{ $city }}</option>
            @endforeach
        </select>
    </div>

    <div wire:loading wire:target="searchWeather"
        class="flex items-center justify-center py-4">
        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"></div>
        <span class="ml-2 text-gray-600">Updating weather data...</span>
    </div>

    @if($error)
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ $error }}</span>
    </div>
    @endif

    @if($weatherData)
    <div class="space-y-3">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-5xl font-bold text-gray-900" aria-label="Temperature: {{ round($weatherData['current']['temperature']) }} degrees Celsius">
                    {{ round($weatherData['current']['temperature']) }}°C
                </p>
                <output class="text-lg text-gray-600 block" aria-label="Weather condition: {{ $weatherData['current']['condition'] }}">
                    {{ $weatherData['current']['condition'] }}
                </output>
                <p class="text-sm text-gray-500">
                    Last updated: <time datetime="{{ now()->format('c') }}">{{ now()->format('H:i') }}</time>
                </p>
            </div>
            <div class="p-6 bg-blue-50 rounded-full">
                <i class="{{ $weatherData['current']['icon'] }} text-6xl" aria-hidden="true" role="img" aria-label="Weather icon"></i>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-6">
            <div class="bg-gray-50 p-4 rounded-lg">
                <p class="text-gray-500 text-sm">Wind Speed</p>
                <p class="text-xl font-semibold">{{ $weatherData['current']['wind_speed'] }} km/h</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <p class="text-gray-500 text-sm">Humidity</p>
                <p class="text-xl font-semibold">{{ $weatherData['current']['humidity'] }}%</p>
            </div>
        </div>
    </div>
    @endif
</div>
