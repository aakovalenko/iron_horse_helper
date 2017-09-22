<?php

use yii\db\Migration;

/**
 * Handles the creation of table `blog`.
 */
class m170922_093859_create_blog_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql')
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%blog}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
            'title' => $this->string(150),
            'text' => $this->text()->null(),
            'url' => $this->string(150),
            'status_id' => $this->smallInteger(1)->defaultValue(1),
            'sort' => $this->smallInteger(2)->defaultValue(50),
            'date_create' => $this->integer(11),
            'date_update' => $this->integer(11),


        ],$tableOptions);



        $this->addForeignKey('user_blog', '{{%blog}}', 'user_id', '{{user}}', 'id', 'cascade', 'cascade');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('blog');
    }
}
