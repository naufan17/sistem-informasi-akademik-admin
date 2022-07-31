@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="sm:text-3xl text-2xl text-black pb-2 mt-2">Data Santri</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <div class="p-4">
                    <a href="{{ url('administrator/data-santri') }}" class="button flex items-center border border-black-500 text-black-500 sm:text-base text-sm rounded-sm py-2.5 sm:px-6 px-3.5 sm:w-36 w-28 hover:bg-blue-700 hover:text-white">
                        <svg class="h-5 w-5 mr-3 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                            <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
                <div class="p-4">
                    <h2 class="sm:text-2xl text-xl">Tambah Santri</h2>
                </div>
                <form method="POST" action="{{ url('administrator/data-santri/import') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="pb-4">
                        <div class="md:grid md:grid-cols-4 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600 sm:text-base text-sm">File Import</p>
                            <div class="relative z-0 w-full mb-5 col-span-2">
                                <input class="form-control block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker sm:text-base text-sm py-2 px-4 pr-4 rounded" type="file" name="file" required="required">
                            </div>
                            <div class="object-left text-center text-white sm:text-base text-sm">
                                <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Import</button>
                            </div>
                        </div>
                        <p class="px-4 py-2 sm:text-base text-sm">Download template import <a href="{{ url('administrator/data-santri/sample-import') }}" class="text-blue-800 underline">disini</a></p>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

@endsection