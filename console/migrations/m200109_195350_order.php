<?php

use yii\db\Migration;
use yii\db\oci\Schema;

/**
 * Class m200109_195350_order
 */
class m200109_195350_order extends Migration
{
    public function up()
    {
        $this->createTable('order', [
            'id_order' => Schema::TYPE_PK,
            'id_client' => Schema::TYPE_INTEGER,
            'date' => Schema::TYPE_TIMESTAMP,
            'comment' => Schema::TYPE_STRING,
        ]);

        $this->addForeignKey(
            'fk_order_x_client',
            'order',
            'id_client',
            'client',
            'id_client',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('order');
    }
}
