<?php

namespace simaland\pgstatstatements\models;

use Yii;

/**
 * This is the model class for table "pg_stat_statements".
 *
 * @property integer $userid OID пользователя, выполнявшего оператор
 * @property integer $dbid OID базы данных, в которой выполнялся оператор
 * @property integer $queryid Внутренний хеш-код, вычисленный по дереву разбора оператора
 * @property string $query Текст, представляющий оператор
 * @property integer $calls Число выполнений
 * @property double $total_time Общее время, потраченное на оператор, в миллисекундах
 * @property double $min_time Минимальное время, потраченное на оператор, в миллисекундах
 * @property double $max_time Максимальное время, потраченное на оператор, в миллисекундах
 * @property double $mean_time Среднее время, потраченное на оператор, в миллисекундах
 * @property double $stddev_time Стандартное отклонение во времени, потраченном на оператор, в миллисекундах
 * @property integer $rows Общее число строк, полученных или затронутых оператором
 * @property integer $shared_blks_hit Общее число попаданий в разделяемый кеш блоков для данного оператора
 * @property integer $shared_blks_read Общее число чтений разделяемых блоков для данного оператора
 * @property integer $shared_blks_dirtied Общее число разделяемых блоков, «загрязнённых» данным оператором
 * @property integer $shared_blks_written Общее число разделяемых блоков, записанных данным оператором
 * @property integer $local_blks_hit Общее число попаданий в локальный кеш блоков для данного оператора
 * @property integer $local_blks_read Общее число чтений локальных блоков для данного оператора
 * @property integer $local_blks_dirtied Общее число локальных блоков, «загрязнённых» данным оператором
 * @property integer $local_blks_written Общее число локальных блоков, записанных данным оператором
 * @property integer $temp_blks_read Общее число чтений временных блоков для данного оператора
 * @property integer $temp_blks_written Общее число записей временных блоков для данного оператора
 * @property double $blk_read_time Общее время, потраченное оператором на чтение блоков, в миллисекундах (если включён
 * track_io_timing, или ноль в противном случае)
 * @property double $blk_write_time Общее время, потраченное оператором на запись блоков, в миллисекундах (если включён
 * track_io_timing, или ноль в противном случае)
 */
class PgStatStatements extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function find()
    {
        return parent::find()->where(['not', ['queryid' => null, 'query' => '<insufficient privilege>']]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'userid',
                    'dbid',
                    'queryid',
                    'calls',
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
                    'temp_blks_written'
                ],
                'integer'
            ],
            [['query'], 'string'],
            [
                ['total_time', 'min_time', 'max_time', 'mean_time', 'stddev_time', 'blk_read_time', 'blk_write_time'],
                'number'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'dbid' => 'Dbid',
            'queryid' => 'Queryid',
            'query' => 'Query',
            'calls' => 'Calls',
            'total_time' => 'Total Time',
            'min_time' => 'Min Time',
            'max_time' => 'Max Time',
            'mean_time' => 'Mean Time',
            'stddev_time' => 'Stddev Time',
            'rows' => 'Rows',
            'shared_blks_hit' => 'Shared Blks Hit',
            'shared_blks_read' => 'Shared Blks Read',
            'shared_blks_dirtied' => 'Shared Blks Dirtied',
            'shared_blks_written' => 'Shared Blks Written',
            'local_blks_hit' => 'Local Blks Hit',
            'local_blks_read' => 'Local Blks Read',
            'local_blks_dirtied' => 'Local Blks Dirtied',
            'local_blks_written' => 'Local Blks Written',
            'temp_blks_read' => 'Temp Blks Read',
            'temp_blks_written' => 'Temp Blks Written',
            'blk_read_time' => 'Blk Read Time',
            'blk_write_time' => 'Blk Write Time',
        ];
    }

    public static function reset()
    {
        \Yii::$app->db->createCommand('SELECT pg_stat_statements_reset()')->execute();
    }
}
