@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Data Ustadz</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <div class="p-4">
                    <a href="{{ url('administrator/data-ustadz') }}" class="button flex items-center border border-teal-500 text-teal-500 block rounded-sm py-3 px-6 w-32 hover:bg-blue-700 hover:text-white">
                        <svg class="h-5 w-5 mr-3 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                            <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
                        </svg>
                        Back
                    </a>
                </div>
                <div class="p-4">
                    <h2 class="text-2xl ">Update Ustadz</h2>
                </div>
                <form method="GET" action="{{ url('administrator/data-ustadz/update-profile') }}">
                    <div class="pb-8">
                        <div class="pt-8">
                            <p class="self-center bg-gray-50 py-4 px-4">Update Profile</p>
                        </div>
                        @foreach($ustadzs as $ustadz)
                        <input id="id" type="hidden" name="id" placeholder="" value="{{ $ustadz->id }}" required autocomplete="role" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">Name</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="name" placeholder="" value="{{ $ustadz->name }}" required autocomplete="name" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">Email</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="email" name="email" placeholder="" value="{{ $ustadz->email }}" required autocomplete="email" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">Status</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="status" placeholder="" value="{{ $ustadz->status }}" required autocomplete="email" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                <label>
                                    <input type="radio" name="status" value="Aktif"class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black"/>Aktif
                                </label>
                                <label>
                                    <input type="radio" name="status" value="Tidak Aktif" class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black"/>Tidak Aktif
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="flex flex-row-reverse object-left text-center text-white text-base pt-8 px-3">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8" >Simpan</button>
                    </div>
                </form>
                <form method="GET" action="{{ url('administrator/data-ustadz/update-password') }}">
                    <div class="pb-8">
                        <div class="pt-8">
                            <p class="self-center bg-gray-50 py-4 px-4">Update Password</p>
                        </div>
                        @foreach($ustadzs as $ustadz)
                        <input id="id" type="hidden" name="id" placeholder="" value="{{ $ustadz->id }}" required autocomplete="role" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">New Password</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="password" name="password" placeholder="" required autocomplete="new-password" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">Password Confirm</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="password" name="password_confirmation" placeholder="" required autocomplete="new-password" required class="pt-3 pb-2 px-3 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="flex flex-row-reverse object-left text-center text-white text-base pt-8 px-3">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8" >Simpan</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

@endsection