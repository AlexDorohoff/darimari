<?php

use yii\db\Migration;
use yii\db\oci\Schema;

/**
 * Class m200109_208645_order_x_product
 */
class m200109_208645_order_x_product extends Migration
{
    public function up()
    {
        $this->createTable('product_x_order', [
            'id_product_x_order' => Schema::TYPE_PK,
            'id_product' => Schema::TYPE_INTEGER,
            'id_order' => Schema::TYPE_INTEGER,
        ]);

        $this->addForeignKey(
            'fk_product_x_product',
            'product_x_order',
            'id_product',
            'product',
            'id_product',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_product_x_order',
            'product_x_order',
            'id_order',
            'order',
            'id_order',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('product_x_order');
    }
}
