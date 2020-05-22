<?php

namespace api\modules\v1\models;

use api\common\models\CommonActiveRecord;

/**
 *  Пользователь
 */
class User extends CommonActiveRecord
{
	/**
	 * Имя таблицы базы данных, связанной с этим классом.
	 *
	 * @return string Имя таблицы базы данных.
	 */
	public static function tableName()
	{
		return 'user';
	}
	
	/**
	 * Первичные ключи.
	 *
	 * @return array Первичные ключи.
	 */
	public static function primaryKey()
	{
		return ['user_id'];
	}
	
	public static function getFreeUsers(){
		$db = static::getDB();
		$sql = '
			select u.* 
			from user as u 
			where u.user_id not in (
			    select t.task_user_id
			    from task as t 
			    where t.task_status = 0 
			      and not t.task_user_id is null
            
            )
		';
		$rows = $db->createCommand($sql)->queryAll();
		
		if ([] === $rows || !is_array($rows)) {
			return [];
		}
		
		return $rows;
	}
}
