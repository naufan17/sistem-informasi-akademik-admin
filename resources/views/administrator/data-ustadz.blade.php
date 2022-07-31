@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="sm:pt-6 pt-3 sm:px-6 px-3">
            <h1 class="sm:text-3xl text-2xl text-black pb-2 mt-2">Data Ustadz</h1>
            <div class="bg-white rounded-lg shadow-md sm:p-8 p-4 sm:my-8 my-4">
                <!-- OPTION -->
                <form method="POST" action="{{ url('administrator/data-ustadz') }}">
                    @csrf
                    <div class="flex space-x-4 items-center pb-4">
                        <div class="flex-none sm:w-36 w-12">
                            <a class="self-center sm:text-base text-sm">Status</a>
                        </div>
                        <div class="flex-none md:w-1/5">
                            <div class="relative">
                                <select type="text" name="status" value="" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker sm:text-base text-sm px-4 pr-8 rounded" id="grid-state">
                                    @foreach($status as $filter)
                                    <option selected value="{{ $filter->status }}">{{ $filter->status }}</option>
                                    @endforeach 
                                    @foreach($filter_status as $filter)
                                    <option value="{{ $filter->status }}">{{ $filter->status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="object-left text-center text-white sm:text-base text-sm">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Lihat</button>
                        </div>
                    </div>
                </form>
                <p class="sm:text-xl text-lg pt-4 flex items-center border-b-2">Daftar List Ustadz</p>
                <div class="flex flex-row-reverse object-left text-center text-white sm:text-base text-sm py-4">
                    <a href="{{ url('administrator/data-ustadz/form-create') }}" class="button bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">
                        Tambah
                    </a>
                    <a href="{{ url('administrator/data-ustadz/form-import') }}" class="button bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5 mr-6">
                        Import
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
                                <th class="text-center w-1/5 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">NIU</th>
                                <th class="text-center w-1/5 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Nama</th>
                                <th class="text-center w-1/5 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Status</th>
                                <!-- <th class="text-center w-1/5 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Password</th> -->
                                <th class="text-center w-1/5 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Profil</td>
                                <th class="text-center w-1/5 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Aksi</td>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($ustadzs as $ustadz)
                            <tr>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $loop->iteration }}</td>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $ustadz->id }}</td>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $ustadz->name }}</td>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $ustadz->status }}</td>
                                <!-- <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">passwordustadz</td> -->
                                <td class="text-center sm:py-3 py-2 sm:px-4 px-3">
                                    <a href="{{ url('administrator/data-ustadz/detail') }}/{{ $ustadz->id }}" class="transform hover:text-purple-500 hover:scale-110">
                                    <i class="text-center fas fa-external-link-alt"></i></a>                                
                                </td>
                                <td class="grid justify-items-center sm:py-3 py-1.5 sm:px-4 px-2">
                                    <div class="flex">
                                        <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{ url('administrator/data-ustadz/form-update') }}/{{ $ustadz->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{ url('administrator/data-ustadz/delete') }}/{{ $ustadz->id }}">
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
                {{ $ustadzs->links() }}
            </div>
        </main>
    </div>
</div>

@endsection