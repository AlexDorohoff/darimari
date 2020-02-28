<?php

use yii\db\Migration;

/**
 * Class m200201_141713_apdate_city_and_address
 */
class m200201_141713_apdate_city_and_address extends Migration
{
    public function up()
    {
        $this->dropColumn('city', 'street');
        $this->addColumn('address', 'street', 'text');
    }
}
