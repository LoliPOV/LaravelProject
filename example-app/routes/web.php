<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [\App\Http\Controllers\ShowIdea::class, 'showIdead']);
Route::get('/realiseidea',function (){
    if(!Auth::check()){
        return redirect('/login');
    }
    return view('realise_idea');
});

Route::post('/realiseidea',[\App\Http\Controllers\IdeaController::class, 'idea']);
Route::resource('user/private', \App\Http\Controllers\PrivateController::class, [
    'only' => ['index']
]);
Route::get('adm/delUser/{id}',[\App\Http\Controllers\DelUserPage::class,'delete'
]);
Route::get('adm/SetRole/{id}',[\App\Http\Controllers\SetUserRole::class,'setrole'
]);
Route::get('adm/UnSetRole/{id}',[\App\Http\Controllers\SetUserRole::class,'delAdmrole'
]);
Route::resource('user/{id}',\App\Http\Controllers\PageOfAnotherController::class, [
    'only' => ['index']
]);
Route::resource('admp', \App\Http\Controllers\AdmpController::class, [
    'only' => ['index']
]);
Route::get('/settings', function (){
    return view('settings');
});

Route::get('/user_settings', [\App\Http\Controllers\SettingsController::class,'settings']);
Route::name('user')->group(function(){
    Route::get('/login', function(){
        if(Auth::check()){
            return redirect('user/private');
        }
        return view('login');
    })->name('login');

    Route::post('/login', [\App\Http\Controllers\LoginController::class,'login']);

    Route::get('/logout', function (){
        Auth::logout();
        return redirect("/login");
    })->name('logout');

    Route::get('/register', function(){
        if(Auth::check()){
            return redirect('user/private');
        }
        return view('/register');
    })->name('register');

    Route::post('/register', [\App\Http\Controllers\RegisterController::class,'save']);

});
