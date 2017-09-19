<?php

use yii\db\Migration;

/**
 * Handles the creation of table `iron_horse`.
 */
class m170919_122626_create_iron_horse_table extends Migration
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

        $this->createTable('{{%iron_horse}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
            'brand' => $this->string(50)->notNull(),
            'model' => $this->string(50)->notNull(),
            'year'=> $this->integer(20)->notNull(),
            'engine'=> $this->integer(20)->notNull(),
            'mileage'=> $this->integer(11)->notNull(),
            'color'=> $this->integer(20),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11)
        ], $tableOptions);

        $this->addForeignKey('user_horse', '{{%iron_horse}}', 'user_id', '{{%user}}', 'id', 'cascade', 'cascade');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%iron_horse}}');
    }
}
