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

Route::get('/admin/room_manage', 'ClassroomController@index');
Route::post('/admin/room_add', 'ClassroomController@add');
Route::post('/admin/room_delete/{id}', 'ClassroomController@delete');
Route::get('/admin/room_edit/{id}', 'ClassroomController@edit');
Route::post('/admin/room_update/{id}', 'ClassroomController@update');

Route::get('/admin/semester_manage', 'SemesterController@index');
Route::post('/admin/semester_add', 'SemesterController@add');
Route::get('/admin/semester_edit/{id}', 'SemesterController@edit');
Route::post('/admin/semester_update/{id}', 'SemesterController@update');
Route::post('/admin/semester_delete/{id}', 'SemesterController@delete');


Route::get('/admin/room_record', function () {
    return view('admin.room_record');
});

Route::get('/user/room_reserve', function () {
    return view('user.room_reserve');
});
Route::get('/user/equipment_reserve', function () {
    return view('user.equipment_reserve');
});
Route::get('/admin/add_semester',function() {
    return view('admin.add_semester');
});


Auth::routes();
?>


