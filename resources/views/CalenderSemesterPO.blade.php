<x-layout.default-po>

    <link href="{{ Vite::asset('resources/css/fullcalendar.min.css') }}" rel='stylesheet' />
    <script src='/assets/js/fullcalendar.min.js'></script>
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
    <div x-data="calendar">
        <div class="panel">
            <div class="mb-5">
                <div class="mb-4 flex items-center sm:flex-row flex-col sm:justify-between justify-center">
                    <div class="sm:mb-0 mb-4">
                        <div class="text-lg font-semibold ltr:sm:text-left rtl:sm:text-right text-center">Kalender Semester</div>
                        <div class="flex items-center mt-2 flex-wrap sm:justify-start justify-center">
                            <div class="flex items-center ltr:mr-4 rtl:ml-4">
                                <div class="h-2.5 w-2.5 rounded-sm ltr:mr-2 rtl:ml-2 bg-secondary"></div>
                                <div>Upacara Bendera</div>
                            </div>
                            <div class="flex items-center ltr:mr-4 rtl:ml-4">
                                <div class="h-2.5 w-2.5 rounded-sm ltr:mr-2 rtl:ml-2 bg-primary"></div>
                                <div>Acara Spesial</div>
                            </div>
                            <div class="flex items-center ltr:mr-4 rtl:ml-4">
                                <div class="h-2.5 w-2.5 rounded-sm ltr:mr-2 rtl:ml-2 bg-success"></div>
                                <div>Ujian</div>
                            </div>
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-sm ltr:mr-2 rtl:ml-2 bg-danger"></div>
                                <div>Hari Libur</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calendar-wrapper" id='calendarsms'></div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            document.getElementById("form-add-calendersms").classList.remove("hidden");
        }
        document.addEventListener("alpine:init", () => {
            Alpine.data("calendar", () => ({
                defaultParams: ({
                    id: null,
                    title: "",
                    start: "",
                    end: "",
                    description: "",
                    type_event: "",
                }),
                params: {
                    id: null,
                    title: "",
                    start: "",
                    end: "",
                    description: "",
                    type_event: "",
                },
                events: @json($events),
                isAddEventModal: false,
                eventColors: {
                    flagCeremony: "primary",
                    specialEvent: "secondary",
                    exam: "success",
                    holiday: "danger"
                },
                editEvent(event) {
                    this.params = {
                        id: event.id,
                        title: event.title,
                        start: event.start,
                        end: event.end,
                        description: event.description,
                        type_event: event.type_event
                    };
                    this.isAddEventModal = true;
                },
                addEvent() {
                    this.params = { ...this.defaultParams };
                    this.isAddEventModal = true;
                },
                init() {
                    this.renderCalendar();
                },
                renderCalendar() {
                    const events = this.events.map(event => ({
                        id: event.id,
                        title: event.event,
                        start: event.from,
                        end: event.to,
                        description: event.description,
                        className: this.eventColors[event.type_event]
                    }));

                    const calendarEl = document.getElementById("calendarsms");
                    const calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: "dayGridMonth",
                        headerToolbar: {
                            start: "prev,next today",
                            center: "title",
                            end: "dayGridMonth,timeGridWeek,timeGridDay"
                        },
                        events: events,
                        editable: true,
                        droppable: true,
                        dateClick: (info) => {
                            this.editEvent({
                                id: info.event.id,
                                title: info.event.title,
                                start: info.event.start,
                                end: info.event.end,
                                description: info.event.extendedProps.description,
                                type_event: info.event.extendedProps.type_event
                            });
                        },
                        eventClick: (info) => {
                            window.location.href = `/calender/edit/${info.event.id}`;
                        }

                    });
                    calendar.render();
                }
            }));
        });
    </script>

</x-layout.default-po>
