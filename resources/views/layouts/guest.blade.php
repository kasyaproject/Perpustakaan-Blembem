<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Perpustakaan Digital MIM BLEMBEM</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <style>
            #ch:checked ~ .content .my-8,
            #ch:checked ~ .content .justify-end,
            #ch:checked ~ #toggleButtonmore {
                display: none;
            }

            #ch:checked ~ .content .my-8.hidden,
            #ch:checked ~ .content .flex.justify-end {
                display: block;
            }

            #ch:checked ~ .content #toggleButtonless {
                display: flex;
                justify-content: flex-end;
            }
        </style>

        <!-- Scripts -->
        <script type="text/javascript" src="{{ asset('extras/jquery.min.1.7.js') }}"></script>
        <script type="text/javascript" src="{{ asset('extras/modernizr.2.5.3.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('lib/hash.js') }}"></script>
        <!-- Flipbook StyleSheets -->
        <link href="http://www.yoursite.com/dflip/css/dflip.min.css" rel="stylesheet" type="text/css">
        <!-- themify-icons.min.css is not required in version 2.0 and above -->
        <link href="http://www.yoursite.com/dflip/css/themify-icons.min.css" rel="stylesheet" type="text/css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            {{-- <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            <!-- Page Content -->
            <main class="lg:px-40">
                {{ $slot }}
            </main>

            @include('layouts.footer');
        </div>

        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    </body>
</html>
