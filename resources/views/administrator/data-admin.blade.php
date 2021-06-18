@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Data Admin</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <p class="text-xl pb-4 flex items-center">
                    Daftar Anggota Admin
                </p>
                <div class="flex object-left text-center text-white text-base py-8">
                    <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8" href="update-data-admin.html">Tambah Admin</button>
                </div>
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-left w-1/5 py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                                <th class="text-left w-1/5 py-3 px-4 uppercase font-semibold text-sm">Email</th>
                                <th class="text-left w-1/5 py-3 px-4 uppercase font-semibold text-sm">Username</th>
                                <th class="text-left w-1/5 py-3 px-4 uppercase font-semibold text-sm">Password</td>
                                <th class="text-left w-1/5 py-3 px-4 uppercase font-semibold text-sm">Aksi</td>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr>
                                <td class="text-left py-3 px-4">1</td>
                                <td class="text-left py-3 px-4"><a>John</a></td>
                                <td class="text-left py-3 px-4"><a href="mailto:john@gmail.com">john@gmail.com</a></td>
                                <td class="text-left py-3 px-4">181060500xx</td>
                                <td class="text-left py-3 px-4">123xxx</td>
                                <td>
                                    <div class="flex py-3 px-4">
                                        <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="bg-gray-200">
                                <td class="text-left py-3 px-4">2</td>
                                <td class="text-left py-3 px-4"><a>Adam</a></td>
                                <td class="text-left py-3 px-4"><a href="mailto:adam@gmail.com">adam@gmail.com</a></td>
                                <td class="text-left py-3 px-4">181060500xx</td>
                                <td class="text-left py-3 px-4">123xxx</td>
                                <td>
                                    <div class="flex py-3 px-4">
                                        <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left py-3 px-4">3</td>
                                <td class="text-left py-3 px-4"><a>John</a></td>
                                <td class="text-left py-3 px-4"><a href="mailto:john@gmail.com">john@gmail.com</a></td>
                                <td class="text-left py-3 px-4">181060500xx</td>
                                <td class="text-left py-3 px-4">123xxx</td>
                                <td>
                                    <div class="flex py-3 px-4">
                                        <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="bg-gray-200">
                                <td class="text-left py-3 px-4">4</td>
                                <td class="text-left py-3 px-4"><a>John</a></td>
                                <td class="text-left py-3 px-4"><a href="mailto:john@gmail.com">john@gmail.com</a></td>
                                <td class="text-left py-3 px-4">181060500xx</td>
                                <td class="text-left py-3 px-4">123xxx</td>
                                <td>
                                    <div class="flex py-3 px-4">
                                        <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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

        </main>
    </div>
</div>

@endsection