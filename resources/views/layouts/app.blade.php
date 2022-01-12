<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <link rel="stylesheet" href="{{ asset('css/loading.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
        integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.12/jquery.validate.unobtrusive.min.js"
        integrity="sha512-o6XqxgrUsKmchwy9G5VRNWSSxTS4Urr4loO6/0hYdpWmFUfHqGzawGxeQGMDqYzxjY9sbktPbNlkIQJWagVZQg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/password.js') }}"></script>
    <script src=" {{ asset('js/loading.js') }} "></script>


    {{-- Scripts Bootstrap --}}



</head>

<body class="font-sans antialiased">
    {{-- Loading Animation --}}
    <div class="loader-wrapper h-full ">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <div class="min-h-screen bg-white">

        <!-- sweet alert -->
        @include('sweetalert::alert')

        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class=" pt-1 pb-1">
            <div class="">
                {{ $header }}
            </div>

        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>


        @if (Auth::user()->hasRole('teacher'))
            @include('layouts.Footer')
        @elseif(Auth::user()->hasRole('parent'))
            @include('layouts.Footer')
        @endif





    </div>

    @auth
        <script src="{{ asset('js/enable-push.js') }}" defer></script>
    @endauth



</body>
