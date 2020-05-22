<?php

namespace api\common\models;

use yii\db\ActiveRecord;

/**
 * Common ActiveRecord - Базовый класс модели ActiveRecord для API.
 */
class CommonActiveRecord extends ActiveRecord
{

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[$this->attributes(), 'safe'],
		];
	}
}
