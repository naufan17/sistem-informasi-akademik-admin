<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIAKAD MDNU</title>
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">

    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

    <style>
        .work-sans {
            font-family: 'Work Sans', sans-serif;
        }

        #menu-toggle:checked+#menu {
            display: block;
        }

        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }

        .hover\:grow:hover {
            transform: scale(1.02);
        }

        .carousel-open:checked+.carousel-item {
            position: static;
            opacity: 100;
        }

        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }

        #carousel-1:checked~.control-1,
        #carousel-2:checked~.control-2,
        #carousel-3:checked~.control-3 {
            display: block;
        }

        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }

        #carousel-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #000;
            /*Set to match the Tailwind colour you want the active one to be */
        }
    </style>
</head>

<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">

    <!--HEADER-->
    <nav id="header" class="w-full z-30 top-0 py-1">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
            <div class="flex space-x-4 py-5">

                <!--LOGO-->
                <div class="object-left">
                    <img src="{{ ('images/logo.png ') }}" class="w-24">
                </div>

                <!--NAME-->
                <div class="text-center font-sans font-bold text-yellow-800 mt-3">
                    <a class="text-base">MADRASAH DINIYYAH<br></a>
                    <a class="text-2xl">NURUL UMMAH<br></a>
                    <a class="text-base tracking-widest">YOGYAKARTA</a>
                </div>
            </div>

            <div class="font-bold text-yellow-600 text-right">
                <a class="text-xl">SISTEM INFORMASI AKADEMIK <br></a>
                <a class="text-base tracking-widest">M D N U</a>
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
                    <a class="text-lg font-bold">Masuk untuk melihat informasi akademik</a><br>
                </div>
                <div class=" text-center text-white text-xl py-4">
                    <button class="transform hover:scale-110 motion-reduce:transform-none bg-blue-600 p-3 mt-1 rounded py-3 px-8" href="#">Masuk</button>
                </div>
            </div>
        </div>
        
        <!-- LOGIN
        @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        -->
        
        <div class="container py-8 px-6 mx-auto">
            <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl mb-8">Tentang MDNU</a>
            <p class="py-4">MDNU atau Madrasah Diniyyah Nurul Ummah adalah Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad magni cumque, enim deleniti molestiae, ipsum iste suscipit itaque eius aliquam officiis ipsam commodi autem delectus, blanditiis omnis quos reiciendis. In.</p>
        </div>

        <!-- ALAMAT -->
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
            <div class="flex space-x-10 py-5 mx-auto">
                <div class="text-left pl-5 mb-8">
                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl">Kunjungi Kami</a>
                    <p class="py-4">Anda dapat menemukan kami di:</p>
                    <p class="text-blue-900">Jl. Raden Ronggo KG II No.982, Prenggan, Kec. Kotagede, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55172.</p>
                </div>
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.6604869675466!2d110.3934521145091!3d-7.825712579895561!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5710b624c18d%3A0x8d5f089b87af3c59!2sPondok%20Pesantren%20Nurul%20Ummah!5e0!3m2!1sen!2sid!4v1620766907033!5m2!1sen!2sid" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="container mx-auto bg-white py-8 border-t border-gray-400">
        <div class="container flex px-3 py-8 ">
            <div class="w-full mx-auto flex flex-wrap">
                <div class="flex w-full lg:w-1/2 ">
                    <div class="px-3 md:px-0">
                        <h3 class="font-bold text-gray-900">Madrasah Diniyyah Pondok Pesantren Nurul Ummah Yogyakarta</h3>
                        <a class="inline-block no-underline hover:text-black hover:underline pt-5" href="tel:+62 857 2565 5593">Telp. 0857 2565 5593</a><br>
                        <a class="inline-block no-underline hover:text-black hover:underline" href="https://web.whatsapp.com/send?phone=6285725655593&text=Assalamualaikum%20Admin">WhatsApp. 0857 2565 5593</a><br>
                        <a class="inline-block no-underline hover:text-black hover:underline" href="mailto:admisi.nurma@gmail.com">E-mail. admisi.nurma@gmail.com</a>
                    </div>
                </div>
                <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right">
                    <div class="px-3 md:px-0">
                        <h3 class="font-bold text-gray-900">Media Sosial</h3>
                        <ul class="list-reset items-center pt-3">
                            <li>
                                <a class="inline-block no-underline hover:text-black hover:underline py-1" href="https://instagram.com/nurulummahyk?igshid=1m74irp80dl0v">Instagram</a>
                                <a class="inline-block no-underline hover:text-black hover:underline" href="https://www.youtube.com/channel/UCYQ8dFPzAkFF0WbS0r-IDaw">YouTube</a>
                                <a class="inline-block no-underline hover:text-black hover:underline" href="https://nurulummah.com/">Website</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>