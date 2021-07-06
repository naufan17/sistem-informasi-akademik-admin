@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Data Jadwal</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <p class="text-xl pt-8 flex items-center border-b-2">Daftar List Jadwal</p>
                <div class="flex flex-row-reverse object-left text-center text-white text-base py-8">
                    <a href="{{ url('administrator/data-jadwal/form-create') }}" class="button bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8">
                        Tambah Jadwal
                    </a>
                </div>
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-left w-1/5 py-3 px-4 uppercase font-semibold text-sm">Hari</th>
                                <th class="text-left w-1/5 py-3 px-4 uppercase font-semibold text-sm">Waktu Mulai</th>
                                <th class="text-left w-1/5 py-3 px-4 uppercase font-semibold text-sm">Waktu Selesai</th>
                                <th class="text-left w-1/5 py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($schedules as $schedule)
                            <tr>
                                <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="text-left py-3 px-4">{{ $schedule->day }}</td>
                                <td class="text-left py-3 px-4">{{ $schedule->time_begin }}</td>
                                <td class="text-left py-3 px-4">{{ $schedule->time_end }}</td>
                                <td>
                                    <div class="flex py-3 px-4">
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