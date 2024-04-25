<x-layout.default>
    <script defer src="/assets/js/apexcharts.js"></script>
    <div x-data="sales">

        <div class="pt-5">
            <div class="grid xl:grid-cols-3 gap-6 mb-6">
                <div class="panel h-full xl:col-span-2">
                    <div class="flex items-center dark:text-white-light mb-5">
                        <h5 class="font-semibold text-lg">Semester Calender</h5>

                    </div>
                    <p class="text-lg dark:text-white-light/90">Total Profit <span
                            class="text-primary ml-2">$10,840</span>
                    </p>
                    <div class="pt-3 flex">
                        <div class="rounded overflow-hidden shadow-lg w-6/12">
                            <img class="w-11/12" src="/assets/images/auth/school-buildings.png" salt="School building">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                                <p class="text-gray-700 text-base">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                                </p>
                            </div>
                        </div>
                        <div class="rounded overflow-hidden shadow-lg w-6/12">
                            <img class="w-11/12" src="/assets/images/auth/school-buildings.png" salt="School building">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                                <p class="text-gray-700 text-base">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="panel h-full">
                    <div class="flex items-center mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Recent Payment Validation</h5>
                    </div>
                    <div class="overflow-hidden">
                        <div x-ref="salesByCategory" class="bg-white dark:bg-black rounded-lg">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout.default>
