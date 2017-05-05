<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AggregatePgStatStatementsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aggregate Pg Stat Statements';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs('

// Get descriptions and optimal size of table columns
var theads = document.querySelectorAll(\'table thead th\'),
    info = [],
    sizesAfter = [];

for (var i=0; i < theads.length; i++) {
    var text = theads[i].childNodes[0].innerText,
        tbodyTd = document.querySelectorAll(\'tbody td\');
        
    //  Write table headers in array for title attribute
    info.push(text);
    
    //  Bootstrap tooltip for table header
    theads[i].childNodes[0].setAttribute(\'data-toggle\', \'tooltip\');
    theads[i].childNodes[0].setAttribute(\'data-placement\', \'bottom\');
    theads[i].childNodes[0].setAttribute(\'title\',info[i]);
    
    //  Write cells width to array. If scroll not from top then load from cookies
    if ($(window).scrollTop() === 0 ) {
        sizesAfter.push(theads[i].offsetWidth);
    } else {
        sizesAfter = document.cookie.replace(/.*cellsWidth\=\[(.*)\]\;.*/,\'$1\').split(\',\');
    }
    //  Optimal width of cells
    tbodyTd[i].style.width = sizesAfter[i]+ \'px\';
    theads[i].style.width = sizesAfter[i]+ \'px\';
}

//  Save columns size in cookies
if ($(window).scrollTop() === 0) {
    document.cookie = "cellsWidth=" + JSON.stringify(sizesAfter);
}

//  Title for cells
var cells = document.querySelectorAll(\'tbody td\'),
    k = 0;
for (i = 1; i < cells.length; i++) {
    k++;
    if (k === info.length) {
        k = 0;
    }
    cells[i].setAttribute(\'title\', info[k]);
}

//  Trim 3rd column (SQL query) to 2 lines
if ($(\'tbody tr td:nth-child(2)\').text().length > 36) {
    $(\'tbody tr td:nth-child(2)\').html(function() {
        return \'<div class="reducer">\' + $(this).text() + \'</div>\'
    });
}

//  Highlight column on click
$(\'tbody td\').click(function() {
    var indexIt = $(this).index() + 1;
    $(this).toggleClass(\'extend\');
    if (($(this).index() + 1) === 2) {
        return ;
    } else {
    $(\'tbody tr td:nth-child(\' + indexIt + \')\').toggleClass(\'danger\');
    }
});

//  Bootstrap features
//      Affix
$(\'thead tr:first-child\').affix({
    offset: {
        top: 158,
    }
});

//      Tooltip
$(function () {
  $(\'[data-toggle="tooltip"]\').tooltip()
});
');
$this->registerCss("
.container {
    width: 100%;
}
.aggregate-pg-stat-statements-index table {
    font-family: monospace;
    font-size: 12px;
}
.aggregate-pg-stat-statements-index table tr.affix {
    top: 50px;
    right: 15px;
    left: 15px;
    background-color: #fff;
    z-index: 5;
}
.aggregate-pg-stat-statements-index table tr.affix th {
    max-width: unset;
    display: inline-block;
    border-right: none;
}
.aggregate-pg-stat-statements-index table th a {
    display: block !important;
    overflow: hidden;
}
.aggregate-pg-stat-statements-index table tr th a:after {
    position: absolute;
    right: 0;
    top: 6px;
    background: #fff;
    padding: 3px;
}
.aggregate-pg-stat-statements-index table tr.affix th:last-child {
    border-right: solid 1px #aaa;
}
.aggregate-pg-stat-statements-index table th {
    max-width: 37px;
    position: relative;
}
.aggregate-pg-stat-statements-index table .danger {
    background: #ff4824;
}
.aggregate-pg-stat-statements-index table .filters td {
    padding: 0;
}
.aggregate-pg-stat-statements-index table .filters input {
    border-radius: 0;
    padding: 2px !important;
}
.aggregate-pg-stat-statements-index table tbody td {
    overflow: hidden;
}
.aggregate-pg-stat-statements-index .reducer {
    max-height: 72px;
    overflow: hidden;
    position: relative;
    z-index: 1;
}
.aggregate-pg-stat-statements-index .reducer:after {
    content: '...';
    width: 100%;
    color: #000;
    display: block;
    background: #fff;
    position: absolute;
    bottom: 0;
    text-align: center;
}
.aggregate-pg-stat-statements-index td.extend .reducer {
    max-height: 99999999px !important;
}
.aggregate-pg-stat-statements-index td.extend .reducer:after {
    display: none;
}
");
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