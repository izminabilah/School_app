<x-layout.default>
    <div class="panel" id="tables-grade">
        <div class="panel">
            <div class="flex items-center justify-between flex-wrap mb-5 ">
                <h5 class="font-semibold text-lg dark:text-white-light">Subject Grade</h5>
                <div class="flex gap-3">
                    <!-- live search -->
                    <div class="relative ">
                        <!-- searchbar -->
                        <form class="mx-auto w-full" action="{{ route('search-class') }}" method="GET">
                            <div class="relative">
                                <input type="text" placeholder="Search Class" class="form-input py-2 ltr:pr-11 rtl:pl-11 peer" id="search-class"  name="search-class" oninput="this.form.submit()"/>
                                <div class="absolute ltr:right-[11px] rtl:left-[11px] top-1/2 -translate-y-1/2 peer-focus:text-primary">
                                    <a type="button">
                                        <svg class="mx-auto" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor"
                                                    stroke-width="1.5" opacity="0.5"></circle>
                                            <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5"
                                                  stroke-linecap="round"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
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
                            Add Subject Grade
                        </button>
                    </div>
                </div>
                <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto hidden" id="form-add-schedule">
                    <div class="flex items-center justify-center min-h-screen px-4">
                        <div class="panel border-0 p-0 rounded-lg overflow-hidden md:w-full w-[90%] my-8">
                            <button type="button" class="absolute top-4 ltr:right-4 rtl:left-4 text-white-dark hover:text-dark" onclick="location.href='/activity/subject/grade'">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                     stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                            <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]"
                            >Add Subject Grade
                            </h3>
                            <div class="p-5">
                                <form action="/activity/subject/grade/add" method="POST">
                                    @csrf
                                    <div class="mb-5">
                                        <label for="subject">Subject</label>
                                        <select id="subject_id" name="subject_id" class="form-input">
                                            <option value="">-- Select Subject --</option>
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <table class="border-2">
                                        <thead>
                                        <tr>
                                            <th>Name Student</th>
                                            <th>Quiz 1</th>
                                            <th>Quiz 2</th>
                                            <th>Midterm Test</th>
                                            <th>Quiz 3</th>
                                            <th>Quiz 4</th>
                                            <th>Final Test</th>
                                            <th>Homework</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $index => $student)
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
                                                    <input id="midterm_test" name="midterm_test[]" type="text" placeholder="input nilai"
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
                                                    <input id="final_test" name="final_test[]" type="text" placeholder="input nilai"
                                                           class="form-input" />
                                                </td>
                                                <td>
                                                    <input id="homework" name="homework[]" type="text" placeholder="input nilai"
                                                           class="form-input" />
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="flex justify-end items-center mt-8">
                                        <button type="button" class="btn btn-outline-danger"
                                                onclick="location.href='/activity/subject/grade'">Cancel</button>
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
                        <th class="border-2">Quiz 1</th>
                        <th class="border-2">Quiz 2</th>
                        <th class="border-2">Midterm Test</th>
                        <th class="border-2">Quiz 3</th>
                        <th class="border-2">Quiz 4</th>
                        <th class="border-2">Final Test</th>
                        <th class="border-2">Homework</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if ($students->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">No students found.</td>
                            </tr>
                        @else
                            @foreach($students as $index => $student)
                                <tr>
                                    <td class="font-bold border-2">{{ $student->name }}</td>
                                    <td class="border-2"></td>
                                    <td class="border-2"></td>
                                    <td class="border-2"></td>
                                    <td class="border-2"></td>
                                    <td class="border-2"></td>
                                    <td class="border-2"></td>
                                    <td class="border-2"></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            document.getElementById("form-add-schedule").classList.remove("hidden");
        }
    </script>
</x-layout.default>
