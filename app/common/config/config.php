<?php
/**
 * Конфигурация приложения
 */
return \yii\helpers\ArrayHelper::merge(
	[
    	'name' => 'API TEST',
    	'vendorPath' => __DIR__ . '/../../vendor',
    	'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    	'aliases' => [
    	    '@bower' => '@vendor/bower-asset',
    	    '@npm'   => '@vendor/npm-asset',
    	],
    	'components' => [
    	    'cache' => [
    	        'class' => 'yii\caching\FileCache',
				'defaultDuration' => 10,
    	    ],
			'urlManager' => [
				'enablePrettyUrl' => true,
				'enableStrictParsing' => false,
				'showScriptName' => false,
			
				'normalizer' => [
					'class' => 'yii\web\UrlNormalizer',
					'action' => yii\web\UrlNormalizer::ACTION_REDIRECT_TEMPORARY,
				],
				'rules' => [],
			],
    	],
		'params' => []
	],
	require(__DIR__ . '/db.php')
);


