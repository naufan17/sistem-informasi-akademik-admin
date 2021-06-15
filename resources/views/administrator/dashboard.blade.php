@extends('administrator.layouts.administrator')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <div class="flex px-24 py-8">
                <div class="flex-1"></div>
                <div class="flex-1 text-center p-8">
                    <p class="text-xl text-gray-800">SELAMAT DATANG DI</p>
                    <p class="text-4xl text-gray-800 pb-6">SIAKAD MDNU</p>
                    <img src="images/dasbor.png" class="py-8">
                </div>
                <div class="flex-1"></div>
            </div>
            <!-- FOOTER -->
            <footer class="container mx-auto bg-white py-8 border-t border-gray-400">
                <div class="container flex px-6 py-8 ">
                    <div class="w-full mx-auto flex flex-wrap">
                        <div class="text-left flex w-full lg:w-1/2 ">
                            <div class="px-3 md:px-0">
                                <h3 class="font-bold text-gray-900">Madrasah Diniyyah Pondok Pesantren Nurul Ummah Yogyakarta</h3>
                                <a class="inline-block no-underline hover:text-black hover:underline pt-5" href="tel:+62 857 2565 5593">Telp. 0857 2565 5593</a><br>
                                <a class="inline-block no-underline hover:text-black hover:underline" href="https://web.whatsapp.com/send?phone=6285725655593&text=Assalamualaikum%20Admin">WhatsApp. 0857 2565 5593</a><br>
                                <a class="inline-block no-underline hover:text-black hover:underline" href="mailto:admisi.nurma@gmail.com">E-mail. admisi.nurma@gmail.com</a>
                            </div>
                        </div>
                        <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right">
                            <div class="px-3 md:px-0">
                                <h3 class="font-bold text-gray-900">Media Sosial</h3>
                                <ul class="list-reset items-center pt-3">
                                    <li>
                                        <a class="inline-block no-underline hover:text-black hover:underline py-1" href="https://instagram.com/nurulummahyk?igshid=1m74irp80dl0v">Instagram</a>
                                        <a class="inline-block no-underline hover:text-black hover:underline" href="https://www.youtube.com/channel/UCYQ8dFPzAkFF0WbS0r-IDaw">YouTube</a>
                                        <a class="inline-block no-underline hover:text-black hover:underline" href="https://nurulummah.com/">Website</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </main>
    </div>
</div>

@endsection