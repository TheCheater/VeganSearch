<?php

require $_SERVER['DOCUMENT_ROOT'] . '/framework/yii.php';

$config = include $_SERVER['DOCUMENT_ROOT'] . '/protected/config/main.php';

Yii::createWebApplication($config)->run();