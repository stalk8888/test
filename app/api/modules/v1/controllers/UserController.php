<?php

namespace api\modules\v1\controllers;

use api\common\controllers\CommonActiveController;

/**
 * User Controller - Контроллер работы с обьектом User.
 */
class UserController extends CommonActiveController
{
	
	/**
	 * Объявляет разрешенные HTTP-глаголы.
	 *
	 * @return array Разрешенные HTTP-глаголы.
	 */
	protected function verbs()
	{
		return [
			
			'create' => ['POST', 'OPTIONS'],
			'update' => ['PUT', 'PATCH', 'OPTIONS'],
			'delete' => ['DELETE', 'OPTIONS'],
			'view'   => ['GET', 'HEAD', 'OPTIONS'],
			'getfreeusers' => ['GET', 'HEAD', 'OPTIONS'],
			'index'  => ['GET', 'HEAD', 'OPTIONS']
		];
	}
	
	/**
	 * {@inheritdoc}
	 */
	public $modelClass = 'api\modules\v1\models\User';
	
	public function actionGetfreeusers(){
		/** @var \api\modules\v1\models\User $model */
		$model = $this->modelClass;
		return $model::getFreeUsers();
	}

}
