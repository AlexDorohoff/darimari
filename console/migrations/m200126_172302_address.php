<?php

use yii\db\Migration;
use yii\db\oci\Schema;

/**
 * Class m200126_172302_address
 */
class m200126_172302_address extends Migration
{
    public function up()
    {
        $this->createTable('address', [
            'id_address' => Schema::TYPE_PK,
            'id_client' => Schema::TYPE_INTEGER,
            'id_city' => Schema::TYPE_INTEGER,
            'id_region' => Schema::TYPE_INTEGER,
            'address' => Schema::TYPE_TEXT,
        ]);

        $this->dropColumn('client', 'address');

        $this->addColumn('client','id_address', Schema::TYPE_INTEGER);

    }
}
