<?php

/**
 * Конфигурация подключений к базе данных
 */

return [
	'components' => [
		'db' => [
			'class' => 'yii\db\Connection',
			'dsn' => 'mysql:host=mysql;dbname=db',
			'username' => 'qqq',
			'password' => 'qqq',
			'charset' => 'utf8',
		],
	],
];
