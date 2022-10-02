<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';



Route::prefix('/admin')->group(function() {
    //admin login route
    Route::match(['get', 'post'],'login', [AdminController::class, 'login'])->name('admin.login');

    
    Route::group(['middleware' => ['admin']],function(){
        //admin dashboard route
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
    });

});
///  for testing purposes admin dashboard without the admin group



