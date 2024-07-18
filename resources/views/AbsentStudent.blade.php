<x-layout.default>
    <div class="panel">
        <div class="panel">
            <div class="flex items-center justify-between flex-wrap mb-5 ">
                <h5 class="font-semibold text-lg dark:text-white-light">Daftar Kehadiran Siswa</h5>
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
                            <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]"
                            >Daftar Absen
                            </h3>
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
                                        <label for="tear">Tahun</label>
                                        <select id="year" name="year[]" class="form-input">
                                            <option value="">-- Pilih Tahun --</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
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
                                                        <td class=" border-2">
                                                            <input type="hidden" name="day[]" value="{{ $i}}">
                                                            <select id="description" name="description[]" class="form-input">
                                                                <option value="">-- Pilih Absen --</option>
                                                                <option value="Masuk">M</option>
                                                                <option value="Sakit">S</option>
                                                                <option value="Absen">A</option>
                                                                <option value="Ijin">I</option>
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
                        <th class="border-2">1</th>
                        <th class="border-2">2</th>
                        <th class="border-2">3</th>
                        <th class="border-2">4</th>
                        <th class="border-2">5</th>
                        <th class="border-2">6</th>
                        <th class="border-2">7</th>
                        <th class="border-2">8</th>
                        <th class="border-2">9</th>
                        <th class="border-2">10</th>
                        <th class="border-2">11</th>
                        <th class="border-2">12</th>
                        <th class="border-2">13</th>
                        <th class="border-2">14</th>
                        <th class="border-2">15</th>
                        <th class="border-2">16</th>
                        <th class="border-2">17</th>
                        <th class="border-2">18</th>
                        <th class="border-2">19</th>
                        <th class="border-2">20</th>
                        <th class="border-2">21</th>
                        <th class="border-2">22</th>
                        <th class="border-2">23</th>
                        <th class="border-2">24</th>
                        <th class="border-2">25</th>
                        <th class="border-2">26</th>
                        <th class="border-2">27</th>
                        <th class="border-2">28</th>
                        <th class="border-2">29</th>
                        <th class="border-2">30</th>
                        <th class="border-2">31</th>
                        <th class="border-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td class="font-bold border-2">{{ $student->name }}</td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2"></td>
                            <td class="border-2">
                                <div class="flex gap-4 items-center justify-center">
                                    <a type="button" class="btn btn-sm btn-outline-primary" href="/">Edit</a>
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
