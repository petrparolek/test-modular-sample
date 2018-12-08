<?php
declare(strict_types=1);
setlocale(LC_TIME, "cs_CZ.utf8");

require __DIR__ . '/../vendor/autoload.php';

use Nette\Utils\Finder;

$configurator = new Nette\Configurator;

$configurator->setTimeZone('Europe/Prague');

$configurator->setDebugMode(TRUE);

$configurator->enableTracy(__DIR__ . '/../log');

$configurator->setTempDirectory(__DIR__ . '/../temp');

$libDir = __DIR__ . '/../libs';

$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->addDirectory($libDir)
	->register();

$configurator->addConfig(__DIR__ . '/config/config.neon');

$container = $configurator->createContainer();

return $container;
