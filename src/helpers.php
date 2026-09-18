<?php

use Nasirkhan\LaravelCube\Support\Flash;

if (!function_exists('flash')) {
    function flash(string $message = ''): Flash
    {
        return new Flash($message);
    }
}
