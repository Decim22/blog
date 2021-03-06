<?php



Route::get('/', function () {
    return view('welcome');
});
Route::get('/','PostsController@index');
Route::get('/posts/{id}','PostsController@show');
Route::get('/posts/tags/{tag}','TagsController@index');
Route::get('/category/{category}', 'CategoriesController@index');
Route::view('login','dashboard.sign-in');
Route::post('/posts/{post}/comments', 'CommentsController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/','PostsController@index');
    Route::get('/create', 'PostsController@create');
    Route::post('store', 'PostsController@store');
});