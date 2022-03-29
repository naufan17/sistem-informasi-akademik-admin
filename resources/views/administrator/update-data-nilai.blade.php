@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- SANTRI -->
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Santri</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <!-- BACK BUTTON -->
                <div class="p-4 mb-6">
                    <a href="{{ url('administrator/data-nilai') }}" class="button flex items-center border  text-black-500 rounded-sm py-2.5 px-5 w-32 hover:bg-blue-700 hover:text-white hover:no-underline">
                        <svg class="h-5 w-5 mr-3 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                            <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
                <!-- OPTION -->
                <form method="POST" action="{{ url('administrator/data-nilai/santri') }}">
                    @csrf
                    <div class="flex space-x-4 items-center pb-4">
                        <div class="flex-none w-36">
                            <a class="self-center hover:no-underline">Semester</a>
                        </div>
                        <input type="hidden" name="id" placeholder="" value="{{ $id_course }}" class="self-center w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        <div class="flex-none md:w-1/5">
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-grey-darker">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                                <select type="text" name="semester" value=""  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker px-4 pr-8 rounded" id="grid-state">
                                    @foreach($semesters as $filter)    
                                    <option value="{{ $filter->semester }}">{{ $filter->semester }}</option>
                                    @endforeach
                                    @foreach($filter_semesters as $filter)    
                                    <option value="{{ $filter->semester }}">{{ $filter->semester }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-4 items-center pb-8">
                        <div class="flex-none w-36">
                            <a class="self-center hover:no-underline">Tahun Ajaran</a>
                        </div>
                        <div class="flex-none md:w-1/5">
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-grey-darker">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                                <select type="text" name="year" value=""  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker px-4 pr-8 rounded" id="grid-state">
                                    @foreach($years as $filter)    
                                    <option value="{{ $filter->year }}">{{ $filter->year }}</option>
                                    @endforeach
                                    @foreach($filter_years as $filter)    
                                    <option value="{{ $filter->year }}">{{ $filter->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="object-left text-center text-white text-base">
                            <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 px-6">Lihat</button>
                        </div>
                    </div>
                </form>
                <p class="text-xl py-4 flex items-center">Daftar Santri</p>
                <form method="POST" action="{{ url('administrator/data-nilai/create') }}">
                    @csrf
                    <div class="bg-white overflow-auto pb-8">
                        <table class="table-auto bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">No</th>
                                    <th class="text-center w-1/3 py-3 px-4 uppercase font-semibold text-sm">NIS</th>
                                    <th class="text-center w-1/3 py-3 px-4 uppercase font-semibold text-sm">Nama Santri</th>
                                    <th class="text-center w-1/3 py-3 px-4 uppercase font-semibold text-sm">Nilai</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach($santris as $santri)
                                <tr>
                                    <td class="text-center py-3 px-4">{{ $loop->iteration }}</td>
                                    <td class="text-center py-3 px-4">{{ $santri->id }}</td>
                                    <td class="text-center py-3 px-4">{{ $santri->name }}</td>
                                    <td class="text-center py-3 px-4">
                                        <div class="relative z-0 w-full">
                                            <input type="hidden" name="id_cumulative_study" value="{{ $santri->id_cumulative_study }}" class="py-2 px-3 block w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-300" />
                                            <!-- <input type="hidden" name="id_santri" value="{{ $santri->id_santri }}" class="py-2 px-3 block w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-300" />
                                            <input type="hidden" name="id_course" value="{{ $santri->id_course }}" class="py-2 px-3 block w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-300" /> -->
                                            <input type="number" name="score" value="{{ $santri->score }}" placeholder="1-100" required class="py-2 px-3 block w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-300" />
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex flex-row-reverse object-left text-center text-white text-base pt-8 px-2.5">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 px-6">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

@endsection