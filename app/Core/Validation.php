<?php
declare(strict_types=1);

namespace App\Core;

class Validation
{
    public static function isEmpty(string $string): bool
    {
        return (empty($string));
    }
}