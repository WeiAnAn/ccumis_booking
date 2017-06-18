<?php

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

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('now', function () {
//         return date("Y-m-d H:i:s");
// });

// Route::get('/register', function(){
//         return view('register');
// });

// /*for test*/
// Route::get('/login', function() {
//         return view('login');
// })->name('login');


Route::get('/','HomeController@index');
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['isAdmin', 'auth']], function(){

    Route::get('/admin', function(){
        return view('admin.admin');
    });

    Route::get('/admin/room_manage', 'ClassroomController@index');
    Route::get('/admin/room_edit/{id}', 'ClassroomController@edit');
    Route::post('/admin/room_add', 'ClassroomController@add');
    Route::post('/admin/room_delete/{id}', 'ClassroomController@delete');
    Route::post('/admin/room_update/{id}', 'ClassroomController@update');

    Route::get('/admin/semester_manage', 'SemesterController@index');
    Route::get('/admin/semester_edit/{id}', 'SemesterController@edit');
    Route::post('/admin/semester_add', 'SemesterController@add');
    Route::post('/admin/semester_update/{id}', 'SemesterController@update');
    Route::post('/admin/semester_delete/{id}', 'SemesterController@delete');

    Route::get('/admin/semester_class_manage', 'SemesterClassController@index');
    Route::get('/admin/semester_class_edit/{id}', 'SemesterClassController@edit');
    Route::post('/admin/semester_class_add', 'SemesterClassController@add');
    Route::post('/admin/semester_class_update/{id}', 'SemesterClassController@update');
    Route::post('/admin/semester_class_delete/{id}', 'SemesterClassController@delete');

    Route::get('/admin/room_reserve_manage', 'ClassroomRecordController@showRoomReserve');
    Route::get('/admin/room_reserve_completed', 'ClassroomRecordController@showCompletedRoomReserve');
    Route::post('/admin/room_reserve_accept/{id}', 'ClassroomRecordController@acceptRoomReserve');
    Route::post('/admin/room_reserve_reject/{id}', 'ClassroomRecordController@rejectRoomReserve');

    Route::get('/admin/equipment_manage', 'EquipmentController@index');
    Route::get('/admin/equipment_edit/{id}', 'EquipmentController@edit');
    Route::post('/admin/equipment_add', 'EquipmentController@add');
    Route::post('/admin/equipment_delete/{id}', 'EquipmentController@delete');
    Route::post('/admin/equipment_update/{id}', 'EquipmentController@update');

    Route::get('/admin/not_returned', 'ReturnController@adminIndex');
    Route::post('/admin/return', 'ReturnController@adminReturn');
    
    Route::get('/admin/classroom_history', 'ClassroomRecordController@adminHistory');
    Route::get('/admin/equipment_history', 'EquipmentRecordController@adminHistory');

    Route::get('/admin/rule_edit', 'RuleController@edit');
    Route::post('/admin/rule_update', 'RuleController@update');

    Route::get('/admin/user', 'UserController@admin');
    Route::post('/admin/user_add', 'UserController@add');
    Route::get('/admin/user_upload', 'UserController@uploadView');
    Route::post('/admin/user_upload', 'UserController@upload');
    Route::get('/admin/user_edit/{id}', 'UserController@adminEdit');
    Route::post('/admin/user_update/{id}', 'UserController@adminUpdate');
    Route::post('/admin/user_delete/{id}', 'UserController@delete');
    
});



Route::group(['middleware' => 'auth'], function(){

    Route::get('/user', function(){
        return view('user.user');
    });

    Route::get('/user/edit', 'UserController@edit');
    Route::post('/user/update', 'UserController@update');
    
    Route::get('/user/room_reserve', 'ClassroomRecordController@roomReserveIndex');
    Route::post('/user/room_reserve_add', 'ClassroomRecordController@addRoomReserve');
    Route::get('/user/review_reserve', 'ClassroomRecordController@showSelfRoomReserve');
    
    Route::get('/user/room_borrow', 'ClassroomRecordController@showBorrowIndex');
    Route::post('/user/room_borrow_add/{id}', 'ClassroomRecordController@addBorrow');

    Route::get('/user/equipment_borrow', 'EquipmentRecordController@showBorrowIndex');
    Route::post('/user/equipment_borrow_add', 'EquipmentRecordController@addBorrow');

    Route::get('/user/not_returned', 'ReturnController@index');
    Route::post('/user/return', 'ReturnController@doReturn');

    Route::get('/user/classroom_history', 'ClassroomRecordController@userHistory');
    Route::get('/user/equipment_history', 'EquipmentRecordController@userHistory');
    Route::get('/getBorrowClass',"ClassroomRecordController@getBorrowClass");

});

Route::get('/search', 'ClassroomRecordController@searchView');
Route::get('/search_record',"ClassroomRecordController@search");

Route::get('/rule', 'RuleController@index');

Auth::routes();
?>


