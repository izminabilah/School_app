<x-layout.default>
    <div class="panel" id="tables-grade">
        <div class="panel">
            <div>
                <form action="/activity/absent/add" method="POST">
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
</x-layout.default>
