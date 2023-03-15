<?php

if (!function_exists('moneyFormat')) {
    function moneyFormat(string $value): string
    {
        return number_format(trim($value), 0, '');
    }
}

if (!function_exists('allSession')) {
    function allSession(): array
    {
        return session()->all();
    }
}
