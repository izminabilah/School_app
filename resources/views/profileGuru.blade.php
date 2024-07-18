<x-layout.default>

    <div x-data="contacts">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h2 class="text-xl">Profile Guru</h2>
            <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 gap-4 w-full sm:w-auto">
                <div class="flex gap-3">
                    <div>
                        <button type="button" class="btn btn-primary" @click="editUser">

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
                            Tambah Profile
                        </button>
                        <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto hidden"
                             :class="addContactModal && '!block'">
                            <div class="flex items-center justify-center min-h-screen px-4"
                                 @click.self="addContactModal = false">
                                <div x-show="addContactModal" x-transition x-transition.duration.300
                                     class="panel border-0 p-0 rounded-lg overflow-hidden md:w-full max-w-lg w-[90%] my-8">
                                    <button type="button"
                                            class="absolute top-4 ltr:right-4 rtl:left-4 text-white-dark hover:text-dark"
                                            @click="addContactModal = false">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                             stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                    <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]"
                                        x-text="params.id ? 'Edit Contact' : 'Tambah Profile'"></h3>
                                    <div class="p-5">
                                        <form action="/profile/teacher/add" method="POST">
                                            @csrf
                                            <div class="mb-5">
                                                <label for="name">Name</label>
                                                <input id="name" name="name" type="text" placeholder="Enter Name" class="form-input" />
                                            </div>
                                            <div class="mb-5">
                                                <label for="email">Email</label>
                                                <input id="email" name="email" type="email" placeholder="Enter Email" class="form-input"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="number">Teach Subject Code</label>
                                                <input id="subject_id" name="subject_id" type="text" placeholder="Enter Teach Subject Code" class="form-input"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="username">Username</label>
                                                <input id="username" name="username" type="text" placeholder="Enter Username" class="form-input" />
                                            </div>
                                            <div class="mb-5">
                                                <label for="password">Password</label>
                                                <input id="password" name="password" type="text" placeholder="Enter Password" class="form-input" />
                                            </div>
                                            <div class="mb-5">
                                                <div class="flex-1">
                                                    <label for="gender">Jenis Kelamin</label>
                                                    <select id="gender" name="gender" class="form-select" >
                                                        <option value="">Select Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-5">
                                                <label for="address">Address</label>
                                                <textarea id="address" name="address" rows="3" placeholder="Enter Address" class="form-textarea resize-none min-h-[130px]"></textarea>
                                            </div>
                                            <div class="flex justify-end items-center mt-8">
                                                <button type="button" class="btn btn-outline-danger"
                                                        @click="addContactModal = false">Cancel</button>
                                                <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                        x-text="params.id ? 'Update' : 'Add'"></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-outline-primary p-2"
                                :class="{ 'bg-primary text-white': displayType === 'list' }"
                                @click="setDisplayType('list')">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                <path d="M2 5.5L3.21429 7L7.5 3" stroke="currentColor" stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round" />
                                <path opacity="0.5" d="M2 12.5L3.21429 14L7.5 10" stroke="currentColor"
                                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2 19.5L3.21429 21L7.5 17" stroke="currentColor" stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M22 19L12 19" stroke="currentColor" stroke-width="1.5"
                                      stroke-linecap="round" />
                                <path opacity="0.5" d="M22 12L12 12" stroke="currentColor" stroke-width="1.5"
                                      stroke-linecap="round" />
                                <path d="M22 5L12 5" stroke="currentColor" stroke-width="1.5"
                                      stroke-linecap="round" />
                            </svg>
                        </button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-outline-primary p-2"
                                :class="{ 'bg-primary text-white': displayType === 'grid' }"
                                @click="setDisplayType('grid')">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                <path opacity="0.5"
                                      d="M2.5 6.5C2.5 4.61438 2.5 3.67157 3.08579 3.08579C3.67157 2.5 4.61438 2.5 6.5 2.5C8.38562 2.5 9.32843 2.5 9.91421 3.08579C10.5 3.67157 10.5 4.61438 10.5 6.5C10.5 8.38562 10.5 9.32843 9.91421 9.91421C9.32843 10.5 8.38562 10.5 6.5 10.5C4.61438 10.5 3.67157 10.5 3.08579 9.91421C2.5 9.32843 2.5 8.38562 2.5 6.5Z"
                                      stroke="currentColor" stroke-width="1.5" />
                                <path opacity="0.5"
                                      d="M13.5 17.5C13.5 15.6144 13.5 14.6716 14.0858 14.0858C14.6716 13.5 15.6144 13.5 17.5 13.5C19.3856 13.5 20.3284 13.5 20.9142 14.0858C21.5 14.6716 21.5 15.6144 21.5 17.5C21.5 19.3856 21.5 20.3284 20.9142 20.9142C20.3284 21.5 19.3856 21.5 17.5 21.5C15.6144 21.5 14.6716 21.5 14.0858 20.9142C13.5 20.3284 13.5 19.3856 13.5 17.5Z"
                                      stroke="currentColor" stroke-width="1.5" />
                                <path
                                    d="M2.5 17.5C2.5 15.6144 2.5 14.6716 3.08579 14.0858C3.67157 13.5 4.61438 13.5 6.5 13.5C8.38562 13.5 9.32843 13.5 9.91421 14.0858C10.5 14.6716 10.5 15.6144 10.5 17.5C10.5 19.3856 10.5 20.3284 9.91421 20.9142C9.32843 21.5 8.38562 21.5 6.5 21.5C4.61438 21.5 3.67157 21.5 3.08579 20.9142C2.5 20.3284 2.5 19.3856 2.5 17.5Z"
                                    stroke="currentColor" stroke-width="1.5" />
                                <path
                                    d="M13.5 6.5C13.5 4.61438 13.5 3.67157 14.0858 3.08579C14.6716 2.5 15.6144 2.5 17.5 2.5C19.3856 2.5 20.3284 2.5 20.9142 3.08579C21.5 3.67157 21.5 4.61438 21.5 6.5C21.5 8.38562 21.5 9.32843 20.9142 9.91421C20.3284 10.5 19.3856 10.5 17.5 10.5C15.6144 10.5 14.6716 10.5 14.0858 9.91421C13.5 9.32843 13.5 8.38562 13.5 6.5Z"
                                    stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- live search -->
                <div class="relative ">
                    <!-- searchbar -->
                    <form class="mx-auto w-full" action="{{ route('search-profile-tea') }}" method="GET">
                        <div class="relative">
                            <input type="text" placeholder="Search Account" class="form-input py-2 ltr:pr-11 rtl:pl-11 peer" id="search-tea"  name="search-tea" oninput="this.form.submit()"/>
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
            </div>
        </div>
        <div class="mt-5 panel p-0 border-0 overflow-hidden">
            <template x-if="displayType === 'list'">
                <div class="table-responsive">
                    <table class="table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>

                            <th class="!text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($profileTeachers as $profileTeacher)
                            <tr>
                                <td>{{ $profileTeacher->name }}</td>
                                <td>{{ $profileTeacher->email }}</td>
                                <td class="whitespace-nowrap">{{ $profileTeacher->address }}</td>

                                <td>
                                    <div class="flex gap-4 items-center justify-center">
                                        <a type="button" class="btn btn-sm btn-outline-primary" href="{{route('edit-profile-tea', ['id' => $profileTeacher->id])}}">Edit</a>
                                        <a type="button" class="btn btn-sm btn-outline-danger" href="{{route('delete-profile-tea', ['id' => $profileTeacher->id])}}">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No data available</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </template>
        </div>
        <template x-if="displayType === 'grid'">
            <div class="grid 2xl:grid-cols-4 xl:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6 w-full">
                <template x-for="contact in filterdContactsList" :key="contact.id">
                    <div class="bg-white dark:bg-[#1c232f] rounded-md overflow-hidden text-center shadow relative">
                        <div
                            class="bg-white/40 rounded-t-md bg-[url('/assets/images/notification-bg.png')] bg-center bg-cover p-6 pb-0">
                            <template x-if="contact.path">
                                <img class="object-contain w-4/5 max-h-40 mx-auto"
                                     :src="`/assets/images/${contact.path}`" />
                            </template>
                        </div>
                        <div class="px-6 pb-24 -mt-10 relative">
                            <div class="shadow-md bg-white dark:bg-gray-900 rounded-md px-2 py-4">
                                <div class="text-xl" x-text="contact.name"></div>
                                <div class="text-white-dark" x-text="contact.role"></div>
                                <div class="flex items-center justify-between flex-wrap mt-6 gap-3">
                                    <div class="flex-auto">
                                        <div class="text-info" x-text="contact.posts"></div>
                                        <div>Posts</div>
                                    </div>
                                    <div class="flex-auto">
                                        <div class="text-info" x-text="contact.following"></div>
                                        <div>Following</div>
                                    </div>
                                    <div class="flex-auto">
                                        <div class="text-info" x-text="contact.followers"></div>
                                        <div>Followers</div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <ul class="flex space-x-4 rtl:space-x-reverse items-center justify-center">
                                        <li>
                                            <a href="javascript:;"
                                               class="btn btn-outline-primary p-0 h-7 w-7 rounded-full">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                     class="w-4 h-4">
                                                    <path
                                                        d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;"
                                               class="btn btn-outline-primary p-0 h-7 w-7 rounded-full">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                     class="w-4 h-4">
                                                    <rect x="2" y="2" width="20"
                                                          height="20" rx="5" ry="5"></rect>
                                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                    <line x1="17.5" y1="6.5" x2="17.51"
                                                          y2="6.5"></line>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;"
                                               class="btn btn-outline-primary p-0 h-7 w-7 rounded-full">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                     class="w-4 h-4">
                                                    <path
                                                        d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                                    </path>
                                                    <rect x="2" y="9" width="4"
                                                          height="12"></rect>
                                                    <circle cx="4" cy="4" r="2"></circle>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;"
                                               class="btn btn-outline-primary p-0 h-7 w-7 rounded-full">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                     class="w-4 h-4">
                                                    <path
                                                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-6 grid grid-cols-1 gap-4 ltr:text-left rtl:text-right">
                                <div class="flex items-center">
                                    <div class="flex-none ltr:mr-2 rtl:ml-2">Email :</div>
                                    <div class="truncate text-white-dark" x-text="contact.email"></div>
                                </div>
                                <div class="flex items-center">
                                    <div class="flex-none ltr:mr-2 rtl:ml-2">Phone :</div>
                                    <div class="text-white-dark" x-text="contact.phone"></div>
                                </div>
                                <div class="flex items-center">
                                    <div class="flex-none ltr:mr-2 rtl:ml-2">Address :</div>
                                    <div class="text-white-dark" x-text="contact.location"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex gap-4 absolute bottom-0 w-full ltr:left-0 rtl:right-0 p-6">
                            <button type="button" class="btn btn-outline-primary w-1/2"
                                    @click="editUser(contact)">Edit</button>
                            <button type="button" class="btn btn-outline-danger w-1/2"
                                    @click="deleteUser(contact)">Delete</button>
                        </div>
                    </div>
                </template>
            </div>
        </template>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("contacts", () => ({
                defaultParams: {
                    id: null,
                    name: '',
                    email: '',
                    role: '',
                    phone: '',
                    location: ''
                },
                displayType: 'list',
                addContactModal: false,
                params: {
                    id: null,
                    name: '',
                    email: '',
                    role: '',
                    phone: '',
                    location: ''
                },
                filterdContactsList: [],
                searchUser: '',
                contactList: [{
                    id: 1,
                    path: 'profile-35.png',
                    name: 'Alan Green',
                    role: 'Web Developer',
                    email: 'alan@mail.com',
                    location: 'Boston, USA',
                    phone: '+1 202 555 0197',
                    posts: 25,
                    followers: '5K',
                    following: 500,
                },
                    {
                        id: 2,
                        path: 'profile-35.png',
                        name: 'Linda Nelson',
                        role: 'Web Designer',
                        email: 'linda@mail.com',
                        location: 'Sydney, Australia',
                        phone: '+1 202 555 0170',
                        posts: 25,
                        followers: '21.5K',
                        following: 350,
                    },
                    {
                        id: 3,
                        path: 'profile-35.png',
                        name: 'Lila Perry',
                        role: 'UX/UI Designer',
                        email: 'lila@mail.com',
                        location: 'Miami, USA',
                        phone: '+1 202 555 0105',
                        posts: 20,
                        followers: '21.5K',
                        following: 350,
                    },
                    {
                        id: 4,
                        path: 'profile-35.png',
                        name: 'Andy King',
                        role: 'Project Lead',
                        email: 'andy@mail.com',
                        location: 'Tokyo, Japan',
                        phone: '+1 202 555 0194',
                        posts: 25,
                        followers: '21.5K',
                        following: 300,
                    },
                    {
                        id: 5,
                        path: 'profile-35.png',
                        name: 'Jesse Cory',
                        role: 'Web Developer',
                        email: 'jesse@mail.com',
                        location: 'Edinburgh, UK',
                        phone: '+1 202 555 0161',
                        posts: 30,
                        followers: '20K',
                        following: 350,
                    }
                ],

                init() {
                    this.searchContacts();
                },

                searchContacts() {
                    this.filterdContactsList = this.contactList.filter((d) => d.name.toLowerCase()
                        .includes(this.searchUser.toLowerCase()));
                },

                editUser(user) {
                    this.params = this.defaultParams;
                    if (user) {
                        this.params = JSON.parse(JSON.stringify(user));
                    }

                    this.addContactModal = true;
                },

                saveUser() {
                    if (!this.params.name) {
                        this.showMessage('Name is required.', 'error');
                        return true;
                    }
                    if (!this.params.email) {
                        this.showMessage('Email is required.', 'error');
                        return true;
                    }
                    if (!this.params.phone) {
                        this.showMessage('Phone is required.', 'error');
                        return true;
                    }
                    if (!this.params.role) {
                        this.showMessage('Occupation is required.', 'error');
                        return true;
                    }

                    if (this.params.id) {
                        //update user
                        let user = this.contactList.find((d) => d.id === this.params.id);
                        user.name = this.params.name;
                        user.email = this.params.email;
                        user.role = this.params.role;
                        user.phone = this.params.phone;
                        user.location = this.params.location;
                    } else {
                        //add user
                        let maxUserId = this.contactList.length ? this.contactList.reduce((max,
                                                                                           character) => (character.id > max ? character.id : max), this
                            .contactList[0].id) : 0;

                        let user = {
                            id: maxUserId + 1,
                            path: 'profile-35.png',
                            name: this.params.name,
                            email: this.params.email,
                            role: this.params.role,
                            phone: this.params.phone,
                            location: this.params.location,
                            posts: 20,
                            followers: '5K',
                            following: 500,
                        };
                        this.contactList.splice(0, 0, user);
                        this.searchContacts();
                    }

                    this.showMessage('User has been saved successfully.');
                    this.addContactModal = false;
                },

                deleteUser(user) {
                    this.contactList = this.contactList.filter((d) => d.id != user.id);
                    this.searchContacts();
                    this.showMessage('User has been deleted successfully.');
                },

                setDisplayType(type) {
                    this.displayType = type;
                },

                showMessage(msg = '', type = 'success') {
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    toast.fire({
                        icon: type,
                        title: msg,
                        padding: '10px 20px',
                    });
                },
            }));
        });
    </script>
</x-layout.default>
