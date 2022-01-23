<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ClassSchedulesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PushController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\schoolWorkInfoController;
use App\Http\Controllers\SocialMediaGroupController;
use App\Http\Controllers\StudAttendanceController;
use App\Http\Controllers\StudInfoController;
use App\Http\Controllers\TeacherInfoController;
use App\Http\Controllers\ClassInfoController;
use App\Http\Controllers\ProfileControllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/tests', function () {
    return view('test');
});

//store a push subscriber. (Notification)
Route::prefix('/push')->group(function () {
    Route::post('/', [PushController::class, 'store'])
        ->name('push.notification');
    Route::get('/pushget', [PushController::class, 'push'])
        ->name('push.pushget');
    Route::get('/pushschoolworkget/{id?}', [PushController::class, 'pushSchoolWork'])
        ->name('push.pushschoolworkget');
});

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['guest'])->group(function () {
    Route::prefix('/register')->group(function () {

        Route::get('/teacher', [RegistrationController::class, 'registerTeacher'])
            ->name('register.teacher');

        Route::post('/teacher', [RegistrationController::class, 'createTeacher']);

        Route::get('/admin', [RegistrationController::class, 'registerAdmin'])
            ->name('register.admin');

        Route::post('/admin', [RegistrationController::class, 'createAdmin']);
    });
});

//auth route for both
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// for users
// Route::group(['middleware' => ['auth', 'role:admin']], function () {
//     Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
// });

// for blogwriters
Route::group(['middleware' => ['auth', 'role:blogwriter']], function () {
    Route::get('/dashboard/postcreate', 'App\Http\Controllers\DashboardController@postcreate')->name('dashboard.postcreate');
});

require __DIR__ . '/auth.php';

//route manage profile parent
Route::prefix('/manage_profile')->group(function () {
    Route::get('/', [ProfileControllers::class, 'index'])
        ->name('manage_profile.view_profile');
    Route::get('/edit_profile', [ProfileControllers::class, 'edit_profile'])
        ->name('manage_profile.edit_profile');
    Route::post('/update_profile', [ProfileControllers::class, 'update_profile'])
        ->name('manage_profile.update_profile');
});

// route manage user
Route::prefix('/manage_user')->group(function () {
    Route::get('/', [RegistrationController::class, 'index'])
        ->name('manage_user.list_user');
    Route::post('/parent', [RegistrationController::class, 'createParent'])
        ->name('manage_user.register_parent');
    Route::post('/remove/{id?}', [RegistrationController::class, 'removeParent'])
        ->name('manage_user.remove_parent');
    Route::post('/update/{id?}', [RegistrationController::class, 'updateParent'])
        ->name('manage_user.update_parent');
    Route::get('/change_password/{id?}', [RegistrationController::class, 'changePassword'])
        ->name('manage_user.change_password');
    Route::post('/update_password/{id?}', [RegistrationController::class, 'updatePassword'])
        ->name('manage_user.update_password');
});

//route manage announcement
Route::prefix('/announcement')->group(function () {

    Route::get('/', [AnnouncementController::class, 'index'])
        ->name('announcement.optionAnnouncement');

    Route::get('/listAnnouncement', [AnnouncementController::class, 'listAnnouncement'])
        ->name('announcement.listAnnouncement');

    Route::get('/addAnnouncementView', [AnnouncementController::class, 'addAnnouncementView'])
        ->name('announcement.addAnnouncementView');

    Route::post('/addAnnouncementStore', [AnnouncementController::class, 'addAnnouncementStore'])
        ->name('announcement.addAnnouncementStore');

    Route::get('/detailAnnouncement/{id}', [AnnouncementController::class, 'detailAnnouncement'])
        ->name('announcement.detailAnnouncement');

    Route::get('/editAnnouncementView/{id}', [AnnouncementController::class, 'editAnnouncementView'])
        ->name('announcement.editAnnouncementView');

    Route::get('/deleteAnnouncement/{id}', [AnnouncementController::class, 'deleteAnnouncement'])
        ->name('announcement.deleteAnnouncement');

    Route::post('/updateAnnouncement/{id}', [AnnouncementController::class, 'updateAnnouncement'])
        ->name('announcement.updateAnnouncement');

    Route::get('/listBanner', [AnnouncementController::class, 'listBanner'])
        ->name('announcement.listBanner');
    Route::post('/addBanerStore', [AnnouncementController::class, 'addBanerStore'])
        ->name('announcement.addBanerStore');
    Route::get('/deleteBanner/{id}', [AnnouncementController::class, 'deleteBanner'])
        ->name('announcement.deleteBanner');
});

//route manage teacher information
Route::prefix('/teacherInfo')->group(function () {
    Route::get('/', [TeacherInfoController::class, 'index'])
        ->name('teacherInfo.list_teacher');
    Route::get('/search', [TeacherInfoController::class, 'search'])
        ->name('teacherInfo.search_teacher');
});

//route manage social media group
Route::prefix('/socialMediaGroup')->group(function () {
    Route::get('/', [SocialMediaGroupController::class, 'index'])
        ->name('socialMediaGroup.view_media');
    Route::get('/addSocialMediaGroupview', [SocialMediaGroupController::class, 'addSocialMediaGroupview'])
        ->name('socialMediaGroup.addSocialMediaGroupview');
    Route::post('/addSocialMediaGroupStore', [SocialMediaGroupController::class, 'addSocialMediaGroupStore'])
        ->name('socialMediaGroup.addSocialMediaGroupStore');
    Route::get('/editSocialMediaGroup/{id?}', [SocialMediaGroupController::class, 'viewEditMediaGroup'])
        ->name('socialMediaGroup.editSocialMediaGroup');
    Route::post('/updateSocialMediaGroup/{id?}', [SocialMediaGroupController::class, 'editMediaGroup'])
        ->name('socialMediaGroup.updateSocialMediaGroup');
});

//route manage student attendance
Route::prefix('/studAttendance')->group(function () {
    Route::get('/', [StudAttendanceController::class, 'index'])
        ->name('studAttendance.scanAttendance');

    Route::get('/reviewScan', [StudAttendanceController::class, 'reviewScan'])
        ->name('studAttendance.reviewScan');

    Route::post('/deleteScanRecord/{id?}', [StudAttendanceController::class, 'deleteScanRecord'])
        ->name('studAttendance.deleteScanRecord');

    Route::post('/updateScanRecord', [StudAttendanceController::class, 'updateScanRecord'])
        ->name('studAttendance.updateScanRecord');

    Route::get('/attendanceRecord', [StudAttendanceController::class, 'attendanceRecord'])
        ->name('studAttendance.attendanceRecord');

    Route::get('/attendanceReport', [StudAttendanceController::class, 'attendanceReport'])
        ->name('studAttendance.attendanceReport');

    Route::get('/individualAttendanceReport/{id?}', [StudAttendanceController::class, 'individualAttendanceReport'])
        ->name('studAttendance.individualAttendanceReport');

    Route::get('/attendanceReason/{id}', [StudAttendanceController::class, 'attendanceReason'])
        ->name('studAttendance.attendanceReason');

    Route::post('/saveAttendanceReason/{id?}', [StudAttendanceController::class, 'saveAttendanceReason'])
        ->name('studAttendance.saveAttendanceReason');

    Route::get('/scanQrCode', [StudAttendanceController::class, 'scanQrCode'])
        ->name('studAttendance.scanQrCode');

    Route::get('/scanQrCodeNew', [StudAttendanceController::class, 'scanQrCodeNew'])
        ->name('studAttendance.scanQrCodeNew');
});

//route manage school work information
Route::prefix('/schoolWorkInfo')->group(function () {
    Route::get('/', [schoolWorkInfoController::class, 'index'])
        ->name('schoolWorkInfo.listHomeworkTeacher');

    Route::get('/detailHomeworkTeacher/{id?}', [schoolWorkInfoController::class, 'detailHomework'])
        ->name('schoolWorkInfo.detailHomeworkTeacher');

    Route::get('/editHomeworkTeacherView/{id?}', [schoolWorkInfoController::class, 'editHomeworkView'])
        ->name('schoolWorkInfo.editHomeworkTeacherView');

    Route::post('/updateHomework/{id}', [schoolWorkInfoController::class, 'updateHomework'])
        ->name('schoolWorkInfo.updateHomework');

    Route::get('/addHomeworkTeacherView', [schoolWorkInfoController::class, 'addHomeworkTeacherView'])
        ->name('schoolWorkInfo.addHomeworkTeacherView');

    Route::post('/addHomeworkTeacherStore', [schoolWorkInfoController::class, 'addHomeworkTeacherStore'])
        ->name('schoolWorkInfo.addHomeworkTeacherStore');

    Route::get('/deleteHomework/{id?}', [schoolWorkInfoController::class, 'deleteHomework'])
        ->name('schoolWorkInfo.deleteHomework');
});

//route manage payment of fees
Route::prefix('/payment')->group(function () {
    Route::get('/', [PaymentController::class, 'index'])
        ->name('payment.list_payment');

    Route::get('/addPayment', [PaymentController::class, 'addPayment'])
        ->name('payment.addPayment');

    Route::post('/addPaymentStore', [PaymentController::class, 'addPaymentStore'])
        ->name('payment.addPaymentStore');

    Route::get('/detailPayment/{id}', [paymentController::class, 'detailPayment'])
        ->name('payment.detailPayment');

    Route::post('/paymentGateway', [paymentController::class, 'createBill'])
        ->name('payment.paymentGateway');

    Route::get('/paymentGateway-status/{id}', [paymentController::class, 'paymentStatus'])
        ->name('payment.paymentGateway-status');

    Route::get('/recordPayment/{id}', [paymentController::class, 'recordPayment'])
        ->name('payment.recordPayment');

    Route::get('/deletePayment/{id}', [paymentController::class, 'deletePayment'])
        ->name('payment.deletePayment');

    Route::get('/viewReceipt/{id?}', [paymentController::class, 'viewReceipt'])
        ->name('payment.viewReceipt');
});


//route manage student information
Route::prefix('/studInfo')->group(function () {
    Route::get('/', [StudInfoController::class, 'index'])
        ->name('studInfo.stud_detail');

    Route::get('/editStudInfo/{id?}', [StudInfoController::class, 'editStudInfo'])
        ->name('studInfo.editStudInfo');

    Route::post('/updateStudInfo/{id?}', [StudInfoController::class, 'updateStudInfo'])
        ->name('studInfo.updateStudInfo');

    Route::get('/listStudInfo', [StudInfoController::class, 'listStudInfo'])
        ->name('studInfo.list_studInfo');

    Route::get('/searchStudInfo', [StudInfoController::class, 'searchStudInfo'])
        ->name('studInfo.searchStudInfo');

    Route::get('/detailStudent/{id}', [StudInfoController::class, 'detailStudent'])
        ->name('studInfo.detailStudent');
});

//route manage class information
Route::prefix('/classInfo')->group(function () {
    Route::get('/', [ClassInfoController::class, 'listStudInfo'])
        ->name('classInfo.list_classInfo');

    Route::get('/editStudInfo', [ClassInfoController::class, 'editStudInfo'])
        ->name('classInfo.editStudInfo');

    Route::get('/addClassStudInfo', [ClassInfoController::class, 'addClassStudInfo'])
        ->name('classInfo.addClassStudInfo');

    Route::post('/addClassStudInfoStore', [ClassInfoController::class, 'addClassStudInfoStore'])
        ->name('classInfo.addClassStudInfoStore');

    Route::get('/detailClassStudent/{id?}', [ClassInfoController::class, 'detailClassStudent'])
        ->name('classInfo.detailClassStudent');

    Route::get('/editClassStudInfo/{id}', [ClassInfoController::class, 'editClassStudInfo'])
        ->name('classInfo.editClassStudInfo');

    Route::post('/updateClassStudInfo/{id}', [ClassInfoController::class, 'updateClassStudInfo'])
        ->name('classInfo.updateClassStudInfo');

    Route::get('/search', [ClassInfoController::class, 'search'])
        ->name('classInfo.search_student');

    Route::get('/deleteClassStudInfo/{id}', [ClassInfoController::class, 'deleteClassStudInfo'])
        ->name('classInfo.deleteClassStudInfo');
});

//route manage class schedule
Route::prefix('/classSchedule')->group(function () {
    Route::get('/', [ClassSchedulesController::class, 'index'])
        ->name('classSchedule.viewSchedule');
    Route::get('/addClassSchedule', [ClassSchedulesController::class, 'addClassSchedule'])
        ->name('classSchedule.addClassSchedule');
    Route::post('/addClassScheduleStore', [ClassSchedulesController::class, 'addClassScheduleStore'])
        ->name('classSchedule.addClassScheduleStore');
    Route::get('/viewEditClassSchedule/{id?}', [ClassSchedulesController::class, 'viewEditClassSchedule'])
        ->name('classSchedule.viewEditClassSchedule');
    Route::post('/updateclassSchedule/{id?}', [ClassSchedulesController::class, 'updateClassSchedule'])
        ->name('classSchedule.updateClassSchedule');
});
