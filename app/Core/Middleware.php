<?php
declare(strict_types=1);

namespace App\Core;

class Middleware
{

    public function only(string $value): void
    {
        $value === 'guest' ? $this->guest() : $this->auth();
    }

}