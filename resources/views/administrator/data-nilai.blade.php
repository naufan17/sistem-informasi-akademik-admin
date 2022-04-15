@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Nilai</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <form method="POST" action="{{ url('administrator/data-nilai') }}">
                    @csrf
                    <div class="flex space-x-4 items-center pb-4">
                        <div class="flex-none w-36">
                            <a class="self-center">Tingkat</a>
                        </div>
                        <div class="flex-none w-1/5">
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-grey-darker">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                                <select type="number" name="grade_number" value="" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker px-4 pr-8 rounded" id="grid-state">
                                    @foreach($grade_number as $filter)
                                    <option selected value="{{ $filter->grade_number }}">{{ $filter->grade_number }}</option>
                                    @endforeach    
                                    @foreach($filter_grade_number as $filter)
                                    <option value="{{ $filter->grade_number }}">{{ $filter->grade_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-4 items-center pb-4">
                        <div class="flex-none w-36">
                            <a class="self-center">Nama Kelas</a>
                        </div>
                        <div class="flex-none w-1/5">
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-grey-darker">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                                <select type="text" name="grade_name" value="" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker px-4 pr-8 rounded" id="grid-state">
                                    @foreach($grade_name as $filter)
                                    <option selected value="{{ $filter->grade_name }}">{{ $filter->grade_name }}</option>
                                    @endforeach
                                    @foreach($filter_grade_name as $filter)
                                    <option value="{{ $filter->grade_name }}">{{ $filter->grade_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="object-left text-center text-white text-base">
                            <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 px-6">Lihat</button>
                        </div>
                    </div>
                </form>
                <p class="text-xl pb-4 pt-4 flex items-center">Daftar Mata Pelajaran</p>
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
                                    <a href="{{ url('administrator/data-nilai/santri') }}/{{ $course->id_course }}" class="transform hover:text-purple-500 hover:scale-110">
                                    <i class="fas fa-external-link-alt"></i></a>
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