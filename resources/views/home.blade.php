<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SIAKAD MDNU</title>

    <!-- Browser tab logo -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">
    <!--HEADER-->
    <nav id="header" class="w-full z-30 top-0 bg-white border-b-2">
        <div class="w-full mx-auto flex flex-wrap items-center justify-between">
            <div class="flex sm:space-x-4 space-x-1 py-2">
                <!--LOGO-->
                <div class="object-left">
                    <a href="/"><img src="{{ ('images/logo.png ') }}" class="sm:w-24 w-16"></a>
                </div>
                <!--NAME-->
                <div class="text-center font-bold font-sans text-yellow-800 mt-2">
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
    <!--KONTEN-->
    <div class="carousel relative container mx-auto" style="max-width:1600px;">
        <div class="carousel-inner relative overflow-hidden w-full">
            <!--Slide 1-->
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('images/slide1.jpg');">
                    <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-black bg-opacity-40">
                        <div class="container mx-auto">
                            <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                                <p class="text-white text-2xl my-4">Selamat Datang di Sistem Informasi Akademik Madrasah Diniyyah Nurul Ummah Yogyakarta</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <label for="carousel-3" class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-2" class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>
            <!--Slide 2-->
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0 bg-cover bg-right" style="height:50vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('images/slide2.jpg');">
                    <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-black bg-opacity-40">
                        <div class="container mx-auto">
                            <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                                <p class="text-white text-2xl my-4">"Mabruk, Semoga Barokah. Mondok Ngaji, Jama'ah, Muthola'ah"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <label for="carousel-1" class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-3" class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>
            <!--Slide 3-->
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('images/slide3.jpg');">
                    <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-black bg-opacity-40">
                        <div class="container mx-auto">
                            <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                                <p class="text-white text-2xl my-3">"Ngandelo aku, nek pancen alim tenan, wong sing do pengen nggolek mantu santri, utowo santri putri ngendi wae mesti bakal ngantri."</p>
                                <p class="text-white text-xl mb-3">- Al-Maghfurlah KH. Asyhari Marzuqi"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <label for="carousel-2" class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-1" class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>
            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                <li class="inline-block mr-3">
                    <label for="carousel-1" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-2" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-3" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- LOGIN, TENTANG, ALAMAT -->
    <section class="bg-white py-8">
        <!-- LOGIN -->
        <div class="w-full container mx-auto flex items-center justify-between">
            <div class="flex-1 mx-8 py-8">
                <div class="text-center">
                    <a class="sm:text-xl text-base font-bold hover:no-underline">Masuk untuk melihat informasi akademik anda</a><br>
                </div>
                <div class=" text-center text-white text-xl py-4">
                    <a href="{{ route('administrator.login') }}" class="button sm:text-sm text-xs transform hover:scale-110 hover:no-underline motion-reduce:transform-none bg-blue-800 rounded sm:py-3 py-2.5 sm:px-4 px-2.5">Masuk</a>
                </div>
            </div>
        </div>
        <!-- <div class="w-full container mx-auto flex items-center justify-between">
            <div class="flex-1 mx-8 py-8">
                <div class="text-center">
                    <a class="sm:text-xl text-base font-bold hover:no-underline">Masuk untuk melihat informasi akademik anda</a><br>
                </div>
                <div class=" text-center text-white text-xl py-4">
                    <a href="{{ url('login/santri') }}" class="button sm:text-sm text-xs transform hover:scale-110 hover:no-underline motion-reduce:transform-none bg-blue-800 rounded sm:py-3 py-2.5 sm:px-4 px-2.5">Masuk Santri</a>
                    <a href="{{ url('login/ustadz') }}" class="button sm:text-sm text-xs transform hover:scale-110 hover:no-underline motion-reduce:transform-none bg-blue-800 rounded sm:py-3 py-2.5 sm:px-4 px-2.5">Masuk Ustadz</a>
                </div>
            </div>
        </div> -->
        <div class="container py-8 px-6 mx-auto">
            <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl mb-8">Tentang MDNU</a>
            <p class="py-4 text-justify">MDNU atau Madrasah Diniyyah Nurul Ummah adalah satuan pendidikan keagamaan yang
                menyelenggarakan pendidikan Agama Islam baik yang terorganisir pada
                lembaga-lembaga pendidikan keagamaan yang berada di dalam pondok
                pesantren maupun yang di luar pondok pesantren (Buklet Madin, 2003).
                Madrasah Diniyah Nurul Ummah (MDNU) merupakan salah satu Unit
                Kegiatan yang berada di bawah naungan Pondok Pesantren Nurul Ummah
                yang bertanggung jawab terhadap sistem pendidikan keagamaannya.
                Madrasah tersebut didirikan pada tanggal 24 Februari 1991, kemudian
                mendapat pengakuan resmi dari Kanwil Departemen Agama Wilayah
                Propinsi DIY, berupa Piagam Madrasah Diniyah No. 91199, tertanggal 27
                Agustus 1991.
            </p>
        </div>
        <!-- ALAMAT -->
        <div class="container py-8 px-6 mx-auto">
            <div class="flex space-x-10 mx-auto">
                <div class="w-full mx-auto flex flex-wrap">
                    <div class="text-left">
                        <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 sm:text-xl text-base">Kunjungi Kami</a>
                        <p class="py-4 sm:text-base text-sm">Anda dapat menemukan kami di:</p>
                        <p class="text-blue-900 sm:text-base text-sm">Jl. Raden Ronggo KG II No.982, Prenggan, Kec. Kotagede, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55172.</p>
                    </div>
                    <div class="py-10">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.6604869675466!2d110.3934521145091!3d-7.825712579895561!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5710b624c18d%3A0x8d5f089b87af3c59!2sPondok%20Pesantren%20Nurul%20Ummah!5e0!3m2!1sen!2sid!4v1620766907033!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
</body>
</html>