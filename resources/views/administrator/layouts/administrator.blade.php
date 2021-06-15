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
            <!-- MENU -->
            <div class="bg-gray-100 font-family-karla flex">
                <aside class="relative bg-gray-100 h-screen w-64 hidden sm:block ">
                    <nav class="font-semibold pt-3">
                        <div class="text-gray-900">
                            <div class="pt-6 px-6 mb-8">
                                <div class="text-center bg-white rounded-lg shadow-xl">
                                    <div class="px-6 py-6">
                                        <img src="https://source.unsplash.com/random/350x350" alt="random image" class="object-center rounded-full">
                                    </div>
                                    <h4 class="pb-6 text-l font-semibold leading-tight truncate">Hai {{ Auth::guard('administrator')->user()->name }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-gray-800 group-hover:text-white flex items-center py-4 pl-6" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('administrator')->user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('administrator.logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('administrator.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="/data-admin" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                                <i class="fas fa-id-card-alt mr-3"></i>
                                Data Admin
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="/data-mapel" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                                <i class="fas fa-book-open mr-3"></i>
                                Mata Pelajaran
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="nilai.html" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                                <i class="fas fa-star-half-alt mr-3"></i>
                                Nilai
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="riwayat-nilai.html" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                                <i class="fas fa-star mr-3"></i>
                                Riwayat Nilai
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="/data-ustadz" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                                <i class="fas fa-address-book mr-3"></i>
                                Ustadz
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="/data-santri" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                                <i class="fas fa-address-book mr-3"></i>
                                Santri
                            </a>
                        </div>
                    </nav>
                    <a href="#" class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Log Out
                    </a>
                </aside>
                <!-- Page Content -->
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
