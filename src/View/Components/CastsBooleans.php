<?php

namespace Nasirkhan\LaravelCube\View\Components;

trait CastsBooleans
{
    /**
     * Cast a boolean-like value to a strict boolean.
     *
     * Handles string representations like 'true', 'false', '1', '0', 'on', 'yes',
     * as well as actual boolean values, ensuring consistent strict-boolean results
     * across all component properties that accept bool|string input.
     */
    protected function castBool(bool|string $value): bool
    {
        return (bool) filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
}
