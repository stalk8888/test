<?php

namespace api\modules\v1\models;

use api\common\models\CommonActiveRecord;

/**
 *  Задача
 */
class Task extends CommonActiveRecord
{
	/**
	 * Имя таблицы базы данных, связанной с этим классом.
	 *
	 * @return string Имя таблицы базы данных.
	 */
	public static function tableName()
	{
		return 'task';
	}
	
	/**
	 * Первичные ключи.
	 *
	 * @return array Первичные ключи.
	 */
	public static function primaryKey()
	{
		return ['task_id'];
	}
	
}
