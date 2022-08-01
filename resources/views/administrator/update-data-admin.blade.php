@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="sm:pt-6 pt-3 sm:px-6 px-3">
            <h1 class="sm:text-3xl text-2xl text-black pb-2 mt-2">Data Admin</h1>
            <div class="bg-white rounded-lg shadow-md sm:p-8 p-4 sm:my-8 my-4">
                <div class="p-4">
                    <a href="{{ url('administrator/data-admin') }}" class="button flex items-center border border-black-500 text-black-500 sm:text-base text-sm rounded-sm py-2.5 sm:px-6 px-3.5 sm:w-36 w-28 hover:bg-blue-700 hover:text-white">
                        <svg class="h-5 w-5 mr-3 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                            <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
                <div class="p-4">
                    <h2 class="sm:text-2xl text-xl">Update Admin</h2>
                </div>
                <form method="POST" action="{{ url('administrator/data-admin/update-profile') }}">
                    @csrf
                    <div class="pb-8">
                        <div class="pt-4">
                            <p class="self-center sm:text-base text-sm bg-gray-50 py-4 px-4">Update Profile</p>
                        </div>
                        @foreach($administrators as $administrator)
                        <input id="id" type="hidden" name="id" value="{{ $administrator->id }}" class="pt-3 pb-2 px-3 block w-full mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center sm:text-base text-sm text-gray-600">Name</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="name" value="{{ $administrator->name }}" required class="sm:text-base text-sm pt-3 pb-2 px-3 block w-full mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center sm:text-base text-sm text-gray-600">Username</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="username" value="{{ $administrator->username }}" required class="sm:text-base text-sm pt-3 pb-2 px-3 block w-full mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if(Auth::guard('administrator')->user()->id != $administrator->id )
                    <div class="flex flex-nowrap flex-row-reverse">
                        <div class="object-left text-center text-white sm:text-base text-sm pt-8 px-3">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Simpan</button>
                        </div>
                        <div class="object-left text-center text-white text-base pt-8 px-3">
                            <a href="{{ url('administrator/data-admin/delete') }}/{{ $administrator->id }}" type="submit" class="border bg-red-600 hover:bg-red-700 rounded py-2.5 sm:px-6 px-3.5">Hapus</a>
                        </div>
                    </div>
                    @else
                    <div class="flex flex-nowrap flex-row-reverse">
                        <div class="object-left text-center text-white sm:text-base text-sm pt-8 px-3">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Simpan</button>
                        </div>
                    </div>
                    @endif
                </form>
                <form method="POST" action="{{ url('administrator/data-admin/update-password') }}">
                    @csrf
                    <div class="pb-8">
                        <div class="pt-8">
                            <p class="self-center sm:text-base text-sm bg-gray-50 py-4 px-4">Update Password</p>
                        </div>
                        @foreach($administrators as $administrator)
                        <input id="id" type="hidden" name="id" value="{{ $administrator->id }}" class="pt-3 pb-2 px-3 block w-full mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center sm:text-base text-sm text-gray-600">New Password</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="password" name="password" required  class="sm:text-base text-sm pt-3 pb-2 px-3 block w-full mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                @error('password')
                                    <span class="invalid-feedback text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center sm:text-base text-sm text-gray-600">Password Confirm</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="password" name="password_confirmation" required  class="sm:text-base text-sm pt-3 pb-2 px-3 block w-full mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="flex flex-row-reverse object-left text-center text-white sm:text-base text-sm pt-8 px-3">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Simpan</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

@endsection