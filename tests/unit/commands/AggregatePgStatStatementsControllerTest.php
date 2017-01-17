<?php

namespace tests\unit\commands;

use simaland\pgstatstatements\commands\AggregatePgStatStatementsController;

class AggregatePgStatStatementsControllerTest extends \Codeception\TestCase\Test
{
    public function testGetData()
    {
        $this->assertEquals(\simaland\pgstatstatements\models\PgStatStatements::find()->count(), 1);
    }
}