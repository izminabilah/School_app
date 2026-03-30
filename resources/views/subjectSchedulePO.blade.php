<x-layout.default-po>
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
    <div>
        <div class="relative rounded-t-md bg-[url('/assets/images/visi-misi.png')] bg-contain bg-left-top bg-no-repeat px-5 py-10 dark:bg-black md:px-10">
            <div class="absolute bottom-20 end-5 hidden text-[#DBE7FF] rtl:rotate-y-180 dark:text-[#1B2E4B] md:block  xl:end-10">
                <img src="/assets/images/visimisi.png" alt="image" class="h-full w-full object-cover" />
            </div>
            <div class="relative">
                <div class="flex flex-col items-center justify-center sm:-ms-32 sm:flex-row xl:-ms-60">
                    <div class="mb-2 flex gap-1 text-end text-base leading-5 sm:flex-col xl:text-xl">
                        <span>For everyone</span>
                    </div>
                    <div class="me-4 ms-2 hidden sm:block text-[#0E1726] dark:text-white  rtl:rotate-y-180">
                        <svg width="111" height="22" viewBox="0 0 116 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-16 xl:w-28">
                            <path d="M0.645796 11.44C0.215273 11.6829 0.0631375 12.2287 0.305991 12.6593C0.548845 13.0898 1.09472 13.2419 1.52525 12.9991L0.645796 11.44ZM49.0622 20.4639L48.9765 19.5731L48.9765 19.5731L49.0622 20.4639ZM115.315 2.33429L105.013 3.14964L110.87 11.6641L115.315 2.33429ZM1.52525 12.9991C10.3971 7.99452 17.8696 10.3011 25.3913 13.8345C29.1125 15.5825 32.9505 17.6894 36.8117 19.2153C40.7121 20.7566 44.7862 21.7747 49.148 21.3548L48.9765 19.5731C45.0058 19.9553 41.2324 19.0375 37.4695 17.5505C33.6675 16.0481 30.0265 14.0342 26.1524 12.2143C18.4834 8.61181 10.3 5.99417 0.645796 11.44L1.52525 12.9991ZM49.148 21.3548C52.4593 21.0362 54.7308 19.6545 56.4362 17.7498C58.1039 15.8872 59.2195 13.5306 60.2695 11.3266C61.3434 9.07217 62.3508 6.97234 63.8065 5.35233C65.2231 3.77575 67.0736 2.6484 69.8869 2.40495L69.7326 0.62162C66.4361 0.906877 64.1742 2.26491 62.475 4.15595C60.8148 6.00356 59.703 8.35359 58.6534 10.5568C57.5799 12.8105 56.5678 14.9194 55.1027 16.5557C53.6753 18.1499 51.809 19.3005 48.9765 19.5731L49.148 21.3548ZM69.8869 2.40495C72.2392 2.2014 75.0889 2.61953 78.2858 3.35001C81.4816 4.08027 84.9116 5.09374 88.4614 6.04603C91.9873 6.99189 95.6026 7.86868 99.0694 8.28693C102.533 8.70483 105.908 8.67299 108.936 7.75734L108.418 6.04396C105.72 6.85988 102.621 6.91239 99.2838 6.50981C95.9496 6.10757 92.4363 5.25904 88.9252 4.31715C85.4382 3.38169 81.9229 2.34497 78.6845 1.60499C75.4471 0.865243 72.3735 0.393097 69.7326 0.62162L69.8869 2.40495Z" fill="currentColor"></path>
                        </svg>
                    </div>
                    <div class="mb-2 text-center text-xl font-bold dark:text-white md:text-3xl">Wanna know your schedule?</div>
                </div>
                <p class="mb-9 text-center text-base font-semibold">Search your class to get the schedule</p>
                <form action="{{ route('search-schedule-po') }}" method="GET" class="mb-16">
                    <div class="relative mx-auto max-w-[580px]">
                        <input type="text" placeholder="Input your class" class="form-input py-3 ltr:pr-[100px] rtl:pl-[100px]" id="search-schedule-po"  name="search-schedule-po">
                        <button type="submit" class="btn btn-primary absolute top-1 shadow-none ltr:right-1 rtl:left-1">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Contextual -->
        <div class="panel @if($search_results_available) @else hidden @endif" id="tables-schedule">
            <div class="panel">
                <div class="flex items-center justify-between mb-5 ">
                    <h5 class="font-semibold text-lg dark:text-white-light">Jadwal Kelas {{$note}}</h5>
                </div>
            </div>
            <div class="mb-5">
                <div class="table-responsive">
                    <table class="border-2">
                        <thead>
                        <tr>
                            <th class="font-bold border-2">Hari</th>
                            <th class="font-bold border-2">Jam</th>
                            <th class="font-bold border-2">Mapel</th>
                            <th class="font-bold border-2">Guru</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($subjectSchedules as $subjectSchedule)
                            <tr>
                                <td class="font-bold border-2">{{ $subjectSchedule->day}}</td>
                                <td class="font-bold border-2">{{ $subjectSchedule->hour}}</td>
                                <td class="border-2">{{ $subjectSchedule->subject->name}}</td>
                                <td class="border-2">{{ $subjectSchedule->teacher->name }}</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No schedules found for the specified class.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            document.getElementById("form-add-schedule").classList.remove("hidden");
        }
    </script>
</x-layout.default-po>
