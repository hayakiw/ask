<?php

return [

    'mail' => [
        'to' => env(
            'MY_MAIL_TO',
            'noreply@example.com'
        ),
        'from' => env(
            'MY_MAIL_FROM',
            'noreply@example.com'
        ),
        'name' => env(
            'MY_MAIL_NAME',
            'xxx'
        ),
    ],

    'user' => [
        'created' => [
            'mail_subject' => env(
                'MY_USER_CREATED_MAIL_SUBJECT',
                '【xxx】会員登録が完了しました'
            ),
            'expires_in' => env(
                'MY_USER_CREATED_REQUEST_EXPIRES_IN',
                1440
            ),
        ],
    ],

    'staff' => [
        'image_path' => env(
            'MY_STAFF_IMAGE_PATH',
            'image/staff'
        ),
        'default_image_path' => env(
            'MY_STAFF_IMAGE_PATH',
            'img/staff'
        ),
    ],

    'order' => [
        // 手数料(%)
        'fee' => env(
            'MY_ORDER_FEE',
            30
        ),
        'created' => [
            'mail_subject' => env(
                'MY_ORDER_CREATED_MAIL_SUBJECT',
                '【xxx】依頼しました'
            ),
        ],
        'created_for_staff' => [
            'mail_subject' => env(
                'MY_ORDER_CREATED_FOR_STAFF_MAIL_SUBJECT',
                '【xxx】依頼が届きました'
            ),
        ],
        'replied' => [
            'mail_subject' => env(
                'MY_ORDER_REPLIED_MAIL_SUBJECT',
                '【xxx】依頼の回答が届きました'
            ),
        ],
        'replied_for_staff' => [
            'mail_subject' => env(
                'MY_ORDER_REPLIED_MAIL_SUBJECT',
                '【xxx】依頼に返信しました'
            ),
        ],
    ],

    'change_email_request' => [
        'mail_subject' => env(
            'MY_CHANGE_EMAIL_REQUEST_MAIL_SUBJECT',
            '【xxx】メールアドレス変更のご案内'
        ),
        'expires_in' => env(
            'MY_CHANGE_EMAIL_REQUEST_EXPIRES_IN',
            1440
        ),
    ],

    'reset_password_request' => [
        'mail_subject' => env(
            'MY_RESET_PASSWORD_REQUEST_MAIL_SUBJECT',
            '【xxx】パスワード再設定のご案内'
        ),
        'expires_in' => env(
            'MY_RESET_PASSWORD_REQUEST_EXPIRES_IN',
            1440
        ),
    ],

    'item' => [
        'image_path' => env(
            'MY_ITEM_IMAGE_PATH',
            'image/item'
        ),
    ],

    'pay' => [
        'checkout_url' => env(
            'MY_PAY_CHECKOUT_URL',
            'https://checkout.pay.jp/'
        ),
        'charge_url' => env(
            'MY_PAY_CHARGE_URL',
            'https://api.pay.jp/v1/charges'
        ),
        'public_key' => env(
            'MY_PAY_PUBLIC_KEY',
            'pk_test_5e1fd6047fc25f85523c7d6d'
        ),
        'private_key' => env(
            'MY_PAY_PRIVATE_KEY',
            'sk_test_7c4fbe51cdaf13189fef9430'
        ),
    ],

];
