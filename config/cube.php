<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Component Prefix
    |--------------------------------------------------------------------------
    |
    | This value determines the prefix for all blade components.
    | Default is 'cube' so components are used like: <x-cube::button />
    |
    */
    'prefix' => 'cube',

    /*
    |--------------------------------------------------------------------------
    | Modal Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration options for modals
    |
    */
    'modal' => [
        'max_width'         => '2xl',
        'show_close_button' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Share Buttons Configuration
    |--------------------------------------------------------------------------
    */
    'share' => [
        'stack_names' => [
            'styles'  => 'after-styles',
            'scripts' => 'after-scripts',
        ],
        'popup' => [
            'width'  => 620,
            'height' => 700,
        ],
        'use_native_when_available' => true,
        'networks'                  => [
            'x',
            'facebook',
            'linkedin',
            'whatsapp',
            'telegram',
            'reddit',
            'email',
            'copy',
            'native',
        ],
        'labels' => [
            'share'    => 'Share',
            'x'        => 'X',
            'facebook' => 'Facebook',
            'linkedin' => 'LinkedIn',
            'whatsapp' => 'WhatsApp',
            'telegram' => 'Telegram',
            'reddit'   => 'Reddit',
            'email'    => 'Email',
            'copy'     => 'Copy link',
            'native'   => 'Share',
            'copied'   => 'Copied',
        ],
    ],
];
