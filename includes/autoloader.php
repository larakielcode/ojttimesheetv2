<?php

spl_autoload_register('myAutoLoad');

function myAutoLoad($class)
{
    require base_path("classes/{$class}.class.php");
    //dd($test);
}
