<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `user`.
 */
class m170919_095508_drop_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropTable('user');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
        ]);
    }
}
