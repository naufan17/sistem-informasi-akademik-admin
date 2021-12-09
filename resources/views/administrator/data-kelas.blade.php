@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Kelas</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <p class="text-xl py-8 flex items-center border-b-2">Input Santri pada MP Kelas</p>
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-center w-1/3 py-3 px-4 uppercase font-semibold text-sm">NIS</th>
                                <th class="text-center w-1/3 py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                                <th class="text-center w-1/3 py-3 px-4 uppercase font-semibold text-sm">Mata Pelajaran</td>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($santris as $santri)
                            <tr>
                                <td class="text-center py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="text-center py-3 px-4">{{ $santri->id }}</td>
                                <td class="text-center py-3 px-4">{{ $santri->name }}</td>
                                <td class="py-3 px-4">
                                    <a href="{{ url('administrator/data-kelas/form-create') }}/{{ $santri->id }}" class="transform hover:text-purple-500 hover:scale-110">
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