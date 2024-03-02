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
            <form method="POST" action="/login">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Email</label>
                    <input type="text" id="email" name="email" class="w-full px-3 py-2 text-gray-700 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-300 dark:text-white border rounded-lg focus:outline-none focus:border-blue-500" placeholder="Enter your email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-10">
                    <label for="password" class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Password</label>
                    <input type="password" name="password" id="password" class="w-full px-3 py-2 text-gray-700 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-300 dark:text-white border rounded-lg focus:outline-none focus:border-blue-500" placeholder="Enter your password" required>
                    @error('email')
                    <p id="filled_error_help" class="mt-4 text-xs text-red-600 dark:text-red-400">Email dan Password tidak sesuai !</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button class="w-full px-4 py-2 rounded-lg bg-blue-500 text-white font-semibold hover:bg-blue-600 focus:outline-none" type="submit">Login</button>
                </div>
                <div class="flex items-center justify-end mt-4 dark:text-white">
                    <a href="/forgot-password">Forgot Password ?</a>
                </div>
            </form>      
          </div>
        </div>
      </div>
    </body>
  </html>