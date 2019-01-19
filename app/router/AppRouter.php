<?php

namespace App;

use WebChemistry\Routing\IRouter;
use WebChemistry\Routing\RouteManager;
use Nette\Application\Routers\Route;

class AppRouter implements IRouter
{

	/**
	 * @param RouteManager $routeManager
	 */
	public function createRouter(RouteManager $routeManager): void
	{
		$app = $routeManager->getModule('App');
		$app[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
	}
}
