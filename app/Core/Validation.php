<?php
declare(strict_types=1);

namespace App\Core;

class Validation
{
    public static function isEmpty(mixed $string): bool
    {
        return (empty($string));
    }
}