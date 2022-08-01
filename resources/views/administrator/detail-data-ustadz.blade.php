@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- DATA DIRI -->
    <div class="overflow-x-hidden">
        <main class="sm:pt-6 pt-3 sm:px-6 px-3">
            <h1 class="sm:text-3xl text-2xl text-black pb-2 mt-2">Data Ustadz</h1>
            <div class="bg-white rounded-lg shadow-md sm:p-8 p-4 sm:my-8 my-4">
                <div class="p-4">
                    <a href="{{ url('administrator/data-ustadz') }}" class="button flex items-center border border-black-500 text-black-500 sm:text-base text-sm rounded-sm py-2.5 sm:px-6 px-3.5 sm:w-36 w-28 hover:bg-blue-700 hover:text-white">
                        <svg class="h-5 w-5 mr-3 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                            <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
                <div class="p-4">
                    <h2 class="sm:text-2xl text-xl">Informasi Data Diri</h2>
                    <p class="sm:text-sm text-xs text-gray-500">Detail Data Diri</p>
                </div>
                @foreach($ustadzs as $ustadz)
                <div>
                    <div class="pt-8">
                        <p class="self-center sm:text-base text-sm bg-gray-50 py-4 px-4">Identitas Diri</p>
                    </div>
                    <!--
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                        <img id="showImage" class="w-32 rounded-full" src="https://source.unsplash.com/random/350x350" alt="random image">
                    </div>
                    -->
                    <div class="md:grid md:grid-cols-2 sm:text-base text-sm hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Nama Lengkap</p>
                        <p>: {{ $ustadz->name }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 sm:text-base text-sm hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Tempat Lahir</p>
                        <p>: {{ $ustadz->place_born }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 sm:text-base text-sm hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Tanggal Lahir</p>
                        <p>: {{ $ustadz->birthday }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 sm:text-base text-sm hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Jenis Kelamin</p>
                        <p>: {{ $ustadz->gender }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 sm:text-base text-sm hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Nomor Induk Kependudukan / Passport</p>
                        <p>: {{ $ustadz->id_number }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 sm:text-base text-sm hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Golongan Darah</p>
                        <p>: {{ $ustadz->blood }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 sm:text-base text-sm hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Nomor Telepon / Handphone</p>
                        <p>: {{ $ustadz->phone_number }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 sm:text-base text-sm hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Email</p>
                        <p>: {{ $ustadz->email }}</p>
                    </div>
                </div>
                <div>
                    <div class="pt-8">
                        <p class="self-center sm:text-base text-sm bg-gray-50 py-4 px-4">Keterangan Tempat Tinggal Asal</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 sm:text-base text-sm hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Alamat Rumah</p>
                        <p>: {{ $ustadz->address}}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 sm:text-base text-sm hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">RT</p>
                        <p>: {{ $ustadz->RT }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 sm:text-base text-sm hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">RW</p>
                        <p>: {{ $ustadz->RW }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 sm:text-base text-sm hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Kelurahan / Desa</p>
                        <p>: {{ $ustadz->village }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 sm:text-base text-sm hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Kecamatan</p>
                        <p>: {{ $ustadz->districs }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 sm:text-base text-sm hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Kabupaten</p>
                        <p>: {{ $ustadz->regency }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 sm:text-base text-sm hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Provinsi</p>
                        <p>: {{ $ustadz->province }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    </div>
</div>

@endsection