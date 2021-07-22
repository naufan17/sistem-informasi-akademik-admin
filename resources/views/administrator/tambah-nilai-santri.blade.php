@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Nilai</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
            <!-- BACK BUTTON -->
            <div class="p-4">
                    <a href="{{ url('administrator/data-nilai') }}" class="button flex items-center border border-teal-500 text-teal-500 block rounded-sm py-3 px-6 w-32 hover:bg-blue-700 hover:text-white">
                        <svg class="h-5 w-5 mr-3 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                            <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
                        </svg>
                        Back
                    </a>
                </div>
<<<<<<< HEAD
                <p class="text-xl py-8 flex items-center">Input Nilai Nilai MP ke Santri</p>
                <form method="GET" action="{{ url('administrator/data-santri/create') }}">
                    <div class="bg-white overflow-auto pb-8">
                        <table class="table-auto bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                                    <th class="text-left w-1/3 py-3 px-4 uppercase font-semibold text-sm">NIS</th>
                                    <th class="text-left w-1/3 py-3 px-4 uppercase font-semibold text-sm">Nama Santri</th>
                                    <th class="text-left w-1/3 py-3 px-4 uppercase font-semibold text-sm">Nilai Hasil Belajar</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach($santris as $santri)
                                <tr>
                                    <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
                                    <td class="text-left py-3 px-4">{{ $santri->id }}</td>
                                    <td class="text-left py-3 px-4">{{ $santri->name }}</td>
                                    <td class="text-left py-3 px-4">
                                        <div class="relative z-0 w-full">
                                            <input type="text" name="name" placeholder="" value="{{ $santri->score }}" required autocomplete="name" required class="py-2 px-3 block w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-300" />
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex flex-row-reverse object-left text-center text-white text-base pt-8 px-3">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8">Simpan</button>
                        </div>
                    </div>
                </form>
=======
                <p class="text-xl pb-4 flex items-center">Input Nilai MP ke Santri</p>
                <div class="bg-white overflow-auto pb-8">
                <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-left w-1/4 py-3 px-4 uppercase font-semibold text-sm">NIS</th>
                                <th class="text-left w-1/4 py-3 px-4 uppercase font-semibold text-sm">Nama Santri</th>
                                <th class="text-left w-1/4 py-3 px-4 uppercase font-semibold text-sm">Nilai Hasil Belajar</th>
                                <th class="text-left w-1/4 py-3 px-4 uppercase font-semibold text-sm">Input</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($santris as $santri)
                            <tr>
                                <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="text-left py-3 px-4">{{ $santri->id }}</td>
                                <td class="text-left py-3 px-4">{{ $santri->name }}</td>
                                <td class="text-left py-3 px-4"></td>
                                <td class="py-3 px-4">
                                    <a href="{{ url('administrator/update-data-nilai') }}" class="transform hover:text-purple-500 hover:scale-110">
                                    <i class="fas fa-external-link-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!--
                    <div class="flex flex-row-reverse object-left text-center text-white text-base pt-8 px-3">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8">Simpan</button>
                    </div>
-->

                </div>
>>>>>>> 21ab72863f480bac372d1e2f3fdadcf010d8d97f
            </div>
        </main>
    </div>
</div>

@endsection

