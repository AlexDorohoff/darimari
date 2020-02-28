<?php

use yii\db\Migration;
use yii\db\oci\Schema;

/**
 * Class m200127_234222_apdate_address
 */
class m200127_234222_apdate_address extends Migration
{
    public function up()
    {
        $this->dropColumn('client', 'id_region');
        $this->dropColumn('client', 'id_city');
        $this->dropColumn('address', 'id_region');
        $this->dropColumn('client', 'address');

        $this->addColumn('city','id_region', Schema::TYPE_INTEGER);
    }
}
