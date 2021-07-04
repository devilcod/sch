<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
         --}}
         <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Montserrat:400,900&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
<!-- This example requires Tailwind CSS v2.0+ -->
        @include('hero-banner')
        <div class="bg-gray-100 py-2 mt-5">
            @include('feature-section')
        </div>
        <div class="mt-5">
            @livewire('news.news')
        </div>
        @include('layouts.partial.footer')
    </body>
</html>
