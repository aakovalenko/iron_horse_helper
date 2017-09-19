<?php

use yii\db\Migration;
use yii\db\Schema;

class m170919_111010_add_new_field_to_user extends Migration
{
    public function up()
{
    $this->addColumn('{{%user}}', 'field', Schema::TYPE_STRING);
}

    public function down()
    {
        $this->dropColumn('{{%user}}', 'field');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170919_111010_add_new_field_to_user cannot be reverted.\n";

        return false;
    }
    */
}
