<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default UI Framework
    |--------------------------------------------------------------------------
    |
    | This value determines the default UI framework for components.
    | Options: 'tailwind' (default), 'bootstrap'
    |
    | Tailwind uses Flowbite components and Alpine.js
    | Bootstrap uses Bootstrap 5 classes
    |
    */
    'default_framework' => env('CUBE_FRAMEWORK', 'tailwind'),

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
    | Tailwind Button Classes
    |--------------------------------------------------------------------------
    |
    | Default Tailwind CSS classes for buttons (Flowbite style)
    |
    */
    'tailwind' => [
        'buttons' => [
            'primary'   => 'inline-flex items-center justify-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-hidden focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 disabled:cursor-not-allowed transition ease-in-out duration-150',
            'secondary' => 'inline-flex items-center justify-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-hidden focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 disabled:cursor-not-allowed transition ease-in-out duration-150',
            'danger'    => 'inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-hidden focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 disabled:cursor-not-allowed transition ease-in-out duration-150',
        ],
        'forms' => [
            'input'    => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm disabled:opacity-50 disabled:cursor-not-allowed',
            'label'    => 'block font-medium text-sm text-gray-700 dark:text-gray-300',
            'error'    => 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2',
            'textarea' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm disabled:opacity-50 disabled:cursor-not-allowed w-full',
        ],
        'navigation' => [
            'link'          => 'inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out',
            'link_active'   => 'border-indigo-400 dark:border-indigo-600 text-gray-900 dark:text-gray-100 focus:outline-hidden focus:border-indigo-700',
            'link_inactive' => 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-hidden focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Bootstrap Button Classes
    |--------------------------------------------------------------------------
    |
    | Default Bootstrap 5 classes for buttons
    |
    */
    'bootstrap' => [
        'buttons' => [
            'primary'   => 'btn btn-primary',
            'secondary' => 'btn btn-secondary',
            'danger'    => 'btn btn-danger',
            'success'   => 'btn btn-success',
            'warning'   => 'btn btn-warning',
            'info'      => 'btn btn-info',
            'light'     => 'btn btn-light',
            'dark'      => 'btn btn-dark',
            'link'      => 'btn btn-link',
        ],
        'forms' => [
            'input'    => 'form-control',
            'label'    => 'form-label',
            'error'    => 'invalid-feedback',
            'textarea' => 'form-control',
            'select'   => 'form-select',
            'check'    => 'form-check-input',
        ],
        'navigation' => [
            'link'        => 'nav-link',
            'link_active' => 'active',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Modal Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration options for modals (Tailwind only)
    |
    */
    'modal' => [
        'max_width'         => '2xl', // sm, md, lg, xl, 2xl
        'show_close_button' => true,
    ],
];
