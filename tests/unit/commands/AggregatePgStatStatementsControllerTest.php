<?php

namespace tests\unit\commands;

use simaland\pgstatstatements\commands\AggregatePgStatStatementsController;
use simaland\pgstatstatements\models\AggregatePgStatStatements;
use tests\models\PgStatStatements;

class AggregatePgStatStatementsControllerTest extends \Codeception\TestCase\Test
{
    public function testGetData()
    {
        $this->assertEquals(PgStatStatements::find()->count(), 3);
        $this->assertEquals(AggregatePgStatStatements::find()->count(), 0);

        $controller = new AggregatePgStatStatementsController('aggregatePgStatStatementsController', \Yii::$app);

        $controller->pgStatStatements = PgStatStatements::class;
        $controller->runAction('aggregate-pg-stat');

        $this->assertEquals(PgStatStatements::find()->count(), 0);
        $this->assertEquals(AggregatePgStatStatements::find()->count(), 3);
    }
}
