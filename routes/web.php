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
// Route::get('/post',[
// 	'as'=>'home',
// 	'uses'=>'PostController@index'
// 	]);
// Route::get('post/create',[
// 	'as'=>'post.create',
// 	'uses'=>'PostController@create'
// 	]);
// Route::post('post/store',[
// 	'as'=>'post.store',
// 	'uses'=>'PostController@store'
// 	]);
// Route::get('post/{id}/edit',[
// 	'as'=>'post.edit',
// 	'uses'=>'PostController@edit'
// 	]);

// Route::get('post/{id}',[
// 	'as'=>'post.show',
// 	'uses'=>'PostController@show'
// 	]);

// Route::put('post/{id}',[
// 	'as'=>'post.update',
// 	'uses'=>'PostController@update'
// 	]);

// Route::delete('post/{id}',[
// 	'as'=>'post.destroy',
// 	'uses'=>'PostController@destroy'
// 	]);

Route::group(['middleware'=>['web']],function(){
	//authenciate routes
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');
	// Registration Routes...
	Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'Auth\RegisterController@register');
	//POST
	Route::resource('/post','PostController');
	//ADMIN-POST
	Route::get('/post-admin',[
		'as'=>'post.admin',
		'uses'=>'PostController@manage_post'
		]);
	Route::get('/', function () {
	    return redirect()->route('post.index');
	});
	Route::get('/admin',[
		'middleware'=>'role:admin',
		'as'=>'admin.index',
		'uses'=>function() {
	    return view("admin.index");
		}
		]);
	//USER

	Route::resource('/user','UserController');
	//ROLE

	Route::resource('/role','RoleController');
	Auth::routes();

	Route::get('/home', 'HomeController@index')->name('home');
	//COMMENT
	Route::post('comments/{post_id}',[
	 	'as'=>'comments.store',
	 	'uses'=>'CommentsController@store'
	 	]);
	Route::resource('/comment','CommentsController');
	//POST_SLUG
	Route::get('blog/{slug}',[
		'as'=>'blog.single',
		'uses'=>'BlogController@getSingle'
		])->where('slug','[\w\d\-\_]+');
	Route::get('blog',[
		'as'=>'blog.index',
		'uses'=>'BlogController@getIndex'
		]);
	//CATEGORY
	Route::resource('/category', 'CategoryController');
	Route::get('/ajaxcat',[
		'as'=>'datatables.data',
		'uses'=>'CategoryController@indexajax'
		]);
	//TAG
	Route::resource('/tag', 'TagController');
	//PAGES
	Route::get('/contact','PagesController@getContact');
	Route::post('/contact',[
		'as'=>'sendContact',
		'uses'=>'PagesController@postContact'
		]);
});

