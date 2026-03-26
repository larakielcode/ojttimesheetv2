<?php
declare(strict_types=1);

use App\Core\Database;

class Sites
{
    public static function siteAdd($siteName): void
    {
        $statement = Database::query("INSERT INTO site_location(site_name) VALUES(:sitename)", ['sitename' => $siteName]);
        dd($statement);
    }

}
