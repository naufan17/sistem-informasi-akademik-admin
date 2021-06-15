<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet"

</head>
<body class="work-sans leading-normal text-base tracking-normal">
    <div id="app">
        <main class="py-4">
            <!-- HEADER -->
            <nav id="header" class="w-full z-30 top-0 bg-white border-b-2">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
                    <div class="flex space-x-4 py-2">
                        <!--LOGO-->
                        <div class="object-left">
                            <img src="images/logo.png" class="w-24">
                        </div>
                        <!--NAME-->
                        <div class="text-center font-bold font-sans text-yellow-800 mt-2">
                            <a class="text-base">MADRASAH DINIYYAH</a><br>
                            <a class="text-2xl font-bold">NURUL UMMAH</a><br>
                            <a class="text-base tracking-widest">YOGYAKARTA</a>
                        </div>
                    </div>
                    <div class="font-bold text-yellow-600 text-right">
                        <a class="text-xl">SISTEM INFORMASI AKADEMIK <br></a>
                        <a class="text-base tracking-widest">M D N U</a>
                    </div>
                </div>
            </nav>
            <!-- Page Content -->
            <div class="bg-gray-100 font-family-karla flex">
                <div class="w-full flex flex-col h-screen overflow-y-hidden">
                    <div class="overflow-x-hidden">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
