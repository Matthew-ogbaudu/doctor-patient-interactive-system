<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\PatientController;
use App\Http\Middleware\Patient;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
////Patient auth
Route::prefix('/')->group(function (){
    Route::get('patientlogin',[\App\Http\Controllers\PatientController::class, 'createlogin'])->name('patientlogin');
    Route::get('patientdashboard',[\App\Http\Controllers\PatientController::class, 'dashboard'])->name('patientdashboard')->middleware('Patient');
    Route::post('patientlogin',[PatientController::class,'login']);
    Route::post('patientlogout', [PatientController::class, 'destroy'])->name('patientlogout')->middleware('Patient');
    Route::get('bookappointment', [PatientController::class, 'bookappointment'])->name('bookappointment')->middleware('Patient');
    Route::post('bookappointment', [PatientController::class, 'bookapp']);
    Route::get('viewappointment', [PatientController::class, 'viewappointment'])->name('viewappointment')->middleware('Patient');;
    Route::get('updateappointment/{id}',[PatientController::class, 'updateappointment'])->middleware('Patient');
});
// Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
// Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('delete/{id}',[PatientController::class, 'destroyy']);

// Route::post('bookappointmentt',function(){
//     request()->validate(['email'=>'required email']);

//     $mailchimp = new \MailchimpMarketing\ApiClient();

//     $mailchimp->setConfig([
//             'apiKey' => config('services.mailchimp.key'),
//             'server' => 'us21'
//         ]);

//         $response = $mailchimp->lists->addListMember('b0d5774e53', [

//             'email_address'=>'mogbaudu@gmail.com',
//             'status'=>'subscribed'
//         ]);
//         ddd($response);
//     });
    // Route::get('/send', [PatientController::class, 'send']);//->name('bookappointment');
Route::get('/patient', function(){
    // ddd("hello");
    return view('patient');
});


Route::post('subsub', [\App\Http\Controllers\PatientController::class, 'store'])->name('subsub');

require __DIR__.'/auth.php';
