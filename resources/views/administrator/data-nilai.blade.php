@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="m:pt-6 pt-3 sm:px-6 px-3">
            <h1 class="sm:text-3xl text-2xl text-black pb-2 mt-2">Nilai</h1>
            <div class="bg-white rounded-lg shadow-md sm:p-8 p-4 sm:my-8 my-4">
                <form method="POST" action="{{ url('administrator/data-nilai') }}">
                    @csrf
                    <div class="flex space-x-4 items-center pb-4">
                        <div class="flex-none sm:w-36 w-12">
                            <a class="self-center sm:text-base text-sm">Tingkat</a>
                        </div>
                        <div class="flex-none w-1/5">
                            <div class="relative">
                                <select type="number" name="grade_number" value="" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker sm:text-base text-sm px-4 pr-8 rounded" id="grid-state">
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
                        <div class="flex-none sm:w-36 w-12">
                            <a class="self-center sm:text-base text-sm">Nama Kelas</a>
                        </div>
                        <div class="flex-none w-1/5">
                            <div class="relative">
                                <select type="text" name="grade_name" value="" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker sm:text-base text-sm px-4 pr-8 rounded" id="grid-state">
                                    @foreach($grade_name as $filter)
                                    <option selected value="{{ $filter->grade_name }}">{{ $filter->grade_name }}</option>
                                    @endforeach
                                    @foreach($filter_grade_name as $filter)
                                    <option value="{{ $filter->grade_name }}">{{ $filter->grade_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="object-left text-center text-white sm:text-base text-sm">
                            <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 px-6">Lihat</button>
                        </div>
                    </div>
                </form>
                <p class="sm:text-xl text-lg pb-4 pt-4 flex items-center">Daftar Mata Pelajaran</p>
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-center sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">No</th>
                                <!-- <th class="text-center w-1/6 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Kode MP</th> -->
                                <th class="text-center w-1/5 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Mata pelajaran</th>
                                <th class="text-center w-1/5 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Kitab</th>
                                <th class="text-center w-1/5 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Kelas</th>
                                <th class="text-center w-1/5 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Jadwal</th>
                                <th class="text-center w-1/5 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Daftar Santri</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($courses as $course)
                            <tr>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $loop->iteration }}</td>
                                <!-- <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $course->id_course }}</td> -->
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $course->course }}</td>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $course->book }}</td>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $course->grade_number }} {{ $course->grade_name }}</td>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $course->day }}, {{ $course->time_begin }} - {{ $course->time_end }}</td>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">
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