<?php

use yii\db\Migration;

class m171027_065535_add_column_image_to_blog_table extends Migration
{
    public function up()
    {
        $this->addColumn('blog', 'image', 'string');
    }

    public function down()
    {
        $this->dropColumn('blog','image');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171027_065535_add_column_image_to_blog_table cannot be reverted.\n";

        return false;
    }
    */
}
