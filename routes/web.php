<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('markAsRead', function(){
	auth()->user()->unreadNotifications->markAsRead();
	return redirect()->back();
})->name('markAllAsRead');
Auth::routes();


// during new setup uncomment below 5 lines
// Route::resource('admin/permission', 'Admin\\PermissionController');
// Route::resource('admin/role', 'Admin\\RoleController');
// Route::resource('admin/company', 'Admin\\CompanyController');
// Route::resource('admin/user', 'Admin\\UserController');
// Route::view('/admin', 'admin.dashboard');

Route::group(['middleware'=>['auth']], function(){
	Route::get('/home', 'HomeController@index');
	Route::get('/changePassword','HomeController@showChangePasswordForm');
	Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
	Route::get('user/file/show', 'FileshowController@show');
	Route::get('/download/{file}', 'FileshowController@down');
    Route::get('/user/file', 'FileshowController@firststep');
	Route::get('/user/file/upload', 'Admin\\FileController@userindex');
	Route::post('/user/file/store', 'Admin\\FileController@userstore');
	Route::post('/user/projects/store', 'Admin\\FileController@userProjectStore');
	Route::get('/user/file/business', 'FileshowController@businessshow');
	Route::get('/user/file/milestone', 'FileshowController@milestoneshow');
	Route::get('/user/file/pilotproject', 'FileshowController@pilotprojectshow');
	Route::view('/user/file/option', 'user.fileshowoption');
	Route::get('/user/projects','Admin\\ProjectManagementController@projectShow');
	Route::post('/user/projects/store', 'Admin\\CommentController@userAddComment');

});

Route::group(['middleware'=>['role:Super-Admin','auth']],function(){
	Route::view('/admin', 'admin.dashboard');
	Route::resource('admin/permission', 'Admin\\PermissionController');
	Route::resource('admin/role', 'Admin\\RoleController');
    Route::resource('admin/user', 'Admin\\UserController');
    Route::resource('admin/company', 'Admin\\CompanyController');
	Route::view('/admin/manage-startup', 'admin.managestartup.startupdashboard');

	Route::get('/admin/file/show', 'Admin\\FileController@show');
	Route::get('/admin/file/upload', 'Admin\\FileController@index');
	Route::post('/admin/file/store', 'Admin\\FileController@store');
	Route::view('/admin/file/upload/business', 'admin.managestartup.businesstempupload');
	Route::view('/admin/file/upload/milestone', 'admin.managestartup.milestonetempupload');
	Route::view('/admin/file/upload/pilotproject', 'admin.managestartup.pilotprojectupload');
	Route::view('/admin/file', 'admin.managestartup.filemanagement');
	Route::get('/admin/user_uploaded_files', 'Admin\\FileController@userFileShow');
	Route::resource('admin/startups/{company}/', 'Admin\\ProjectManagementController')->except(['edit','update','delete',]);

	Route::get('/admin/startups', 'Admin\\CompanyController@startupshow');
	Route::get('/admin/startups/{company}/{id}/edit', 'Admin\\ProjectManagementController@edit');
	Route::patch('/admin/startups/{company}/{id}/update', 'Admin\\ProjectManagementController@update');
	Route::delete('/admin/startups/{company}/{id}/delete', 'Admin\\ProjectManagementController@destroy');
	Route::resource('admin/projects/{company}/{project_id}/', 'Admin\\StagesManagementController')
	->except(['edit','update','delete',]);

	Route::patch('/admin/projects/{company}/{project_id}/{id}/update', 'Admin\\StagesManagementController@update');
	Route::get('/admin/projects/{company}/{project_id}/{id}/edit', 'Admin\\StagesManagementController@edit');
	Route::delete('/admin/projects/{company}/{project_id}/{id}/delete', 'Admin\\StagesManagementController@destroy');
	Route::post('/admin/projects/{company}/{project_id}/store', 'Admin\\CommentController@addComment' );

	Route::post('/admin/startups/{company}/store', 'Admin\\FileController@adminProjectStore');
	Route::patch('/admin/startups/{company}/storestatus', 'Admin\\ProjectManagementController@statusUpdate');

	// Route::post('/admin/startups/{company}/create', 'Admin\\ProjectManagementController@store');

});



// Route::resource('admin/stages', 'Admin\\StagesController');
// Route::get('admin/startups/{company}/stages', 'Admin\\StagesController@showstage');
// Route::resource('admin/stages-management', 'Admin\\StagesManagementController');