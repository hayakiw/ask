<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
    'as' => 'root.index',
    'uses' => 'RootController@index',
]);


Route::group(['middleware' => ['guest:web']], function () {

    Route::get('signin', [
        'as' => 'auth.signin_form',
        'uses' => 'AuthController@signinForm',
    ]);

    Route::post('signin', [
        'as' => 'auth.signin',
        'uses' => 'AuthController@signin',
    ]);

    // �p�X���[�h�Đݒ�
    Route::get('reset_password/request', [
        'as' => 'reset_password.request_form',
        'uses' => 'ResetPasswordController@requestForm',
    ]);

    Route::post('reset_password/request', [
        'as' => 'reset_password.request',
        'uses' => 'ResetPasswordController@request',
    ]);

    Route::get('reset_password/reset/{token?}', [
        'as' => 'reset_password.reset_form',
        'uses' => 'ResetPasswordController@resetForm',
    ]);

    Route::put('reset_password/reset', [
        'as' => 'reset_password.reset',
        'uses' => 'ResetPasswordController@reset',
    ]);

    // ����o�^
    Route::get('user/create', [
        'as' => 'user.create',
        'uses' => 'UserController@create',
    ]);

    Route::post('user', [
        'as' => 'user.store',
        'uses' => 'UserController@store',
    ]);

    Route::get('user/confirmation/{token?}', [
        'as' => 'user.confirmation',
        'uses' => 'UserController@confirmation',
    ]);
});


Route::group(['middleware' => ['auth:web']], function () {

    Route::get('signout', [
        'as' => 'auth.signout',
        'uses' => 'AuthController@signout',
    ]);

    // �}�C�y�[�W
    Route::get('my', [
        'as' => 'my.index',
        'uses' => 'MyController@index',
    ]);

});


Route::group(['namespace' => '_Admin', 'prefix' => '_admin'], function () {

    Route::get('/', [
        'as' => 'root.index',
        'uses' => 'RootController@index',
    ]);

    Route::group(['middleware' => ['guest:admin']], function () {

        Route::get('signin', [
            'as' => '_admin.auth.signin_form',
            'uses' => 'AuthController@signinForm',
        ]);

        Route::post('signin', [
            'as' => '_admin.auth.signin',
            'uses' => 'AuthController@signin',
        ]);

    });


    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('signout', [
            'as' => '_admin.auth.signout',
            'uses' => 'AuthController@signout',
        ]);

        Route::get('/', [
            'as' => '_admin.root.index',
            'uses' => 'RootController@index',
        ]);

        //�Ǘ��ҊǗ�
        Route::resource('admins', 'AdminController');

        //���[�U�[�Ǘ�
        Route::resource('users', 'UserController');

    });

});
