<?php

use yii\db\Migration;
use yii\db\oci\Schema;

/**
 * Class m200120_224159_region
 */
class m200120_224159_region extends Migration
{
    public function up()
    {
        $this->createTable('region', [
            'id_region' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'comment' => Schema::TYPE_TEXT,
        ]);
    }

    public function down()
    {
        $this->dropTable('region');
    }
}
