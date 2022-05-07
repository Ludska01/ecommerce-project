<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\SiteSettingControler;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeBlogController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\WishlistController;
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
        Route::get('/product', [ProductController::class, 'ProductStock'])->name('product.stock');




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

    Route::prefix('coupons')->group(function(){

        Route::get('/view', [CouponController::class, 'couponView'])->name('manage.coupon');
        
        Route::post('/store', [CouponController::class, 'couponStore'])->name('coupon.store');

        Route::get('/edit/{id}', [CouponController::class, 'couponEdit'])->name('coupon.edit');

        Route::post('/update/{id}', [CouponController::class, 'couponUpdate'])->name('coupon.update');

        Route::get('/delete/{id}', [CouponController::class, 'couponDelete'])->name('coupon.delete');
                
        });

    Route::prefix('shipping')->group(function(){

        Route::get('/division/view', [ShippingAreaController::class, 'divisionView'])->name('manage.division');
        
        Route::post('/division/store', [ShippingAreaController::class, 'divisionStore'])->name('division.store');

        Route::post('/division/update/{id}', [ShippingAreaController::class, 'divisionUpdate'])->name('division.update');

        Route::get('/division/delete/{id}', [ShippingAreaController::class, 'divisionDelete'])->name('division.delete');

        Route::get('/division/edit/{id}', [ShippingAreaController::class, 'divisionEdit'])->name('division.edit');

        //district

        Route::get('/district/view', [ShippingAreaController::class, 'districtView'])->name('manage.district');

        Route::post('/district/store', [ShippingAreaController::class, 'districtStore'])->name('district.store');

        Route::get('/district/edit/{id}', [ShippingAreaController::class, 'districtEdit'])->name('district.edit');

        Route::post('/district/update/{id}', [ShippingAreaController::class, 'districtUpdate'])->name('district.update');

        Route::get('/district/delete/{id}', [ShippingAreaController::class, 'districtDelete'])->name('district.delete');

        // Ship State 
        Route::get('/state/view', [ShippingAreaController::class, 'stateView'])->name('manage.state');

        Route::post('/state/store', [ShippingAreaController::class, 'stateStore'])->name('state.store');

        Route::get('/state/edit/{id}', [ShippingAreaController::class, 'stateEdit'])->name('state.edit');

        Route::post('/state/update/{id}', [ShippingAreaController::class, 'stateUpdate'])->name('state.update');

        Route::get('/state/delete/{id}', [ShippingAreaController::class, 'stateDelete'])->name('state.delete');


        
    
        
        });

        //Orders admin

        Route::prefix('orders')->group(function(){

            Route::get('/pending/orders', [OrderController::class, 'pendingOrders'])->name('pending-orders');

            Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'pendingOrdersDetails'])->name('pending.order.details');

            Route::get('/confirmed/orders', [OrderController::class, 'confirmedOrders'])->name('confirmed-orders');

            Route::get('/processing/orders', [OrderController::class, 'processingOrders'])->name('processing-orders');

            Route::get('/picked/orders', [OrderController::class, 'pickedOrders'])->name('picked-orders');

            Route::get('/shipped/orders', [OrderController::class, 'shippedOrders'])->name('shipped-orders');

            Route::get('/delivered/orders', [OrderController::class, 'deliveredOrders'])->name('delivered-orders');

            Route::get('/cancel/orders', [OrderController::class, 'cancelOrders'])->name('cancel-orders');

            Route::get('/pending/confirm/{order_id}', [OrderController::class, 'pendingToConfirm'])->name('pending-confirm');

            Route::get('/confirm/processing/{order_id}', [OrderController::class, 'confirmToProcessing'])->name('confirm.processing');

            Route::get('/processing/picked/{order_id}', [OrderController::class, 'processingToPicked'])->name('processing.picked');

            Route::get('/picked/shipped/{order_id}', [OrderController::class, 'pickedToShipped'])->name('picked.shipped');

            Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'shippedToDelivered'])->name('shipped.delivered');

            Route::get('/invoice/download/{order_id}', [OrderController::class, 'adminInvoiceDownload'])->name('invoice.download');
                        
            
        });

        // Admin Reports Routes 
        Route::prefix('reports')->group(function(){

            Route::get('/view', [ReportController::class, 'reportView'])->name('all-reports');

            Route::post('/search/by/date', [ReportController::class, 'reportByDate'])->name('search-by-date');

            Route::post('/search/by/month', [ReportController::class, 'reportByMonth'])->name('search-by-month');

            Route::post('/search/by/year', [ReportController::class, 'reportByYear'])->name('search-by-year');
        
        
        });


        // Admin Get All User Routes 
        Route::prefix('alluser')->group(function(){

            Route::get('/view', [AdminProfileController::class, 'AllUsers'])->name('all-users');

            Route::get('/all/admin', [AdminUserController::class, 'allAdminRole'])->name('all.admin.user');

            Route::get('/add', [AdminUserController::class, 'addAdminRole'])->name('add.admin');

            Route::post('/store', [AdminUserController::class, 'storeAdminRole'])->name('admin.user.store');

            Route::get('/edit/{id}', [AdminUserController::class, 'EditAdminRole'])->name('edit.admin.user');

            Route::post('/update', [AdminUserController::class, 'UpdateAdminRole'])->name('admin.user.update');

            Route::get('/delete/{id}', [AdminUserController::class, 'DeleteAdminRole'])->name('delete.admin.user');
            
    
        });

        // admin blog routes
        Route::prefix('blog')->group(function(){

            Route::get('/category', [BlogController::class, 'blogCategory'])->name('blog.category');
            
            Route::post('/store', [BlogController::class, 'blogCategoryStore'])->name('blogcategory.store');

            Route::get('/category/edit/{id}', [BlogController::class, 'blogCategoryEdit'])->name('blog.category.edit');

            Route::get('/remove/category/{id}', [BlogController::class, 'removeBlogCategory'])->name('blog.category.delete');

            Route::post('/update', [BlogController::class, 'blogCategoryUpdate'])->name('blogcategory.update');

            // Admin View Blog Post Routes 

            Route::get('/list/post', [BlogController::class, 'listBlogPost'])->name('list.post');

            Route::get('/add/post', [BlogController::class, 'addBlogPost'])->name('add.post');

            Route::get('/remove/post/{id}', [BlogController::class, 'removeBlogPost'])->name('remove.post');

            Route::post('/post/store', [BlogController::class, 'blogPostStore'])->name('post-store');
            
        }); 

        //site setting routes 

        // Admin Site Setting Routes 
        Route::prefix('setting')->group(function(){

            Route::get('/site', [SiteSettingControler::class, 'siteSetting'])->name('site.setting');
        
            Route::post('/site/update', [SiteSettingControler::class, 'siteSettingUpdate'])->name('update.sitesetting');

            Route::get('/seo', [SiteSettingControler::class, 'seoSetting'])->name('seo.setting'); 

            Route::post('/seo/update', [SiteSettingControler::class, 'seoSettingUpdate'])->name('update.seosetting');
        
        });


        // Admin Return Order Routes 
        Route::prefix('return')->group(function(){

            Route::get('/admin/request', [ReturnController::class, 'returnRequest'])->name('return.request');

            Route::get('/admin/return/approve/{order_id}', [ReturnController::class, 'returnRequestApprove'])->name('return.approve');

            Route::get('/admin/all/request', [ReturnController::class, 'returnAllRequest'])->name('all.request');
        
        });

        // Admin Manage Review Routes 
        Route::prefix('review')->group(function(){

            Route::get('/pending', [ReviewController::class, 'pendingReview'])->name('pending.review');
            
            Route::get('/admin/approve/{id}', [ReviewController::class, 'reviewApprove'])->name('review.approve');
            
            Route::get('/publish', [ReviewController::class, 'publishReview'])->name('publish.review');

            Route::get('/delete/{id}', [ReviewController::class, 'deleteReview'])->name('delete.review');
            
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


//cart

Route::post('/cart/data/store/{id}', [CartController::class, 'addToCart']);

Route::get('/product/mini/cart/', [CartController::class, 'addMiniCart']); 

Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'removeMiniCart']);

Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'addToWishlist']);

//cart show

Route::get('/mycart', [CartPageController::class, 'myCart'])->name('mycart');

Route::get('/user/get-cart-product', [CartPageController::class, 'getCartProduct']);

Route::get('/user/cart-remove/{rowId}', [CartPageController::class, 'removeCartProduct']);

Route::get('/cart-increment/{rowId}', [CartPageController::class, 'cartIncrement']);

Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'cartDecrement']);

// Frontend Coupon Option

Route::post('/coupon-apply', [CartController::class, 'couponApply']);

Route::get('/coupon-calculation', [CartController::class, 'couponCalculation']);

Route::get('/coupon-remove', [CartController::class, 'couponRemove']);

//checkout ajax

Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'districtGetAjax']);

Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'stateGetAjax']);

Route::post('/stripe/order', [StripeController::class, 'stripeOrder'])->name('stripe.order');

Route::post('/cash/order', [CashController::class, 'cashOrder'])->name('cash.order');

//blog User routes 

Route::get('/blog', [HomeBlogController::class, 'addBlogPost'])->name('home.blog');

Route::get('/post/details/{id}', [HomeBlogController::class, 'detailsBlogPost'])->name('post.details');

Route::get('/blog/category/post/{category_id}', [HomeBlogController::class, 'homeBlogCatPost']);

/// Product Search Route 
Route::post('/search', [IndexController::class, 'ProductSearch'])->name('product.search');



//protected for login users

Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){


    Route::get('/user/logout',[IndexController::class, 'userLogout'])->name('user.logout');

    Route::get('/user/profile',[IndexController::class, 'userProfile'])->name('user.profile');

    Route::get('/user/change/password',[IndexController::class, 'userChangePassword'])->name('user.change.password');

    Route::post('/user/password/store',[IndexController::class, 'updatePassword'])->name('user.password.store');
    //wishlist

    Route::get('/wishlist', [WishlistController::class, 'viewWishlist'])->name('wishlist');

    Route::get('/get-wishlist-product', [WishlistController::class, 'getWishlistProduct']);

    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'removeWishlistProduct']);

    //checkout

    Route::get('/checkout', [CartController::class, 'checkoutCreate'])->name('checkout');

    Route::post('/checkout/store', [CheckoutController::class, 'checkoutStore'])->name('checkout.store');



    //orders

    Route::get('/myorders',[AllUserController::class, 'myOrders'])->name('my.orders');

    Route::get('/order_details/{order_id}', [AllUserController::class, 'orderDetails']);

    Route::get('/invoice_download/{order_id}', [AllUserController::class, 'invoiceDownload']);

    Route::post('/return/order/{order_id}', [AllUserController::class, 'returnOrder'])->name('return.order');

    Route::get('/return/order/list', [AllUserController::class, 'returnOrderList'])->name('return.order.list');

    Route::get('/cancel/orders', [AllUserController::class, 'cancelOrders'])->name('cancel.orders');

    /// Frontend Product Review Routes

    Route::post('/review/store', [ReviewController::class, 'reviewStore'])->name('review.store');

    /// Order Traking Route 
    Route::post('/order/tracking', [AllUserController::class, 'OrderTraking'])->name('order.tracking');  

});


