<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ClientController;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    
    Route::get('test20',[MyController::class,'my_data']);

    Route::post('insertClient',[ClientController::class,'store'])->name('insertClient');
    Route::get('addClient',[ClientController::class,'create'])->name('addClient');
    Route::get('clients',[ClientController::class,'index'])->middleware('verified')->name('clients');
    Route::get('editClients/{id}',[ClientController::class,'edit'])->name('editClients');
    Route::put('updateClients/{id}',[ClientController::class,'update'])->name('updateClients');
    Route::get('showClient/{id}',[ClientController::class,'show'])->name('showClient');
    Route::delete('delClient',[ClientController::class,'destroy'])->name('delClient');
    Route::delete('forceDeleteClient',[ClientController::class,'forceDelete'])->name('forceDeleteClient');
    Route::get('trashClient',[ClientController::class,'trash'])->name('trashClient');
    Route::get('restoreClient/{id}',[ClientController::class,'restore'])->name('restoreClient');

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('peter/{id?}', function($id = 0){
        return 'Welcome to my first web site ' . $id;
    })->whereNumber('id');

    Route::get('course/{name}', function($name){
        return 'My name is: ' . $name;
    })->whereIn('name',['Peter', 'Tony','Ahmed']);

    Route::prefix('cars')->group(function(){
        Route::get('bmw', function(){
            return 'Category is BMW';
        });

        Route::get('mercedes',function(){
            return 'Category is Mercedes';
        });
    });

    Route::get('form1',function(){
        return view('form1');
    });

    Route::post('recForm1', [MyController::class,'receiveData'])->name('receiveForm1');

    Route::get('genEmail', [MyController::class,'generalMail']);

    Route::get('mySession', [MyController::class,'myVal']);

    Route::get('restoreSession', [MyController::class,'restoreVal']);

    Route::get('deleteVal', [MyController::class,'deleteVal']);
    Route::get('sendClientMail', [MyController::class,'sendClientMail']);

    Route::get('/auth/redirect', function () {
             return Socialite::driver('facebook')->redirect();
        })->name('facebookRedirect');

    Route::get('/auth/callback', function () {
            $user = Socialite::driver('facebook')->user();
    });
        

    // Route::fallback(function(){
    //     // return 'The required is not found';
    //     return redirect('/');
    // });
    Auth::routes(['verify'=>true]);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});