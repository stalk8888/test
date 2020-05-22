<?php

namespace api\common\models;

use yii\web\IdentityInterface;


/**
 * Common User - Пользователь системы - Заглушка.
 *
 */
class CommonUser implements IdentityInterface
{
	
	/**
	 * {@inheritdoc}
	 */
	public static function findIdentity($id)
	{
		return null;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function findIdentityByAccessToken($token, $type = null)
	{
		return null;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getId()
	{
		return null;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function getAuthKey()
	{
		return null;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function validateAuthKey($authKey)
	{
		return true;
	}
}
