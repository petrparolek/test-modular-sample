<?php

namespace TestPackage\TestB\DI;

use Nette\Application\IPresenterFactory;
use Nette\DI\CompilerExtension;

class TestBExtension extends CompilerExtension
{

	public $defaults = [];

	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('routers'))
			->addTag('router')
			->setFactory(\TestPackage\TestB\TestBRouter::class)
			->setAutowired(true);

		$builder->getDefinition('routers.routerManager')
			->addSetup('createModule', ['TestB']);
	}

	public function beforeCompile()
	{
		$builder = $this->getContainerBuilder();

		$builder->getDefinition($builder->getByType(IPresenterFactory::class))
			->addSetup(
				'setMapping',
				[['TestB' => 'TestPackage\TestB\Presenters\*Presenter']]
		);
	}
}
