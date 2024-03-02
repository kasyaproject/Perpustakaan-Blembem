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
        
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
        
            <form method="POST" action="{{ route('password.store') }}">
                @csrf
        
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
        
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" readonly />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" disabled/>
                </div>
        
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
        
                <div class="flex items-center justify-end mt-4">
                    <button id="button" class="w-full px-4 py-2 rounded-lg bg-blue-500 text-white font-semibold hover:bg-blue-600 focus:outline-none" type="submit">Confirm</button>
                </div>
            </form>     
          </div>
        </div>
      </div>
    </body>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordField = document.getElementById('password');
            const confirmPasswordField = document.getElementById('password_confirmation');
            const errorMessage = document.getElementById('pesanPassword');
            const confirmerrorMessage = document.getElementById('pesan');
            const submitButton = document.getElementById('button');

            passwordField.addEventListener('input', function () { // Check if the password is less than 8 characters 
                if (passwordField.value.length < 8) { 
                    // Add a red border 
                    passwordField.classList.add('text-red-500');
                    passwordField.classList.add('dark:text-red-500');
                    passwordField.classList.add('focus:ring-red-500');
                    passwordField.classList.add('dark:focus:ring-red-500');
                    passwordField.classList.add('border-red-500'); 
                    passwordField.classList.add('dark:border-red-500'); 
                    errorMessage.classList.remove('hidden');
                } else { // Remove the red border 
                    passwordField.classList.remove('text-red-500');
                    passwordField.classList.remove('dark:text-red-500');
                    passwordField.classList.remove('focus:ring-red-500');
                    passwordField.classList.add('dark:focus:ring-red-500');
                    passwordField.classList.remove('border-red-500'); 
                    passwordField.classList.remove('dark:border-red-500'); 
                    errorMessage.classList.add('hidden');
                } 
            });

            confirmPasswordField.addEventListener('input', function () {
                if (confirmPasswordField.value !== passwordField.value) {
                    confirmPasswordField.classList.add('dark:text-red-500');
                    confirmPasswordField.classList.add('focus:ring-red-500');
                    confirmPasswordField.classList.add('dark:border-red-500'); 
                    confirmerrorMessage.classList.remove('hidden');
                    submitButton.disabled = true;
                } else {
                    confirmPasswordField.classList.remove('dark:text-red-500');
                    confirmPasswordField.classList.remove('focus:ring-red-500');
                    confirmPasswordField.classList.remove('dark:border-red-500'); 
                    confirmerrorMessage.classList.add('hidden');
                    submitButton.disabled = false;
                }
            });
        });
    </script>
  </html>
