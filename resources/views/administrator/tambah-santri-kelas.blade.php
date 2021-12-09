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
                <p class="text-xl py-8 flex items-center">Daftar Kelas Diikuti</p>
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Kode MP</th>
                                <th class="text-center w-1/4 py-3 px-4 uppercase font-semibold text-sm">Mata pelajaran</th>
                                <th class="text-center w-1/4 py-3 px-4 uppercase font-semibold text-sm">Kitab</th>
                                <th class="text-center w-1/4 py-3 px-4 uppercase font-semibold text-sm">Semester</th>
                                <th class="text-center w-1/4 py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($cumulativestudys as $cumulativestudy)
                            <tr>
                                <td class="text-center py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="text-center py-3 px-4">{{ $cumulativestudy->id_course }}</td>
                                <td class="text-center py-3 px-4">{{ $cumulativestudy->course }}</td>
                                <td class="text-center py-3 px-4">{{ $cumulativestudy->book }}</td>
                                <td class="text-center py-3 px-4">{{ $cumulativestudy->semester }}</td>
                                <td>
                                    <div class="flex py-3 px-4">
                                        <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{ url('administrator/data-kelas/delete') }}/{{ $cumulativestudy->id_cumulative_study }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <p class="text-xl py-8 flex items-center">Daftar Mata Pelajaran</p>
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Kode MP</th>
                                <th class="text-center w-1/6 py-3 px-4 uppercase font-semibold text-sm">Mata pelajaran</th>
                                <th class="text-center w-1/6 py-3 px-4 uppercase font-semibold text-sm">Kitab</th>
                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Semester</th>
                                <th class="text-center w-1/6 py-3 px-4 uppercase font-semibold text-sm">Kelas</th>
                                <th class="text-center w-1/6 py-3 px-4 uppercase font-semibold text-sm">Jadwal</th>
                                <th class="text-center w-1/6 py-3 px-4 uppercase font-semibold text-sm">Nama Ustadz</th>
                                <th class="text-center w-1/6 py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($courses as $course)
                            <tr>
                                <td class="text-center py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="text-center py-3 px-4">{{ $course->id_course }}</td>
                                <td class="text-center py-3 px-4">{{ $course->course }}</td>
                                <td class="text-center py-3 px-4">{{ $course->book }}</td>
                                <td class="text-center py-3 px-4">{{ $course->semester }}</td>
                                <td class="text-center py-3 px-4">{{ $course->grade_number }} {{ $course->grade_name }}</td>
                                <td class="text-center py-3 px-4">{{ $course->day }}, {{ $course->time_begin }} - {{ $course->time_end }}</td>  
                                <td class="text-center py-3 px-4">{{ $course->name }}</td>
                                <td>
                                    <form method="GET" action="{{ url('administrator/data-kelas/create') }}">
                                        <div class="flex flex-row-reverse object-left text-center text-white text-base py-3 px-4">
                                            <input type="hidden" name="id_santri" placeholder="" value="{{ $id }}" required autocomplete="name" required class="py-2 px-3 block w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-300" />
                                            <input type="hidden" name="id_course" placeholder="" value="{{ $course->id_course }}" required autocomplete="name" required class="py-2 px-3 block w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-300" />
                                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2 px-4">Tambah</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection