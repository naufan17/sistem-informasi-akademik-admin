@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Nilai</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <p class="text-xl pb-4 flex items-center">Daftar Mata Pelajaran</p>
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <!-- <th class="text-center w-1/6 py-3 px-4 uppercase font-semibold text-sm">Kode MP</th> -->
                                <th class="text-center w-1/5 py-3 px-4 uppercase font-semibold text-sm">Mata pelajaran</th>
                                <th class="text-center w-1/5 py-3 px-4 uppercase font-semibold text-sm">Kitab</th>
                                <th class="text-center w-1/5 py-3 px-4 uppercase font-semibold text-sm">Kelas</th>
                                <th class="text-center w-1/5 py-3 px-4 uppercase font-semibold text-sm">Jadwal</th>
                                <th class="text-center w-1/5 py-3 px-4 uppercase font-semibold text-sm">Daftar Santri</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($courses as $course)
                            <tr>
                                <td class="text-center py-3 px-4">{{ $loop->iteration }}</td>
                                <!-- <td class="text-center py-3 px-4">{{ $course->id_course }}</td> -->
                                <td class="text-center py-3 px-4">{{ $course->course }}</td>
                                <td class="text-center py-3 px-4">{{ $course->book }}</td>
                                <td class="text-center py-3 px-4">{{ $course->grade_number }} {{ $course->grade_name }}</td>
                                <td class="text-center py-3 px-4">{{ $course->day }}, {{ $course->time_begin }} - {{ $course->time_end }}</td>
                                <td class="text-center py-3 px-4">
                                    <a href="{{ url('administrator/data-nilai/santri') }}/{{ $course->id_course }}" class="button bg-blue-600 hover:bg-blue-800 hover:text-white hover:no-underline text-white rounded shadow-md py-2 px-8">Lihat</a>
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