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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> <!-- Nav Dropdown -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- fontawesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="work-sans leading-normal text-base tracking-normal">
    <div id="app">
        <main>

            <!-- HEADER -->
            <nav id="header" class="w-full z-30 top-0 bg-white border-b-2 pb-3">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
                    <div class="flex space-x-4 py-2">
                        <!--LOGO-->
                        <div class="object-left">
                            <img src="https://drive.google.com/file/d/1cmaYv3B2petkuK-dczI_UnpzHn9Bx1Qu/view?usp=sharing" class="w-24">
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
                                <div class="text-center bg-white rounded-lg shadow-lg">
                                    <!--
                                    <div class="px-6 py-6">
                                        <img src="https://source.unsplash.com/random/350x350" alt="random image" class="object-center rounded-full">
                                    </div>
                                -->
                                    <h4 class="py-6 text-l font-semibold leading-tight truncate">Hai {{ Auth::guard('administrator')->user()->name }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('administrator/data-admin') }}" class="text-gray-800 group-hover:text-white flex items-center py-3 pl-8">
                                Data Admin
                            </a>
                        </div>
                        <!--
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('administrator/data-mapel') }}" class="text-gray-800 group-hover:text-white flex items-center py-3 pl-8">
                                Mata Pelajaran
                            </a>
                        </div>
                        -->
                        <div @click.away="open = false" class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent" x-data="{ open: false }">
                            <button @click="open = !open" class="flex flex-row text-gray-800 group-hover:text-white flex items-center py-3 pl-8">
                                <span class="w-full text-left font-bold">List Data</span>
                                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="object-right w-full h-4">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-md">
                                <div class="px-2 py-2 bg-white rounded-md shadow">
                                    <a class="block px-4 py-3 mt-2 text-sm font-semibold rounded-lg hover:bg-blue-600 hover:text-white hover:shadow-lg hover:border-transparent" href="{{ url('administrator/data-ustadz') }}">Ustadz</a>
                                    <a class="block px-4 py-3 mt-2 text-sm font-semibold rounded-lg hover:bg-blue-600 hover:text-white hover:shadow-lg hover:border-transparent" href="{{ url('administrator/data-santri') }}">Santri</a>
                                </div>
                            </div>
                        </div>
                        <div @click.away="open = false" class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent" x-data="{ open: false }">
                            <button @click="open = !open" class="flex flex-row text-gray-800 group-hover:text-white flex items-center py-3 pl-8">
                                <span class="w-full text-left font-bold">Pembelajaran</span>
                                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="object-right w-full h-4 mr-4">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-md">
                                <div class="px-2 py-2 bg-white rounded-md shadow">
                                    <a class="block px-4 py-3 mt-2 text-sm font-semibold rounded-lg hover:bg-blue-600 hover:text-white hover:shadow-lg hover:border-transparent" href="{{ url('administrator/data-tingkat') }}">Tingkat</a>
                                    <a class="block px-4 py-3 mt-2 text-sm font-semibold rounded-lg hover:bg-blue-600 hover:text-white hover:shadow-lg hover:border-transparent" href="{{ url('administrator/data-jadwal') }}">Jadwal</a>
                                    <a class="block px-4 py-3 mt-2 text-sm font-semibold rounded-lg hover:bg-blue-600 hover:text-white hover:shadow-lg hover:border-transparent" href="{{ url('administrator/data-mapel') }}">Mata Pelajaran</a>
                                    <a class="block px-4 py-3 mt-2 text-sm font-semibold rounded-lg hover:bg-blue-600 hover:text-white hover:shadow-lg hover:border-transparent" href="{{ url('administrator/data-kelas') }}">Kelas</a>
                                    <a class="block px-4 py-3 mt-2 text-sm font-semibold rounded-lg hover:bg-blue-600 hover:text-white hover:shadow-lg hover:border-transparent" href="{{ url('administrator/data-nilai') }}">Nilai</a>
                                    <a class="block px-4 py-3 mt-2 text-sm font-semibold rounded-lg hover:bg-blue-600 hover:text-white hover:shadow-lg hover:border-transparent" href="{{ url('administrator/data-absensi') }}">Absensi</a>
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('administrator/data-ustadz') }}" class="text-gray-800 group-hover:text-white flex items-center py-3 pl-8">
                                Ustadz
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('administrator/data-santri') }}" class="text-gray-800 group-hover:text-white flex items-center py-3 pl-8">  
                                Santri
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('administrator/data-tingkat') }}" class="text-gray-800 group-hover:text-white flex items-center py-3 pl-8">     
                                Tingkat
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('administrator/data-kelas') }}" class="text-gray-800 group-hover:text-white flex items-center py-3 pl-8"> 
                                Kelas
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('administrator/data-jadwal') }}" class="text-gray-800 group-hover:text-white flex items-center py-3 pl-8">     
                                Jadwal
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('administrator/data-nilai') }}" class="text-gray-800 group-hover:text-white flex items-center py-3 pl-8">     
                                Nilai
                            </a>
                        </div>
                        -->
                        <button class="w-full hover:bg-blue-600 cta-btn font-semibold justify-center ">
                            <a class="text-gray-800 hover:text-white items-center py-3 pl-8 flex item-center" href="{{ route('administrator.logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('administrator.logout') }}"  method="POST" class="d-none" >
                                @csrf
                            </form>
                        </button>
                    </nav>
                </aside>
                <!-- Page Content -->
                <div class="w-full flex flex-col h-screen overflow-y-hidden">
                    <div class="overflow-x-hidden">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- FOOTER -->
            <footer class="w-full bg-white p-8 border-t border-gray-400">
                <div class="px-3">
                    <h3 class="text-center font-medium text-gray-900">Madrasah Diniyyah Pondok Pesantren Nurul Ummah Yogyakarta - 2021</h3>
                </div>
            </footer>
        </main>
    </div>
</body>

</html>