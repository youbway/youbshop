<?php

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\ProductImageController;
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
        //*******  admins *******
        Route::get('admins/{type?}', [AdminController::class, 'showAdmins'])->name('show.admins');

        //******* show the admins for the super Admin *******
        Route::get('show-vendor-details/{id}', [AdminController::class, 'adminShowVendorDetails'])->name('show.vendor.details');

        //******* update the status of an admin from the super Admin *******
        Route::post('update-admin-status', [AdminController::class, 'updateAdminStatus'])->name('update.status');


        // ================================== catalogue management =================================
        //*******  sections *******
        Route::get('sections', [SectionController::class, 'index'])->name('sections');
        // Route::get('section/{id}', [SectionController::class, 'show'])->name('admin.section.show');
        Route::get('section/delete/{id}', [SectionController::class, 'delete'])->name('section.delete');
        Route::get('section/edit/{id}', [SectionController::class, 'edit'])->name('section.edit');
        Route::post('section/update/{id}', [SectionController::class, 'update'])->name('section.update');
        Route::get('section/add', [SectionController::class, 'add'])->name('section.add');
        Route::post('section/store', [SectionController::class, 'store'])->name('section.store');
        Route::post('update-section-status', [SectionController::class, 'updateSectionStatus'])->name('update.section.status');
        //*******  categories *******
        Route::post('update-category-status', [CategoryController::class, 'updateCategoryStatus'])->name('update.category.status');
        Route::resource('category', CategoryController::class);

        //*******  brands *******
        Route::post('update-brand-status', [BrandController::class, 'updateBrandStatus'])->name('update.brand.status');
        Route::resource('brand', BrandController::class);

        //*******  product attributes *******
        Route::post('update-attribute-status', [ProductController::class, 'updateAttributeStatus'])->name('update.attribute.status');
        Route::delete('attribute/{id}', [ProductController::class, 'deleteAttribute']);
        Route::get('product/add-attributes/{id}', [ProductController::class, 'addAttribute'])->name('product.add.attributes');
        Route::post('product/update-attributes/{id}', [ProductController::class, 'updateAttribute'])->name('product.update.attributes');

        //*******  product images *******
        Route::post('update-attribute-status', [ProductImageController::class, 'updateAttributeStatus'])->name('update.image.status');
        Route::delete('attribute/{id}', [ProductImageController::class, 'deleteImage']);
        Route::get('product/add-images/{id}', [ProductImageController::class, 'addImages'])->name('product.add.images');
        Route::post('product/update-images/{id}', [ProductImageController::class, 'updateImages'])->name('product.update.images');

        //*******  products *******
        Route::put('product/delete/{id}-image',[ProductController::class, 'deleteImage'])->name('product.delete.image');
        Route::put('product/delete/{id}-video',[ProductController::class, 'deleteVideo'])->name('product.delete.video');
        Route::post('update-product-status', [ProductController::class, 'updateProductStatus'])->name('update.product.status');
        Route::resource('product', ProductController::class);


    });

});
///  for testing purposes admin dashboard without the admin group



