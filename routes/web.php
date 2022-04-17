<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'admin', 'middleware'=>['admin:admin']],function(){

    Route::get('/login',[AdminController::class, 'loginForm']);
    Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

//admin routes

Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});



Route::get('/admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile',[AdminProfileController::class, 'adminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit',[AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
Route::get('/admin/change/Password',[AdminProfileController::class, 'adminChangePassword'])->name('admin.change.password');




Route::post('/admin/update/Password',[AdminProfileController::class, 'updatePassword'])->name('update.change.password');
Route::post('/admin/profile/store',[AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');


//user routes


Route::middleware([
    'auth:sanctum,web',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $id = Auth::user()->id;
        $user = User::find($id);


        return view('dashboard',compact('user'));
    })->name('dashboard');
});

Route::get('/',[IndexController::class, 'index']);
Route::get('/user/logout',[IndexController::class, 'userLogout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class, 'userProfile'])->name('user.profile');
Route::get('/user/change/password',[IndexController::class, 'userChangePassword'])->name('user.change.password');




Route::post('/user/password/store',[IndexController::class, 'updatePassword'])->name('user.password.store');
Route::post('/user/profile/store',[IndexController::class, 'userProfileStore'])->name('user.profile.store');


// brand routes

Route::prefix('brand')->group(function(){

    Route::get('/all',[BrandController::class, 'allBrands'])->name('all.brands');
    Route::get('/edit/{id}',[BrandController::class, 'editBrand'])->name('edit.brand');
    Route::get('/delete/{id}',[BrandController::class, 'deleteBrand'])->name('delete.brand');




    Route::post('/update/{id}',[BrandController::class, 'updateBrand'])->name('brand.update');
    Route::post('/store',[BrandController::class, 'storeBrand'])->name('brand.store');


});

// category routes 

Route::prefix('category')->group(function(){

    Route::get('/all',[CategoryController::class, 'allCategory'])->name('all.category');
    Route::get('/edit/{id}',[CategoryController::class, 'editCategory'])->name('edit.category');
    Route::get('/delete/{id}',[CategoryController::class, 'deleteCategory'])->name('delete.category');




     Route::post('/update/{id}',[CategoryController::class, 'updateCategory'])->name('category.update');
     Route::post('/store',[CategoryController::class, 'storeCategory'])->name('category.store');


//subcategory

    Route::get('/sub/all',[SubCategoryController::class, 'allSubCategory'])->name('all.subcategory');
    Route::get('/sub/edit/{id}',[SubCategoryController::class, 'editSubCategory'])->name('edit.subcategory');
    Route::get('/sub/delete/{id}',[SubCategoryController::class, 'deleteSubCategory'])->name('delete.subcategory');

    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);


    Route::post('/sub/update/{id}',[SubCategoryController::class, 'updateSubCategory'])->name('subcategory.update');
    Route::post('/sub/store',[SubCategoryController::class, 'storeSubCategory'])->name('subcategory.store');

//sub subcategory

    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubSubCategoryController::class, 'GetSubSubCategory']);

    Route::get('/sub/sub/all',[SubSubCategoryController::class, 'allSSubCategory'])->name('all.subsubcategory');
    Route::get('/sub/sub/edit/{id}',[SubSubCategoryController::class, 'editSSubCategory'])->name('edit.subsubcategory');
    Route::get('/sub/sub/delete/{id}',[SubSubCategoryController::class, 'deleteSSubCategory'])->name('delete.subsubcategory');




    Route::post('/sub/sub/update/{id}',[SubSubCategoryController::class, 'updateSSubCategory'])->name('subsubcategory.update');
    Route::post('/sub/sub/store',[SubSubCategoryController::class, 'storeSSubCategory'])->name('subsubcategory.store');

});

// admin products


Route::prefix('product')->group(function(){

    Route::get('/add',[ProductController::class, 'addProduct'])->name('add.product');
    


});