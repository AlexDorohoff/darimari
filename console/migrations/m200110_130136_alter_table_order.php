<?php

use yii\db\Migration;

/**
 * Class m200110_130136_alter_table_order
 */
class m200110_130136_alter_table_order extends Migration
{
    public function up()
    {
        $this->addColumn('order','status','boolean NOT NULL DEFAULT 0');
    }
}
