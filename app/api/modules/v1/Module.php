<?php

namespace api\modules\v1;

use yii;

/**
 * Module - Базовый класс для модуля API.
 */
class Module extends yii\base\Module
{
	/**
	 * {@inheritdoc}
	 */
	public $controllerNamespace = 'api\modules\v1\controllers';
	
	
	
}
