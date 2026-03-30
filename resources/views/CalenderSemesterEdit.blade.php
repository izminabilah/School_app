<x-layout.default>

    <link href="{{ Vite::asset('resources/css/fullcalendar.min.css') }}" rel='stylesheet' />
    <script src='/assets/js/fullcalendar.min.js'></script>
    <div x-data="calendar">
        <div class="panel">
            <div class="mb-5">
                <div class="mb-4 flex items-center sm:flex-row flex-col sm:justify-between justify-center">
                    <div class="sm:mb-0 mb-4">
                        <div class="text-lg font-semibold ltr:sm:text-left rtl:sm:text-right text-center">Kalendar Semester</div>
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
                    <button type="button" class="btn btn-primary" @click="editEvent()">

                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                             stroke-linejoin="round" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Tambahkan Acara
                    </button>
                    <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto "
                         :class="isAddEventModal && '!block'">
                        <div class="flex items-center justify-center min-h-screen px-4"
                             @click.self="isAddEventModal = false">
                            <div x-show="isAddEventModal" x-transition x-transition.duration.300
                                 class="panel border-0 p-0 rounded-lg overflow-hidden md:w-full max-w-lg w-[90%] my-8">
                                <button type="button"
                                        class="absolute top-4 ltr:right-4 rtl:left-4 text-white-dark hover:text-dark"
                                        onclick="window.location.href = '{{ route('calendersms') }}'">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                         stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                                <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]"
                                    x-text="params.id ?'Edit Event' : 'Add Event'"></h3>
                                <div class="p-5">
                                    <form name="form-edit" method="POST" action={{route('update-calender', ['id' => $events->id])}}>
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-5">
                                            <label for="event">Nama Acara :</label>
                                            <input id="event" type="text" name="event"
                                                   class="form-input" placeholder="Enter Event Title" value="{{$events->event}}"/>
                                            <div class="text-danger mt-2" id="titleErr"></div>
                                        </div>

                                        <div class="mb-5">
                                            <label for="from">Mulai :</label>
                                            <input id="from" type="datetime-local" name="from"
                                                   class="form-input" placeholder="Event Start Date" value="{{ \Carbon\Carbon::parse($events->from)->format('Y-m-d\TH:i') }}"/>
                                            <div class="text-danger mt-2" id="startDateErr"></div>
                                        </div>
                                        <div class="mb-5">
                                            <label for="to">Sampai :</label>
                                            <input id="to" type="datetime-local" name="to"
                                                   class="form-input" placeholder="Event End Date" value="{{ \Carbon\Carbon::parse($events->to)->format('Y-m-d\TH:i') }}" />
                                            <div class="text-danger mt-2" id="endDateErr"></div>
                                        </div>
                                        <div class="mb-5">
                                            <label for="description">Deskripsi :</label>
                                            <textarea id="description" name="description" class="form-textarea min-h-[130px]"
                                                      placeholder="Enter Event Description">{{$events->description}}</textarea>
                                        </div>
                                        <div class="mb-5">
                                            <label>Event:</label>
                                            <div class="mt-3" id="type_event">
                                                <label class="inline-flex cursor-pointer ltr:mr-3 rtl:ml-3">
                                                    <input type="radio" class="form-radio" name="type_event"
                                                           value="flagCeremony" {{ $events->type_event == 'flagCeremony' ? 'checked' : '' }}/>
                                                    <span class="ltr:pl-2 rtl:pr-2">Upacara</span>
                                                </label>
                                                <label class="inline-flex cursor-pointer ltr:mr-3 rtl:ml-3">
                                                    <input type="radio" class="form-radio text-secondary" name="type_event"
                                                           value="spesialEvent"  {{ $events->type_event == 'spesialEvent' ? 'checked' : '' }}/>
                                                    <span class="ltr:pl-2 rtl:pr-2">Acara Spesial</span>
                                                </label>
                                                <label class="inline-flex cursor-pointer ltr:mr-3 rtl:ml-3">
                                                    <input type="radio" class="form-radio text-success"
                                                           name="type_event" value="exam" {{ $events->type_event == 'exam' ? 'checked' : '' }}/>
                                                    <span class="ltr:pl-2 rtl:pr-2">Ujian</span>
                                                </label>
                                                <label class="inline-flex cursor-pointer">
                                                    <input type="radio" class="form-radio text-danger"
                                                           name="type_event" value="holiday" {{ $events->type_event == 'holiday' ? 'checked' : '' }}/>
                                                    <span class="ltr:pl-2 rtl:pr-2">Hari Libur</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="flex justify-end items-center mt-8">
                                            <button type="button" class="btn btn-outline-danger"
                                                    onclick="window.location.href = '{{ route('calendersms') }}'">Cancel</button>
                                            <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                    x-text="params.id ? 'Update Event' : 'Create Event'">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calendar-wrapper" id='calendarsms'></div>
            </div>
        </div>
    </div>
    <script>
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
                    this.params = { ...event };
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
                                title: info.event.event,
                                start: info.event.from,
                                end: info.event.to,
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

</x-layout.default>
