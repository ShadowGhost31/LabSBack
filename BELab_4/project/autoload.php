<?php

spl_autoload_register(function ($className) {

    $prefix = 'project\\';


    $baseDir = __DIR__ . '/';

    // Перевірка, чи клас належить до цього неймспейсу
    $len = strlen($prefix);
    if (strncmp($prefix, $className, $len) !== 0) {
        return;
    }

    // Відокремлення неймспейсу від імені класу
    $relativeClass = substr($className, $len);


    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';


    if (file_exists($file)) {
        include_once $file;
    } else {

        throw new Exception("Class file not found: $file");
    }
});
