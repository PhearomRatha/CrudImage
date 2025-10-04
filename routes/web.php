<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
// Route::get('/',function(){
//     return view('pages.home');
// });
// Route::get('/add',function(){
//     return view('pages.addProduct');
// });

// Route::get('/view',function(){
//     return view('pages.viewProduct');
// });






// Route middlewear
Route::controller(UserController::class)->group(function(){
        Route::get('/','login')->name('login');
        Route::post('/loginForm','loginForm');
        Route::get('/register','showRegister');
        Route::post('/registerForm','register');
        // Route::get('/dashborad',function(){
        //     return view('Admin.index');
        // });

});


Route::get('/user',function(){
    return view('User.index');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[ProductController::class, 'renderDashboard']);
    Route::controller(ProductController::class)->group(function(){
    Route::get('/dashboard','index');
    Route::post('/add','add');
    Route::get('/destroy/{id}','destroy');
    Route::get('/show/{id}','show');
    Route::post('/update/{id}','update');
});
});








