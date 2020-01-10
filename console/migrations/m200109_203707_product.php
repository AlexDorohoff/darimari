<?php

use yii\db\Migration;
use yii\db\oci\Schema;

/**
 * Class m200109_203707_product
 */
class m200109_203707_product extends Migration
{
    public function up()
    {
        $this->createTable('product', [
            'id_product' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'comment' => Schema::TYPE_TEXT,
        ]);
    }

    public function down()
    {
        $this->dropTable('product');
    }
}
