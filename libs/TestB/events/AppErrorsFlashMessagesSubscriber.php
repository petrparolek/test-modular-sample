<?php declare(strict_types = 1);

namespace TestPackage\TestB\Events;

use Contributte\Events\Extra\Event\Application\ApplicationEvents;
use Contributte\Events\Extra\Event\Application\PresenterStartupEvent;
use Nette\Http\Response;
use Nette\Utils\ArrayHash;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AppErrorsFlashMessagesSubscriber implements EventSubscriberInterface
{

	public static function getSubscribedEvents(): array
	{
		return [
			PresenterStartupEvent::class => 'presenterStartup',
		];
	}

	public function presenterStartup(PresenterStartupEvent $event): void
	{
		$alerts[] = [
			'message' => 'Nastavení aplikace není v pořádku',
			'type' => 'danger',
		];

		$alerts = ArrayHash::from($alerts);

		$event->getPresenter()->template->appError = true;

		$httpResponse = $event->getPresenter()->getHttpResponse();
		$httpResponse->setCode(Response::S403_FORBIDDEN);

		foreach ($alerts as $alert) {
			$event->getPresenter()->flashMessage($alert->message, $alert->type);
		}
	}
}
