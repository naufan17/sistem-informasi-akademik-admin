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
            <nav id="header" class="w-full z-30 top-0 bg-white border-b-2 pb-3">
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
                            <a href="{{ url('administrator/data-admin') }}" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-8">
                                
                                Data Admin
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('administrator/data-mapel') }}" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-8">
                                
                                Mata Pelajaran
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('administrator/data-ustadz') }}" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-8">
                                
                                Ustadz
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('administrator/data-santri') }}" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-8">
                                
                                Santri
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-8">
                                
                                Input Kelas
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-8">
                                
                                Input MP
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-8">
                                
                                Input Nilai
                            </a>
                        </div>
                        <button class="w-full hover:bg-blue-600 cta-btn font-semibold justify-center ">
                            <a class="text-gray-800 hover:text-white items-center py-4 pl-8 flex item-center" href="{{ route('administrator.logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('administrator.logout') }}" method="POST" class="d-none">
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
            <footer class="container mx-auto bg-white pt-8 border-t border-gray-400">
                <div class="container flex px-6 py-8 ">
                    <div class="w-full mx-auto flex flex-wrap">
                        <div class="text-left flex w-full lg:w-1/2 ">
                            <div class="px-3 md:px-0">
                                <h3 class="font-bold text-gray-900">Madrasah Diniyyah Pondok Pesantren Nurul Ummah Yogyakarta</h3>
                                <a class="inline-block no-underline hover:text-black hover:underline pt-4" href="tel:+62 857 2565 5593">Telp. 0857 2565 5593</a><br>
                                <a class="inline-block no-underline hover:text-black hover:underline" href="https://web.whatsapp.com/send?phone=6285725655593&text=Assalamualaikum%20Admin">WhatsApp. 0857 2565 5593</a><br>
                                <a class="inline-block no-underline hover:text-black hover:underline" href="mailto:admisi.nurma@gmail.com">E-mail. admisi.nurma@gmail.com</a>
                            </div>
                        </div>
                        <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right">
                            <div class="px-3 md:px-0">
                                <h3 class="font-bold text-gray-900">Media Sosial</h3>
                                <ul class="list-reset items-center pt-4">
                                    <li>
                                        <a class="inline-block no-underline hover:text-black hover:underline py-1" href="https://instagram.com/nurulummahyk?igshid=1m74irp80dl0v">Instagram</a>
                                        <a class="inline-block no-underline hover:text-black hover:underline" href="https://www.youtube.com/channel/UCYQ8dFPzAkFF0WbS0r-IDaw">YouTube</a>
                                        <a class="inline-block no-underline hover:text-black hover:underline" href="https://www.youtube.com/channel/UCYQ8dFPzAkFF0WbS0r-IDaw">Facebook</a><br>
                                        <a class="inline-block no-underline hover:text-black hover:underline" href="https://nurulummah.com/">Twitter</a>
                                        <a class="inline-block no-underline hover:text-black hover:underline" href="https://nurulummah.com/">Website</a>
                                    </li>
                                </ul>
                            </div>
                        </div> 
                    </div>
                </div>
            </footer>
        </main>
    </div>
</body>
</html>
