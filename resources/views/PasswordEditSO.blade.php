<x-layout.default-so>
    <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto " :class="addContactModal && '!block'">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="panel border-0 p-0 rounded-lg md:w-full max-w-lg w-[90%] my-8">
                <a type="button" class="absolute top-4 ltr:right-4 rtl:left-4 text-white-dark hover:text-dark" href="{{route('home_so')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                         stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </a>
                <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]">Edit Password Akun Siswa</h3>
                <div class="p-5">
                    @if(session()->has('error'))
                        <div class="flex items-center p-3.5 rounded text-danger bg-danger-light dark:bg-danger-dark-light">
                            <span class="ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 rtl:ml-1">Error!</strong>{{ session()->get('error') }}</span>
                        </div>
                    @endif
                    <form name="form-edit" method="POST" action={{route('update-pass-so', ['id' => $accountStudents->id])}}>
                        @csrf
                        @method('PUT')
                        <div class="mb-5">
                            <label for="old_password">Password Lama</label>
                            <input id="old_password" name="old_password" type="password" placeholder="Enter Password Lama"
                                   class="form-input" />
                        </div>
                        <div class="mb-5">
                            <label for="new_password">Password Baru</label>
                            <input id="new_password" name="new_password" type="password" placeholder="Enter Password Baru"
                                   class="form-input" />
                        </div>
                        <div class="mb-5">
                            <label for="confirm_password">Konfirmasi Password Baru</label>
                            <input id="confirm_password" name="confirm_password" type="password" placeholder="Konfirmasi Password Baru"
                                   class="form-input" />
                        </div>
                        <div class="flex justify-end items-center mt-8">
                            <a type="button" class="btn btn-outline-danger" href="{{route('home_so')}}">Cancel</a>
                            <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">Submit</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout.default-so>
