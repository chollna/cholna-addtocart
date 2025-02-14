<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
<style>
.big-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 20px 40px;  /* Larger padding for a bigger button */
    background-color: #4CAF50; /* Green background */
    color: white; /* White text */
    font-size: 18px; /* Larger font */
    font-weight: bold;
    border-radius: 12px; /* Round edges */
    border: none;  /* Remove default border */
    cursor: pointer;
    transition: all 0.3s ease; /* Smooth transition for hover */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.big-button:hover {
    background-color: #45a049; /* Darker green on hover */
    transform: scale(1.05); /* Slightly increase size */
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2); /* Larger shadow on hover */
}

.big-button svg {
    width: 24px; /* Larger icon */
    height: 24px;
    margin-right: 10px; /* Space between icon and text */
}

    
</style>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
