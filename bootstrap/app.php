<?php
declare(strict_types=1);

const BASE_PATH = __DIR__.'/../';

function dd(mixed $value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}