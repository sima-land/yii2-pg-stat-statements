<?php

namespace simaland\pgstatstatements\models;

use Yii;

/**
 * This is the model class for table "aggregate_pg_stat_statements".
 *
 * @property integer $id ID
 * @property string $created_at Время создания записи
 * @property string $server Имя сервера, отправившего данные
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
class AggregatePgStatStatements extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aggregate_pg_stat_statements';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'created_at',
                    'server',
                    'userid',
                    'dbid',
                    'queryid',
                    'query',
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
                'required'
            ],
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
            [['server'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Время создания записи',
            'server' => 'Имя сервера, отправившего данные',
            'userid' => 'OID пользователя, выполнявшего оператор',
            'dbid' => 'OID базы данных, в которой выполнялся оператор',
            'queryid' => 'Внутренний хеш-код, вычисленный по дереву разбора оператора',
            'query' => 'Текст, представляющий оператор',
            'calls' => 'Число выполнений',
            'total_time' => 'Общее время, потраченное на оператор, в миллисекундах',
            'min_time' => 'Минимальное время, потраченное на оператор, в миллисекундах',
            'max_time' => 'Максимальное время, потраченное на оператор, в миллисекундах',
            'mean_time' => 'Среднее время, потраченное на оператор, в миллисекундах',
            'stddev_time' => 'Стандартное отклонение во времени, потраченном на оператор, в миллисекундах',
            'rows' => 'Общее число строк, полученных или затронутых оператором',
            'shared_blks_hit' => 'Общее число попаданий в разделяемый кеш блоков для данного оператора',
            'shared_blks_read' => 'Общее число чтений разделяемых блоков для данного оператора',
            'shared_blks_dirtied' => 'Общее число разделяемых блоков, «загрязнённых» данным оператором',
            'shared_blks_written' => 'Общее число разделяемых блоков, записанных данным оператором',
            'local_blks_hit' => 'Общее число попаданий в локальный кеш блоков для данного оператора',
            'local_blks_read' => 'Общее число чтений локальных блоков для данного оператора',
            'local_blks_dirtied' => 'Общее число локальных блоков, «загрязнённых» данным оператором',
            'local_blks_written' => 'Общее число локальных блоков, записанных данным оператором',
            'temp_blks_read' => 'Общее число чтений временных блоков для данного оператора',
            'temp_blks_written' => 'Общее число записей временных блоков для данного оператора',
            'blk_read_time' => 'Общее время, потраченное оператором на чтение блоков, в миллисекундах (если включён track_io_timing, или ноль в противном случае)',
            'blk_write_time' => 'Общее время, потраченное оператором на запись блоков, в миллисекундах (если включён track_io_timing, или ноль в противном случае)',
        ];
    }
}
