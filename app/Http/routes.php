<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','LoginController@index');
Route::post('postlogin','LoginController@postLogin');
Route::get('order','OrderController@index');
Route::post('postorder','OrderController@postorder');
Route::get('customer/json','InvoiceController@customertb')->name('customer/json');
Route::get('user/json','ManageAdminController@admintb')->name('user/json');
Route::get('invoice','InvoiceController@index');
Route::POST('addPost','ManageAdminController@addPost');
Route::POST('editPost','ManageAdminController@editPost');
Route::POST('deletePost','ManageAdminController@deletePost');

Route::get('admin', function () {
    return view('partial.admin');
});
