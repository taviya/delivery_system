<?php

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    //Shop Route
    Route::get('/shop-list', 'Admin\Shop\ShopController@index')->name('shop_list');
    Route::post('/shop-addshop', 'Admin\Shop\ShopController@store')->name('add_shop');
//    Route::get('/admin-user-edit/{id}', 'Admin\AdminController@adminUserEdit')->name('admin.user.edit');
//    Route::delete('/admin-user-edit/{id}', 'Admin\AdminController@adminUserDelete')->name('admin.user.delete');
//    Route::post('/admin.user.update', 'Admin\AdminController@adminUserUpdate')->name('admin.user.update');
//    Route::post('/admin.user.create', 'Admin\AdminController@adminUserCreate')->name('admin.user.create');
});

?>
