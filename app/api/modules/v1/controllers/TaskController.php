<?php

namespace api\modules\v1\controllers;

use api\common\controllers\CommonActiveController;

/**
 * Task Controller - Контроллер работы с обьектом Task.
 */
class TaskController extends CommonActiveController
{
	
	/**
	 * {@inheritdoc}
	 */
	public $modelClass = 'api\modules\v1\models\Task';

}
