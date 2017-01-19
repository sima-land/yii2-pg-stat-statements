<?php

namespace tests\functional;

use simaland\pgstatstatements\models\AggregatePgStatStatements;
use tests\fixtures\AggregatePgStatStatementsFixture;
use tests\FunctionalTester;
use yii\helpers\Url;

/**
 * @group beta
 */
class AggregatePgStatStatementsCest
{
    /**
     * Проверка авторизации по email.
     *
     * @param FunctionalTester $I
     */
    public function checkIndex(FunctionalTester $I)
    {
        $I->wantTo('ensure that index page works');
        $I->amOnPage(Url::to(['/pgstatstatements/aggregate-pg-stat-statements/index']));
        $I->see('Aggregate Pg Stat Statements', 'h1');
        $I->see('2017-01-19 12:21:50.000000 +05:00', 'td');
        $I->see('SELECT * FROM "attr" WHERE id=1', 'td');
    }
}
