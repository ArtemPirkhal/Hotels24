<?php

spl_autoload_register(function($className) {
    $classPath = 'classes/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($classPath)) {
        include_once $classPath;
    }
});

use tools\writing\Autopen as Autopen;
use consts\Color as Color;

$writingTool = new Autopen(Color::RED, 5);
$writingTool->toggle();
$writingTool->draw('HelloWorld');
$writingTool->fill(Color::BLUE, 5);
$writingTool->draw('World');
