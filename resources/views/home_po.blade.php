<x-layout.default-po>
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
    <script defer src="/assets/js/apexcharts.js"></script>
    <div x-data="sales">

        <div class="pt-5">
            <div class="grid xl:grid-cols-3 gap-6 mb-6">
                <div class="panel h-full xl:col-span-2">
                    <form
                        class="border border-[#ebedf2] dark:border-[#191e3a] rounded-md p-4 mb-5 bg-white dark:bg-[#0e1726]">
                        <h6 class="text-lg font-bold mb-5">Informasi Siswa</h6>
                        <div class="flex flex-col sm:flex-row">

                            <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div>
                                    <label for="name">Full Name</label>
                                    <div>
                                        <p class="border-2 p-2">{{$nama_siswa}}</p>
                                    </div>
                                </div>
                                <div>
                                    <label for="class">NISN</label>
                                    <div>
                                        <p class="border-2 p-2">{{$nisn}}</p>
                                    </div>
                                </div>
                                <div>
                                    <label for="class">Kelas</label>
                                    <div>
                                        <p class="border-2 p-2">{{$nama_class}}</p>
                                    </div>
                                </div>
                                <div>
                                    <label for="parent">Nama Wali</label>
                                    <div>
                                        <p class="border-2 p-2">{{$data}}</p>
                                    </div>
                                </div>
                                <div>
                                    <label for="address">Address</label>
                                    <div>
                                        <p class="border-2 p-2">{{$alamat}}</p>
                                    </div>
                                </div>
                                <div>
                                    <label for="gender">Jenis Kelamin</label>
                                    <div>
                                        <p class="border-2 p-2">{{$gender}}</p>
                                    </div>
                                </div>
                                <div>
                                    <label for="religion">Agama</label>
                                    <div>
                                        <p class="border-2 p-2">{{$agama}}</p>
                                    </div>
                                </div>
                                <div>
                                    <div style="padding-top: 30px">

                                    </div>
                                    <div>
                                        <a type="button" class="btn btn-sm btn-outline-primary" href="/home_po/password/change/edit/{id}">Edit Password akun</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                    <div class="relative overflow-hidden">
                        <div x-ref="revenueChart" class="bg-white dark:bg-black rounded-lg hidden">
                            <!-- loader -->
                            <div
                                class="min-h-[325px] grid place-content-center bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08] ">
                                <span
                                    class="animate-spin border-2 border-black dark:border-white !border-l-transparent  rounded-full w-5 h-5 inline-flex"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel h-full">
                    <div class="flex items-center mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Daftar Kehadiran</h5>
                    </div>
                    <div class="overflow-hidden">
                        <div x-ref="salesByCategory" class="bg-white dark:bg-black rounded-lg">
                            <!-- loader -->
                            <div
                                class="min-h-[353px] grid place-content-center bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08] ">
                                <span
                                    class="animate-spin border-2 border-black dark:border-white !border-l-transparent  rounded-full w-5 h-5 inline-flex"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("sales", () => ({
                sakit: {{ $absentData['sakit'] ?? 0 }},
                izin: {{ $absentData['izin'] ?? 0 }},
                alpa: {{ $absentData['alpa'] ?? 0 }},
                hadir: {{ $absentData['hadir'] ?? 0 }},
                ppkn: {{ $finalGrades['ppkn'] ?? 0 }},
                mtk_wajib:{{ $finalGrades['mtk_wajib'] ?? 0 }},
                ekonomi: {{ $finalGrades['ekonomi'] ?? 0 }},
                b_indonesia: {{ $finalGrades['b_indonesia'] ?? 0 }},
                b_inggris: {{ $finalGrades['b_inggris'] ?? 0 }},
                sejarah_indonesia: {{ $finalGrades['sejarah_indonesia'] ?? 0 }},


                init() {
                    console.log('Initializing...');
                    console.log(this.sakit, this.izin, this.alpa, this.hadir, this.ppkn, this.mtk_wajib, this.ekonomi, this.b_indonesia, this.b_inggris, this.sejarah_indonesia);

                    isDark = this.$store.app.theme === "dark" || this.$store.app.isDarkMode ? true : false;
                    isRtl = this.$store.app.rtlClass === "rtl" ? true : false;

                    this.revenueChart = new ApexCharts(this.$refs.revenueChart, this.revenueChartOptions);
                    this.$refs.revenueChart.innerHTML = "";
                    this.revenueChart.render();

                    this.salesByCategory = new ApexCharts(this.$refs.salesByCategory, this.salesByCategoryOptions);
                    this.$refs.salesByCategory.innerHTML = "";
                    this.salesByCategory.render();

                    // revenue
                    setTimeout(() => {
                        this.revenueChart = new ApexCharts(this.$refs.revenueChart, this.revenueChartOptions);
                        this.$refs.revenueChart.innerHTML = "";
                        this.revenueChart.render();

                        this.salesByCategory = new ApexCharts(this.$refs.salesByCategory, this.salesByCategoryOptions);
                        this.$refs.salesByCategory.innerHTML = "";
                        this.salesByCategory.render();
                    }, 300);

                    this.$watch('$store.app.theme', () => {
                        isDark = this.$store.app.theme === "dark" || this.$store.app
                            .isDarkMode ? true : false;

                        this.revenueChart.updateOptions(this.revenueChartOptions);
                        this.salesByCategory.updateOptions(this.salesByCategoryOptions);
                        this.dailySales.updateOptions(this.dailySalesOptions);
                        this.totalOrders.updateOptions(this.totalOrdersOptions);
                    });

                    this.$watch('$store.app.rtlClass', () => {
                        isRtl = this.$store.app.rtlClass === "rtl" ? true : false;
                        this.revenueChart.updateOptions(this.revenueChartOptions);
                    });

                },

                // revenue
                get revenueChartOptions() {
                    return {
                        series: [{
                            name: 'KKM',
                            data: [75, 75, 75, 75, 75, 75
                            ]
                        },
                            {
                                name: 'Nilai siswa',
                                data: [this.ppkn, this.mtk_wajib, this.b_inggris, this.b_indonesia, this.sejarah_indonesia, this.ekonomi
                                ]
                            }
                        ],
                        chart: {
                            height: 425,
                            type: "area",
                            fontFamily: 'Nunito, sans-serif',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            curve: 'smooth',
                            width: 2,
                            lineCap: 'square'
                        },
                        dropShadow: {
                            enabled: true,
                            opacity: 0.2,
                            blur: 10,
                            left: -7,
                            top: 22
                        },
                        colors: isDark ? ['#2196f3', '#e7515a'] : ['#1b55e2', '#e7515a'],
                        markers: {
                            discrete: [{
                                seriesIndex: 0,
                                dataPointIndex: 6,
                                fillColor: '#1b55e2',
                                strokeColor: 'transparent',
                                size: 7
                            },
                                {
                                    seriesIndex: 1,
                                    dataPointIndex: 5,
                                    fillColor: '#e7515a',
                                    strokeColor: 'transparent',
                                    size: 7
                                },
                            ],
                        },
                        labels: ['PPKn', 'MTK Wajib', 'B. Inggris', 'B. Indonesia', 'Sejarah Indonesia', 'Ekonomi'
                        ],
                        xaxis: {
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false
                            },
                            crosshairs: {
                                show: true
                            },
                            labels: {
                                offsetX: isRtl ? 2 : 0,
                                offsetY: 5,
                                style: {
                                    fontSize: '12px',
                                    cssClass: 'apexcharts-xaxis-title'
                                }
                            },
                        },
                        yaxis: {
                            tickAmount: 10,
                            labels: {
                                formatter: (value) => {
                                    return Math.round(value * 100) / 100;
                                },
                                offsetX: isRtl ? -30 : -10,
                                offsetY: 0,
                                style: {
                                    fontSize: '12px',
                                    cssClass: 'apexcharts-yaxis-title'
                                },
                            },
                            opposite: isRtl ? true : false,
                        },
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed',
                            strokeDashArray: 5,
                            xaxis: {
                                lines: {
                                    show: true
                                }
                            },
                            yaxis: {
                                lines: {
                                    show: false
                                }
                            },
                            padding: {
                                top: 0,
                                right: 0,
                                bottom: 0,
                                left: 0
                            }
                        },
                        legend: {
                            position: 'top',
                            horizontalAlign: 'right',
                            fontSize: '16px',
                            markers: {
                                width: 10,
                                height: 10,
                                offsetX: -2,
                            },
                            itemMargin: {
                                horizontal: 10,
                                vertical: 5
                            },
                        },
                        tooltip: {
                            marker: {
                                show: true
                            },
                            x: {
                                show: false
                            }
                        },
                        fill: {
                            type: 'gradient',
                            gradient: {
                                shadeIntensity: 1,
                                inverseColors: !1,
                                opacityFrom: isDark ? 0.19 : 0.28,
                                opacityTo: 0.05,
                                stops: isDark ? [100, 100] : [45, 100],
                            },
                        },
                    }
                },

                // sales by category
                get salesByCategoryOptions() {
                    return {
                        series: [this.sakit, this.hadir, this.alpa, this.izin],
                        chart: {
                            type: 'donut',
                            height: 460,
                            fontFamily: 'Nunito, sans-serif',
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 25,
                            colors: isDark ? '#0e1726' : '#fff'
                        },
                        colors: isDark ? ['#5c1ac3', '#e2a03f', '#e7515a', '#e2a03f', '#00ab55'] : ['#e2a03f',
                            '#5c1ac3', '#e7515a', '#00ab55'
                        ],
                        legend: {
                            position: 'bottom',
                            horizontalAlign: 'center',
                            fontSize: '12px',
                            markers: {
                                width: 10,
                                height: 10,
                                offsetX: -2,
                            },
                            height: 50,
                            offsetY: 20,
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: '65%',
                                    background: 'transparent',
                                    labels: {
                                        show: true,
                                        name: {
                                            show: true,
                                            fontSize: '29px',
                                            offsetY: -10
                                        },
                                        value: {
                                            show: true,
                                            fontSize: '26px',
                                            color: isDark ? '#bfc9d4' : undefined,
                                            offsetY: 16,
                                            formatter: (val) => {
                                                return val;
                                            },
                                        },
                                        total: {
                                            show: true,
                                            label: 'Total',
                                            color: '#888ea8',
                                            fontSize: '29px',
                                            formatter: (w) => {
                                                return w.globals.seriesTotals.reduce(function(a,
                                                                                              b) {
                                                    return a + b;
                                                }, 0);
                                            },
                                        },
                                    },
                                },
                            },
                        },
                        labels: ['Sakit', 'Hadir', 'Absen','izin'],
                        states: {
                            hover: {
                                filter: {
                                    type: 'none',
                                    value: 0.15,
                                }
                            },
                            active: {
                                filter: {
                                    type: 'none',
                                    value: 0.15,
                                }
                            },
                        }
                    }
                },

                // daily sales
                get dailySalesOptions() {
                    return {
                        series: [{
                            name: 'Sales',
                            data: [44, 55, 41, 67, 22, 43, 21]
                        },
                            {
                                name: 'Last Week',
                                data: [13, 23, 20, 8, 13, 27, 33]
                            },
                            {
                                name: 'Izin',
                                data: [10, 20, 30, 40, 50, 60, 70]
                            },
                        ],
                        chart: {
                            height: 160,
                            type: 'bar',
                            fontFamily: 'Nunito, sans-serif',
                            toolbar: {
                                show: false
                            },
                            stacked: true,
                            stackType: '100%'
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 1
                        },
                        colors: ['#e2a03f', '#e0e6ed', '#00ab55'],
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                legend: {
                                    position: 'bottom',
                                    offsetX: -10,
                                    offsetY: 0
                                }
                            }
                        }],
                        xaxis: {
                            labels: {
                                show: false
                            },
                            categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat']
                        },
                        yaxis: {
                            show: false
                        },
                        fill: {
                            opacity: 1
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '25%'
                            }
                        },
                        legend: {
                            show: false
                        },
                        grid: {
                            show: false,
                            xaxis: {
                                lines: {
                                    show: false
                                }
                            },
                            padding: {
                                top: 10,
                                right: -20,
                                bottom: -20,
                                left: -20
                            },
                        },
                    }
                },

                // total orders
                get totalOrdersOptions() {
                    return {
                        series: [{
                            name: 'Sales',
                            data: [28, 40, 36, 52, 38, 60, 38, 52, 36, 40]
                        }],
                        chart: {
                            height: 290,
                            type: "area",
                            fontFamily: 'Nunito, sans-serif',
                            sparkline: {
                                enabled: true
                            }
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 2
                        },
                        colors: isDark ? ['#00ab55'] : ['#00ab55'],
                        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
                        yaxis: {
                            min: 0,
                            show: false
                        },
                        grid: {
                            padding: {
                                top: 125,
                                right: 0,
                                bottom: 0,
                                left: 0
                            }
                        },
                        fill: {
                            opacity: 1,
                            type: 'gradient',
                            gradient: {
                                type: 'vertical',
                                shadeIntensity: 1,
                                inverseColors: !1,
                                opacityFrom: 0.3,
                                opacityTo: 0.05,
                                stops: [100, 100],
                            },
                        },
                        tooltip: {
                            x: {
                                show: false
                            },
                        },
                    }
                }
            }));
        });
    </script>

</x-layout.default-po>
