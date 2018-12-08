<?php

namespace TestPackage\Test\DI;

use Nette\Application\IPresenterFactory;
use Nette\DI\CompilerExtension;

class TestExtension extends CompilerExtension
{

	public $defaults = [];

	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('routers'))
			->addTag('router')
			->setFactory(\TestPackage\Test\TestRouter::class)
			->setAutowired(true);
	}

	public function beforeCompile()
	{
		$builder = $this->getContainerBuilder();

		$builder->getDefinition($builder->getByType(IPresenterFactory::class))
			->addSetup(
				'setMapping',
				[['Test' => 'TestPackage\Test\Presenters\*Presenter']]
		);
	}
}
