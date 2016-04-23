<?php

spl_autoload_register(function($className) {
    $classPath = 'classes/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($classPath)) {
        include_once $classPath;
    }
});

use tools\writing\MultiCorePen as MultiCorePen;
use consts\Color as Color;
use tools\writing\Core;

$writingTool = new MultiCorePen(
        array(
            new Core(Color::BLUE, 5),
            new Core(Color::GREEN, 5)
            )
        );
$writingTool->toggle();
$writingTool->draw('HelloWorld');
$writingTool->selectCore(1);
$writingTool->draw('World');
