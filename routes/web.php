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

Route::get('/', 'GenerelController@index')->name('home');

// Doctors Route
Route::get('/doctor/{id}','DoctorController@ViewDoc')->where('id' , '[0-9]+')->name('Doc.View');
Route::get('/add_doctor','DoctorController@ShowAddDoc')->name('Doc.Add');
Route::post('/add_doctor','DoctorController@AddDoc')->name('Doc.Add.Submit');
Route::get('/edit_doctor/{id}','DoctorController@ShowEdit')->where('id' , '[0-9]+')->name('Doc.edit');
Route::post('/edit_doctor','DoctorController@UpdateInfo')->name('Doc.Edit.Submit');
Route::post('/Doctor_pic','DoctorController@StorePic')->name('Doc.savePicture');
Route::post('/add_date','DoctorController@AddDate')->name('Doc.Add.Date');
Route::get('/pdf/{id}','DoctorController@ShowPdf')->name('Doc.pdf');


Route::get('/doctors','GenerelController@ShowDoctors')->name('Doctors');
Route::post('/doctors','GenerelController@Doctors');


//Patients Route
Route::get('/show_patient','patientController@Show')->name('patient.Profile');
Route::get('/edit_patient','patientController@ShowEdit')->name('patient.edit');
Route::post('/edit_patient','patientController@UpdateInfo')->name('patient.edit.submit');
Route::post('/change_password','patientController@UpdatePassword')->name('patient.change_password.submit');
Route::post('/patient_pic','patientController@StorePic')->name('patient.savePicture');
Route::get('/add_serial','patientController@ShowAddSerial')->name('patient.Add.Serial');
Route::post('/add_serial','patientController@AddSerial')->name('patient.Add.Serial.submit');


//ajax Routes
Route::post('/getDoc','patientController@getDoc');
Route::post('/getDocInfo','patientController@getDocInfo');
Route::post('/getdates','patientController@getDates');



//Patient Auth Routes
Auth::routes();

//Admin Route Section
Route::prefix('admin')->group(function(){
	Route::get('/login','Auth\AdminLoginController@ShowLogInForm')->name('admin.login');
	Route::post('/login','Auth\AdminLoginController@Login')->name('admin.login.submit');
	Route::post('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
});
