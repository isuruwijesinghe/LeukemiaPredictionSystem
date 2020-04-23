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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

// use App\Mail\ReportMail;
// use Illuminate\Support\Facades\Mail;
// Route::get('/email', function () {
//     $file_url = "this is the url";
//     Mail::to('email@email.com')->send(new ReportMail($file_url));
//     return new ReportMail($file_url);
// });

Route::middleware(['auth'])->group(function(){
    Route::resource('patient', 'PatientController');
    Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('/report_values/{id}', 'PatientController@report');
    Route::post('/confirm', 'ReportController@store');
    Route::post('/report_generate', 'ReportController@reportGenerate');

    // cloud vision api
    Route::get('/report_values/{id}', 'ReportController@displayForm');
    Route::post('/image_upload', 'ReportController@annotateImage');
});








