@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="m:pt-6 pt-3 sm:px-6 px-3">
            <h1 class="sm:text-3xl text-2xl text-black pb-2 mt-2">Data Absensi</h1>
            <div class="bg-white rounded-lg shadow-md sm:p-8 p-4 sm:my-8 my-4">
                <div class="p-4">
                    @foreach($attendances as $attendance)
                    <a href="{{ url('administrator/data-absensi/list') }}/{{ $attendance->id_santri }}" class="button flex items-center border border-black-500 text-black-500 sm:text-base text-sm rounded-sm py-2.5 sm:px-6 px-3.5 sm:w-36 w-28 hover:bg-blue-700 hover:text-white">
                        <svg class="h-5 w-5 mr-3 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                            <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
                        </svg>
                        Kembali
                    </a>
                    @endforeach
                </div>
                <div class="p-4">
                    <h2 class="sm:text-2xl text-xl">Update Absensi</h2>
                </div>
                <form method="POST" action="{{ url('administrator/data-absensi/update') }}">
                    @csrf
                    <div class="pb-4">
                        <div class="pt-4">
                            <p class="self-center sm:text-base text-sm bg-gray-50 py-4 px-4">Absensi</p>
                        </div>
                        @foreach($attendances as $attendance)
                        <input type="hidden" name="id_attendance" value="{{ $attendance->id_attendance }}" class="pt-3 pb-2 px-3 block w-full mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        <input type="hidden" name="id_santri" value="{{ $attendance->id_santri }}" class="pt-3 pb-2 px-3 block w-full mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        @if(date('m') <= 06 )
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center sm:text-base text-sm text-gray-600">Semester</p>
                            <div class="relative z-0 w-full mb-5">
                                <select type="text" name="semester" required onclick="this.setAttribute('value', this.value);" class="sm:text-base text-sm pt-3 pb-2 px-3 block w-full mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                                    <option selected value="{{ $attendance->semester }}">{{ $attendance->semester }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center sm:text-base text-sm text-gray-600">Tahun Ajaran</p>
                            <div class="relative z-0 w-full mb-5">
                                <select type="text" name="year" required onclick="this.setAttribute('value', this.value);" class="sm:text-base text-sm pt-3 pb-2 px-3 block w-full mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                                    <option selected value="{{ $attendance->year }}">{{ $attendance->year }}</option>
                                </select>
                            </div>
                        </div>
                        @elseif(date('m') > 06 )
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center sm:text-base text-sm text-gray-600">Semester</p>
                            <div class="relative z-0 w-full mb-5">
                                <select type="text" name="semester" required onclick="this.setAttribute('value', this.value);" class="sm:text-base text-sm pt-3 pb-2 px-3 block w-full mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                                    <option selected value="{{ $attendance->semester }}">{{ $attendance->semester }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center sm:text-base text-sm text-gray-600">Tahun Ajaran</p>
                            <div class="relative z-0 w-full mb-5">
                                <select type="text" name="year" required onclick="this.setAttribute('value', this.value);" class="sm:text-base text-sm pt-3 pb-2 px-3 block w-full mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                                    <option selected value="{{ $attendance->year }}">{{ $attendance->year }}</option>
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center sm:text-base text-sm text-gray-600">Presentasi Absensi MDNU</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="number" name="attendance_mdnu" value="{{ $attendance->attendance_mdnu }}" min="0" max="100" required class="sm:text-base text-sm pt-3 pb-2 px-3 block w-full mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center sm:text-base text-sm text-gray-600">Presentasi Absensi Asrama</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="number" name="attendance_asrama" value="{{ $attendance->attendance_asrama }}" min="0" max="100" required class="sm:text-base text-sm pt-3 pb-2 px-3 block w-full mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        @endforeach
                        <div class="flex flex-row-reverse object-left text-center text-white sm:text-base text-sm pt-8 px-3">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

@endsection