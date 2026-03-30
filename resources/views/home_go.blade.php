<x-layout.default-go>
    <script defer src="/assets/js/apexcharts.js"></script>
    <div class="flex justify-end pb-4">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <p class="text-primary">{{$data}}</p>
            </li>
            <li class="before:content-['/'] before:mr-1 rtl:before:ml-1">
                <span>{{$status}}</span>
            </li>
        </ul>
    </div>
    <div x-data="sales">
        <div class="pt-5">
            <div class="grid xl:grid-cols-3 gap-6 mb-6">
                <div class="panel h-full xl:col-span-2">
                    <div class="text-center items-center dark:text-white-light mb-5">
                        <h4 class="font-semibold text-lg ">Selamat Datang {{$data}} di  website </h4>
                        <h4 class="font-semibold text-lg">SMA 6 DEPOK</h4>
                    </div>
                    <div class="flex justify-center items-center">
                        <img class="w-20 ml-[10px]" src="/assets/images/Logo-School1.svg" alt="image" />
                    </div>
                    <div class="flex justify-center items-center p-3">
                        <p class="text-gray-700 text-base">
                            Jl. Limo Raya No.30, Meruyung, Kec. Limo, Kota Depok, Jawa Barat 16514
                        </p>
                    </div>
                    <div class="flex justify-center items-center">
                        <p class="text-gray-700 text-base">
                            Telepon: (021) 7545041
                        </p>
                    </div>

                </div>

                <div class="panel h-full">
                    <div class="flex items-center mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light"></h5>
                    </div>
                    <div>
                        <div class="w-[70px] h-[70px] sm:w-[100px] sm:h-[100px] shadow-[1px_2px_12px_0_rgba(31,45,61,0.10)] rounded-full border border-[#e0e6ed] dark:border-[#1b2e4b] flex justify-center flex-col "style="margin-left: 80px">
                            <h1 class="text-primary text-xl sm:text-3xl text-center" id="counter4" >{{$students->count()}}</h1>
                        </div>
                        <div class="items-center" style="padding-bottom: 15px">
                            <h4 class="text-[#3b3f5c] text-xs sm:text-[15px] mt-4 text-center dark:text-white-dark font-semibold" style="padding-top: 15px">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6 text-primary mx-auto mb-2">
                                    <circle cx="9" cy="6" r="4" stroke="currentColor" stroke-width="1.5"></circle>
                                    <path opacity="0.5" d="M12.5 4.3411C13.0375 3.53275 13.9565 3 15 3C16.6569 3 18 4.34315 18 6C18 7.65685 16.6569 9 15 9C13.9565 9 13.0375 8.46725 12.5 7.6589" stroke="currentColor" stroke-width="1.5"></path>
                                    <ellipse cx="9" cy="17" rx="7" ry="4" stroke="currentColor" stroke-width="1.5"></ellipse>
                                    <path opacity="0.5" d="M18 14C19.7542 14.3847 21 15.3589 21 16.5C21 17.5293 19.9863 18.4229 18.5 18.8704" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                Banyaknya Siswa
                            </h4>
                        </div>

                    </div>

                    <!-- guru -->
                    <div>
                        <div class="w-[70px] h-[70px] sm:w-[100px] sm:h-[100px] shadow-[1px_2px_12px_0_rgba(31,45,61,0.10)] rounded-full border border-[#e0e6ed] dark:border-[#1b2e4b] flex justify-center flex-col" style="margin-left: 80px">
                            <h1 class="text-primary text-xl sm:text-3xl text-center" id="counter6">{{$teachers->count()}}</h1>
                        </div>
                        <h4 class="text-[#3b3f5c] text-xs sm:text-[15px] mt-4 text-center dark:text-white-dark font-semibold" style="padding-top: 15px">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6 text-primary mx-auto mb-2">
                                <circle cx="9" cy="6" r="4" stroke="currentColor" stroke-width="1.5"></circle>
                                <path opacity="0.5" d="M12.5 4.3411C13.0375 3.53275 13.9565 3 15 3C16.6569 3 18 4.34315 18 6C18 7.65685 16.6569 9 15 9C13.9565 9 13.0375 8.46725 12.5 7.6589" stroke="currentColor" stroke-width="1.5"></path>
                                <ellipse cx="9" cy="17" rx="7" ry="4" stroke="currentColor" stroke-width="1.5"></ellipse>
                                <path opacity="0.5" d="M18 14C19.7542 14.3847 21 15.3589 21 16.5C21 17.5293 19.9863 18.4229 18.5 18.8704" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            </svg>
                            Banyaknya Guru
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout.default-go>
