<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
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

Route::middleware(['auth:admin'])->group(function(){

    Route::middleware([
        'auth:sanctum,admin',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.index');
        })->name('dashboard')->middleware('auth:admin');
    });



    Route::get('/admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile',[AdminProfileController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit',[AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
    Route::get('/admin/change/Password',[AdminProfileController::class, 'adminChangePassword'])->name('admin.change.password');




    Route::post('/admin/update/Password',[AdminProfileController::class, 'updatePassword'])->name('update.change.password');
    Route::post('/admin/profile/store',[AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');

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
        Route::get('/manage',[ProductController::class, 'manageProduct'])->name('manage.product');
        Route::get('/edit/{id}',[ProductController::class, 'editProduct'])->name('edit.product');
        Route::get('/delete/multiimg/{id}',[ProductController::class, 'deleteMultiImg'])->name('delete.multiimg');
        Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
        Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
        Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');





        Route::post('/store',[ProductController::class, 'productStore'])->name('product.store');
        Route::post('/update/{id}',[ProductController::class, 'productUpdate'])->name('product.update');
        Route::post('/multimage',[ProductController::class, 'multiImageUpdate'])->name('product.image');
        Route::post('/thumbnail/{id}',[ProductController::class, 'thumbnailUpdate'])->name('product.thumbnail');


    });



    //slider routes

    Route::prefix('slider')->group(function(){

        Route::get('/view', [SliderController::class, 'sliderView'])->name('manage.slider');
        
        Route::post('/store', [SliderController::class, 'sliderStore'])->name('slider.store');
        
        Route::get('/edit/{id}', [SliderController::class, 'sliderEdit'])->name('slider.edit');
        
        Route::post('/update', [SliderController::class, 'sliderUpdate'])->name('slider.update');
        
        Route::get('/delete/{id}', [SliderController::class, 'sliderDelete'])->name('slider.delete');

        Route::get('/inactive/{id}', [SliderController::class, 'sliderInactive'])->name('slider.inactive');

        Route::get('/active/{id}', [SliderController::class, 'sliderActive'])->name('slider.active');
        
        });


});//end of admin middleware








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

Route::get('/',[IndexController::class, 'index'])->name('index');
Route::get('/user/logout',[IndexController::class, 'userLogout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class, 'userProfile'])->name('user.profile');
Route::get('/user/change/password',[IndexController::class, 'userChangePassword'])->name('user.change.password');




Route::post('/user/password/store',[IndexController::class, 'updatePassword'])->name('user.password.store');
Route::post('/user/profile/store',[IndexController::class, 'userProfileStore'])->name('user.profile.store');

// frontend 


/// multi lang
Route::get('/language/serbian', [LanguageController::class, 'serbian'])->name('serbian.language');

Route::get('/language/english', [LanguageController::class, 'english'])->name('english.language'); 


//product 

Route::get('/product/details/{id}/{slug}', [IndexController::class, 'productDetails']);

Route::get('/product/tag/{tag}', [IndexController::class, 'tagWiseProduct']);

Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'subCatWiseProduct']);

Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'subSubCatWiseProduct']);

Route::get('/product/view/modal/{id}', [IndexController::class, 'productViewAjax']);
