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
            input[type="password"].not-matching {
                border-color: #EF4444;
            }
        </style>
        
        <!-- Scripts -->
        <!-- Flipbook StyleSheets -->
        <link href="http://www.yoursite.com/dflip/css/dflip.min.css" rel="stylesheet" type="text/css">
        <!-- themify-icons.min.css is not required in version 2.0 and above -->
        <link href="http://www.yoursite.com/dflip/css/themify-icons.min.css" rel="stylesheet" type="text/css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-cover bg-center" style="background-image: url('/asset/wallpaper.jpg')">
      <div class="min-h-screen m-2 flex items-center justify-center">
        <div class="max-w-md w-full mx-auto px-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
          <div class="flex justify-center items-center my-8">
            <a href="/">
                <img class="h-16" src="https://flowbite.s3.amazonaws.com/logo.svg" alt="Logo">
            </a>        
          </div>
          <div class="py-8">
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
        
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
        
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
        
                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Email</label>
                    <input type="text" id="email" name="email" class="w-full px-3 py-2 text-gray-700 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-300 dark:text-white border rounded-lg focus:outline-none focus:border-blue-500" placeholder="Enter your email" value="{{ old('email') }}" required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="flex items-center justify-between mt-8">
                    <button class="w-full px-4 py-2 rounded-lg bg-blue-500 text-white font-semibold hover:bg-blue-600 focus:outline-none" type="submit">Reset Email</button>
                </div>
                <div class="flex items-center justify-start mt-4 dark:text-white">
                    <a href="/login">login</a>
                </div>
            </form>      
          </div>
        </div>
      </div>
    </body>
  </html>
