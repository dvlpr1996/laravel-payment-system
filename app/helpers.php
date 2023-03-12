<?php

if (!function_exists('moneyFormat')) {
    function moneyFormat(string $value): string
    {
        return number_format(trim($value), 0, '');
    }
}

if (!function_exists('regularText')) {
    function regularText(string $text): string
    {
        return str_replace('-', ' ', $text);
    }
}
