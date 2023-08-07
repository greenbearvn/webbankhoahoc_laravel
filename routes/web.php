<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site;
use Illuminate\Support\Facades\Auth;

///////////////////ADMIN//////////////////////////
use App\Http\Controllers\Admin\DanhMucController; // Import DanhMucController
use App\Http\Controllers\Admin\KhoaHocController; // Import KhoaHocController
use App\Http\Controllers\Admin\CapDoController; // Import CapDoController
use App\Http\Controllers\Admin\NguoiDungAdminController;
use App\Http\Controllers\Admin\GiangVienController;
use App\Http\Controllers\Admin\BaiHocController;
use App\Http\Controllers\Admin\BinhLuanController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\DonHangController;

///////////////////USER//////////////////////////

use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\BlogUserController;
use App\Http\Controllers\User\DetailController;
use App\Http\Controllers\User\LessionController;
use App\Http\Controllers\User\FavouritesController;


use App\Http\Controllers\User\CartController;





// Add a route for KhoaHocController with the URI 'khoahoc'
Route::get('/', function () {   
    return view('content');
});

Route::get('/admin', function () {   
    return view('Layout.base');
});


Route::controller(Site::class)->group(function () {
    Route::get('/home', 'Home')->name('home');

});

Route::controller(HomeController::class)->group(function () {
    Route::get('/home/index', 'index')->name('home.index');
});


Route::controller(DetailController::class)->group(function () {
    Route::get('/course/detail/{id?}', 'detail')->name('course.detail');
    Route::get('/course/samecategory/{id?}', 'courseSameCategory')->name('course.samecategory');
    Route::get('/course/videos/{id?}', 'getVideo')->name('course.getVideo');

});


Route::controller(AccountController::class)->group(function () {
    Route::get('/admin/account/home', 'index')->name('account.index');
    // Route::get('/admin/account/login', 'login')->name('account.login');
    Route::post('/admin/account/register', 'register')->name('register');
    Route::post('/user/account/login', 'login')->name('user.login');
});


Route::controller(CategoryController::class)->group(function () {
    Route::get('/course/category/{id?}', 'getProductByCategory')->name('category.getProductByCategory');
    Route::get('/course/category/search/{id?}', 'search')->name('category.search');
    Route::get('/course/category/giangvien/{id?}', 'fillTeacher')->name('category.fillTeacher');
   
});

Route::controller(BlogUserController::class)->group(function () {
    Route::get('/blog/index', 'index')->name('UserBlog.index');
    Route::get('/blog/detail/{id?}', 'detail')->name('UserBlog.Detail');
    Route::get('/blog/samecategory/{id?}', 'getBlogSameCategory')->name('UserBlog.samecategory');
});

Route::controller(LessionController::class)->group(function () {
    Route::get('/lession/course/{id?}', 'detail')->name('lession.detail');
    Route::get('/lession/course/videos/{id?}', 'getVideo')->name('lession.getVideo');
    Route::get('/lession/course/videos/detail/{id?}', 'getDetailVideo')->name('lession.getDetailVideo');
    Route::get('/lession/lession/search/{id?}', 'search')->name('lession.search');
});


Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'cartList')->name('cart.list');
    Route::post('/cart', 'addToCart')->name('cart.store');
    Route::post('/update-cart','updateCart')->name('cart.update');
    Route::post('/remove', 'removeCart')->name('cart.remove');
    Route::post('/clear', 'clearAllCart')->name('cart.clear');
    Route::get('/checkout', 'checkOut')->name('cart.checkOut');
});

Route::controller(FavouritesController::class)->group(function () {
    Route::get('/course/favourites/user/{id?}', 'Detail')->name('favourites.detail');
    Route::get('/course/favourites/lession/{id?}', 'getBaiHoc')->name('favourites.getBaiHoc');
});


///////////////////////////// ADMIN ROUTE /////////////////////////////////////////////

Route::middleware (['auth'])->group(function () {
    Route::get('/admin/khoahoc/index', [KhoaHocController::class,'index'])->name('khoahoc.index')->middleware('auth');

    // Route::get('/checkout', [CartController::class,'checkOut'] )->name('cart.checkOut')->middleware('auth');

    // Route::get('/cart', [CartController::class,'cartList'])->name('cart.list')->middleware('auth');
    
 });
 


Route::controller(KhoaHocController::class)->group(function () {
    
    Route::get('/admin/khoahoc/create', 'create')->name('khoahoc.create');
    Route::post('/admin/khoahoc/store', 'store')->name('khoahoc.store');
    Route::get('/admin/khoahoc/detail/{id?}', 'show')->name('khoahoc.detail');
    Route::get('/admin/khoahoc/edit/{id?}', 'edit')->name('khoahoc.edit');
    Route::put('/admin/khoahoc/update/{id?}', 'update')->name('khoahoc.update');
    Route::delete('/admin/khoahoc/delete/{id?}', 'destroy')->name('khoahoc.delete');
    Route::get('/admin/khoahoc/search', 'search')->name('khoahoc.search');
    Route::get('/admin/khoahoc/sort', 'sort')->name('khoahoc.sort');

});

Route::controller(DanhMucController::class)->group(function () {
    Route::get('/admin/danhmuc/index', 'index')->name('index');
    Route::get('/admin/danhmuc/create', 'create')->name('create');
    Route::post('/admin/danhmuc/store', 'store')->name('store');
    Route::get('/admin/danhmuc/detail/{id?}', 'show')->name('detail');
    Route::get('/admin/danhmuc/edit/{id?}', 'edit')->name('edit');
    Route::put('/admin/danhmuc/update/{id?}', 'update')->name('update');
    Route::delete('/admin/danhmuc/delete/{id?}', 'destroy')->name('delete');
    Route::get('/admin/danhmuc/search', 'search')->name('danhmuc.search');
});

Route::controller(CapDoController::class)->group(function () {
    Route::get('/admin/capdo/index', 'index')->name('capdo.index');
    Route::get('/admin/capdo/create', 'create')->name('capdo.create');
    Route::post('/admin/capdo/store', 'store')->name('capdo.store');
    Route::get('/admin/capdo/detail/{id?}', 'show')->name('capdo.detail');
    Route::get('/admin/capdo/edit/{id?}', 'edit')->name('capdo.edit');
    Route::put('/admin/capdo/update/{id?}', 'update')->name('capdo.update');
    Route::delete('/admin/capdo/delete/{id?}', 'destroy')->name('capdo.delete');
    Route::get('/admin/capdo/search', 'search')->name('capdo.search');
    Route::get('/admin/capdo/sort', 'sort')->name('capdo.sort');
});

Route::controller(NguoiDungAdminController::class)->group(function () {
    Route::get('/admin/nguoidung/index', 'index')->name('nguoidung.index');
    Route::get('/admin/nguoidung/create', 'create')->name('nguoidung.create');
    Route::post('/admin/nguoidung/store', 'store')->name('nguoidung.store');
    Route::get('/admin/nguoidung/detail/{id?}', 'show')->name('nguoidung.detail');
    Route::get('/admin/nguoidung/edit/{id?}', 'edit')->name('nguoidung.edit');
    Route::put('/admin/nguoidung/update/{id?}', 'update')->name('nguoidung.update');
    Route::delete('/admin/nguoidung/delete/{id?}', 'destroy')->name('nguoidung.delete');
    Route::get('/admin/nguoidung/search', 'search')->name('nguoidung.search');
    Route::get('/admin/nguoidung/sort', 'sort')->name('nguoidung.sort');
    Route::get('/admin/nguoidung/page', 'page')->name('nguoidung.page');
    Route::post('/admin/nguoidung/add', 'add')->name('nguoidung.add');
});

Route::controller(GiangVienController::class)->group(function () {
    Route::get('/admin/giangvien/index', 'index')->name('giangvien.index');
    Route::get('/admin/giangvien/create', 'create')->name('giangvien.create');
    Route::post('/admin/giangvien/store', 'store')->name('giangvien.store');
    Route::get('/admin/giangvien/detail/{id?}', 'show')->name('giangvien.detail');
    Route::get('/admin/giangvien/edit/{id?}', 'edit')->name('giangvien.edit');
    Route::put('/admin/giangvien/update/{id?}', 'update')->name('giangvien.update');
    Route::delete('/admin/giangvien/delete/{id?}', 'destroy')->name('giangvien.delete');
    Route::get('/admin/giangvien/search', 'search')->name('giangvien.search');
    Route::get('/admin/giangvien/sort', 'sort')->name('giangvien.sort');
    Route::post('/giangvien/create/{id?}', 'createNew')->name('giangvien.createNew');
    Route::get('/giangvien/createUI/{id?}', 'createNewUI')->name('giangvien.createNewUI');
});

Route::controller(BaiHocController::class)->group(function () {
    Route::get('/admin/baihoc/index', 'index')->name('baihoc.index');
    Route::get('/admin/baihoc/create', 'create')->name('baihoc.create');
    Route::post('/admin/baihoc/store', 'store')->name('baihoc.store');
    Route::get('/admin/baihoc/detail/{id?}', 'show')->name('baihoc.detail');
    Route::get('/admin/baihoc/edit/{id?}', 'edit')->name('baihoc.edit');
    Route::put('/admin/baihoc/update/{id?}', 'update')->name('baihoc.update');
    Route::delete('/admin/baihoc/delete/{id?}', 'destroy')->name('baihoc.delete');
    Route::get('/admin/baihoc/search', 'search')->name('baihoc.search');
    Route::get('/admin/baihoc/sort', 'sort')->name('baihoc.sort');
});

Route::controller(BinhLuanController::class)->group(function () {
    Route::get('/admin/binhluan/index', 'index')->name('binhluan.index');
    Route::get('/admin/binhluan/create', 'create')->name('binhluan.create');
    Route::post('/admin/binhluan/store', 'store')->name('binhluan.store');
    Route::get('/admin/binhluan/detail/{id?}', 'show')->name('binhluan.detail');
    Route::get('/admin/binhluan/edit/{id?}', 'edit')->name('binhluan.edit');
    Route::put('/admin/binhluan/update/{id?}', 'update')->name('binhluan.update');
    Route::delete('/admin/binhluan/delete/{id?}', 'destroy')->name('binhluan.delete');
    Route::get('/admin/binhluan/search', 'search')->name('binhluan.search');
    Route::get('/admin/binhluan/sort', 'sort')->name('binhluan.sort');
});

Route::controller(BlogController::class)->group(function () {
    Route::get('/admin/blog/index', 'index')->name('blog.index');
    Route::get('/admin/blog/create', 'create')->name('blog.create');
    Route::post('/admin/blog/store', 'store')->name('blog.store');
    Route::get('/admin/blog/detail/{id?}', 'show')->name('blog.detail');
    Route::get('/admin/blog/edit/{id?}', 'edit')->name('blog.edit');
    Route::put('/admin/blog/update/{id?}', 'update')->name('blog.update');
    Route::delete('/admin/blog/delete/{id?}', 'destroy')->name('blog.delete');
    Route::get('/admin/blog/search', 'search')->name('blog.search');
    Route::get('/admin/blog/sort', 'sort')->name('blog.sort');
});

Route::controller(VideoController::class)->group(function () {
    Route::get('/admin/video/index', 'index')->name('video.index');
    Route::get('/admin/video/create', 'create')->name('video.create');
    Route::post('/admin/video/store', 'store')->name('video.store');
    Route::get('/admin/video/detail/{id?}', 'show')->name('video.detail');
    Route::get('/admin/video/edit/{id?}', 'edit')->name('video.edit');
    Route::put('/admin/video/update/{id?}', 'update')->name('video.update');
    Route::delete('/admin/video/delete/{id?}', 'destroy')->name('video.delete');
    Route::get('/admin/video/search', 'search')->name('video.search');
    Route::get('/admin/video/sort', 'sort')->name('video.sort');
});


Route::controller(DonHangController::class)->group(function () {
    Route::get('/admin/donhang/index', 'index')->name('adminCart.index');
    Route::get('/admin/cart', 'cartList')->name('adminCart.list');
    Route::post('/admin/cart', 'addToCart')->name('adminCart.store');
    Route::post('/admin/cart/store', 'store')->name('adminCart.save');
    Route::get('/admin/donhang/create', 'create')->name('donhang.create');
    Route::post('/admin/update-cart','updateCart')->name('adminCart.update');
    Route::post('/admin/remove', 'removeCart')->name('adminCart.remove');
    Route::post('/admin/clear', 'clearAllCart')->name('adminCart.clear');
    Route::get('/admin/checkout', 'checkOut')->name('adminCart.checkOut');


    Route::get('/admin/donhang/edit/{id?}', 'edit')->name('donhang.edit');
    Route::post('/admin/donhang/update/{id?}', 'update')->name('donhang.update');
    Route::get('/admin/donhang/detail/{id?}', 'show')->name('donhang.show');
});




///////////////////////
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->back();
})->name('logout');
