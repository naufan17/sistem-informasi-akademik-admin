@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="m:pt-6 pt-3 sm:px-6 px-3">
            <h1 class="sm:text-3xl text-2xl text-black pb-2 mt-2">Data KRS</h1>
            <div class="bg-white rounded-lg shadow-md sm:p-8 p-4 sm:my-8 my-4">
                <!-- BACK BUTTON -->
                <div class="p-4">
                    <a href="{{ url('administrator/data-krs') }}" class="button flex items-center border border-black-500 text-black-500 sm:text-base text-sm rounded-sm py-2.5 sm:px-6 px-3.5 sm:w-36 w-28 hover:bg-blue-700 hover:text-white">
                        <svg class="h-5 w-5 mr-3 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                            <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
                <form method="POST" action="{{ url('administrator/data-krs/form-create/filter-semester') }}">
                    @csrf
                    <div class="flex space-x-4 items-center pb-4">
                        <div class="flex-none sm:w-36 w-12">
                            <a class="self-center sm:text-base text-sm hover:no-underline">Semester</a>
                        </div>
                        <input type="hidden" name="id" value="{{ $id_santri }}" class="self-center w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        <div class="flex-none sm:w-1/5 w-1/3">
                            <div class="relative">
                                <select type="text" name="semester" value=""  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker sm:text-base text-sm px-4 pr-8 rounded" id="grid-state">
                                    @foreach($semesters as $filter)    
                                    <option selected value="{{ $filter->semester }}">{{ $filter->semester }}</option>
                                    @endforeach      
                                    @foreach($filter_semesters as $filter)    
                                    <option value="{{ $filter->semester }}">{{ $filter->semester }}</option>
                                    @endforeach    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-4 items-center pb-4">
                        <div class="flex-none sm:w-36 w-12">
                            <a class="self-center sm:text-base text-sm hover:no-underline">Tahun Ajaran</a>
                        </div>
                        <div class="flex-none sm:w-1/5 w-1/3">
                            <div class="relative">
                                <select type="text" name="year" value=""  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker sm:text-base text-sm px-4 pr-8 rounded" id="grid-state">
                                    @foreach($years as $filter)    
                                    <option selected value="{{ $filter->year }}">{{ $filter->year }}</option>
                                    @endforeach
                                    @foreach($filter_years as $filter)    
                                    <option value="{{ $filter->year }}">{{ $filter->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="object-left text-center text-white sm:text-base text-sm">
                            <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Lihat</button>
                        </div>
                    </div>
                </form>
                <p class="sm:text-xl text-lg py-4 flex items-center">Daftar Kelas yang Diikuti oleh Sdr. {{ Auth::guard('administrator')->user()->name }}</p>
                @if($tambah = Session::get('tambah'))
                <div class="bg-green-100 border border-green-400 text-green-700 sm:text-base text-sm px-4 py-3 rounded relative mb-2" role="alert">
                    <span class="block sm:inline">{{ $tambah }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
                @elseif($hapus = Session::get('hapus'))
                <div class="bg-red-100 border border-red-400 text-red-700 sm:text-base text-sm px-4 py-3 rounded relative mb-2" role="alert">
                    <span class="block sm:inline">{{ $hapus }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
                @endif
                @if($cumulativestudys->isEmpty())
                <div class="flex-1 text-center">
                    <h1 class="text-lg text-black pb-6">Daftar Kelas Masih Kosong</h1>
                </div>
                @else
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-center py-3 px-4 uppercase font-semibold sm:text-base text-sm">No</th>
                                <th class="text-center w-1/4 py-3 px-4 uppercase font-semibold sm:text-base text-sm">Kode MP</th>
                                <th class="text-center w-1/4 py-3 px-4 uppercase font-semibold sm:text-base text-sm">Mata pelajaran</th>
                                <th class="text-center w-1/4 py-3 px-4 uppercase font-semibold sm:text-base text-sm">Kitab</th>
                                <th class="text-center w-1/4 py-3 px-4 uppercase font-semibold sm:text-base text-sm">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($cumulativestudys as $cumulativestudy)
                            <tr>
                                <td class="text-center sm:text-base text-sm py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="text-center sm:text-base text-sm py-3 px-4">{{ $cumulativestudy->id_course }}</td>
                                <td class="text-center sm:text-base text-sm py-3 px-4">{{ $cumulativestudy->course }}</td>
                                <td class="text-center sm:text-base text-sm py-3 px-4">{{ $cumulativestudy->book }}</td>
                                @if(empty($cumulativestudy->score))
                                <td class="grid justify-items-center py-3 px-4">
                                    <div class="flex">
                                        <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{ url('administrator/data-krs/delete') }}/{{ $cumulativestudy->id_cumulative_study }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                @else
                                <td class="text-center py-3 px-4"></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            <div class="bg-white rounded-lg shadow-md sm:p-8 p-4 sm:my-8 my-4">
                <form method="POST" action="{{ url('administrator/data-krs/form-create/filter-kelas') }}">
                    @csrf
                    <div class="flex space-x-4 items-center pb-4">
                        <div class="flex-none sm:w-36 w-12">
                            <a class="self-center sm:text-base text-sm">Tingkat</a>
                        </div>
                        <input type="hidden" name="id" value="{{ $id_santri }}" class="self-center w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        <div class="flex-none sm:w-1/5 w-1/3">
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
                        <div class="flex-none sm:w-1/5 w-1/3">
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
                            <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Lihat</button>
                        </div>
                    </div>
                </form>
                <p class="sm:text-xl text-lg mt-4 flex items-center border-b-2">Daftar Mata Pelajaran</p>
                @if($add_all === true)
                <div class="flex flex-row-reverse object-left text-center text-white sm:text-base text-sm py-4">
                    <form method="POST" action="{{ url('administrator/data-krs/create-all') }}">
                        @csrf
                        @foreach($courses as $course)
                        <input type="hidden" name="id_santri[{{ $loop->iteration }}]" value="{{ $id_santri }}" class="py-2 px-3 block w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-300" />
                        <input type="hidden" name="id_course[{{ $loop->iteration }}]" value="{{ $course->id_course }}" class="py-2 px-3 block w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-300" />
                        @endforeach
                        <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Tambah Semua</button>
                    </form>
                </div>
                @endif
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-center sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">No</th>
                                <th class="text-center w-1/6 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Kode MP</th>
                                <th class="text-center w-1/6 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Mata pelajaran</th>
                                <th class="text-center w-1/6 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Kitab</th>
                                <th class="text-center w-1/6 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Kelas</th>
                                <th class="text-center w-1/6 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Jadwal</th>
                                <th class="text-center w-1/6 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Nama Ustadz</th>
                                <th class="text-center w-1/6 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($courses as $course)
                            <tr>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $loop->iteration }}</td>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $course->id_course }}</td>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $course->course }}</td>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $course->book }}</td>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $course->grade_number }} {{ $course->grade_name }}</td>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $course->day }}, {{ $course->time_begin }} - {{ $course->time_end }}</td>  
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $course->name }}</td>
                                <td>
                                    <form method="POST" action="{{ url('administrator/data-krs/create') }}">
                                        @csrf
                                        <div class="flex flex-row-reverse object-left text-center text-white sm:text-base text-sm py-3 px-4">
                                            <input type="hidden" name="id_santri" value="{{ $id_santri }}" class="py-2 px-3 block w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-300" />
                                            <input type="hidden" name="id_course" value="{{ $course->id_course }}" class="py-2 px-3 block w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-300" />
                                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2 sm:px-6 px-3.5">Tambah</button>
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