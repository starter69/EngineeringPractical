@extends('app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <div class="bg-white rounded-xl shadow-sm p-8 col-span-1 md:col-span-2 lg:col-span-3 hover:shadow-md transition duration-300 border border-gray-100" aria-live="polite">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Current Weather</h2>
        <div class="flex items-center justify-between">
            <div class="space-y-3">
                <p class="text-5xl font-bold text-gray-900" aria-label="Temperature: 23 degrees Celsius">23°C</p>
                <output class="text-lg text-gray-600 block" aria-label="Weather condition: Sunny">Sunny</output>
                <p class="text-sm text-gray-500">Last updated: <time datetime="2024-03-19T15:00:00">15:00</time></p>
            </div>
            <div class="p-6 bg-blue-50 rounded-full">
                <i class="fas fa-sun text-6xl text-yellow-500" aria-hidden="true" role="img" aria-label="Sun icon"></i>
            </div>
        </div>
    </div>

    <section class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition duration-300" aria-label="Tomorrow's weather">
        <h3 class="text-xl font-semibold mb-6">Tomorrow</h3>
        <div class="flex items-center justify-between">
            <div class="space-y-2">
                <p class="text-3xl font-medium">21°C</p>
                <p class="text-gray-600">Partly Cloudy</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-full">
                <i class="fas fa-cloud-sun text-3xl text-gray-500"></i>
            </div>
        </div>
    </section>

    <section class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition duration-300" aria-label="Day After's weather">
        <h3 class="text-xl font-semibold mb-6">Day After</h3>
        <div class="flex items-center justify-between">
            <div class="space-y-2">
                <p class="text-3xl font-medium">19°C</p>
                <p class="text-gray-600">Rain</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-full">
                <i class="fas fa-cloud-rain text-3xl text-blue-500"></i>
            </div>
        </div>
    </section>

    <section class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition duration-300" aria-label="3-Day weather">
        <h3 class="text-xl font-semibold mb-6">3-Day</h3>
        <div class="flex items-center justify-between">
            <div class="space-y-2">
                <p class="text-3xl font-medium">24°C</p>
                <p class="text-gray-600">Clear</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-full">
                <i class="fas fa-sun text-3xl text-yellow-500"></i>
            </div>
        </div>
    </section>
</div>
@endsection
