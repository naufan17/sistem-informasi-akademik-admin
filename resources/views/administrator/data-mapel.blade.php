@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Mata Pelajaran</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <!-- OPTION -->
                <form method="GET" action="{{ url('administrator/data-mapel/filter') }}">
                    <!-- <div class="flex space-x-4 items-center pb-8">
                        <div class="flex-none w-36">
                            <a class="self-center">Kelas</a>
                        </div>
                        <div class="flex-none md:w-1/5">
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-grey-darker">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                                <select type="number" name="id_grade" value="" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                                    @foreach($grades as $grade)
                                        <option value="{{ $grade->id_grade }}">{{ $grade->grade_number }} {{ $grade->grade_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div> -->
                    <div class="flex space-x-4 items-center pb-8">
                        <div class="flex-none w-36">
                            <a class="self-center">Hari</a>
                        </div>
                        <div class="flex-none md:w-1/5">
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-grey-darker">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                                <select type="text" name="day" value=""  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                                    @foreach($schedules as $schedule)
                                        <option value="{{ $schedule->day }}">{{ $schedule->day }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="object-left text-center text-white text-base">
                            <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8" href="#">Lihat mapel</button>
                        </div>
                    </div>
                </form>
                <p class="text-xl pt-8 flex items-center border-b-2">Daftar Paket Mata Pelajaran</p>
                <div class="flex flex-row-reverse object-left text-center text-white text-base py-8">
                    <a href="{{ url('administrator/data-mapel/form-create') }}" class="button bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8">
                        Tambah Mapel
                    </a>
                </div>
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-left w-1/6 py-3 px-4 uppercase font-semibold text-sm">Kode MP</th>
                                <th class="text-left w-1/6 py-3 px-4 uppercase font-semibold text-sm">Mata pelajaran</th>
                                <th class="text-left w-1/6 py-3 px-4 uppercase font-semibold text-sm">Kitab</th>
                                <th class="text-left w-1/6 py-3 px-4 uppercase font-semibold text-sm">Kelas</th>
                                <th class="text-left w-1/6 py-3 px-4 uppercase font-semibold text-sm">Jadwal</th>
                                <th class="text-left w-1/5 py-3 px-4 uppercase font-semibold text-sm">Semester</th>
                                <th class="text-left w-1/6 py-3 px-4 uppercase font-semibold text-sm">Nama Ustadz</th>
                                <th class="text-left w-1/6 py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($courses as $course)
                            <tr>
                                <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="text-left py-3 px-4">{{ $course->id }}</td>
                                <td class="text-left py-3 px-4">{{ $course->course }}</td>
                                <td class="text-left py-3 px-4">{{ $course->book }}</td>
                                <td class="text-left py-3 px-4">{{ $course->grade_number }} {{ $course->grade_name }}</td>
                                <td class="text-left py-3 px-4">{{ $course->day }}, {{ $course->time_begin }} - {{ $course->time_end }}</td>
                                <td class="text-left py-3 px-4">{{ $course->semester }}</td>   
                                <td class="text-left py-3 px-4">{{ $course->name }}</td>
                                <td>
                                    <div class="flex py-3 px-4">
                                        <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{ url('administrator/data-mapel/form-update') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="flex object-left text-center text-white text-base pt-6">
                    <button class="bg-blue-600 hover:bg-blue-800 shadow-lg rounded py-3 px-8" href="#">Cetak MP</button>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection