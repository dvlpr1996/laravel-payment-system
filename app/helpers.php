<?php

if (!function_exists('moneyFormat')) {
    function moneyFormat(string $value): string
    {
        return __('app.price unit') . ' ' . number_format(trim($value), 0, '');
    }
}

if (!function_exists('allSession')) {
    function allSession(): array
    {
        return session()->all();
    }
}

if (!function_exists('secureOrderCode')) {
    function secureOrderCode(int $len = 32): string
    {
        return substr(
            str_shuffle(bin2hex(random_bytes($len)) . time()),
            0,
            $len
        );
    }
}
