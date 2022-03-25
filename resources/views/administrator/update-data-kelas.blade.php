@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Data Kelas</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <div class="p-4">
                    <a href="{{ url('administrator/data-kelas') }}" class="button flex items-center border border-black-500 text-black-500 rounded-sm py-2.5 px-5 w-32 hover:bg-blue-700 hover:text-white">
                        <svg class="h-5 w-5 mr-3 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                            <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
                <div class="p-4">
                    <h2 class="text-2xl ">Update Kelas</h2>
                </div>
                <form method="POST" action="{{ url('administrator/data-kelas/update') }}">
                    @csrf
                    <div class="pb-8">
                        <div class="pt-8">
                            <p class="self-center bg-gray-50 py-4 px-4">Tingkatan Kelas</p>
                        </div>
                        @foreach($grades as $grade)
                        <input type="hidden" name="id_grade" value="{{ $grade->id_grade }}" placeholder="" required autocomplete="id_grade" required class="pt-3 pb-2 px-3 block w-full mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">Tingkat</p>
                            <div class="relative z-0 w-full mb-5">
                                <select type="number" name="grade_number" value="{{ $grade->grade_number }}"  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker px-4 pr-8 rounded" id="grid-state">
                                    <option selected value="{{ $grade->grade_number }}">{{ $grade->grade_number }}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">Nama Kelas</p>
                            <div class="relative z-0 w-full mb-5">
                                <select type="text" name="grade_name" value="{{ $grade->grade_name }}"  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker px-4 pr-8 rounded" id="grid-state">
                                    <option selected value="{{ $grade->grade_name }}">{{ $grade->grade_name }}</option>
                                    <option value="Awwaliyah">Awwaliyah</option>
                                    <option value="Wustho">Wustho</option>
                                    <option value="Ulya">Ulya</option>
                                </select>                            
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="flex flex-row-reverse object-left text-center text-white text-base pt-8 px-3">
                    <div class="object-left text-center text-white text-base pt-8 px-3">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 px-6">Simpan</button>
                        </div>
                        <div class="object-left text-center text-white text-base pt-8 px-3">
                            <button type="submit" class="bg-red-600 hover:bg-red-700 rounded py-2.5 px-6">Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

@endsection