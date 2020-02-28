<?php

use yii\db\Migration;
use yii\db\oci\Schema;

/**
 * Class m200120_224205_city
 */
class m200120_224205_city extends Migration
{
    public function up()
    {
        $this->createTable('city', [
            'id_city' => Schema::TYPE_PK,
            'name' =>  $this->string(12)->notNull()->unique(),
            'comment' => Schema::TYPE_TEXT,
        ]);
    }

    public function down()
    {
        $this->dropTable('city');
    }
}
