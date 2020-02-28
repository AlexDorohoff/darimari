<?php

use yii\db\Migration;
use yii\db\oci\Schema;

/**
 * Class m200127_235118_apdate_client
 */
class m200127_235118_apdate_client extends Migration
{
    public function up()
    {
        $this->dropColumn('client', 'city');
        $this->dropColumn('client', 'house');
        $this->dropColumn('client', 'flat');
        $this->dropColumn('address', 'address');

        $this->addColumn('address','house', Schema::TYPE_INTEGER);
        $this->addColumn('address','flat', Schema::TYPE_INTEGER);
        $this->addColumn('address','comment', Schema::TYPE_TEXT);
    }
}
