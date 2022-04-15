<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
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