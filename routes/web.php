<?php

use App\Http\Controllers\ProductController;
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
Route::get('/',function(){
    return view('pages.home');
});
Route::get('/add',function(){
    return view('pages.addProduct');
});

// Route::get('/view',function(){
//     return view('pages.viewProduct');
// });



Route::controller(ProductController::class)->group(function(){
    Route::get('/view','index');
    Route::post('/add','add');
});
