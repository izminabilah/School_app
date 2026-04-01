<x-layout.default>
    <div class="flex justify-end pb-4">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <p class="text-primary">Admin</p>
            </li>
        </ul>
    </div>
    <div>
        <div class="relative rounded-t-md bg-primary-light bg-[url('/assets/images/knowledge/pattern.png')] bg-contain bg-left-top bg-no-repeat px-5 py-10 dark:bg-black md:px-10">
            <div class="absolute -bottom-1 -end-6 hidden text-[#DBE7FF] rtl:rotate-y-180 dark:text-[#1B2E4B] lg:block xl:end-0">
                <img :src="$store.app.theme === 'dark' || $store.app.isDarkMode ? '/assets/images/faq/faq-dark.svg' :
                                            '/assets/images/faq/faq-light.svg'" alt="faqs" class="w-56 object-cover xl:w-80" />
            </div>
            <div class="relative">
                <div class="flex flex-col items-center justify-center sm:-ms-32 sm:flex-row xl:-ms-60">
                    <div class="mb-2 flex gap-1 text-end text-base leading-5 sm:flex-col xl:text-l">
                        <span>Semuanya</span>
                    </div>
                    <div class="me-4 ms-2 hidden sm:block text-[#0E1726] dark:text-white  rtl:rotate-y-180">
                        <svg width="111" height="22" viewBox="0 0 116 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-16 xl:w-28">
                            <path d="M0.645796 11.44C0.215273 11.6829 0.0631375 12.2287 0.305991 12.6593C0.548845 13.0898 1.09472 13.2419 1.52525 12.9991L0.645796 11.44ZM49.0622 20.4639L48.9765 19.5731L48.9765 19.5731L49.0622 20.4639ZM115.315 2.33429L105.013 3.14964L110.87 11.6641L115.315 2.33429ZM1.52525 12.9991C10.3971 7.99452 17.8696 10.3011 25.3913 13.8345C29.1125 15.5825 32.9505 17.6894 36.8117 19.2153C40.7121 20.7566 44.7862 21.7747 49.148 21.3548L48.9765 19.5731C45.0058 19.9553 41.2324 19.0375 37.4695 17.5505C33.6675 16.0481 30.0265 14.0342 26.1524 12.2143C18.4834 8.61181 10.3 5.99417 0.645796 11.44L1.52525 12.9991ZM49.148 21.3548C52.4593 21.0362 54.7308 19.6545 56.4362 17.7498C58.1039 15.8872 59.2195 13.5306 60.2695 11.3266C61.3434 9.07217 62.3508 6.97234 63.8065 5.35233C65.2231 3.77575 67.0736 2.6484 69.8869 2.40495L69.7326 0.62162C66.4361 0.906877 64.1742 2.26491 62.475 4.15595C60.8148 6.00356 59.703 8.35359 58.6534 10.5568C57.5799 12.8105 56.5678 14.9194 55.1027 16.5557C53.6753 18.1499 51.809 19.3005 48.9765 19.5731L49.148 21.3548ZM69.8869 2.40495C72.2392 2.2014 75.0889 2.61953 78.2858 3.35001C81.4816 4.08027 84.9116 5.09374 88.4614 6.04603C91.9873 6.99189 95.6026 7.86868 99.0694 8.28693C102.533 8.70483 105.908 8.67299 108.936 7.75734L108.418 6.04396C105.72 6.85988 102.621 6.91239 99.2838 6.50981C95.9496 6.10757 92.4363 5.25904 88.9252 4.31715C85.4382 3.38169 81.9229 2.34497 78.6845 1.60499C75.4471 0.865243 72.3735 0.393097 69.7326 0.62162L69.8869 2.40495Z" fill="currentColor"></path>
                        </svg>
                    </div>
                    <div class="mb-2 text-center text-xl font-bold dark:text-white md:text-3xl">Ingin tahu Kehadiran siswa?</div>
                </div>
                <p class="mb-9 text-center text-base font-semibold">Masukkan kelas untuk melihat kehadiran siswa</p>
                <form action="{{ route('search-absent') }}" method="GET" class="mb-16">
                    <div class="relative mx-auto max-w-[580px]">
                        <input type="text" placeholder="Masukkan Kelas" class="form-input py-3 ltr:pr-[100px] rtl:pl-[100px]" id="search-absent"  name="search-absent">
                        <button type="submit" class="btn btn-primary absolute top-1 shadow-none ltr:right-1 rtl:left-1">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="panel" @if($search_results_available) @else hidden @endif id="tables-absent">
        <div class="panel">
            <div class="flex items-center justify-between flex-wrap mb-5 ">
                <h5 class="font-semibold text-lg dark:text-white-light">Daftar Kehadiran ( {{$nama_class}} )</h5>
                <div class="flex justify-between gap-2" style="padding-left: 360px">
                    @if($previousMonth)
                        <a href="{{ route('search-absent', ['month' => $previousMonth, 'search-absent' => $search]) }}" class="flex justify-center font-semibold p-2 rounded-full transition bg-white-light text-dark hover:text-white hover:bg-primary dark:text-white-light dark:bg-[#191e3a] dark:hover:bg-primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:rotate-180">
                                <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    @endif
                    <p class="text-xl font-medium">{{ $currentMonth }} 2026</p>
                    @if($nextMonth)
                        <a href="{{ route('search-absent', ['month' => $nextMonth, 'search-absent' => $search]) }}" class="flex justify-center font-semibold p-2 rounded-full transition bg-white-light text-dark hover:text-white hover:bg-primary dark:text-white-light dark:bg-[#191e3a] dark:hover:bg-primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:rotate-180">
                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    @endif
                </div>
                <div class="flex gap-3">
                    <div>
                        <button type="button" class="btn btn-primary" onclick="myFunction()">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                <circle cx="10" cy="6" r="4" stroke="currentColor"
                                        stroke-width="1.5" />
                                <path opacity="0.5"
                                      d="M18 17.5C18 19.9853 18 22 10 22C2 22 2 19.9853 2 17.5C2 15.0147 5.58172 13 10 13C14.4183 13 18 15.0147 18 17.5Z"
                                      stroke="currentColor" stroke-width="1.5" />
                                <path d="M21 10H19M19 10H17M19 10L19 8M19 10L19 12" stroke="currentColor"
                                      stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            Masukkan Daftar Kehadiran
                        </button>
                    </div>
                </div>
                <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto hidden" id="form-add-absent">
                    <div class="flex items-center justify-center min-h-screen px-4">
                        <div class="panel border-0 p-0 rounded-lg overflow-hidden md:w-full w-[90%] my-8">
                            <button type="button" class="absolute top-4 ltr:right-4 rtl:left-4 text-white-dark hover:text-dark" onclick="location.href='/activity/absent'">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                     stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                            <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]">Daftar Absen</h3>
                            <div class="p-5">
                                <form action="/activity/absent/add" method="POST">
                                    @csrf
                                    <div class="mb-5">
                                        <label for="month">Absensi pada Bulan:</label>
                                        <select id="month" name="month[]" class="form-input">
                                            <option value="">-- Pilih Bulan --</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>
                                    <div class="mb-5">
                                        <label for="year">Tahun</label>
                                        <select id="year" name="year[]" class="form-input">
                                            <option value="">-- Pilih Tahun --</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                            <option value="2031">2031</option>
                                            <option value="2032">2032</option>
                                            <option value="2033">2033</option>
                                        </select>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="border-2">
                                            <thead>
                                            <tr>
                                                <th>Name Student</th>
                                                @for ($i = 1; $i <= 31; $i++)
                                                    <th class="border-2">{{ $i }}</th>
                                                @endfor
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($students as $student)
                                                <tr>
                                                    <td>
                                                        {{ $student->name }}
                                                        <input type="hidden" name="student_ids[]" value="{{ $student->id }}">
                                                    </td>
                                                    @for ($i = 1; $i <= 31; $i++)
                                                        <td class="border-2">
                                                            <input type="hidden" name="day[]" value="{{ $i }}">
                                                            <select id="description" name="description[]" class="form-input">
                                                                <option value="">-- Pilih Absen --</option>
                                                                <option value="M">Masuk</option>
                                                                <option value="S">Sakit</option>
                                                                <option value="A">Absen</option>
                                                                <option value="I">Izin</option>
                                                            </select>
                                                        </td>
                                                    @endfor
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="flex justify-end items-center mt-8">
                                        <button type="button" class="btn btn-outline-danger"
                                                onclick="location.href='/activity/absent'">Cancel</button>
                                        <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="mb-5">
            <div class="table-responsive">
                <table class="border-2">
                    <thead>
                    <tr>
                        <th>Name Student</th>
                        @for ($i = 1; $i <= 31; $i++)
                            <th class="border-2">{{ $i }}</th>
                        @endfor
                        <th class="border-2">Total Masuk</th>
                        <th class="border-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td class="font-bold border-2">{{ $student->name }}</td>
                            @php
                                $totalMasuk = 0;
                            @endphp
                            @for ($i = 1; $i <= 31; $i++)
                                <td class="border-2">
                                    @if (isset($absentsStructured[$student->id][$i]))
                                        @if ($absentsStructured[$student->id][$i]->description === 'M')
                                            @php
                                                $totalMasuk++;
                                            @endphp
                                        @endif
                                        {{ $absentsStructured[$student->id][$i]->description }}
                                    @else
                                        -
                                    @endif
                                </td>
                            @endfor
                            <td class="border-2">{{ $totalMasuk }}</td>
                            <td class="border-2">
                                <div class="flex gap-4 items-center justify-center">
                                    <a type="button" class="btn btn-sm btn-outline-primary" href="{{route('edit-absent', ['id' => $student->id])}}">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            document.getElementById("form-add-absent").classList.remove("hidden");
        }
    </script>
</x-layout.default>
