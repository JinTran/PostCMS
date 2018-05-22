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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware'=>'admin'],function (){


    Route::get('/admin',function (){
        return view('admin.index');
    })->name('admin');

    Route::resource('admin/users','AdminUserController', ['names'=>[

        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit'
    ]]);

    Route::resource('admin/posts','AdminPostsController', ['names'=>[

        'index'=>'admin.posts.index',
        'create'=>'admin.posts.create',
        'store'=>'admin.posts.store',
        'edit'=>'admin.posts.edit'
    ]] );

    Route::resource('admin/categories','AdminCategoriesController', ['names'=>[

        'index'=>'admin.categories.index',
        'create'=>'admin.categories.create',
        'store'=>'admin.categories.store',
        'edit'=>'admin.categories.edit'
    ]] );

    Route::resource('admin/media','AdminMediasController', ['names'=>[

        'index'=>'admin.medias.index',
        'create'=>'admin.medias.create',
        'store'=>'admin.medias.store',
        'edit'=>'admin.medias.edit'
    ]] );

    Route::resource('admin/comments','PostCommentsController', ['names'=>[

        'index'=>'admin.comments.index',
        'create'=>'admin.comments.create',
        'store'=>'admin.comments.store',
        'edit'=>'admin.comments.edit'
    ]] );
    Route::resource('admin/comments/replies','CommentRepliesController', ['names'=>[

        'index'=>'admin.comments.replies.index',
        'create'=>'admin.comments.replies.create',
        'store'=>'admin.comments.replies.store',
        'edit'=>'admin.comments.replies.edit'
    ]] );


});

//Route::get('/admin',function (){
//    return view('admin.index');
//})->name('admin');

Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminPostsController@post']);


//Route::get('/test','AdminCategoriesController@store');