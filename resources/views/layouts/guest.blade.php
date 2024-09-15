<!DOCTYPE html>
<html  class="h-full bg-white" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Meta --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Title --}}
        <title>{{ config('app.name', 'Laravel') }}</title>        

        {{-- Vite Resources --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Custom Styles --}}
        @stack('styles')
    </head>
    <body class="h-full">
        {{-- Main Slot --}}
        {{ $slot }}

        {{-- Custom Javascript --}}
        @stack('scripts')
    </body>
</html>