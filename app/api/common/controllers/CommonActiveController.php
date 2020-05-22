<?php

namespace api\common\controllers;

use yii;
use yii\rest\ActiveController;

/**
 * Common Active Controller - Базовый контроллер ActiveRecord.
 *
 */
class CommonActiveController extends ActiveController
{


	/**
	 * @var string Класс модели.
	 */
	public $modelClass = 'api\common\models\CommontActiveRecord';
	
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
			'index'  => ['GET', 'HEAD', 'OPTIONS'],
		];
	}
	
	/**
	 * Настройка поведений.
	 *
	 * @return array Конфиг поведений.
	 */
	public function behaviors()
	{
		$behaviors = parent::behaviors();
		
		unset($behaviors['authenticator']);
		
		$behaviors['contentNegotiator'] = [
			'class' => 'yii\filters\ContentNegotiator',
			'formats' => [
				'application/json' => yii\web\Response::FORMAT_JSON,
				'application/xml' => yii\web\Response::FORMAT_JSON,
			]
		];
		
		$behaviors['corsFilter'] = [
			'class' => yii\filters\Cors::class,
			'cors' => [
				'Origin' => ['*'],
				'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
				'Access-Control-Request-Headers' => ['*'],
				'Access-Control-Allow-Credentials' => null,
				'Access-Control-Max-Age' => 86400,
				'Access-Control-Expose-Headers' => ['*'],
			],
		];
		
		return $behaviors;
		
	}
	
	/**
	 * Этот метод вызывается перед выполнением действия.
	 *
	 * @param string|\yii\base\Action $action Действие.
	 * @return bool Статус выполнения.
	 * @throws yii\web\BadRequestHttpException Ошибка запроса.
	 */
	public function beforeAction($action)
	{

		if (!parent::beforeAction($action)) {
			return false;
		}
		
		$request = \yii::$app->getRequest();
		if ($request->getIsOptions()) {
			$id = $request->getBodyParam('id') ?? $request->getQueryParam('id') ?? null;
			$verbs = empty($id)
				? ['GET', 'POST', 'HEAD', 'OPTIONS']
				: ['GET', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'];
			$response = \yii::$app->getResponse();
			$headers = $response->getHeaders();
			$headers->set('Allow', implode(', ', $verbs));
			$headers->set('Access-Control-Allow-Methods', implode(', ', $verbs));
			$response->setStatusCode(200);
			$response->content = '';
			$response->send();
			return false;
		}
		
		return  true;
		
	}

}
