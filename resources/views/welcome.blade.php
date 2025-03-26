@extends('app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <div class="bg-white rounded-xl shadow-sm p-8 col-span-1 md:col-span-2 lg:col-span-3 hover:shadow-md transition duration-300 border border-gray-100" aria-live="polite">
        <livewire:weather-search />
    </div>
</div>
@endsection
