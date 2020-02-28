<?php

use yii\db\Migration;

/**
 * Class m200113_182300_alter_table
 */
class m200113_182300_alter_table extends Migration
{
    public function up()
    {
        $this->addColumn('product_x_order','amount','integer');
    }
}
