<?php



Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');


//admin section
//category
Route::get('admin/categories', 'Admin\Category\CategoryController@categories')->name('admin.categories');
Route::post('admin/store/category', 'Admin\Category\CategoryController@storeCategory')->name('store.category');
Route::get('delete/category/{id}', 'Admin\Category\CategoryController@deleteCategory');
Route::get('edit/category/{id}', 'Admin\Category\CategoryController@editCategory')->name('edit.category');
Route::post('admin/update/category/{id}', 'Admin\Category\CategoryController@updateCategory')->name('update.category');


//brands
Route::get('admin/brands', 'Admin\Category\BrandController@brands')->name('admin.brands');
Route::post('admin/store/brand', 'Admin\Category\BrandController@storeBrand')->name('store.brand');
Route::get('delete/brand/{id}', 'Admin\Category\BrandController@deleteBrand')->name('delete.brand');
Route::get('edit/brand/{id}', 'Admin\Category\BrandController@editBrand')->name('edit.brand');
Route::post('admin/update/brand/{id}', 'Admin\Category\BrandController@updateBrand')->name('update.brand');

//subcategory
Route::get('admin/subcategories', 'Admin\Category\SubcategoryController@subcategories')->name('admin.subcategories');
Route::post('admin/store/subcategory', 'Admin\Category\SubcategoryController@storeSubcategory')->name('store.subcategory');
Route::get('delete/subcategory/{id}', 'Admin\Category\SubcategoryController@deleteSubcategory')->name('delete.subcategory');;
Route::get('edit/subcategory/{id}', 'Admin\Category\SubcategoryController@editSubcategory')->name('edit.subcategory');
Route::post('admin/update/subcategory/{id}', 'Admin\Category\SubcategoryController@updateSubcategory')->name('update.subcategory');


//coupon
Route::get('admin/coupons', 'Admin\Coupon\CouponController@coupons')->name('admin.coupons');
Route::post('admin/store/coupon', 'Admin\Coupon\CouponController@storeCoupon')->name('store.coupon');
Route::get('delete/coupon/{id}', 'Admin\Coupon\CouponController@deleteCoupon')->name('delete.coupon');;
Route::get('edit/coupon/{id}', 'Admin\Coupon\CouponController@editCoupon')->name('edit.coupon');
Route::post('admin/update/coupon/{id}', 'Admin\Coupon\CouponController@updateCoupon')->name('update.coupon');

//Newsletter
Route::get('admin/newsletters', 'Admin\Newsletter\NewsletterController@newsletters')->name('admin.newsletters');
Route::get('delete/newsletter/{id}', 'Admin\Newsletter\NewsletterController@deleteNewsletter')->name('delete.newsletter');;
Route::post('admin/store/newsletter', 'Admin\Newsletter\NewsletterController@storeNewsletter')->name('store.newsletter');

//Products
Route::get('admin/products', 'Admin\Product\ProductController@index')->name('admin.products');
Route::get('admin/product/add', 'Admin\Product\ProductController@create')->name('add.product');
Route::post('admin/product/store', 'Admin\Product\ProductController@store')->name('store.product');
Route::get('get/subcategory/{category_id}', 'Admin\Product\ProductController@getSubcat');
Route::get('admin/product/active/{id}', 'Admin\Product\ProductController@active')->name('active.product');
Route::get('admin/product/inactive/{id}', 'Admin\Product\ProductController@inactive')->name('inactive.product');
Route::get('admin/product/delete/{id}', 'Admin\Product\ProductController@delete')->name('delete.product');
Route::get('admin/product/show/{id}', 'Admin\Product\ProductController@show')->name('show.product');
Route::get('admin/product/edit/{id}', 'Admin\Product\ProductController@edit')->name('edit.product');
Route::post('admin/product/update/{id}', 'Admin\Product\ProductController@update')->name('update.product');


//Frontend Routes
Route::post('subscribe/newsletter', 'Frontend\FrontendController@subscribeNewsletter')->name('subscribe.newsletter');

