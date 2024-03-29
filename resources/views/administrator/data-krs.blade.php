@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="m:pt-6 pt-3 sm:px-6 px-3">
            <h1 class="sm:text-3xl text-2xl text-black pb-2 mt-2">Data KRS</h1>
            <div class="bg-white rounded-lg shadow-md sm:p-8 p-4 sm:my-8 my-4">
                <form method="POST" action="{{ url('administrator/data-krs') }}">
                    @csrf
                    <div class="flex space-x-4 items-center pb-4">
                        <div class="flex-none sm:w-36 w-12">
                            <a class="self-center sm:text-base text-sm">Tingkat</a>
                        </div>
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
                            <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 px-6">Lihat</button>
                        </div>
                    </div>
                </form>
                <p class="sm:text-xl text-lg mb-4 pt-4 flex items-center">Input Santri pada MP Kelas</p>
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-center sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">No</th>
                                <th class="text-center w-1/3 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">NIS</th>
                                <th class="text-center w-1/3 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Nama</th>
                                <th class="text-center w-1/3 sm:py-3 py-2 sm:px-4 px-3 uppercase font-semibold sm:text-base text-sm">Mata Pelajaran</td>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($santris as $santri)
                            <tr>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $loop->iteration }}</td>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $santri->id }}</td>
                                <td class="text-center sm:text-base text-sm sm:py-3 py-2 sm:px-4 px-3">{{ $santri->name }}</td>
                                <td class="grid justify-items-center sm:py-3 py-2 sm:px-4 px-3">
                                    <a href="{{ url('administrator/data-krs/form-create') }}/{{ $santri->id }}" class="transform hover:text-purple-500 hover:scale-110">
                                    <i class="text-center fas fa-external-link-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $santris->links() }}
            </div>
        </main>
    </div>
</div>

@endsection