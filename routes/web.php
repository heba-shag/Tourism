<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RatecenterController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\SpicialController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\UserController;  
use App\Http\Controllers\MailController;
use App\Models\Center;
use App\Models\Consultation;
use App\Models\Contact;
use App\Models\Rate;

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


Route::post('ph', [HomeController::class, 'store'])->name('ph');

Route::get('add',function(){
    view('Center');
});
Route::get('Center/{id}',[CenterController::class,'Show'])->name("cen");
Route::get('Special/{id}',[SpicialController::class,'Show'])->name("Special");

// Route::post('ratecenter',[RatecenterController::class,'Store'])->name("ratecenter.store");

Route::post('/centers/{center}/rate', [RatecenterController::class, 'store'])->name('ratecenter.store');


Auth::routes();
Route::post('send-mail', [MailController::class, 'sendContactForm'])->name('send-mail');

//   Route::middleware(['auth', 'user-access:user'])->group(function () {
    
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    Route::get('addcontact',[ContactController::class,'index'])->name('addcontact');
    Route::post('/addcontact',[ContactController::class,'store'])->name('contact.store');
    
    Route::get('rate',[RateController::class,'index'])->name('rate');
    Route::post('ratestore',[RateController::class,'store'])->name('ratestore');
    Route::get('reiew',[ReviewController::class,'index'])->name('reiew');
    Route::get('getrate',[RateController::class,'getrate'])->name('getrate');

    Route::post('consultation',[ConsultationController::class,'store'])->name('consultation.store');
    
    
    // Route::get('Consultation',[ConsultationController::class,'index'])->name('Consultation');

    Route::get('center/{id}',[CenterController::class,'show'])->name('aboutcenter');
    
    Route::get('services', function () {
        return view('services');
    });
    Route::get('p ', function () {
        return view('packages');
    });
    
    // });
    
    /*------------------------------------------
    All Admin Routes List
    --------------------------------------------*/
    Route::middleware(['auth', 'user-access:admin'])->group(function () {
        
        
        Route::get("adminhome",[UserController::class,'index'])->name('adminhome');
        
        Route::get("agetrate",[rateController::class,'agetrate'])->name('agetrate');
        
        Route::get('a', function () {
            return view('admin/sidebar');
        });
        
        Route::get('getcontact',[ContactController::class,'show'])->name('getcontact');

        // routes/web.php
        Route::resource('centers', CenterController::class);

        Route::get('addcenter',[CenterController::class,'addcenter'])->name('addcenter');
        // Route::post('/addcenter', [CenterController::class, 'store'])->name('centers.store');
        Route::delete('/centerdestroy/{center}', [CenterController::class, 'destroy'])->name('centers.destroy');
        // routes/web.php
Route::get('/centers/{cente}/edit', [CenterController::class, 'edit'])->name('centers.edit');
Route::put('/centers/{center}', [CenterController::class, 'update'])->name('centers.update');


        
        Route::get('addspicial',[SpicialController::class,'addspicial'])->name('addspicial');
        Route::post('/addspicial', [SpicialController::class, 'store'])->name('spicial.store');
});

/*------------------------------------------
All Manager Routes List
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
    
    Route::get('managerhome', [UserController::class, 'index2'])->name('managerhome');
    
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
