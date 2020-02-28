<?php

use yii\db\Migration;

/**
 * Class m200130_134658_apdate_city
 */
class m200130_134658_apdate_city extends Migration
{
    public function up()
    {
        $this->addColumn('city', 'street', 'text');
    }
}
