@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Kelas</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <!-- BACK BUTTON -->
                <div class="p-4">
                    <a href="{{ url('administrator/data-kelas') }}" class="button flex items-center border border-teal-500 text-teal-500 block rounded-sm py-3 px-6 w-32 hover:bg-blue-700 hover:text-white">
                        <svg class="h-5 w-5 mr-3 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                            <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
                        </svg>
                        Back
                    </a>
                </div>
                <p class="text-xl py-8 flex items-center">Daftar Peserta Kelas</p>
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-left w-1/2 py-3 px-4 uppercase font-semibold text-sm">NIS</th>
                                <th class="text-left w-1/2 py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($santriin as $santriin)
                            <tr>
                                <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="text-left py-3 px-4">{{ $santriin->id }}</td>
                                <td class="text-left py-3 px-4">{{ $santriin->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <p class="text-xl py-8 flex items-center">Daftar Santri</p>
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-left w-1/3 py-3 px-4 uppercase font-semibold text-sm">NIS</th>
                                <th class="text-left w-1/3 py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                                <th class="text-left w-1/3 py-3 px-4 uppercase font-semibold text-sm">Tambahkan</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($courses as $course) 
                            @foreach($santris as $santris)
                            <tr>
                                <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="text-left py-3 px-4">{{ $santris->id }}</td>
                                <td class="text-left py-3 px-4">{{ $santris->name }}</td>
                                <td>
                                    <form method="GET" action="{{ url('administrator/data-kelas/list-santri/create') }}">
                                        <input type="hidden" name="id_santri" placeholder="" value="{{ $santris->id }}"  required class="py-2 px-3 block w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-300" />
                                        <input type="hidden" name="id_course" placeholder="" value="{{ $course->id_course }}" required required class="py-2 px-3 block w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-300" />
                                        <button type="submit" class="bg-blue-600 hover:bg-blue-800 hover:text-white text-white rounded shadow-md py-1 px-2">Tambah</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection