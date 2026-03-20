<?php

spl_autoload_register('myAutoLoad');

function myAutoLoad($class)
{
    require base_path("classes/{$class}.php");
    //dd($test);
}
