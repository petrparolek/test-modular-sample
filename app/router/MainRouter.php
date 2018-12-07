<?php

namespace App;

use WebChemistry\Routing\IRouter;
use WebChemistry\Routing\RouteManager;
use Nette\Application\Routers\Route;

class MainRouter implements IRouter
{

	/**
	 * @param RouteManager $routeManager
	 */
	public function createRouter(RouteManager $routeManager): void
	{
		$app = $routeManager->getModule('App');
		$app[] = new Route('[<locale=cs cs|en>/]<presenter>/<action>[/<id>]', 'Homepage:default');

		//$routeManager->finish(); // Sub routers are not processed
	}
}
