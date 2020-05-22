<?php

return \yii\helpers\ArrayHelper::merge(
	[
		'id' => 'app-console',
		'basePath' => dirname(__DIR__),
		'aliases' => [
			'@bower' => '@vendor/bower-asset',
			'@npm' => '@vendor/npm-asset',
		],
		'bootstrap' => [],
		'controllerNamespace' => 'console\controllers',
		'controllerMap' => [],
		'components' => [
			'urlManager' => [
				'class' => 'yii\web\UrlManager',
				'baseUrl' => 'http://localhost/',
				'scriptUrl' => 'http://localhost/',
				'enablePrettyUrl' => true,
				'enableStrictParsing' => false,
				'showScriptName' => false,
				'rules' => [],
			],
		],
		'params' => [],
	],
	require(__DIR__ . '/../../common/config/db.php')
);
