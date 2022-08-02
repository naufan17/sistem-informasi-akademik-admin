<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>SIAKAD MDNU</title>
    
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}"/>
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="work-sans leading-normal text-base tracking-normal">
    <div id="app">
        <main class="py-1">
            <!-- HEADER -->
            <nav id="header" class="w-full z-30 top-0 bg-white border-b-2">
                <div class="w-full mx-auto flex flex-wrap items-center justify-between">
                    <div class="flex sm:space-x-4 space-x-1 py-2">
                        <!--LOGO-->
                        <div class="object-left">
                            <a href="/"><img src="{{ URL::to('/') }}/images/logo.png" class="sm:w-24 w-16"></a>
                        </div>
                        <!--NAME-->
                        <div class="text-center font-bold text-yellow-800 mt-2">
                            <p class="sm:text-base text-sm sm:tracking-normal tracking-tighter">MADRASAH DINIYYAH</p>
                            <p class="sm:text-xl text-base font-bold sm:tracking-normal tracking-tighter">NURUL UMMAH</p>
                            <p class="sm:text-base text-sm tracking-tight sm:tracking-wide">YOGYAKARTA</p>
                        </div>
                    </div>
                    <div class="font-bold text-yellow-600 text-right">
                        <p class="sm:text-lg text-sm sm:tracking-normal tracking-tighter">SISTEM INFORMASI AKADEMIK</p>
                        <p class="sm:text-base text-sm tracking-tight sm:tracking-wide">M D N U</p>
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
            <!-- FOOTER -->
            <footer class="mx-auto bg-white py-8 border-t border-gray-400">
                <div class="container flex px-6 py-8 ">
                    <div class="w-full mx-auto flex flex-wrap">
                        <div class="text-left flex w-full lg:w-1/2 ">
                            <div class="px-3 md:px-0">
                                <h3 class="font-bold sm:text-xl text-base text-gray-900">Madrasah Diniyyah Pondok Pesantren Nurul Ummah Yogyakarta</h3>
                                <a class="inline-block no-underline hover:text-black sm:text-base text-sm hover:underline pt-4" href="tel:+62 857 2565 5593">Telp. 0857 2565 5593</a><br>
                                <a class="inline-block no-underline hover:text-black sm:text-base text-sm hover:underline" href="https://web.whatsapp.com/send?phone=6285725655593&text=Assalamualaikum%20Admin">WhatsApp. 0857 2565 5593</a><br>
                                <a class="inline-block no-underline hover:text-black sm:text-base text-sm hover:underline" href="mailto:admisi.nurma@gmail.com">E-mail. admisi.nurma@gmail.com</a>
                            </div>
                        </div>
                        <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right">
                            <div class="px-3 md:px-0 lg:mt-0 mt-8">
                                <h3 class="font-bold sm:text-xl text-base text-gray-900">Media Sosial</h3>
                                <ul class="list-reset items-center pt-4">
                                    <li>
                                        <a class="inline-block no-underline hover:text-black sm:text-base text-sm hover:underline py-1" href="https://instagram.com/nurulummahyk?igshid=1m74irp80dl0v">Instagram</a>
                                        <a class="inline-block no-underline hover:text-black sm:text-base text-sm hover:underline" href="https://www.youtube.com/channel/UCYQ8dFPzAkFF0WbS0r-IDaw">YouTube</a>
                                        <a class="inline-block no-underline hover:text-black sm:text-base text-sm hover:underline" href="https://www.youtube.com/channel/UCYQ8dFPzAkFF0WbS0r-IDaw">Facebook</a><br>
                                        <a class="inline-block no-underline hover:text-black sm:text-base text-sm hover:underline" href="https://nurulummah.com/">Twitter</a>
                                        <a class="inline-block no-underline hover:text-black sm:text-base text-sm hover:underline" href="https://nurulummah.com/">Website</a>
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
