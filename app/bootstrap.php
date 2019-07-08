<?php

// Autoload Core Libraries
spl_autoload_register(function ($className) {
    // Strip off namespace
    $file = str_replace('\\', '/', $className);
    $file = basename($file);

    require_once "libraries/${file}.php";
});
