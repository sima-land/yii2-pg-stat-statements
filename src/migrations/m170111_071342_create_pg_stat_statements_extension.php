<?php

use yii\db\Migration;

class m170111_071342_create_pg_stat_statements_extension extends Migration
{
    public function safeUp()
    {
        $this->execute('CREATE EXTENSION IF NOT EXISTS pg_stat_statements');
    }

    public function safeDown()
    {
        $this->execute('DROP EXTENSION IF EXISTS pg_stat_statements');
    }
}
