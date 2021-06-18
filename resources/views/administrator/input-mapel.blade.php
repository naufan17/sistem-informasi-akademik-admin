<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input mapel</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

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

        <aside class="relative h-screen w-64 hidden sm:block">

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
                    <a href="nilai.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
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
            </header>

            <div class="overflow-x-hidden">
                <main class="pt-6 px-6">
                    <h1 class="text-3xl text-black pb-2 mt-2">Mata Pelajaran</h1>

                    <div class="bg-white rounded-lg shadow-md p-8 my-8">

                        <form id="form" novalidate>
                            <div class="pb-8">
                                <div class="p-4">
                                    <button class="flex items-center border border-teal-500 text-teal-500 block rounded-sm py-3 px-6 w-32 hover:bg-blue-700 hover:text-white">
                                        <svg class="h-5 w-5 mr-3 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                                            <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z">
                                            </path>
                                        </svg>
                                        Back
                                    </button>
                                </div>

                                <div class="p-4">
                                    <h2 class="text-2xl ">
                                        Tambah Mata Pelajaran
                                    </h2>

                                </div>

                                <div class="pt-8">
                                    <p class="self-center bg-gray-50 py-4 px-4">
                                        Data Mata Pelajaran
                                    </p>
                                </div>

                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                                    <p class="self-center text-gray-600">
                                        Kode MP
                                    </p>
                                    <div class="relative z-0 w-full mb-5">
                                        <input type="text" name="name" placeholder="" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                        <span class="text-sm text-red-600 hidden" id="error">This field is
                                            required</span>
                                    </div>
                                </div>

                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                                    <p class="self-center text-gray-600">
                                        Nama MP
                                    </p>
                                    <div class="relative z-0 w-full mb-5">
                                        <input type="text" name="name" placeholder="" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                        <span class="text-sm text-red-600 hidden" id="error">This field is
                                            required</span>
                                    </div>
                                </div>

                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                                    <p class="self-center text-gray-600">
                                        Nama Kitab
                                    </p>
                                    <div class="relative z-0 w-full mb-5">
                                        <input type="text" name="name" placeholder="" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                        <span class="text-sm text-red-600 hidden" id="error">This field is
                                            required</span>
                                    </div>
                                </div>

                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                                    <p class="self-center text-gray-600">
                                        Kelas
                                    </p>
                                    <div class="relative z-0 w-full mb-5">
                                        <select name="select" value="" onclick="this.setAttribute('value', this.value);" class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                                            <option value="" selected disabled hidden></option>
                                            <option value="1">Awaliyah</option>
                                            <option value="2">1 Wustho</option>
                                            <option value="3">2 Wustho</option>
                                            <option value="4">1 Ulya</option>
                                            <option value="5">2 Ulya</option>
                                        </select>
                                        <span class="text-sm text-red-600 hidden" id="error">Option has to be
                                            selected</span>
                                    </div>
                                </div>

                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                                    <p class="self-center text-gray-600">
                                        Jadwal
                                    </p>
                                    <div class="relative z-0 w-full mb-5">
                                        <input type="text" name="name" placeholder="" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                        <span class="text-sm text-red-600 hidden" id="error">This field is
                                            required</span>
                                    </div>
                                </div>

                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                                    <p class="self-center text-gray-600">
                                        Nama Ustadz
                                    </p>
                                    <div class="relative z-0 w-full mb-5">
                                        <input type="text" name="name" placeholder="" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                        <span class="text-sm text-red-600 hidden" id="error">This field is
                                            required</span>
                                    </div>
                                </div>

                            </div>

                            <div class="flex space-x-6 px-4 pt-8">
                                <button class="border border-teal-500 text-teal-500 block rounded-sm py-3 px-8 flex items-center hover:bg-red-700 hover:text-white">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Cancel
                                </button>
                                <button class="border border-teal-500 bg-blue-600 hover:bg-blue-800 text-white block rounded-sm py-3 px-8 ml-2 flex items-center">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>


                    <!-- FOOTER -->
                    <footer class="container mx-auto bg-white py-8 border-t border-gray-400">
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

            </div>
        </div>
        </main>
</body>

</html>