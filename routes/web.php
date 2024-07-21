<?php

use App\Http\Controllers\AbsentStudentController;
use App\Http\Controllers\AccountParentController;
use App\Http\Controllers\ActivityStudentController;
use App\Http\Controllers\ListSubjectController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileTeacherController;
use App\Http\Controllers\SubjectGradeController;
use App\Http\Controllers\SubjectScheduleController;
use App\Http\Controllers\TuController;
use App\Http\Controllers\AccountTeacherController;
use App\Http\Controllers\AccountStudentController;
use App\Http\Controllers\CalendersmsController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index');
//
Route::get('/sign-in', [LoginController::class, 'index'])->name('sign-in');
Route::post('/sign-in', [LoginController::class, 'store'])->name('login');
Route::get('/sign-out', [LoginController::class, 'destroy'])->name('logout');
Route::get('/home', [TuController::class, 'index'])->name('home');
Route::view('/card', 'card');
//Route::view('/profile/teacher','profileGuru');

Route::get('/profile/teacher', [ProfileTeacherController::class, 'index'])->name('profile-teacher');
Route::post('/profile/teacher/add', [ProfileTeacherController::class, 'store']);
Route::get('/profile/teacher/edit/{id}', [ProfileTeacherController::class, 'edit'])->name('edit-profile-tea');
Route::put('/profile/teacher/update/{id}', [ProfileTeacherController::class, 'update'])->name('update-profile-tea');
Route::get('/profile/teacher/delete/{id}', [ProfileTeacherController::class, 'destroy'])->name('delete-profile-tea');
Route::get('/profile/teacher/search', [ProfileTeacherController::class, 'search'])->name('search-profile-tea');

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

Route::get('calender/semester',[CalendersmsController::class, 'index'])->name('calendersms');
Route::post('/calender/add', [CalendersmsController::class, 'store']);
Route::get('/calender/edit/{id}', [CalendersmsController::class, 'edit'])->name('edit-calender');
Route::put('/calender/update/{id}', [CalendersmsController::class, 'update'])->name('update-calender');

Route::view('/activity','Summary');

Route::get('/activity/student',[ActivityStudentController::class, 'index'])->name('aktivitas');
Route::post('/activity/student/add', [ActivityStudentController::class, 'store']);
Route::get('/activity/student/edit/{id}', [ActivityStudentController::class, 'edit'])->name('edit-aktivitas');
Route::put('/activity/student/update/{id}', [ActivityStudentController::class, 'update'])->name('update-aktivitas');

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
