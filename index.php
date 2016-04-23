<?php

spl_autoload_register(function($className) {
    $classPath = 'classes/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($classPath)) {
        include_once $classPath;
    }
});

use tools\writing\MechPensil as MechPensil;
use consts\Color as Color;

$writingTool = new MechPensil(array(5,5));
$writingTool->toggle();
$writingTool->draw('HelloWorld');
$writingTool->toggle();
$writingTool->draw('World');
