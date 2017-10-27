<?php

use yii\db\Migration;

class m171026_145735_refactor_color_field_in_iron_horse_table extends Migration
{
    public function up()
    {
        //$this->dropColumn('iron_horse', 'color');
        $this->addColumn('iron_horse', 'color','string');
    }

    public function down()
    {
        $this->dropColumn('iron_horse', 'color');
        $this->addColumn('iron_horse', 'color','integer');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171026_145735_refactor_color_field_in_iron_horse_table cannot be reverted.\n";

        return false;
    }
    */
}
