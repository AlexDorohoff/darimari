<?php

use yii\db\Migration;
use yii\db\oci\Schema;

/**
 * Class m200109_194728_client
 */
class m200109_194728_client extends Migration
{
    public function up()
    {
        $this->createTable('client', [
            'id_client' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'last_name' => Schema::TYPE_STRING,
            'address' => Schema::TYPE_TEXT,
            'city' =>  Schema::TYPE_STRING,
            'house' => Schema::TYPE_STRING,
            'flat' => Schema::TYPE_INTEGER,
        ]);
    }

    public function down()
    {
        $this->dropTable('client');
    }
}
