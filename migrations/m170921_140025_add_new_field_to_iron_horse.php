<?php

use yii\db\Migration;


class m170921_140025_add_new_field_to_iron_horse extends Migration
{
    public function up()
    {
        $this->addColumn('{{%iron_horse}}', 'image', \yii\db\mysql\Schema::TYPE_STRING);
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
        echo "m170921_140025_add_new_field_to_iron_horse cannot be reverted.\n";

        return false;
    }
    */
}
