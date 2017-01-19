<?php

namespace simaland\pgstatstatements\controllers;

use Yii;
use simaland\pgstatstatements\models\AggregatePgStatStatementsSearch;
use yii\web\Controller;

/**
 * AggregatePgStatStatementsController implements the CRUD actions for AggregatePgStatStatements model.
 */
class AggregatePgStatStatementsController extends Controller
{
    /**
     * Lists all AggregatePgStatStatements models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AggregatePgStatStatementsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
