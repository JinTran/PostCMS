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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/users','AdminUserController', ['names'=>[

    'index'=>'admin.users.index',
    'create'=>'admin.users.create',
    'store'=>'admin.users.store',
    'edit'=>'admin.users.edit'
]]);

Route::group(['middleware'=>'admin'],function (){

    Route::resource('admin/users','AdminUserController', ['names'=>[

        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit'
    ]]);

    Route::resource('admin/posts','AdminPostController');


});

Route::get('/admin',function (){
    return view('admin.index');
})->name('admin');

Route::get('/test',function (){
   return view('test.view') ;
});
//Route::get('/users',function(){
//    return "hello";
//});