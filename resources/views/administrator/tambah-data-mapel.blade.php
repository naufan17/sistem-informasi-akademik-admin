@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Mata Pelajaran</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <form id="form" novalidate>
                    <div class="pb-8">
                        <div class="p-4">
                            <a href="{{ route('administrator.data-mapel') }}" class="button flex items-center border border-teal-500 text-teal-500 block rounded-sm py-3 px-6 w-32 hover:bg-blue-700 hover:text-white">
                                <svg class="h-5 w-5 mr-3 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                                    <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
                                </svg>
                                Back
                            </a>
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
                                Kode Mata Pelajaran
                            </p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="number" name="id" placeholder="" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                <span class="text-sm text-red-600 hidden" id="error">This field is
                                    required</span>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">
                                Nama Mata Pelajaran
                            </p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="course" placeholder="" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                <span class="text-sm text-red-600 hidden" id="error">This field is
                                    required</span>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">
                                Nama Kitab
                            </p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="book" placeholder="" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                    <span class="text-sm text-red-600 hidden" id="error">This field is
                                        required
                                    </span>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">
                                Kelas
                            </p>
                            <div class="relative z-0 w-full mb-5">
                                <select type="text" name="grade" value="" onclick="this.setAttribute('value', this.value);" class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                                    <option value="" selected disabled hidden></option>
                                    <option value="1">Awaliyah</option>
                                    <option value="2">1 Wustho</option>
                                    <option value="3">2 Wustho</option>
                                    <option value="4">1 Ulya</option>
                                    <option value="5">2 Ulya</option>
                                </select>
                                <span class="text-sm text-red-600 hidden" id="error">Option has to be selected</span>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">
                                Jadwal
                            </p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="schdule" placeholder="" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                <span class="text-sm text-red-600 hidden" id="error">This field is
                                    required</span>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">
                                Semester
                            </p>
                            <div class="relative z-0 w-full mb-5">
                            <select type="text" name="semester" value="" onclick="this.setAttribute('value', this.value);" class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                                    <option value="" selected disabled hidden></option>
                                    <option value="Genap">Genap</option>
                                    <option value="Ganjil">Ganjil</option>
                                </select>
                                <span class="text-sm text-red-600 hidden" id="error">Option has to be selected</span>
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
        </main>
    </div>
</div>

@endsection