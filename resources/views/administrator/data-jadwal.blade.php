@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="m:pt-6 pt-3 sm:px-6 px-3">
            <h1 class="sm:text-3xl text-2xl text-black pb-2 mt-2">Data Jadwal</h1>
            <div class="bg-white rounded-lg shadow-md sm:p-8 p-4 sm:my-8 my-4">
                <!-- OPTION -->
                <form method="POST" action="{{ url('administrator/data-jadwal') }}">
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
                            <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Lihat</button>
                        </div>
                    </div>
                </form>
                <form method="POST" action="{{ url('administrator/data-jadwal/filter-hari') }}">
                    @csrf
                    <div class="flex space-x-4 items-center pb-4">
                        <div class="flex-none sm:w-36 w-12">
                            <a class="self-center sm:text-base text-sm">Hari</a>
                        </div>
                        <div class="flex-none w-1/5">
                            <div class="relative">
                                <select type="number" name="day" value="" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker sm:text-base text-sm px-4 pr-8 rounded" id="grid-state">
                                    @foreach($day as $filter)
                                    <option selected value="{{ $filter->day }}">{{ $filter->day }}</option>
                                    @endforeach       
                                    @foreach($filter_day as $filter)
                                    <option value="{{ $filter->day }}">{{ $filter->day }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="object-left text-center text-white sm:text-base text-sm">
                            <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Lihat</button>
                        </div>
                    </div>
                </form>
                <p class="sm:text-xl text-lg pt-4 flex items-center border-b-2">Daftar List Jadwal</p>
                <div class="flex flex-row-reverse object-left text-center text-white sm:text-base text-sm py-4">
                    <a href="{{ url('administrator/data-jadwal/form-create') }}" class="button bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">
                        Tambah
                    </a>
                </div>
                @if($tambah = Session::get('tambah'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-2" role="alert">
                    <span class="block sm:inline">{{ $tambah }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
                @elseif($perbarui = Session::get('perbarui'))
                <div class="bg-orange-100 border border-orange-400 text-orange-700 px-4 py-3 rounded relative mb-2" role="alert">
                    <span class="block sm:inline">{{ $perbarui }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                        <svg class="fill-current h-6 w-6 text-orange-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
                @elseif($hapus = Session::get('hapus'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-2" role="alert">
                    <span class="block sm:inline">{{ $hapus }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
                @endif
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-center sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">No</th>
                                <th class="text-center w-1/4 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Hari</th>
                                <th class="text-center w-1/4 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Waktu Mulai</th>
                                <th class="text-center w-1/4 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Waktu Selesai</th>
                                <th class="text-center w-1/4 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($schedules as $schedule)
                            <tr>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $loop->iteration }}</td>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $schedule->day }}</td>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $schedule->time_begin }}</td>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $schedule->time_end }}</td>
                                <td class="grid justify-items-center sm:py-3 py-2 sm:px-4 px-3">
                                    <div class="flex">
                                        <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{ url('administrator/data-jadwal/form-update') }}/{{ $schedule->id_schedule }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{ url('administrator/data-jadwal/delete') }}/{{ $schedule->id_schedule }}">
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
            </div>
        </main>
    </div>
</div>

@endsection