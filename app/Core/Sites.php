<?php
declare(strict_types=1);

namespace App\Core;

class Sites
{
    public static function siteAdd($siteName): bool
    {
        $statement = Database::query("INSERT INTO site_location(site_name) VALUES(:sitename)", ['sitename' => htmlspecialchars($siteName)]);
        return $statement->rowCount() === 1;
    }

}
