<?php

declare(strict_types=1);

function dd(string $value): void
{

    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function base_path(string $path): string
{
    return BASE_PATH . $path;
}

// function to require Controllers
function controller(string $path): string
{
    return base_path('Controllers/' . $path . '.php');
}

function view(string $path): string
{
    return base_path('views/' . $path . '.php');
}
