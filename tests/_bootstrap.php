<?php

error_reporting(E_ALL);

defined('YII_DEBUG') or define(
    'YII_DEBUG',
    getenv('YII_DEBUG') ? (getenv('YII_DEBUG') == 'false' ? false : getenv('YII_DEBUG')) : true
);
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV') ? getenv('YII_ENV') : 'test');
defined('VENDOR_DIR') or define('VENDOR_DIR', __DIR__ . '/../vendor');
defined('YII_TEST_ENTRY_URL') or define('YII_TEST_ENTRY_URL', '/index-test.php');
defined('YII_TEST_ENTRY_FILE') or define('YII_TEST_ENTRY_FILE', __DIR__ . '/../web/index-test.php');

require_once(VENDOR_DIR . '/autoload.php');
require_once(VENDOR_DIR . '/yiisoft/yii2/Yii.php');

$_SERVER['SCRIPT_FILENAME'] = YII_TEST_ENTRY_FILE;
$_SERVER['SCRIPT_NAME'] = YII_TEST_ENTRY_URL;

Yii::setAlias('@tests', dirname(__DIR__));
