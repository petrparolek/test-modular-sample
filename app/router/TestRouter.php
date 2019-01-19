<?php

namespace App;

use WebChemistry\Routing\IRouter;
use WebChemistry\Routing\RouteManager;
use Nette\Application\Routers\Route;

class TestRouter implements IRouter
{

	/**
	 * @param RouteManager $routeManager
	 */
	public function createRouter(RouteManager $routeManager): void
	{
		$test = $routeManager->getModule('Test');
		$test[] = new Route('test/<presenter>/<action>[/<id>]', 'Default:default');
	}
}
