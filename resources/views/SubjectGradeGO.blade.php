<x-layout.default-go>
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

        <div class="panel" id="tables-grade">
            <div class="panel">
                <div class="flex items-center justify-between flex-wrap mb-5 ">
                    <h5 class="font-semibold text-lg dark:text-white-light">Nilai Mata Pelajaran {{$mapel}} ( {{$nama_class}} )</h5>
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
                                Tambah Nilai
                            </button>
                        </div>
                    </div>
                    <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto hidden" id="form-add-grade">
                        <div class="flex items-center justify-center min-h-screen px-4">
                            <div class="panel border-0 p-0 rounded-lg overflow-hidden md:w-full w-[90%] my-8">
                                <button type="button" class="absolute top-4 ltr:right-4 rtl:left-4 text-white-dark hover:text-dark" onclick="location.href='/go/activity/subject/grade'">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                         stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                                <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]"
                                >Tambah Nilai Mapel
                                </h3>
                                <div class="p-5">
                                    <form action="/go/activity/subject/grade/add" method="POST">
                                        @csrf
                                        <div class="mb-5">
                                            <label for="subject">Mata Pelajaran</label>
                                            <select id="subject_id" name="subject_id" class="form-input">
                                                <option value="">-- Pilih Mapel --</option>
                                                @foreach($subjects as $subject)
                                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <table class="border-2">
                                            <thead>
                                            <tr>
                                                <th>Nama Siswa</th>
                                                <th>Ulangan Harian 1</th>
                                                <th>Ulangan Harian 2</th>
                                                <th>Ulangan Harian 3</th>
                                                <th>Ulangan Harian 4</th>
                                                <th>Tugas 1</th>
                                                <th>UTS</th>
                                                <th>Ulangan Harian 5</th>
                                                <th>Ulangan Harian 6</th>
                                                <th>Ulangan Harian 7</th>
                                                <th>Ulangan Harian 8</th>
                                                <th>Tugas 2</th>
                                                <th>UAS</th>
                                                <th>Nilai Keterampilan</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($students as $student)
                                                <tr>
                                                    <td>
                                                        {{ $student->name }}
                                                        <input type="hidden" name="student_ids[]" value="{{ $student->id }}">
                                                    </td>
                                                    <td>
                                                        <input id="quiz1" name="quiz1[]" type="text" placeholder="input nilai"
                                                               class="form-input" />
                                                    </td>
                                                    <td>
                                                        <input id="quiz2" name="quiz2[]" type="text" placeholder="input nilai"
                                                               class="form-input" />
                                                    </td>
                                                    <td>
                                                        <input id="quiz3" name="quiz3[]" type="text" placeholder="input nilai"
                                                               class="form-input" />
                                                    </td>
                                                    <td>
                                                        <input id="quiz4" name="quiz4[]" type="text" placeholder="input nilai"
                                                               class="form-input" />
                                                    </td>
                                                    <td>
                                                        <input id="homework1" name="homework1[]" type="text" placeholder="input nilai"
                                                               class="form-input" />
                                                    </td>
                                                    <td>
                                                        <input id="midterm_test" name="midterm_test[]" type="text" placeholder="input nilai"
                                                               class="form-input" />
                                                    </td>
                                                    <td>
                                                        <input id="quiz5" name="quiz5[]" type="text" placeholder="input nilai"
                                                               class="form-input" />
                                                    </td>
                                                    <td>
                                                        <input id="quiz6" name="quiz6[]" type="text" placeholder="input nilai"
                                                               class="form-input" />
                                                    </td>
                                                    <td>
                                                        <input id="quiz7" name="quiz7[]" type="text" placeholder="input nilai"
                                                               class="form-input" />
                                                    </td>
                                                    <td>
                                                        <input id="quiz8" name="quiz8[]" type="text" placeholder="input nilai"
                                                               class="form-input" />
                                                    </td>
                                                    <td>
                                                        <input id="homework2" name="homework2[]" type="text" placeholder="input nilai"
                                                               class="form-input" />
                                                    </td>
                                                    <td>
                                                        <input id="final_test" name="final_test[]" type="text" placeholder="input nilai"
                                                               class="form-input" />
                                                    </td>
                                                    <td>
                                                        <input id="keterampilan" name="keterampilan[]" type="text" placeholder="input nilai"
                                                               class="form-input" />
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="flex justify-end items-center mt-8">
                                            <button type="button" class="btn btn-outline-danger"
                                                    onclick="location.href='/go/activity/subject/grade'">Cancel</button>
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
                            <th class="border-2">Nama Siswa</th>
                            <th class="border-2">Ulangan Harian 1</th>
                            <th class="border-2">Ulangan Harian 2</th>
                            <th class="border-2">Ulangan Harian 3</th>
                            <th class="border-2">Ulangan Harian 4</th>
                            <th class="border-2">Tugas 1</th>
                            <th class="border-2">UTS</th>
                            <th class="border-2">Ulangan Harian 5</th>
                            <th class="border-2">Ulangan Harian 6</th>
                            <th class="border-2">Ulangan Harian 7</th>
                            <th class="border-2">Ulangan Harian 8</th>
                            <th class="border-2">Tugas 2</th>
                            <th class="border-2">UAS</th>
                            <th class="border-2">Keterampilan</th>
                            <th class="border-2">Nilai Akhir Pada Rapor</th>
                            <th class="border-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            @php
                                $studentGrades = $subjectGrades->where('student_id', $student->id)->first();
                            @endphp
                            @if($studentGrades)
                                <tr>
                                    <td class="font-bold border-2">{{ $student->name }}</td>
                                    <td class="border-2">{{ $studentGrades->quiz1 }}</td>
                                    <td class="border-2">{{ $studentGrades->quiz2 }}</td>
                                    <td class="border-2">{{ $studentGrades->quiz3 }}</td>
                                    <td class="border-2">{{ $studentGrades->quiz4 }}</td>
                                    <td class="border-2">{{ $studentGrades->homework1 }}</td>
                                    <td class="border-2">{{ $studentGrades->midterm_test }}</td>
                                    <td class="border-2">{{ $studentGrades->quiz5 }}</td>
                                    <td class="border-2">{{ $studentGrades->quiz6 }}</td>
                                    <td class="border-2">{{ $studentGrades->quiz7 }}</td>
                                    <td class="border-2">{{ $studentGrades->quiz8 }}</td>
                                    <td class="border-2">{{ $studentGrades->homework2 }}</td>
                                    <td class="border-2">{{ $studentGrades->final_test }}</td>
                                    <td class="border-2">{{ $studentGrades->keterampilan }}</td>
                                    @php
                                        $averageHomework = ($studentGrades->homework1 + $studentGrades->homework2) / 2;
                                        $averageQuizzes = ($studentGrades->quiz1 + $studentGrades->quiz2 + $studentGrades->quiz3 + $studentGrades->quiz4 + $studentGrades->quiz5 + $studentGrades->quiz6 + $studentGrades->quiz7 + $studentGrades->quiz8) / 8;
                                        $finalGrade = (0.2 * $averageHomework) + (0.3 * $averageQuizzes) + (0.2 * $studentGrades->midterm_test) + (0.3 * $studentGrades->final_test);
                                    @endphp
                                    <td class="border-2">{{ $finalGrade }}</td>
                                    <td class="border-2">
                                        <div class="flex gap-4 items-center justify-center">
                                            <a type="button" class="btn btn-sm btn-outline-primary" href="{{route('edit-grade-go', ['id' => $studentGrades->id])}}">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <script>
        function myFunction() {
            document.getElementById("form-add-grade").classList.remove("hidden");
        }
    </script>
</x-layout.default-go>
