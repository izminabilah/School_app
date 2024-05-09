<x-layout.default>
    <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto " :class="addContactModal && '!block'">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="panel border-0 p-0 rounded-lg md:w-full max-w-lg w-[90%] my-8">
                <a type="button" class="absolute top-4 ltr:right-4 rtl:left-4 text-white-dark hover:text-dark" href="{{route('account-student')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                         stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </a>
                <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]">Edit Account Parent
                    <form name="form-edit" method="POST" action={{route('update-account-par', ['id' => $accountParents->id])}}>
                        @csrf
                        @method('PUT')
                        <div class="mb-5">
                            <label for="name">Name</label>
                            <input id="name" name="name" type="text" placeholder="Enter Name"
                                   class="form-input" value="{{$accountParents->name}}"/>
                        </div>
                        <div class="mb-5">
                            <label for="username">Username</label>
                            <input id="username" name="username" type="text" placeholder="Enter Username"
                                   class="form-input" value="{{$accountParents->username}}"/>
                        </div>
                        <div class="mb-5">
                            <label for="password">Password</label>
                            <input id="password" name="password" type="text" placeholder="Enter Password"
                                   class="form-input" value="{{$accountParents->password}}"/>
                        </div>
                        <div class="flex justify-end items-center mt-8">
                            <a type="button" class="btn btn-outline-danger" href="{{route('account-parent')}}">Cancel</a>
                            <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">Submit</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout.default>
