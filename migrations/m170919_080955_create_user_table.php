<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m170919_080955_create_user_table extends Migration
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

        $this->createTable('{{user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(50)->notNull(),
            'email' => $this->string(100)->notNull(),
            'password'=> $this->string(100)->notNull(),
            'created_at' => $this->integer(30)->notNull(),
            'updated_at' => $this->integer(30)
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{user}}');
    }
}
