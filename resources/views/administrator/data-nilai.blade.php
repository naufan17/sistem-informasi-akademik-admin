@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Nilai</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <!-- OPTION -->
                <form method="GET" action="{{ url('administrator/filter-santri') }}">
                    <div class="flex space-x-4 items-center pb-4">
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
                                <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                                    <option>Awaliyah</option>
                                    <option>1 Wustho</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <p class="text-xl py-8 flex items-center">Input Nilai MP ke Santri</p>
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Kode MP</th>
                                <th class="text-left w-1/6 py-3 px-4 uppercase font-semibold text-sm">Mata pelajaran</th>
                                <th class="text-left w-1/6 py-3 px-4 uppercase font-semibold text-sm">Kitab</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Semester</th>
                                <th class="text-left w-1/6 py-3 px-4 uppercase font-semibold text-sm">Kelas</th>
                                <th class="text-left w-1/6 py-3 px-4 uppercase font-semibold text-sm">Jadwal</th>
                                <th class="text-left w-1/6 py-3 px-4 uppercase font-semibold text-sm">Nama Ustadz</th>
                                <th class="text-left w-1/6 py-3 px-4 uppercase font-semibold text-sm">Nilai</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($courses as $course)
                            <tr>
                                <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="text-left py-3 px-4">{{ $course->id_course }}</td>
                                <td class="text-left py-3 px-4">{{ $course->course }}</td>
                                <td class="text-left py-3 px-4">{{ $course->book }}</td>
                                <td class="text-left py-3 px-4">{{ $course->semester }}</td>
                                <td class="text-left py-3 px-4">{{ $course->grade_number }} {{ $course->grade_name }}</td>
                                <td class="text-left py-3 px-4">{{ $course->day }}, {{ $course->time_begin }} - {{ $course->time_end }}</td>
                                <td class="text-left py-3 px-4">{{ $course->name }}</td>
                                <td>
                                    <a href="{{ url('administrator/data-nilai/form-create') }}/{{ $course->id_course }}" class="button bg-blue-600 hover:bg-blue-800 hover:text-white text-white rounded shadow-md py-2 px-2">Tambah</a>
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