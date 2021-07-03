<?php

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Admin\Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Admin\Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/forgot-password-email', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.forgot.password.email');
	Route::post('/send-forgot-password-email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmails')->name('admin.password.emails');
	Route::get('/{token}/reset-password', 'Admin\Auth\ForgotPasswordController@getPassword');
	Route::post('/reset-password', 'Admin\Auth\ForgotPasswordController@updatePassword')->name('admin.password.request');

	Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
	Route::post('/logout', 'Admin\Auth\AdminLoginController@logout')->name('admin.logout');

});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
	//Admin Users Route
	Route::get('/admin-users', 'Admin\AdminController@adminUser')->name('admin.users');
	Route::get('/admin-addusers', 'Admin\AdminController@addadminUser')->name('add.adminuser');
	Route::get('/admin-user-edit/{id}', 'Admin\AdminController@adminUserEdit')->name('admin.user.edit');
	Route::delete('/admin-user-edit/{id}', 'Admin\AdminController@adminUserDelete')->name('admin.user.delete');
	Route::post('/admin.user.update', 'Admin\AdminController@adminUserUpdate')->name('admin.user.update');
	Route::post('/admin.user.create', 'Admin\AdminController@adminUserCreate')->name('admin.user.create');

	/// Resource Routes

	Route::resources([
		'users'       => 'Admin\Users\UsersController',
		'ajaxmodule'  => 'Admin\AjaxModule\AjaxModuleController',
	]);

	/// User Management
	Route::post('users/get', 'Admin\Users\UsersTableController')->name('users.get');
	Route::post('users/delete', 'Admin\Users\UsersController@UserDelete')->name('users.delete');
	Route::post('users/block', 'Admin\Users\UsersController@UserBlock')->name('users.block');
	Route::post('users/unblock', 'Admin\Users\UsersController@UserUnBlock')->name('users.unblock');
	Route::get('users/view/{id}', 'Admin\Users\UsersController@UserView')->name('users.view');
	Route::post('users/profile/{id}', 'Admin\Users\UsersController@userProfileUpdate')->name('user.profile.update');
	Route::post('users/password/{id}', 'Admin\Users\UsersController@userPassword')->name('user.changepassword');
	Route::get('/addusers', 'Admin\Users\UsersController@addUsers')->name('add.newuser');
	Route::post('/storeuser', 'Admin\Users\UsersController@storeUsers')->name('admin.storeuser');
	Route::get('users/edit/{id}', 'Admin\Users\UsersController@Useredit')->name('users.edit');
	Route::post('users/update', 'Admin\Users\UsersController@userUpdate')->name('user.detail.update');


	// Role Management 
	Route::resource('role', 'Admin\Role\RoleController', ['except' => ['show']]); 
    // Permission Management 
	Route::resource('permission', 'Admin\Permission\PermissionController', ['except' => ['show']]);

	//// Configurations Routes

	Route::get('/config/logo', 'Admin\Configurations\LogoIconController@index')->name('admin.logoIcon.index');
	Route::post('/configurations/logoIcon/update', 'Admin\Configurations\LogoIconController@update')->name('admin.logoIcon.update');

	Route::get('/config/general', 'Admin\Configurations\GeneralSettingController@GenSetting')->name('admin.GenSetting');
	Route::post('/generalSetting', 'Admin\Configurations\GeneralSettingController@UpdateGenSetting')->name('admin.UpdateGenSetting');

	Route::get('/config/social', 'Admin\Configurations\SocialController@index')->name('admin.social.index');
	Route::post('/configurations/social/store', 'Admin\Configurations\SocialController@store')->name('admin.social.store');
	Route::post('/configurations/social/delete', 'Admin\Configurations\SocialController@delete')->name('admin.social.delete');

	Route::get('/google/analytics', 'Admin\Configurations\Googleanalytics@index')->name('admin.google.index');
	Route::post('/configurations/google/update', 'Admin\Configurations\Googleanalytics@update')->name('admin.google.update');

	// General SEO
	Route::get('general-seo/{id}', 'Admin\Seo\GeneralController@edit')->name('admin.general.edit');
	Route::post('general-seo/{id}', 'Admin\Seo\GeneralController@update')->name('admin.general.update');

	// Menu Manager Routes
	Route::get('/menu/index', 'Admin\Menu\MenuManagerController@index')->name('admin.menuManager.index');
	Route::post('/menuManager/store', 'Admin\Menu\MenuManagerController@store')->name('admin.menuManager.store');
	Route::get('/menu/{menuID}/edit', 'Admin\Menu\MenuManagerController@edit')->name('admin.menuManager.edit');
	Route::post('/menuManager/{menuID}/update', 'Admin\Menu\MenuManagerController@update')->name('admin.menuManager.update');
	Route::post('/menuManager/{menuID}/delete', 'Admin\Menu\MenuManagerController@delete')->name('admin.menuManager.delete');

	// Admin Profiles Routes
	Route::get('profile/{id}', 'Admin\AdminController@adminProfile')->name('admin.adminProfile');
	Route::post('editprofile', 'Admin\AdminController@updateAdminProfile')->name('admin.profile.update');
	Route::post('updatePassword', 'Admin\AdminController@updatePassword')->name('admin.changepassword');
	Route::post('/configurations/adminprofile/update', 'Admin\AdminController@updateprofile')->name('admin.logoIcon.update');

	Route::get('subscribers', 'Admin\SubscriberController@index')->name('admin.subscriber.get');
	Route::post('send/broadcastmail', 'Admin\SubscriberController@mailtosubsc')->name('admin.sendmail');
});

?>