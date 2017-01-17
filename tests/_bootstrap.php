<?php

error_reporting(E_ALL);

defined('YII_DEBUG') or define('YII_DEBUG', getenv('YII_DEBUG') ? (getenv('YII_DEBUG') == 'false' ? false : getenv('YII_DEBUG')) : true);
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV') ? getenv('YII_ENV') : 'test');
defined('VENDOR_DIR') or define('VENDOR_DIR', __DIR__ . '/../vendor');

require_once(VENDOR_DIR . '/autoload.php');

require_once(VENDOR_DIR . '/yiisoft/yii2/Yii.php');
