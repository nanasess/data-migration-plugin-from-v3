<?php

use Codeception\Util\Fixtures;
use Dotenv\Dotenv;
use Eccube\Common\EccubeConfig;
use Eccube\Kernel;


require_once __DIR__.'/../../../../../../vendor/autoload.php';

if (file_exists(__DIR__.'/../../../../../../.env')) {
    (new Dotenv(__DIR__.'/../../../../../../'))->overload();
}

$kernel = new Kernel('test', false);
$kernel->boot();

$container = $kernel->getContainer();
Fixtures::add('config', $container->get(EccubeConfig::class));
