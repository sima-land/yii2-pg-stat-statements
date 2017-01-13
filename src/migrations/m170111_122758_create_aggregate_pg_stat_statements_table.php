<?php

use yii\db\Migration;

/**
 * Handles the creation of table `aggregate_pg_stat_statements`.
 */
class m170111_122758_create_aggregate_pg_stat_statements_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable(
            '{{aggregate_pg_stat_statements}}',
            [
                'id' => $this->primaryKey(),
                'created_at' => 'TIMESTAMPTZ',
                'server' => $this->string(20)->notNull()->comment('Имя сервера, отправившего данные'),
                'userid' => $this->integer(10)->notNull()->comment('OID пользователя, выполнявшего оператор'),
                'dbid' => $this->integer(10)->notNull()->comment('OID базы данных, в которой выполнялся оператор'),
                'queryid' => $this->bigInteger()->notNull()->comment(
                    'Внутренний хеш-код, вычисленный по дереву разбора оператора'
                ),
                'query' => $this->text()->notNull()->comment('Текст, представляющий оператор'),
                'calls' => $this->bigInteger()->notNull()->comment('Число выполнений'),
                'total_time' => 'DOUBLE PRECISION NOT NULL',
                'min_time' => 'DOUBLE PRECISION NOT NULL',
                'max_time' => 'DOUBLE PRECISION NOT NULL',
                'mean_time' => 'DOUBLE PRECISION NOT NULL',
                'stddev_time' => 'DOUBLE PRECISION NOT NULL',
                'rows' => $this->bigInteger()->notNull()->comment(
                    'Общее число строк, полученных или затронутых оператором'
                ),
                'shared_blks_hit' => $this->bigInteger()->notNull()->comment(
                    'Общее число попаданий в разделяемый кеш блоков для данного оператора'
                ),
                'shared_blks_read' => $this->bigInteger()->notNull()->comment(
                    'Общее число чтений разделяемых блоков для данного оператора'
                ),
                'shared_blks_dirtied' => $this->bigInteger()->notNull()->comment(
                    'Общее число разделяемых блоков, «загрязнённых» данным оператором'
                ),
                'shared_blks_written' => $this->bigInteger()->notNull()->comment(
                    'Общее число разделяемых блоков, записанных данным оператором'
                ),
                'local_blks_hit' => $this->bigInteger()->notNull()->comment(
                    'Общее число попаданий в локальный кеш блоков для данного оператора'
                ),
                'local_blks_read' => $this->bigInteger()->notNull()->comment(
                    'Общее число чтений локальных блоков для данного оператора'
                ),
                'local_blks_dirtied' => $this->bigInteger()->notNull()->comment(
                    'Общее число локальных блоков, «загрязнённых» данным оператором'
                ),
                'local_blks_written' => $this->bigInteger()->notNull()->comment(
                    'Общее число локальных блоков, записанных данным оператором'
                ),
                'temp_blks_read' => $this->bigInteger()->notNull()->comment(
                    'Общее число чтений временных блоков для данного оператора'
                ),
                'temp_blks_written' => $this->bigInteger()->notNull()->comment(
                    'Общее число записей временных блоков для данного оператора'
                ),
                'blk_read_time' => 'DOUBLE PRECISION NOT NULL',
                'blk_write_time' => 'DOUBLE PRECISION NOT NULL',
            ]
        );


        $this->addCommentOnColumn(
            '{{aggregate_pg_stat_statements}}',
            'created_at',
            'Время создания записи'
        );
        $this->addCommentOnColumn(
            '{{aggregate_pg_stat_statements}}',
            'total_time',
            'Общее время, потраченное на оператор, в миллисекундах'
        );
        $this->addCommentOnColumn(
            '{{aggregate_pg_stat_statements}}',
            'min_time',
            'Минимальное время, потраченное на оператор, в миллисекундах'
        );
        $this->addCommentOnColumn(
            '{{aggregate_pg_stat_statements}}',
            'max_time',
            'Максимальное время, потраченное на оператор, в миллисекундах'
        );
        $this->addCommentOnColumn(
            '{{aggregate_pg_stat_statements}}',
            'mean_time',
            'Среднее время, потраченное на оператор, в миллисекундах'
        );
        $this->addCommentOnColumn(
            '{{aggregate_pg_stat_statements}}',
            'stddev_time',
            'Стандартное отклонение во времени, потраченном на оператор, в миллисекундах'
        );
        $this->addCommentOnColumn(
            '{{aggregate_pg_stat_statements}}',
            'blk_read_time',
            'Общее время, потраченное оператором на чтение блоков, в миллисекундах (если включён track_io_timing, или ноль в противном случае)'
        );
        $this->addCommentOnColumn(
            '{{aggregate_pg_stat_statements}}',
            'blk_write_time',
            'Общее время, потраченное оператором на запись блоков, в миллисекундах (если включён track_io_timing, или ноль в противном случае)'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('aggregate_pg_stat_statements');
    }
}
