@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Data Admin</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <div class="p-4">
                    <a href="{{ route('administrator.data-admin') }}" class="button flex items-center border border-teal-500 text-teal-500 block rounded-sm py-3 px-6 w-32 hover:bg-blue-700 hover:text-white">
                        <svg class="h-5 w-5 mr-3 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                            <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
                        </svg>
                        Back
                    </a>
                </div>
                <div class="p-4">
                    <h2 class="text-2xl ">
                        Tambah Admin
                    </h2>
                </div>
                <form id="form" novalidate>
                    <div>
                        <div class="pt-8">
                            <p class="self-center bg-gray-50 py-4 px-4">
                                Identitas Diri
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">
                                NIS
                            </p>
                            <div class="relative z-0 w-full mb-5 border-gray-200">
                                <input type="text" name="name" placeholder="Required" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black" />
                                <span class="text-sm text-red-600 hidden" id="error">This field is
                                    required</span>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">
                                Nama Lengkap
                            </p>
                            <div class="relative z-0 w-full mb-5 border-gray-200">
                                <input type="text" name="name" placeholder="Required" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black" />
                                <span class="text-sm text-red-600 hidden" id="error">This field is
                                    required</span>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">
                                Tempat Lahir
                            </p>
                            <div class="relative z-0 w-full mb-5 border-gray-200">
                                <input type="text" name="name" placeholder="Required" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black" />
                                <span class="text-sm text-red-600 hidden" id="error">This field is
                                    required</span>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">
                                Tanggal Lahir
                            </p>
                            <div class="relative z-0 w-full mb-5 border-gray-200">
                                <input type="text" name="date" placeholder="Required " onclick="this.setAttribute('type', 'date');" class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black" />
                                <span class="text-sm text-red-600 hidden" id="error">This field is
                                    required</span>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">
                                Nomor Induk Kependudukan / Passport
                            </p>
                            <div class="relative z-0 w-full mb-5 border-gray-200">
                                <input type="text" name="name" placeholder="Required" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black" />
                                <span class="text-sm text-red-600 hidden" id="error">This field is
                                    required</span>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">
                                Nomor Telepon / Handphone
                            </p>
                            <div class="relative z-0 w-full mb-5 border-gray-200">
                                <input type="text" name="name" placeholder="Required" class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black" />
                                <span class="text-sm text-red-600 hidden" id="error">This field is
                                    required</span>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">
                                Email
                            </p>
                            <div class="relative z-0 w-full mb-5 border-gray-200">
                                <input type="text" name="name" placeholder="Required" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black" />
                                <span class="text-sm text-red-600 hidden" id="error">This field is
                                    required</span>
                            </div>
                        </div>
                        <div class="flex flex-row-reverse object-left text-center text-white text-base pt-8 px-3">
                            <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8" href="update-santri.html">Generate Akun</button>
                        </div>
                        <!-- <div class="overflow-auto py-8 px-3">
                            <table class="table-auto">
                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="text-center w-1/2 py-3 uppercase font-semibold text-sm">
                                            Username</th>
                                        <th class="text-center w-1/2 py-3 uppercase font-semibold text-sm">
                                            Password</th>
                                        <th class="text-center w-1/2 py-3 uppercase font-semibold text-sm"></th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 bg-gray-200">
                                    <tr>
                                        <td class="text-center py-3 px-4">xxxx</td>
                                        <td class="text-center py-3 px-4"><a>xxxx</a></td>
                                        <td class="text-center py-3 px-4"><a></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="p-4">
                            <p class="text-gray-600">
                                Berikan <a class="bg-gray-200">username</a> dan <a class="bg-gray-200">password</a> ini kepada admin yang bersangkutan agar
                                bisa masuk ke akun SIAKAD MDNU!
                            </p>
                        </div> -->
                        <!-- <div class="flex space-x-6 p-4">
                            <button class="border border-teal-500 text-teal-500 block rounded-sm py-3 px-8 flex items-center hover:bg-red-700 hover:text-white">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Cancel
                            </button>
                            <button class="border border-teal-500 bg-blue-600 hover:bg-blue-800 text-white block rounded-sm py-3 px-8 ml-2 flex items-center">
                                Save
                            </button>
                        </div> -->
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

@endsection