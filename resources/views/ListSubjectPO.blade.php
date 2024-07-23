<x-layout.default-po>

    <div x-data="account">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h2 class="text-xl">Daftar Mata Pelajaran</h2>
            <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 gap-4 w-full sm:w-auto">
            </div>
        </div>
        <div class="mt-5 panel p-0 border-0 overflow-hidden">
            <template x-if="displayType === 'list'">
                <div class="table-responsive">
                    <table class="table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="whitespace-nowrap"></th>
                            <th class="whitespace-nowrap"></th>
                            <th class="whitespace-nowrap"></th>
                            <th class="whitespace-nowrap"></th>
                            <th >Mata Pelajaran</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($subjects as $subject)
                            <tr>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td>{{ $subject->name }}</td>
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
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("account", () => ({
                defaultParams: {
                    id: null,
                    name: '',
                    username: '',
                    password: '',
                },
                displayType: 'list',
                addContactModal: false,
                params: {
                    id: null,
                    name: '',
                    username: '',
                    password: '',
                },
                filterdAccountList: [],
                searchUser: '',
                contactList: [{
                    id: 1,
                    path: 'profile-35.png',
                    name: 'Alan Green',
                    username: 'alan@mail.com',
                    password: '+1 202 555 0197',
                    posts: 25,
                }],

                init() {
                    this.searchAccount();
                },

                searchAccount() {
                    this.filterdAccountList = this.contactList.filter((d) => d.name.toLowerCase()
                        .includes(this.searchUser.toLowerCase()));
                },

                editUser(user) {
                    this.params = this.defaultParams;
                    if (user) {
                        this.params = JSON.parse(JSON.stringify(user));
                    }

                    this.addContactModal = true;
                },

                saveUsername() {
                    if (!this.params.name) {
                        this.showMessage('Name is required.', 'error');
                        return true;
                    }
                    if (!this.params.username) {
                        this.showMessage('Username is required.', 'error');
                        return true;
                    }
                    if (!this.params.password) {
                        this.showMessage('password is required.', 'error');
                        return true;
                    }


                    if (this.params.id) {
                        //update user
                        let user = this.contactList.find((d) => d.id === this.params.id);
                        user.name = this.params.name;
                        user.username = this.params.username;
                        user.password = this.params.password;
                    } else {
                        //add user
                        let maxUserId = this.contactList.length ? this.contactList.reduce((max,
                                                                                           character) => (character.id > max ? character.id : max), this
                            .contactList[0].id) : 0;

                        let user = {
                            id: maxUserId + 1,
                            path: 'profile-35.png',
                            name: this.params.name,
                            username: this.params.username,
                            password: this.params.password,
                            posts: 20,
                        };
                        this.contactList.splice(0, 0, user);
                        this.searchAccount();
                    }

                    this.showMessage('User has been saved successfully.');
                    this.addContactModal = false;
                },

                deleteUser(user) {
                    this.contactList = this.contactList.filter((d) => d.id != user.id);
                    this.searchAccount();
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
</x-layout.default-po>
