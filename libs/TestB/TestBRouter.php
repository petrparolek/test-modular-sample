<?php

namespace TestPackage\TestB;

use WebChemistry\Routing\IRouter;
use WebChemistry\Routing\RouteManager;
use Nette\Application\Routers\Route;

class TestBRouter implements IRouter
{

	/**
	 * @param RouteManager $routeManager
	 */
	public function createRouter(RouteManager $routeManager): void
	{
		$app = $routeManager->getModule('TestB');
		$app[] = new Route('/testb/<presenter>/<action>[/<id>]', 'Default:default');
	}
}
