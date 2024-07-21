<?php

namespace App\Services;

class Tools
{
    public function enNum(?string $numbers)
    {
        if (blank($numbers)) {
            return $numbers;
        }

        return str_replace([
            '۰',
            '۱',
            '۲',
            '۳',
            '۴',
            '۵',
            '۶',
            '۷',
            '۸',
            '۹',
        ], [
            0,
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
        ], $numbers);
    }
}
