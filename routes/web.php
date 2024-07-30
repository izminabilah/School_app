<?php

use App\Http\Controllers\AbsentStudentController;
use App\Http\Controllers\AbsentStudentGOController;
use App\Http\Controllers\AbsentStudentPOController;
use App\Http\Controllers\AbsentStudentSOController;
use App\Http\Controllers\AccountParentController;
use App\Http\Controllers\ActivityStudentController;
use App\Http\Controllers\ActivityStudentGOController;
use App\Http\Controllers\ActivityStudentPOController;
use App\Http\Controllers\ActivityStudentSOController;
use App\Http\Controllers\CalendersmsGOController;
use App\Http\Controllers\CalendersmsPOController;
use App\Http\Controllers\CalendersmsSOController;
use App\Http\Controllers\ListSubjectController;
use App\Http\Controllers\ListSubjectPOController;
use App\Http\Controllers\ListSubjectSOController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ProfileTeacherGOController;
use App\Http\Controllers\ProfileTeacherPOController;
use App\Http\Controllers\ProfileTeacherSOController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectGradeController;
use App\Http\Controllers\SubjectGradeGOController;
use App\Http\Controllers\SubjectGradePOController;
use App\Http\Controllers\SubjectGradeSOController;
use App\Http\Controllers\SubjectScheduleController;
use App\Http\Controllers\SubjectScheduleGOController;
use App\Http\Controllers\SubjectSchedulePOController;
use App\Http\Controllers\SubjectScheduleSOController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TuController;
use App\Http\Controllers\AccountTeacherController;
use App\Http\Controllers\AccountStudentController;
use App\Http\Controllers\CalendersmsController;
use Illuminate\Support\Facades\Route;

Route::view('/aaa', 'index');
//
Route::get('/', [LoginController::class, 'index'])->name('sign-in');
Route::post('/sign-in', [LoginController::class, 'store'])->name('login');
Route::get('/sign-out', [LoginController::class, 'destroy'])->name('logout');
Route::get('/home', [TuController::class, 'index'])->name('home');
Route::view('/card', 'card');
//Route::view('/profile/teacher','profileGuru');

Route::get('/profile/teacher', [ProfileTeacherSOController::class, 'index'])->name('profile-teacher');
Route::post('/profile/teacher/add', [ProfileTeacherSOController::class, 'store']);
Route::get('/profile/teacher/edit/{id}', [ProfileTeacherSOController::class, 'edit'])->name('edit-profile-tea');
Route::put('/profile/teacher/update/{id}', [ProfileTeacherSOController::class, 'update'])->name('update-profile-tea');
Route::get('/profile/teacher/delete/{id}', [ProfileTeacherSOController::class, 'destroy'])->name('delete-profile-tea');
Route::get('/profile/teacher/search', [ProfileTeacherSOController::class, 'search'])->name('search-profile-tea');

Route::view('/Student','Student');//
Route::get('/account/student', [AccountStudentController::class, 'index'])->name('account-student');
Route::post('/account/student/add', [AccountStudentController::class, 'store']);
Route::get('/account/student/edit/{id}', [AccountStudentController::class, 'edit'])->name('edit-account-stu');
Route::put('/account/student/update/{id}', [AccountStudentController::class, 'update'])->name('update-account-stu');
Route::get('/account/student/delete/{id}', [AccountStudentController::class, 'destroy'])->name('delete-account-stu');
Route::get('/account/student/search', [AccountStudentController::class, 'search'])->name('search-account-stu');

Route::get('/account/teacher', [AccountTeacherController::class, 'index'])->name('account-teacher');
Route::post('/account/teacher/add', [AccountTeacherController::class, 'store']);
Route::get('/account/teacher/edit/{id}', [AccountTeacherController::class, 'edit'])->name('edit-account-tea');
Route::put('/account/teacher/update/{id}', [AccountTeacherController::class, 'update'])->name('update-account-tea');
Route::get('/account/teacher/delete/{id}', [AccountTeacherController::class, 'destroy'])->name('delete-account-tea');
Route::get('/account/teacher/search', [AccountTeacherController::class, 'search'])->name('search-account-tea');

Route::get('/account/parent', [AccountParentController::class, 'index'])->name('account-parent');
Route::post('/account/parent/add', [AccountParentController::class, 'store']);
Route::get('/account/parent/edit/{id}', [AccountParentController::class, 'edit'])->name('edit-account-par');
Route::put('/account/parent/update/{id}', [AccountParentController::class, 'update'])->name('update-account-par');
Route::get('/account/parent/delete/{id}', [AccountParentController::class, 'destroy'])->name('delete-account-par');
Route::get('/account/parent/search', [AccountParentController::class, 'search'])->name('search-account-par');

Route::get('/listSubject',[ListSubjectController::class, 'index'])->name('listSubject');
Route::post('/listSubject/add', [ListSubjectController::class, 'store']);
Route::get('/listSubject/edit/{id}', [ListSubjectController::class, 'edit'])->name('edit-subject');
Route::put('/listSubject/update/{id}', [ListSubjectController::class, 'update'])->name('update-subject');
Route::get('/listSubject/delete/{id}', [ListSubjectController::class, 'destroy'])->name('delete-subject');

Route::get('/Schedule',[SubjectScheduleController::class, 'index'])->name('Schedule');
Route::post('/Schedule/add', [SubjectScheduleController::class, 'store']);
Route::get('/Schedule/edit/{id}', [SubjectScheduleController::class, 'edit'])->name('edit-schedule');
Route::put('/Schedule/update/{id}', [SubjectScheduleController::class, 'update'])->name('update-schedule');
Route::get('/Schedule/delete/{id}', [SubjectScheduleController::class, 'destroy'])->name('delete-schedule');
Route::get('/Schedule/search', [SubjectScheduleController::class, 'search'])->name('search-schedule');

Route::get('/calender/semester',[CalendersmsController::class, 'index'])->name('calendersms');
Route::post('/calender/add', [CalendersmsController::class, 'store']);
Route::get('/calender/edit/{id}', [CalendersmsController::class, 'edit'])->name('edit-calender');
Route::put('/calender/update/{id}', [CalendersmsController::class, 'update'])->name('update-calender');

Route::view('/activity','Summary');

Route::get('/activity/student',[ActivityStudentController::class, 'index'])->name('aktivitas');
Route::post('/activity/student/add', [ActivityStudentController::class, 'store']);
Route::get('/activity/student/edit/{id}', [ActivityStudentController::class, 'edit'])->name('edit-aktivitas');
Route::put('/activity/student/update/{id}', [ActivityStudentController::class, 'update'])->name('update-aktivitas');
Route::get('/activity/student/delete/{id}', [ActivityStudentController::class, 'destroy'])->name('delete-aktivitas');
Route::get('/activity/student/search', [ActivityStudentController::class, 'search'])->name('search-activity');

Route::get('/activity/absent',[AbsentStudentController::class, 'index'])->name('absent-student');
Route::post('/activity/absent/add', [AbsentStudentController::class, 'store']);
Route::get('/activity/absent/edit/{id}', [AbsentStudentController::class, 'edit'])->name('edit-absent');
Route::put('/activity/absent/update/{id}', [AbsentStudentController::class, 'update'])->name('update-absent');
Route::get('/activity/absent/update/search', [AbsentStudentController::class, 'search'])->name('search-absent');

Route::get('/activity/subject/grade',[SubjectGradeController::class, 'index'])->name('subject-grade');
Route::post('/activity/subject/grade/add', [SubjectGradeController::class, 'store']);
Route::get('/activity/subject/grade/edit/{id}', [SubjectGradeController::class, 'edit'])->name('edit-grade');
Route::put('/activity/subject/grade/update', [SubjectGradeController::class, 'update'])->name('update-grade');
Route::get('/activity/subject/grade/search', [SubjectGradeController::class, 'search'])->name('search-subject');

//route dari login siswa
Route::get('/home_so', [StudentController::class, 'index'])->name('home_so');

Route::get('/so/profile/teacher', [ProfileTeacherSOController::class, 'index'])->name('profile-teacher-so');
Route::get('/so/profile/teacher/search', [ProfileTeacherSOController::class, 'search'])->name('search-profile-tea-so');

Route::get('/so/listSubject',[ListSubjectSOController::class, 'index'])->name('listSubject');

Route::get('/so/Schedule',[SubjectScheduleSOController::class, 'index'])->name('Schedule-so');
Route::get('/so/Schedule/search', [SubjectScheduleSOController::class, 'search'])->name('search-schedule-so');

Route::get('/so/calender/semester',[CalendersmsSOController::class, 'index'])->name('calendersms-so');

Route::get('/so/activity/student',[ActivityStudentSOController::class, 'index'])->name('aktivitas-so');
Route::get('/so/activity/student/search', [ActivityStudentSOController::class, 'search'])->name('search-activity-so');

Route::get('/so/activity/absent',[AbsentStudentSOController::class, 'index'])->name('absent-student-so');
Route::get('/so/activity/absent/update/search', [AbsentStudentSOController::class, 'search'])->name('search-absent-so');

Route::get('/so/activity/subject/grade',[SubjectGradeSOController::class, 'index'])->name('subject-grade-so');


//route dari login orang tua
Route::get('/home_po', [ParentController::class, 'index'])->name('home_po');

Route::get('/po/profile/teacher', [ProfileTeacherPOController::class, 'index'])->name('profile-teacher-po');
Route::get('/po/profile/teacher/search', [ProfileTeacherPOController::class, 'search'])->name('search-profile-tea-po');

Route::get('/po/listSubject',[ListSubjectPOController::class, 'index'])->name('listSubject-po');

Route::get('/po/Schedule',[SubjectSchedulePOController::class, 'index'])->name('Schedule-po');
Route::get('/po/Schedule/search', [SubjectSchedulePOController::class, 'search'])->name('search-schedule-po');

Route::get('/po/calender/semester',[CalendersmsPOController::class, 'index'])->name('calendersms-so');

Route::get('/po/activity/student',[ActivityStudentPOController::class, 'index'])->name('aktivitas-po');
Route::get('/po/activity/student/search', [ActivityStudentPOController::class, 'search'])->name('search-activity-po');

Route::get('/po/activity/absent',[AbsentStudentPOController::class, 'index'])->name('absent-student-po');
Route::get('/po/activity/absent/update/search', [AbsentStudentPOController::class, 'search'])->name('search-absent-po');

Route::get('/po/activity/subject/grade',[SubjectGradePOController::class, 'index'])->name('subject-grade-po');
Route::get('/po/activity/subject/grade/search', [SubjectGradePOController::class, 'search'])->name('search-subject-po');

//route dari login guru
Route::get('/home_go', [TeacherController::class, 'index'])->name('home_go');

Route::get('/go/profile/teacher', [ProfileTeacherGOController::class, 'index'])->name('profile-teacher-go');
Route::post('/go/profile/teacher/add', [ProfileTeacherGOController::class, 'store']);
Route::get('/go/profile/teacher/edit/{id}', [ProfileTeacherGOController::class, 'edit'])->name('edit-profile-tea-go');
Route::put('/go/profile/teacher/update/{id}', [ProfileTeacherGOController::class, 'update'])->name('update-profile-tea-go');
Route::get('/go/profile/teacher/delete/{id}', [ProfileTeacherGOController::class, 'destroy'])->name('delete-profile-tea-go');
Route::get('/go/profile/teacher/search', [ProfileTeacherGOController::class, 'search'])->name('search-profile-tea-go');

Route::get('/go/Schedule',[SubjectScheduleGOController::class, 'index'])->name('Schedule-go');
Route::post('/go/Schedule/add', [SubjectScheduleGOController::class, 'store']);
Route::get('/go/Schedule/edit/{id}', [SubjectScheduleGOController::class, 'edit'])->name('edit-schedule-go');
Route::put('/go/Schedule/update/{id}', [SubjectScheduleGOController::class, 'update'])->name('update-schedule-go');
Route::get('/go/Schedule/delete/{id}', [SubjectScheduleGOController::class, 'destroy'])->name('delete-schedule-go');
Route::get('/go/Schedule/search', [SubjectScheduleGOController::class, 'search'])->name('search-schedule-go');

Route::get('/go/calender/semester',[CalendersmsGOController::class, 'index'])->name('calendersms-go');

Route::get('/go/activity/student',[ActivityStudentGOController::class, 'index'])->name('aktivitas-go');
Route::post('/go/activity/student/add', [ActivityStudentGOController::class, 'store']);
Route::get('/go/activity/student/edit/{id}', [ActivityStudentGOController::class, 'edit'])->name('edit-aktivitas-go');
Route::put('/go/activity/student/update/{id}', [ActivityStudentGOController::class, 'update'])->name('update-aktivitas-go');
Route::get('/go/activity/student/delete/{id}', [ActivityStudentGOController::class, 'destroy'])->name('delete-aktivitas-go');
Route::get('/go/activity/student/search', [ActivityStudentGOController::class, 'search'])->name('search-activity-go');

Route::get('/go/activity/absent',[AbsentStudentGOController::class, 'index'])->name('absent-student-go');
Route::post('/go/activity/absent/add', [AbsentStudentGOController::class, 'store']);
Route::get('/go/activity/absent/edit/{id}', [AbsentStudentGOController::class, 'edit'])->name('edit-absent-go');
Route::put('/go/activity/absent/update/{id}', [AbsentStudentGOController::class, 'update'])->name('update-absent-go');
Route::get('/go/activity/absent/update/search', [AbsentStudentGOController::class, 'search'])->name('search-absent-go');

Route::get('/go/activity/subject/grade',[SubjectGradeGOController::class, 'index'])->name('subject-grade-go');
Route::post('/go/activity/subject/grade/add', [SubjectGradeGOController::class, 'store']);
Route::get('/go/activity/subject/grade/edit/{id}', [SubjectGradeGOController::class, 'edit'])->name('edit-grade-go');
Route::put('/go/activity/subject/grade/update', [SubjectGradeGOController::class, 'update'])->name('update-grade-go');
Route::get('/go/activity/subject/grade/search', [SubjectGradeGOController::class, 'search'])->name('search-subject-go');


//
Route::view('/analytics', 'analytics');
Route::view('/finance', 'finance');
Route::view('/crypto', 'crypto');

Route::view('/apps/chat', 'apps.chat');
Route::view('/apps/mailbox', 'apps.mailbox');
Route::view('/apps/todolist', 'apps.todolist');
Route::view('/apps/notes', 'apps.notes');
Route::view('/apps/scrumboard', 'apps.scrumboard');
Route::view('/apps/contacts', 'apps.contacts');
Route::view('/apps/calendar', 'apps.calendar');

Route::view('/apps/invoice/list', 'apps.invoice.list');
Route::view('/apps/invoice/preview', 'apps.invoice.preview');
Route::view('/apps/invoice/add', 'apps.invoice.add');
Route::view('/apps/invoice/edit', 'apps.invoice.edit');

Route::view('/components/tabs', 'ui-components.tabs');
Route::view('/components/accordions', 'ui-components.accordions');
Route::view('/components/modals', 'ui-components.modals');
Route::view('/components/cards', 'ui-components.cards');
Route::view('/components/carousel', 'ui-components.carousel');
Route::view('/components/countdown', 'ui-components.countdown');
Route::view('/components/counter', 'ui-components.counter');
Route::view('/components/sweetalert', 'ui-components.sweetalert');
Route::view('/components/timeline', 'ui-components.timeline');
Route::view('/components/notifications', 'ui-components.notifications');
Route::view('/components/media-object', 'ui-components.media-object');
Route::view('/components/list-group', 'ui-components.list-group');
Route::view('/components/pricing-table', 'ui-components.pricing-table');
Route::view('/components/lightbox', 'ui-components.lightbox');

Route::view('/elements/alerts', 'elements.alerts');
Route::view('/elements/avatar', 'elements.avatar');
Route::view('/elements/badges', 'elements.badges');
Route::view('/elements/breadcrumbs', 'elements.breadcrumbs');
Route::view('/elements/buttons', 'elements.buttons');
Route::view('/elements/buttons-group', 'elements.buttons-group');
Route::view('/elements/color-library', 'elements.color-library');
Route::view('/elements/dropdown', 'elements.dropdown');
Route::view('/elements/infobox', 'elements.infobox');
Route::view('/elements/jumbotron', 'elements.jumbotron');
Route::view('/elements/loader', 'elements.loader');
Route::view('/elements/pagination', 'elements.pagination');
Route::view('/elements/popovers', 'elements.popovers');
Route::view('/elements/progress-bar', 'elements.progress-bar');
Route::view('/elements/search', 'elements.search');
Route::view('/elements/tooltips', 'elements.tooltips');
Route::view('/elements/treeview', 'elements.treeview');
Route::view('/elements/typography', 'elements.typography');

Route::view('/charts', 'charts');
Route::view('/widgets', 'widgets');
Route::view('/font-icons', 'font-icons');
Route::view('/dragndrop', 'dragndrop');

Route::view('/tables', 'tables');

Route::view('/datatables/advanced', 'datatables.advanced');
Route::view('/datatables/alt-pagination', 'datatables.alt-pagination');
Route::view('/datatables/basic', 'datatables.basic');
Route::view('/datatables/checkbox', 'datatables.checkbox');
Route::view('/datatables/clone-header', 'datatables.clone-header');
Route::view('/datatables/column-chooser', 'datatables.column-chooser');
Route::view('/datatables/export', 'datatables.export');
Route::view('/datatables/multi-column', 'datatables.multi-column');
Route::view('/datatables/multiple-tables', 'datatables.multiple-tables');
Route::view('/datatables/order-sorting', 'datatables.order-sorting');
Route::view('/datatables/range-search', 'datatables.range-search');
Route::view('/datatables/skin', 'datatables.skin');
Route::view('/datatables/sticky-header', 'datatables.sticky-header');

Route::view('/forms/basic', 'forms.basic');
Route::view('/forms/input-group', 'forms.input-group');
Route::view('/forms/layouts', 'forms.layouts');
Route::view('/forms/validation', 'forms.validation');
Route::view('/forms/input-mask', 'forms.input-mask');
Route::view('/forms/select2', 'forms.select2');
Route::view('/forms/touchspin', 'forms.touchspin');
Route::view('/forms/checkbox-radio', 'forms.checkbox-radio');
Route::view('/forms/switches', 'forms.switches');
Route::view('/forms/wizards', 'forms.wizards');
Route::view('/forms/file-upload', 'forms.file-upload');
Route::view('/forms/quill-editor', 'forms.quill-editor');
Route::view('/forms/markdown-editor', 'forms.markdown-editor');
Route::view('/forms/date-picker', 'forms.date-picker');
Route::view('/forms/clipboard', 'forms.clipboard');

Route::view('/users/profile', 'users.profile');
Route::view('/users/user-account-settings', 'users.user-account-settings');

Route::view('/pages/knowledge-base', 'pages.knowledge-base');
Route::view('/pages/contact-us-boxed', 'pages.contact-us-boxed');
Route::view('/pages/contact-us-cover', 'pages.contact-us-cover');
Route::view('/pages/faq', 'pages.faq');
Route::view('/pages/coming-soon-boxed', 'pages.coming-soon-boxed');
Route::view('/pages/coming-soon-cover', 'pages.coming-soon-cover');
Route::view('/pages/error404', 'pages.error404');
Route::view('/pages/error500', 'pages.error500');
Route::view('/pages/error503', 'pages.error503');
Route::view('/pages/maintenence', 'pages.maintenence');

Route::view('/auth/boxed-lockscreen', 'auth.boxed-lockscreen');
Route::view('/auth/boxed-signin', 'auth.boxed-signin');
Route::view('/auth/boxed-signup', 'auth.boxed-signup');
Route::view('/auth/boxed-password-reset', 'auth.boxed-password-reset');
Route::view('/auth/cover-login', 'auth.cover-login');
Route::view('/auth/cover-register', 'auth.cover-register');
Route::view('/auth/cover-lockscreen', 'auth.cover-lockscreen');
Route::view('/auth/cover-password-reset', 'auth.cover-password-reset');


Route::get('login', );
