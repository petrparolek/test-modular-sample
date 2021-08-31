<?php
declare(strict_types=1);

namespace App\AppModule\Presenters;

use Nette\Http\Response;
use Nette\Utils\ArrayHash;

class HomepagePresenter extends BasePresenter
{

	public function renderDefault(): void
	{
		$alerts[] = [
			'message' => 'Nastavení aplikace není v pořádku',
			'type' => 'danger',
		];

		$alerts = ArrayHash::from($alerts);

		$this->template->appError = true;

		$httpResponse = $this->getHttpResponse();
		$httpResponse->setCode(Response::S403_FORBIDDEN);

		foreach ($alerts as $alert) {
			$this->flashMessage($alert->message, $alert->type);
		}
	}
}
