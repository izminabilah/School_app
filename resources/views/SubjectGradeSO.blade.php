<x-layout.default-so>
    @isset($subjectGrades)
        <div class="panel" id="tables-grade">
            <div class="panel">
                <div class="flex items-center justify-between flex-wrap mb-5 ">
                    <h5 class="font-semibold text-lg dark:text-white-light">Nilai Mata Pelajaran</h5>
                </div>
            </div>
            <div class="mb-5">
                <div class="table-responsive">
                    <table class="border-2">
                        <thead>
                        <tr>
                            <th class="border-2">Mata Pelajaran</th>
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
                            <th class="border-2">Nilai Akhir Pada Rapor</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subjectGrades as $subjectGrade)
                            <tr>
                                <td class="font-bold border-2">{{ $subjectGrade->subject->name }}</td>
                                <td class="border-2">{{ $subjectGrade->quiz1 }}</td>
                                <td class="border-2">{{ $subjectGrade->quiz2 }}</td>
                                <td class="border-2">{{ $subjectGrade->quiz3 }}</td>
                                <td class="border-2">{{ $subjectGrade->quiz4 }}</td>
                                <td class="border-2">{{ $subjectGrade->homework1 }}</td>
                                <td class="border-2">{{ $subjectGrade->midterm_test }}</td>
                                <td class="border-2">{{ $subjectGrade->quiz5 }}</td>
                                <td class="border-2">{{ $subjectGrade->quiz6 }}</td>
                                <td class="border-2">{{ $subjectGrade->quiz7 }}</td>
                                <td class="border-2">{{ $subjectGrade->quiz8 }}</td>
                                <td class="border-2">{{ $subjectGrade->homework2 }}</td>
                                <td class="border-2">{{ $subjectGrade->final_test }}</td>
                                @php
                                    $averageHomework = ($subjectGrade->homework1 + $subjectGrade->homework2) / 2;
                                    $averageQuizzes = ($subjectGrade->quiz1 + $subjectGrade->quiz2 + $subjectGrade->quiz3 + $subjectGrade->quiz4 + $subjectGrade->quiz5 + $subjectGrade->quiz6 + $subjectGrade->quiz7 + $subjectGrade->quiz8) / 8;
                                    $finalGrade = (0.2 * $averageHomework) + (0.3 * $averageQuizzes) + (0.2 * $subjectGrade->midterm_test) + (0.3 * $subjectGrade->final_test);
                                @endphp
                                <td class="border-2">{{ $finalGrade }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endisset
    <script>
        function myFunction() {
            document.getElementById("form-add-grade").classList.remove("hidden");
        }
    </script>
</x-layout.default-so>
