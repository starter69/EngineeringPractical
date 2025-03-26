@extends('app')

@section('content')
@if(isset($error))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Error!</strong>
    <span class="block sm:inline">{{ $error }}</span>
</div>
@else
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <div class="bg-white rounded-xl shadow-sm p-8 col-span-1 md:col-span-2 lg:col-span-3 hover:shadow-md transition duration-300 border border-gray-100" aria-live="polite">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Current Weather</h2>
        <div class="flex items-center justify-between">
            <div class="space-y-3">
                <p class="text-5xl font-bold text-gray-900" aria-label="Temperature: {{ round($weather['current']['temperature']) }} degrees Celsius">{{ round($weather['current']['temperature']) }}°C</p>
                <output class="text-lg text-gray-600 block" aria-label="Weather condition: {{ $weather['current']['condition'] }}">{{ $weather['current']['condition'] }}</output>
                <p class="text-sm text-gray-500">Last updated: <time datetime="{{ \Carbon\Carbon::parse($weather['current']['last_updated'])->format('c') }}">{{ \Carbon\Carbon::parse($weather['current']['last_updated'])->format('H:i') }}</time></p>
            </div>
            <div class="p-6 bg-blue-50 rounded-full">
                <i class="{{ $weather['current']['icon'] }} text-6xl" aria-hidden="true" role="img" aria-label="Weather icon"></i>
            </div>
        </div>
    </div>

    <section class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition duration-300" aria-label="Tomorrow's weather">
        <h3 class="text-xl font-semibold mb-6">Tomorrow</h3>
        <div class="flex items-center justify-between">
            <div class="space-y-2">
                <p class="text-3xl font-medium">{{ round($weather['forecast'][0]['temperature']) }}°C</p>
                <p class="text-gray-600">{{ $weather['forecast'][0]['condition'] }}</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-full">
                <i class="{{ $weather['forecast'][0]['icon'] }} text-3xl"></i>
            </div>
        </div>
    </section>

    <section class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition duration-300" aria-label="Day After's weather">
        <h3 class="text-xl font-semibold mb-6">Day After</h3>
        <div class="flex items-center justify-between">
            <div class="space-y-2">
                <p class="text-3xl font-medium">{{ round($weather['forecast'][1]['temperature']) }}°C</p>
                <p class="text-gray-600">{{ $weather['forecast'][1]['condition'] }}</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-full">
                <i class="{{ $weather['forecast'][1]['icon'] }} text-3xl"></i>
            </div>
        </div>
    </section>

    <section class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition duration-300" aria-label="3-Day weather">
        <h3 class="text-xl font-semibold mb-6">3-Day</h3>
        <div class="flex items-center justify-between">
            <div class="space-y-2">
                <p class="text-3xl font-medium">{{ round($weather['forecast'][2]['temperature']) }}°C</p>
                <p class="text-gray-600">{{ $weather['forecast'][2]['condition'] }}</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-full">
                <i class="{{ $weather['forecast'][2]['icon'] }} text-3xl"></i>
            </div>
        </div>
    </section>
</div>
@endif
@endsection