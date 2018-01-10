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

// サービス一覧（カテゴリ、都道府県、タグ別に絞込み可）
Route::get('items', [
    'as' => 'item.index',
    'uses' => 'ItemController@index',
]);

// サービス詳細
Route::get('item/{item}', [
    'as' => 'item.show',
    'uses' => 'ItemController@show',
])->where('item', '[0-9]+');

// ユーザープロフィール
Route::get('user/{user}', [
    'as' => 'user.show',
    'uses' => 'UserController@show',
])->where('user', '[a-zA-Z0-9\_]+');

// ユーザーレビュー一覧
Route::get('user/{user}/review', [
    'as' => 'user.review',
    'uses' => 'UserController@review',
])->where('user', '[a-zA-Z0-9\_]+');


// お問い合わせ
Route::resource(
    'contact',
    'ContactController',
    ['only' => ['create', 'store']]
);


// 利用規約
Route::get('agreement', [
    'as' => 'static.agreement',
    function () {
        return view('static/agreement');
    }
]);

// プライバシーポリシー
Route::get('privacy', [
    'as' => 'static.privacy',
    function () {
        return view('static/privacy');
    }
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

    // パスワード再設定
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

    // 会員登録
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

    // マイページ
    Route::get('my', [
        'as' => 'my.index',
        'uses' => 'MyController@index',
    ]);

    // 認証の必要なItemページ（作成、編集、削除）
    Route::resource(
        'item',
        'ItemController',
        ['except' => ['index', 'show']]
    );

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

        //管理者管理
        Route::resource('admins', 'AdminController');

        //ユーザー管理
        Route::resource('users', 'UserController');

    });

});
