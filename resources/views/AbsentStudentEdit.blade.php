@php use App\Models\AbsentStudent; @endphp
<x-layout.default>
    <div class="panel">
        <div class="panel">
            <div class="flex items-center justify-between flex-wrap mb-5">
                <h5 class="font-semibold text-lg dark:text-white-light">Edit Kehadiran Siswa</h5>
                <div class="flex gap-3">
                    <div>
                        <button type="button" class="btn btn-primary" onclick="myFunction()">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                <circle cx="10" cy="6" r="4" stroke="currentColor" stroke-width="1.5"/>
                                <path opacity="0.5" d="M18 17.5C18 19.9853 18 22 10 22C2 22 2 19.9853 2 17.5C2 15.0147 5.58172 13 10 13C14.4183 13 18 15.0147 18 17.5Z" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M21 10H19M19 10H17M19 10L19 8M19 10L19 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                            Masukkan Daftar Kehadiran
                        </button>
                    </div>
                </div>
                <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto" id="form-add-absent">
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
                            <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]">Edit Absen</h3>
                            <div class="p-5">
                                <form action="{{ url('/activity/absent/update/' . $absent->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-5">
                                        <label for="month">Absensi pada Bulan:</label>
                                        <select id="month" name="month" class="form-input">
                                            <option value="">-- Pilih Bulan --</option>
                                            @foreach($months as $month)
                                                <option value="{{ $month }}" {{ $month === $absent->month ? 'selected' : '' }}>
                                                    {{ $month }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-5">
                                        <label for="year">Tahun</label>
                                        <select id="year" name="year" class="form-input">
                                            <option value="">-- Pilih Tahun --</option>
                                            @foreach($years as $year)
                                                <option value="{{ $year }}" {{ $year === $absent->year ? 'selected' : '' }}>
                                                    {{ $year }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="border-2">
                                            <thead>
                                            <tr>
                                                <th>Name Student</th>
                                                @for ($i = 1; $i <= 31; $i++)
                                                    <th class="border-2">tgl {{ $i }}</th>
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
                                                            <select name="description[]" class="form-input">
                                                                <option value="">-- Pilih Absen --</option>
                                                                @foreach(['M' => 'Masuk', 'S' => 'Sakit', 'A' => 'Absen', 'I' => 'Izin'] as $value => $label)
                                                                    @php
                                                                        $absent = AbsentStudent::where('student_id', $student->id)
                                                                            ->where('day', $i)
                                                                            ->first();
                                                                        $selectedValue = $absent ? $absent->description : '';
                                                                    @endphp
                                                                    <option value="{{ $value }}" {{ $selectedValue === $value ? 'selected' : '' }}>
                                                                        {{ $label }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    @endfor
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="flex justify-end items-center mt-8">
                                        <button type="button" class="btn btn-outline-danger" onclick="location.href='/activity/absent'">Cancel</button>
                                        <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            document.getElementById("form-add-absent").classList.remove("hidden");
        }
    </script>
</x-layout.default>
