<?php

namespace api\common\models;

use yii\base\Model;

/**
 *  Common Model - Базовый класс модели для API.
 */
class CommonModel extends Model
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
