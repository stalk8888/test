<?php

// Загрузка конфигурации приложения
$config = require __DIR__ . '/../app/api/config/config.php';

// Создание и конфигурация приложения, а также вызов метода для обработки входящего запроса
(new yii\web\Application($config))->run();
