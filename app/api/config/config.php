<?php
/**
 * Конфигурация приложения
 */

require __DIR__ . '/../../common/config/main.php';

require __DIR__ . '/../../common/config/bootstrap.php';

return  \yii\helpers\ArrayHelper::merge(
	require(__DIR__ . '/../../common/config/config.php'),
	[
    	'id' => 'api',
    	'basePath' => dirname(dirname(__DIR__)),
    	'controllerNamespace' => 'api\common\controllers',
    	'aliases' => [
    	    '@api' => dirname(dirname(__DIR__)) . '/api',
    	],
    	 'modules' => [
    	    'v1' => [
    	        'class' => 'api\modules\v1\Module',
    	    ],
    	],
		'bootstrap' => [
			[
				'class' => 'yii\filters\ContentNegotiator',
				'formats' => [
					'application/json' => yii\web\Response::FORMAT_JSON
				]
			],
		],
    	'components' => [
			'mailer' => [
    	        'class'            => 'yii\swiftmailer\Mailer',
    	        'viewPath'         => '@common/mail',
    	        'useFileTransport' => true,
    	    ],
    	    'request' => [
    	        'cookieValidationKey' => 'M0oBS-Ib6PeqaoBST4uiQ7UONbONb6Peq',
    	        'parsers' => [
    	            'application/json' => 'yii\web\JsonParser',
    	        ]
    	    ],
    	    'user' => [
    	        'enableSession'=>false,
    	        'identityClass'   => 'api\common\models\CommonUser',
    	        'enableAutoLogin' => false,
    	    ],
    	    'response' => [
    	        'formatters' => [
    	            \yii\web\Response::FORMAT_JSON => [
    	                'class' => 'yii\web\JsonResponseFormatter',
    	                'prettyPrint' => false,
    	            ],
    	        ],
    	        'charset' => 'UTF-8',
    	    ],
			'urlManager' => [
				'enablePrettyUrl' => true,
				'enableStrictParsing' => false,
				'showScriptName' => false,
			
				'normalizer' => [
					'class' => 'yii\web\UrlNormalizer',
					'action' => yii\web\UrlNormalizer::ACTION_REDIRECT_TEMPORARY,
				],
				'rules' => [
					'v1' => 'v1/task',
					[
						'class' => 'yii\rest\UrlRule',
						'pluralize' => false,
						'controller' => [
							'v1/user',
							'v1/task',
						],
						'patterns' => [
							'OPTIONS {id}' => 'view',
							'OPTIONS <action:\w+>' =>'<action>',
							'OPTIONS ' =>'index',
						
							'PUT,PATCH {id}' => 'update',
							'DELETE {id}' => 'delete',
							'GET,HEAD {id}' => 'view',
							'POST ' => 'create',
							'GET,HEAD ' => 'index',
							'' => 'index',
						],
						'tokens' => [
							'{id}' => "<id:\d+>"
						],
					],
				],
			],
    	],
    	'params' => [],
	]
);
