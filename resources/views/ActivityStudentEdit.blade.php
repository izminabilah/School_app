<x-layout.default>
    <div>
        <!-- Contextual -->
        <div class="panel"  id= "tables-activity">
            <div class="panel">
                <div class="flex items-center justify-between mb-5 ">
                    <h5 class="font-semibold text-lg dark:text-white-light">Aktivitas Siswa</h5>
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
                        Edit aktivitas
                    </button>
                    <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto " id="form-add-activity">
                        <div class="flex items-center justify-center min-h-screen px-4">
                            <div class="panel border-0 p-0 rounded-lg overflow-hidden md:w-full max-w-lg w-[90%] my-8">
                                <button type="button" class="absolute top-4 ltr:right-4 rtl:left-4 text-white-dark hover:text-dark" onclick="location.href='/Schedule'">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                         stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                                <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]"
                                >Edit aktivitas</h3>
                                <div class="p-5">
                                    <form name="form-edit" method="POST" action="{{ route('update-aktivitas', ['id' => $activityStudents->id]) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-5">
                                            <label for="class_student">Kelas</label>
                                            <select id="class_student" name="class_student" class="form-input">
                                                <option value="">-- Select Subject --</option>
                                                @foreach($class_students as $class_student)
                                                    <option value="{{ $class_student->id }}" {{ $activityStudents->class_student_id == $class_student->id ? 'selected' : '' }}>{{ $class_student->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-5">
                                            <label for="datetime">Tanggal</label>
                                            <input id="datetime" type="datetime-local" name="datetime" class="form-input" placeholder="masukkan tanggal" value="{{ $activityStudents->datetime }}">
                                        </div>
                                        <div class="mb-5">
                                            <label for="activity_photo">Foto Aktivitas</label>
                                            <input type="file" id="activity_photo" name="activity_photo" class="form-input" placeholder="masukkan foto">
                                        </div>
                                        <div class="mb-5">
                                            <label for="description">Deskripsi</label>
                                            <input id="description" name="description" class="form-input" placeholder="tulis deskripsi aktivitas" value="{{ $activityStudents->description }}">
                                        </div>
                                        <div class="flex justify-end items-center mt-8">
                                            <button type="button" class="btn btn-outline-danger"
                                                    onclick="location.href='/activity/student'">Cancel</button>
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
                            <th class="font-bold border-2">Tanggal dan Jam Terjadi</th>
                            <th class="font-bold border-2">Foto</th>
                            <th class="font-bold border-2">Deskripsi</th>
                            <th class="font-bold border-2 text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($activityStudents as $activityStudent)
                            <tr>
                                <td class="border-2">{{ $activityStudents->datetime }}</td>
                                <td class="border-2">
                                    <img src="{{ asset('storage/' . $activityStudents->activity_photo) }}" alt="Activity Photo" width="100" />
                                </td>
                                <td class="border-2">{{ $activityStudents->description }}</td>
                                <td class="border-2">
                                    <div class="flex gap-4 items-center justify-center">
                                        <a type="button" class="btn btn-sm btn-outline-primary" href="{{ route('edit-aktivitas', ['id' => $activityStudents->id]) }}">Edit</a>
                                        <a type="button" class="btn btn-sm btn-outline-danger" href="">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak terdapat aktivitas yang dapat ditemukan</td>
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
            document.getElementById("form-add-activity").classList.remove("hidden");
        }
    </script>
</x-layout.default>
