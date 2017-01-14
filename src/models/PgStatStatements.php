<?php

namespace simaland\pgstatstatements\models;

use Yii;

/**
 * This is the model class for table "pg_stat_statements".
 *
 * @property integer $userid
 * @property integer $dbid
 * @property integer $queryid
 * @property string $query
 * @property integer $calls
 * @property double $total_time
 * @property double $min_time
 * @property double $max_time
 * @property double $mean_time
 * @property double $stddev_time
 * @property integer $rows
 * @property integer $shared_blks_hit
 * @property integer $shared_blks_read
 * @property integer $shared_blks_dirtied
 * @property integer $shared_blks_written
 * @property integer $local_blks_hit
 * @property integer $local_blks_read
 * @property integer $local_blks_dirtied
 * @property integer $local_blks_written
 * @property integer $temp_blks_read
 * @property integer $temp_blks_written
 * @property double $blk_read_time
 * @property double $blk_write_time
 */
class PgStatStatements extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pg_stat_statements';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'dbid', 'queryid', 'calls', 'rows', 'shared_blks_hit', 'shared_blks_read', 'shared_blks_dirtied', 'shared_blks_written', 'local_blks_hit', 'local_blks_read', 'local_blks_dirtied', 'local_blks_written', 'temp_blks_read', 'temp_blks_written'], 'integer'],
            [['query'], 'string'],
            [['total_time', 'min_time', 'max_time', 'mean_time', 'stddev_time', 'blk_read_time', 'blk_write_time'], 'number'],
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
}
