<!-- @extends('administrator.layouts.app') -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash Admin</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }
    </style>
</head>

<body class="work-sans leading-normal text-base tracking-normal">

    <nav id="header" class="w-full z-30 top-0 bg-white border-b-2">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
            <div class="flex space-x-4 py-5">

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

    <div class="bg-gray-100 font-family-karla flex">

        <aside class="relative bg-gray-100 h-screen w-64 hidden sm:block ">

            <nav class="font-semibold pt-3">

                <div class="text-gray-900">
                    <div class="pt-6 px-6 mb-8">
                        <div class="text-center bg-white rounded-lg shadow-xl">
                            <div class="px-6 py-6">
                                <img src="https://source.unsplash.com/random/350x350" alt="random image" class="object-center rounded-full">
                            </div>
                            <h4 class="pb-6 text-l font-semibold leading-tight truncate">Hai Admin!</h4>
                        </div>
                    </div>
                </div>

                <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                    <a href="data-admin.html" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                        <i class="fas fa-id-card-alt mr-3"></i>
                        Data Admin
                    </a>
                </div>

                <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                    <a href="data-mapel.html" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
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
                    <a href="data-ustadz.html" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                        <i class="fas fa-address-book mr-3"></i>
                        Ustadz
                    </a>
                </div>

                <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                    <a href="data-santri.html" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
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

        <div class="w-full flex flex-col h-screen overflow-y-hidden">
            <!-- Mobile Header & Nav -->
            <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
                <div class="flex items-center justify-between">
                    <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                    <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                        <i x-show="!isOpen" class="fas fa-bars"></i>
                        <i x-show="isOpen" class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Dropdown Nav -->
                <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                    <a href="index.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                    <a href="blank.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-sticky-note mr-3"></i>
                        Blank Page
                    </a>
                    <a href="tables.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-table mr-3"></i>
                        Tables
                    </a>
                    <a href="forms.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-align-left mr-3"></i>
                        Forms
                    </a>
                    <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-tablet-alt mr-3"></i>
                        Tabbed Content
                    </a>
                    <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-calendar mr-3"></i>
                        Calendar
                    </a>
                    <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-cogs mr-3"></i>
                        Support
                    </a>
                    <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-user mr-3"></i>
                        My Account
                    </a>
                    <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Sign Out
                    </a>
                    <button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                        <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
                    </button>
                </nav>
                <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
            </header>

            <div class="overflow-x-hidden">
                <main class="pt-6 px-6">
                    <div class="flex px-24 py-8">
                        <div class="flex-1"></div>

                        <div class="flex-1 text-center p-8">
                            <p class="text-xl text-gray-800">SELAMAT DATANG DI</p>
                            <p class="text-4xl text-gray-800 pb-6">SIAKAD MDNU</p>
                            <img src="images/dasbor.png" class="py-8">
                            
                        </div>

                        <div class="flex-1"></div>

                    </div>
                    <!--
                    <div class="flex flex-wrap mt-6">
                        <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
                            <p class="text-xl pb-3 flex items-center">
                                <i class="fas fa-plus mr-3"></i> Monthly Reports
                            </p>
                            <div class="p-6 bg-white">
                                <canvas id="chartOne" width="400" height="200"></canvas>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
                            <p class="text-xl pb-3 flex items-center">
                                <i class="fas fa-check mr-3"></i> Resolved Reports
                            </p>
                            <div class="p-6 bg-white">
                                <canvas id="chartTwo" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="w-full mt-12">
                        <p class="text-xl pb-3 flex items-center">
                            <i class="fas fa-list mr-3"></i> Latest Reports
                        </p>
                        <div class="bg-white overflow-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Last name</th>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    <tr>
                                        <td class="w-1/3 text-left py-3 px-4">Lian</td>
                                        <td class="w-1/3 text-left py-3 px-4">Smith</td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="w-1/3 text-left py-3 px-4">Emma</td>
                                        <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                    <tr>
                                        <td class="w-1/3 text-left py-3 px-4">Oliver</td>
                                        <td class="w-1/3 text-left py-3 px-4">Williams</td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="w-1/3 text-left py-3 px-4">Isabella</td>
                                        <td class="w-1/3 text-left py-3 px-4">Brown</td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                    <tr>
                                        <td class="w-1/3 text-left py-3 px-4">Lian</td>
                                        <td class="w-1/3 text-left py-3 px-4">Smith</td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="w-1/3 text-left py-3 px-4">Emma</td>
                                        <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                    <tr>
                                        <td class="w-1/3 text-left py-3 px-4">Oliver</td>
                                        <td class="w-1/3 text-left py-3 px-4">Williams</td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="w-1/3 text-left py-3 px-4">Isabella</td>
                                        <td class="w-1/3 text-left py-3 px-4">Brown</td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
    -->
                    <!-- FOOTER -->
                    <footer class="container mx-auto bg-white py-8 border-t border-gray-400">
                        <div class="container flex px-6 py-8 ">
                            <div class="w-full mx-auto flex flex-wrap">
                                <div class="text-left flex w-full lg:w-1/2 ">
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
            </div>
        </div>
        </main>
    </div>


</body>

</html>

<!--
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
@endsection
-->
