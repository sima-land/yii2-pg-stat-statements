<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AggregatePgStatStatementsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aggregate Pg Stat Statements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aggregate-pg-stat-statements-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'query:ntext',
            'created_at',
            'server',
            'userid',
            'dbid',
            'queryid',
            'calls',
            'total_time',
            'min_time',
            'max_time',
            'mean_time',
            'stddev_time',
            'rows',
            'shared_blks_hit',
            'shared_blks_read',
            'shared_blks_dirtied',
            'shared_blks_written',
            'local_blks_hit',
            'local_blks_read',
            'local_blks_dirtied',
            'local_blks_written',
            'temp_blks_read',
            'temp_blks_written',
            'blk_read_time',
            'blk_write_time'
        ],
    ]); ?>
</div>

<script type="text/javascript"><?= readfile(__DIR__ . '/app.js'); ?></script>
<style type="text/css"><?= readfile(__DIR__ . '/app.css'); ?></style>
