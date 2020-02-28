<?php

use yii\db\Migration;

/**
 * Class m200121_210414_add_city_on_client
 */
class m200121_210414_add_city_on_client extends Migration
{
    public function up()
    {
        $this->addColumn('client','id_region','integer');
        $this->addColumn('client','id_city','integer');
    }
}
