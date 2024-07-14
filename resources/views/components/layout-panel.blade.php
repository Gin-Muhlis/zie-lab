<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Zie Lab</title>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    {{-- bladewind component --}}
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />

    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    {{-- font google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body class="bg-primary-background overflow-x-hidden font-inter">
    <div class="w-full min-h-screen md:flex md:items-start md:justify-center border border-red-500">
        <x-sidebar></x-sidebar>
        <div class="w-full relative">
            <div class="p-5 md:hidden">
                <x-bladewind::icon name="bars-3" class="!h-8 !w-8 text-primary cursor-pointer open-sidebar" />
            </div>
            {{ $slot }}
        </div>
    </div>

    @stack('scripts')

    <script>
        $(function() {
            $('.open-sidebar').on('click', function() {
                $('.sidebar').removeClass('-left-56').addClass('left-0')
            })

            $('.close-sidebar').on('click', function() {
                $('.sidebar').removeClass('left-0').addClass('-left-56')
            })
        })
    </script>
</body>