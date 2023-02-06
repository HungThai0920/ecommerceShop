<?php
use Spatie\Sitemap\SitemapGenerator;
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
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' =>'admin.'
], function () {

	Route::get('login', ['as'=>'login', 'uses'=>'AuthController@getLogin'])->name('login');
	Route::post('postLogin', ['as'=>'postLogin', 'uses'=>'AuthController@postLogin'])->name('postLogin');
	Route::get('getForgotPassword', ['as'=>'getForgotPassword', 'uses'=>'AuthController@getForgotPassword'])->name('getForgotPassword');
	Route::post('postForgotPassword', ['as'=>'postForgotPassword', 'uses'=>'AuthController@postForgotPassword'])->name('postForgotPassword');

	Route::get('getTokenResetPassword/{token}', ['as'=>'getTokenResetPassword', 'uses'=>'AuthController@getTokenResetPassword'])->name('getTokenResetPassword');

	Route::get('getResetPassword', ['as'=>'getResetPassword', 'uses'=>'AuthController@getResetPassword'])->name('getResetPassword');

	Route::post('postResetPassword', ['as'=>'postResetPassword', 'uses'=>'AuthController@postResetPassword'])->name('postResetPassword');

	Route::get('logout', ['as'=>'logout', 'uses'=>'AuthController@getLogout'])->name('logout');
    Route::group(['prefix'=>'transactions'], function() {
        Route::get('orders/{id}', ['as' => 'orders', 'uses' => 'TransactionController@orders'])->name('orders');
    });
	
	Route::group(['middleware'=>'auth'], function() {

		// route thêm sửa xóa danh mục sản phẩm
		Route::group(['prefix' =>'category'], function() {
			Route::get('list',['as'=>'list','uses'=>'CategoryProductController@index'])->name('list');
			Route::get('getAdd',['as'=>'getAdd','uses'=>'CategoryProductController@getAdd'])->name('getAdd');
			Route::post('postAdd',['as'=>'postAdd','uses'=>'CategoryProductController@postAdd'])->name('postAdd');
			Route::get('getEdit/{id}',['as'=>'getEdit','uses'=>'CategoryProductController@getEdit'])->name('getEdit');
			Route::post('postEdit/{id}',['as'=>'postEdit','uses'=>'CategoryProductController@postEdit'])->name('postEdit');
			Route::get('getDelete/{id}',['as'=>'getDelete','uses'=>'CategoryProductController@getDelete'])->name('getDelete');
			Route::post('deleteMultipleCategory',['as'=>'deleteMultipleCategory','uses'=>'CategoryProductController@deleteMultipleCategory'])->name('deleteMultipleCategory');
		});

		//route thêm sửa xóa nhà cung cấp
		Route::group(['prefix'=>'suppliers'], function() {
			Route::get('list',['as'=>'list','uses'=>'SuppliersController@index'])->name('list');
			Route::get('getAdd',['as'=>'getAdd','uses'=>'SuppliersController@getAdd'])->name('getAdd');
			Route::post('postAdd',['as'=>'postAdd','uses'=>'SuppliersController@postAdd'])->name('postAdd');
			Route::get('getEdit/{id}',['as'=>'getEdit','uses'=>'SuppliersController@getEdit'])->name('getEdit');
			Route::post('postEdit/{id}',['as'=>'postEdit','uses'=>'SuppliersController@postEdit'])->name('postEdit');
			Route::get('getDelete/{id}',['as'=>'getDelete','uses'=>'SuppliersController@getDelete'])->name('getDelete');
            Route::post('deleteMultipleSuppliers',['as'=>'deleteMultipleSuppliers','uses'=>'SuppliersController@deleteMultipleSuppliers'])->name('deleteMultipleSuppliers');
		});

		// route danh muc tin tuc
		Route::group(['prefix'=>'category-new'], function() {
			Route::get('list',['as'=>'list','uses'=>'CategoryNewsController@index'])->name('list');
			Route::get('getAdd',['as'=>'getAdd','uses'=>'CategoryNewsController@getAdd'])->name('getAdd');
			Route::post('postAdd',['as'=>'postAdd','uses'=>'CategoryNewsController@postAdd'])->name('postAdd');
			Route::get('getEdit/{id}',['as'=>'getEdit','uses'=>'CategoryNewsController@getEdit'])->name('getEdit');
			Route::post('postEdit/{id}',['as'=>'postEdit','uses'=>'CategoryNewsController@postEdit'])->name('postEdit');
			Route::get('getDelete/{id}',['as'=>'getDelete','uses'=>'CategoryNewsController@getDelete'])->name('getDelete');
            Route::post('deleteMultipleCategoryNews',['as'=>'deleteMultipleCategoryNews','uses'=>'CategoryNewsController@deleteMultipleCategoryNews'])->name('deleteMultipleCategoryNews');
		});

		// route slides
		Route::group(['prefix'=>'slides'], function() {
			Route::get('list',['as'=>'list','uses'=>'SlideController@index'])->name('list');
			Route::get('getAdd',['as'=>'getAdd','uses'=>'SlideController@getAdd'])->name('getAdd');
			Route::post('postAdd',['as'=>'postAdd','uses'=>'SlideController@postAdd'])->name('postAdd');
			Route::get('getEdit/{id}',['as'=>'getEdit','uses'=>'SlideController@getEdit'])->name('getEdit');
			Route::post('postEdit/{id}',['as'=>'postEdit','uses'=>'SlideController@postEdit'])->name('postEdit');
			Route::get('getDelete/{id}',['as'=>'getDelete','uses'=>'SlideController@getDelete'])->name('getDelete');
		});

		// route tin tuc
		Route::group(['prefix'=>'news'], function() {
			Route::get('list',['as'=>'list','uses'=>'NewsController@index'])->name('list');
			Route::get('getAdd',['as'=>'getAdd','uses'=>'NewsController@getAdd'])->name('getAdd');
			Route::post('postAdd',['as'=>'postAdd','uses'=>'NewsController@postAdd'])->name('postAdd');
			Route::get('getEdit/{id}',['as'=>'getEdit','uses'=>'NewsController@getEdit'])->name('getEdit');
			Route::post('postEdit/{id}',['as'=>'postEdit','uses'=>'NewsController@postEdit'])->name('postEdit');
			Route::get('getDelete/{id}',['as'=>'getDelete','uses'=>'NewsController@getDelete'])->name('getDelete');
            Route::post('deleteMultipleNews',['as'=>'deleteMultipleNews','uses'=>'NewsController@deleteMultipleNews'])->name('deleteMultipleNews');
		});

		// route tin tuc
		Route::group(['prefix'=>'admins'], function() {
			Route::get('list',['as'=>'list','uses'=>'AdminsController@index'])->name('list');
			Route::get('getAdd',['as'=>'getAdd','uses'=>'AdminsController@getAdd'])->name('getAdd');
			Route::post('postAdd',['as'=>'postAdd','uses'=>'AdminsController@postAdd'])->name('postAdd');
			Route::get('getEdit/{id}',['as'=>'getEdit','uses'=>'AdminsController@getEdit'])->name('getEdit');
			Route::post('postEdit/{id}',['as'=>'postEdit','uses'=>'AdminsController@postEdit'])->name('postEdit');
			Route::get('getDelete/{id}',['as'=>'getDelete','uses'=>'AdminsController@getDelete'])->name('getDelete');
		});

		// route sản phẩm
		Route::group(['prefix'=>'products'], function() {
			Route::get('list',['as'=>'list','uses'=>'ProductsController@index'])->name('list');
			Route::get('getAdd',['as'=>'getAdd','uses'=>'ProductsController@getAdd'])->name('getAdd');
			Route::post('postAdd',['as'=>'postAdd','uses'=>'ProductsController@postAdd'])->name('postAdd');
			Route::get('getEdit/{id}',['as'=>'getEdit','uses'=>'ProductsController@getEdit'])->name('getEdit');
			Route::post('postEdit/{id}',['as'=>'postEdit','uses'=>'ProductsController@postEdit'])->name('postEdit');
			Route::get('getDelete/{id}',['as'=>'getDelete','uses'=>'ProductsController@getDelete'])->name('getDelete');
            Route::post('deleteMultipleProducts',['as'=>'deleteMultipleProducts','uses'=>'ProductsController@deleteMultipleProducts'])->name('deleteMultipleProducts');
		});

		Route::group(['prefix'=>'users'], function() {
			Route::get('list',['as'=>'list','uses'=>'UsersController@index'])->name('list');
			Route::get('getDelete/{id}',['as'=>'getDelete','uses'=>'UsersController@getDelete'])->name('getDelete');
            Route::post('deleteMultipleUsers',['as'=>'deleteMultipleUsers','uses'=>'UsersController@deleteMultipleUsers'])->name('deleteMultipleUsers');
		});

		Route::group(['prefix'=>'transactions'], function() {
            Route::get('list',['as'=>'list','uses'=>'TransactionController@index'])->name('list');
            Route::get('getDelete/{id}',['as'=>'getDelete','uses'=>'TransactionController@getDelete'])->name('getDelete');
            Route::get('confirmTransaction',['as'=>'confirmTransaction','uses'=>'TransactionController@confirmTransaction'])->name('confirmTransaction');
            Route::post('deleteMultipleTransaction',['as'=>'deleteMultipleTransaction','uses'=>'TransactionController@deleteMultipleTransaction'])->name('deleteMultipleTransaction');
            Route::post('updateTransaction/{id}', ['as'=>'updateTransaction','uses'=>'TransactionController@updateTransaction'])->name('updateTransaction');
        });

        Route::group(['prefix'=>'abouts'], function() {
            Route::get('list',['as'=>'list','uses'=>'AboutsController@index'])->name('list');
            Route::get('getAdd',['as'=>'getAdd','uses'=>'AboutsController@getAdd'])->name('getAdd');
            Route::post('postAdd',['as'=>'postAdd','uses'=>'AboutsController@postAdd'])->name('postAdd');
            Route::get('getEdit/{id}',['as'=>'getEdit','uses'=>'AboutsController@getEdit'])->name('getEdit');
            Route::post('postEdit/{id}',['as'=>'postEdit','uses'=>'AboutsController@postEdit'])->name('postEdit');
            Route::get('getDelete/{id}',['as'=>'getDelete','uses'=>'AboutsController@getDelete'])->name('getDelete');
        });
    
		Route::get('home',['as'=>'home','uses'=>'HomeController@index'])->name('home');
	});
});

Route::get('sitemap', function() {
	SitemapGenerator::create('http://websitebanhang.com/')->writeToFile('sitemap.xml');
	return"sitemap ";
});

Route::get('/', ['as'=>'', 'uses'=>'HomeController@index']);

Route::get('ve-chung-toi.html', ['uses'=>'HomeController@aboutUs'])->name('ve-chung-toi.html');
Route::get('san-pham.html', ['uses'=>'ProductsController@index'])->name('san-pham.html');
Route::get('{slug}-sp{id}.html', ['as'=>'detailProducts', 'uses'=>'ProductsController@detailProduct'])
	->where(['slug'=>'[a-zA-Z0-9-_]+','id'=>'[0-9]+']);
Route::get('{slug}-ct{id}.html',['as'=>'categoryProduct','uses'=>'ProductsController@categoryProducts'])
	->where(['slug'=>'[a-zA-Z0-9-_]+','id'=>'[0-9]+']);

Route::get('search', ['as'=>'search', 'uses'=>'HomeController@search'])->name('search');

Route::get('mua-hang/{id}', ['as'=>'mua-hang', 'uses'=>'ShoppingCartController@shoppingCart'])->name('mua-hang');

Route::get('gio-hang.html', ['as'=>'gio-hang', 'uses'=>'ShoppingCartController@Cart'])->name('gio-hang');

Route::get('xoa-san-pham/{id}', ['as'=>'xoa-san-pham', 'uses' =>'ShoppingCartController@deleteCart'])->name('xoa-san-pham');

Route::post('cap-nhat-gio-hang', ['as'=>'cap-nhat-gio-hang', 'uses' =>'ShoppingCartController@updateCart'])->name('cap-nhat-gio-hang');

Route::post('login', ['as' =>'login', 'uses' =>'AuthController@login'])->name('login');

Route::post('register', ['as' =>'register', 'uses' =>'AuthController@register'])->name('register');

Route::get('logout', ['as' =>'logout', 'uses' =>'AuthController@logout'])->name('logout');

Route::get('thanh-toan.html', ['as'=>'thanh-toan.html', 'uses' => 'PayController@getPay'])->name('thanh-toan.html');
Route::post('postPay', ['as'=>'postPay', 'uses' => 'PayController@postPay'])->name('postPay');

Route::get('tin-tuc.html', ['as'=>'news', 'uses'=>'NewsController@index'])->name('tin-tuc.html');
Route::get('{slug}-ctn{id}.html', ['as'=>'newCategories', 'uses'=>'NewsController@newCategories'])
	->where(['slug'=>'[a-zA-Z0-9-_]+','id'=>'[0-9]+']);
Route::get('{slug}-ctt{id}.html', ['as'=>'detailNew', 'uses'=>'NewsController@detailNew'])
	->where(['slug'=>'[a-zA-Z0-9-_]+','id'=>'[0-9]+']);

Route::post('update-info-user/{id}', ['as' =>'update-info-user', 'uses' =>'AuthController@updateInfoUser'])->name('update-info-user');

Route::get('don-hang-cua-toi/{id}', ['as'=>'don-hang-cua-toi', 'uses'=>'ShoppingCartController@listOrderCart'])->name('don-hang-cua-toi');

Route::post('change-password/{id}', ['as' =>'change-password', 'uses' =>'AuthController@changePassword'])->name('change-password');
