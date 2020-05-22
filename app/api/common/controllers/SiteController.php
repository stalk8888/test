<?php

namespace api\common\controllers;

use yii;

/**
 * Site Controller - Контроллер по умолчанию.
 */
class SiteController extends CommonController
{

	/**
	 * Объявляет разрешенные HTTP-глаголы.
	 *
	 * @return array Разрешенные HTTP-глаголы.
	 */
	protected function verbs()
	{
		return [
			'*' => ['GET', 'POST','PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
		];
	}
	
	
	/*
	 * Действие `index`(выполняется по умолчанию).
	 *
	 * Проверка доступности сервера.
	 * @return array Тестовое сообщение.
	 */
	public function actionIndex()
	{
		yii::$app->response->headers->add('Content-Type', 'application/json; charset=UTF-8');
		return [
			"API TEST" => "OK"
		];
	}
}
