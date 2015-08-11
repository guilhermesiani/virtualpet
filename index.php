<?php

include 'config.php';

spl_autoload_register(function ($class) {
    require_once(str_replace('\\', '/', $class . '.php'));
});

$app = new Libs\Bootstrap();
