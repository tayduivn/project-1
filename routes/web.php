<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
//     return view('auth.login');
// });


Auth::routes(['verify' => true]);
//  Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'IndexController@index')->name('home');
//users
Route::middleware('auth')->group(function () {
    //---phần ADMIN-USER----
    Route::get('/dashboard', 'DashboardController@show'); //lap route->lapcontroller->viet action
    Route::get('dashboard/delete/{id}','DashboardController@delete')->name('delete.dashboard')->middleware('CheckRole:Editor');//xóa đơn hàng mới
    
    Route::get('admin', 'DashboardController@show');
    Route::get('admin/user/list', 'AdminUserController@list')->middleware('CheckRole:Editor','CheckRole:Saler');//không cho vào list user
    Route::get('admin/user/add', 'AdminUserController@add')->middleware('CheckRole:Editor','CheckRole:Saler');
    Route::post('admin/user/store', 'AdminUserController@store');
    Route::get('admin/user/delete/{id}', 'AdminUserController@delete')->name('delete_user')->middleware('CheckRole:Editor','CheckRole:Saler');
    Route::post('admin/user/action', 'AdminUserController@action');

    Route::get('admin/user/edit/{id}', 'AdminUserController@edit')->name('user.edit');
    Route::post('admin/user/update/{id}', 'AdminUserController@update')->name('user.update');


    //admin-product

    Route::get('admin/product/add', 'AdminProductController@add')->middleware('CheckRole:Saler');
    Route::post('admin/product/addstore', 'AdminProductController@addstore');

    Route::get('admin/product/list', 'AdminProductController@list')->middleware('CheckRole:Saler');/////
    Route::get('admin/product/cat/list', 'AdminProductController@catlist')->middleware('CheckRole:Saler');
    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    Route::post('admin/product/store', 'AdminproductController@store');
    Route::get('admin/product/delete/cat/{id}', 'AdminProductController@deletecat')->name('deletecat_product')->middleware('CheckRole:Saler');
    Route::post('admin/product/cat/action', 'AdminProductController@cataction');
    //sửa cập nhật danh mục admin
    Route::get('admin/product/cat/edit/{id}', 'AdminProductController@editcat')->name('product.editcat')->middleware('CheckRole:Saler');
    Route::post('admin/product/cat/update/{id}', 'AdminProductController@updatecat')->name('product.updatecat')->middleware('CheckRole:Saler');

    //xóa delete list sản phẩm admin

    Route::get('admin/product/delete/{id}', 'AdminProductController@delete')->name('delete_product')->middleware('CheckRole:Saler');
    //sửa và cập nhật sản phẩm admin
    Route::get('admin/product/edit/{id}', 'AdminProductController@edit')->name('product.edit')->middleware('CheckRole:Saler');
    Route::post('admin/product/update/{id}', 'AdminProductController@update')->name('product.update')->middleware('CheckRole:Saler');
    Route::post('admin/product/acdition', 'AdminProductController@acdition');
    //thêm ảnh liên quan
    Route::get('admin/product/media/{id}', 'AdminProductController@media')->name('product.media')->middleware('CheckRole:Saler');
    Route::post('admin/product/mediaaction/{id}', 'AdminProductController@mediaaction')->name('product.addmedia');
    
    //thêm trang page admin
    Route::get('admin/page/add','AdminPageController@add')->middleware('CheckRole:Saler');
    Route::post('admin/page/addpage', 'AdminPageController@addpage')->middleware('CheckRole:Saler');
    //hiển thị danh sách page admin
    Route::get('admin/page/list','AdminPageController@list')->middleware('CheckRole:Saler');
    //xóa page admin
    Route::get('admin/page/delete/{id}', 'AdminPageController@delete')->name('delete_page')->middleware('CheckRole:Saler');
    //edit page admin
    Route::get('admin/page/edit/{id}', 'AdminPageController@edit')->name('page.edit')->middleware('CheckRole:Saler');
    Route::post('admin/page/update/{id}', 'AdminPageController@update')->name('page.update');
    Route::post('admin/page/action', 'AdminPageController@action');


    //admin-order
    Route::get('admin/order/list','AdminOrderController@list')->middleware('CheckRole:Editor');//hiển thị list danh sách đơn hàng
    Route::get('admin/order/delete/{id}','AdminOrderController@delete')->name('delete.order')->middleware('CheckRole:Editor');//xóa đơn hàng
    Route::get('admin/order/action','AdminOrderController@action');
    //admin-detail-order
    Route::get('admin/order/detail/{id}','AdminOrderController@detail')->name('order.detail')->middleware('CheckRole:Editor');
    //admin-customer
    Route::get('admin/customer/listcustomer','AdminOrderController@listcustomer')->middleware('CheckRole:Editor');//dánh sach khách hàng
    Route::post('admin/customer/actioncustomer','AdminOrderController@actioncustomer')->middleware('CheckRole:Editor');//tác vụ xóa 
    Route::get('admin/customer/deletecustomer/{id}','AdminOrderController@deletecustomer')->name('delete.customer')->middleware('CheckRole:Editor');
    //admin-slider
    Route::get('admin/slider/add','AdminSliderController@add')->middleware('CheckRole:Saler');//add slider
    Route::post('admin/slider/actionslider','AdminSliderController@actionslider')->middleware('CheckRole:Saler');//phuong thuc xử lý slider
    Route::get('admin/slider/list','AdminSliderController@list')->middleware('CheckRole:Saler');//danh ssach slider
    //xóa slider
    Route::get('admin/slider/delete/{id}','AdminSliderController@delete')->name('delete.slider')->middleware('CheckRole:Saler');
    //chỉnh sửa slider
    Route::get('admin/slider/edit/{id}','AdminSliderController@edit')->name('edit.slider')->middleware('CheckRole:Saler');
    Route::post('admin/slider/update/{id}','AdminSliderController@update')->name('update.slider');
    //xóa tác vụ
    Route::post('admin/slider/slideraction','AdminSliderController@slideraction');


    
});


//Phần Giao diện người dùng

//phần trang chủ
Route::get('index','IndexController@index');
//phần thông tin product
Route::get('product/show/{id}','ProductController@show')->name('product.show');
//phần chi tiết sản phẩm
Route::get('product/detail/{id}','ProductController@detail')->name('product.detail');
Route::post('product/search','ProductController@search');//phần tìm kiếm






Route::get('product/manual','ProductController@manual');//phần hướng dân thanh toán
//phần shopping cart
Route::get('cart/show','CartController@show');
Route::get('cart/add/{id}','CartController@add')->name('cart.add');//thêm  sản phẩm vào trong giỏ hàng
Route::get('cart/remove/{rowId}','CartController@remove')->name('cart.remove');//xóa giỏ hàng
Route::get('cart/destroy/','CartController@destroy')->name('cart.destroy');//xóa toàn bộ giỏ hàng
Route::post('cart/update','CartController@update')->name('cart.update');//cập nhật giỏ hàng

Route::get('cart/updateajax','CartController@updateajax');//updateajax;



Route::get('cart/checkout','CartController@checkout');//mục checkout thong tin đơn hàng
Route::post('cart/addcustomer', 'CartController@addcustomer');//xửlý add thông tin khách hàng vào db
Route::get('cart/addcheckout/{id}','CartController@addcheckout')->name('cart.addcheckout');//thêm  sản phẩm vào trong giỏ hàng
Route::post('cart/addcartmulti/{id}','CartController@addcartmulti')->name('cart.addcartmulti');//thêm 1 số lượng sản phẩm vào giỏ hàng
Route::get('cart/thank/{id}','CartController@thank')->name('cart.thank');
//index-pages
Route::get('page/show','PageController@show');//showpage
Route::get('page/detail/{id}','PageController@detail')->name('page.detail');//trang chi tiết page

//bình luận sản phẩm
Route::post('product/comment/{id}','ProductController@comment_product')->name('product.comment');

Route::get('account/login','AccountController@login');
Route::get('account/register','AccountController@register');