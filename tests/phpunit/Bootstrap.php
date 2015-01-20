<?php

class Bootstrap
{
    public function run()
    {
        require_once __DIR__ . '/../../vendor/autoload.php';
    }
}

$bootstrap = new Bootstrap();
$bootstrap->run();
