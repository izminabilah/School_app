<x-layout.default-so>
    <div class="flex justify-end pb-4">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <p class="text-primary">{{$data}}</p>
            </li>
            <li class="before:content-['/'] before:mr-1 rtl:before:ml-1">
                <span>{{$nama_class}}</span>
            </li>
        </ul>
    </div>

    <div class="panel" id="tables-absent">
        <div class="panel">
            <div class="flex items-center justify-between flex-wrap mb-5 ">
                <h5 class="font-semibold text-lg dark:text-white-light">Daftar Kehadiran Siswa ({{$nama_class}})</h5>
                <div class="flex justify-between gap-2" style="padding-left: 170px">
                    @if($previousMonth)
                        <a href="{{ route('search-absent-so', ['month' => $previousMonth]) }}" class="flex justify-center font-semibold p-2 rounded-full transition bg-white-light text-dark hover:text-white hover:bg-primary dark:text-white-light dark:bg-[#191e3a] dark:hover:bg-primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:rotate-180">
                                <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    @endif
                    <p class="text-xl font-medium">{{ $currentMonth }} 2024</p>
                    @if($nextMonth)
                        <a href="{{ route('search-absent-so', ['month' => $nextMonth]) }}" class="flex justify-center font-semibold p-2 rounded-full transition bg-white-light text-dark hover:text-white hover:bg-primary dark:text-white-light dark:bg-[#191e3a] dark:hover:bg-primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:rotate-180">
                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    @endif
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
</x-layout.default-so>
