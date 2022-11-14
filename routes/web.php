<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SectionController;
use App\Models\Section;
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



Route::name('admin.')->prefix('/admin')->group(function() {
    //admin login route
    Route::match(['get', 'post'],'login', [AdminController::class, 'login'])->name('login');


    Route::group(['middleware' => ['admin']],function(){
        //admin dashboard route
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('logout', [AdminController::class, 'logout'])->name('logout');

        //******* update admin *******
        //password
        Route::match(['get', 'post'],'update-admin-password', [AdminController::class, 'updateAdminPassword'])->name('update.password');
        Route::post('check-admin-password', [AdminController::class, 'checkAdminPassword']);
        //details
        Route::match(['get', 'post'], 'update-admin-details', [AdminController::class, 'updateAdminDetails'])->name('update.details');

        //******* update vendor *******
        Route::match(['get', 'post'], 'update-vendor-details/{slug}', [AdminController::class, 'updateVendorDetails'])->name('update.vendor.details');

        // ================================== admins management =================================
        //******* show all admins *******
        Route::get('admins/{type?}', [AdminController::class, 'showAdmins'])->name('show.admins');

        //******* show the admins for the super Admin *******
        Route::get('show-vendor-details/{id}', [AdminController::class, 'adminShowVendorDetails'])->name('show.vendor.details');

        //******* update the status of an admin from the super Admin *******
        Route::post('update-admin-status', [AdminController::class, 'updateAdminStatus'])->name('update.status');


        // ================================== catalogue management =================================
        //******* show all sections *******
        Route::get('sections', [SectionController::class, 'index'])->name('sections');
        // Route::get('section/{id}', [SectionController::class, 'show'])->name('admin.section.show');
        Route::get('section/delete/{id}', [SectionController::class, 'delete'])->name('section.delete');
        Route::get('section/edit/{id}', [SectionController::class, 'edit'])->name('section.edit');
        Route::post('section/update/{id}', [SectionController::class, 'update'])->name('section.update');
        Route::get('section/add', [SectionController::class, 'add'])->name('section.add');
        Route::post('section/store', [SectionController::class, 'store'])->name('section.store');
        Route::post('update-section-status', [SectionController::class, 'updateSectionStatus'])->name('update.section.status');
        //******* show all categories *******
        Route::post('update-category-status', [CategoryController::class, 'updateCategoryStatus'])->name('update.category.status');
        Route::resource('category', CategoryController::class);

        //******* show all brands *******
        Route::post('update-brand-status', [BrandController::class, 'updateBrandStatus'])->name('update.category.status');
        Route::resource('brand', BrandController::class);

        //******* show all products *******
        Route::get('products', [AdminController::class, 'showProducts'])->name('product.index');


    });

});
///  for testing purposes admin dashboard without the admin group



