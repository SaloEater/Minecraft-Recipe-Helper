<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%machine}}`.
 */
class m190910_074504_create_machine_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%machine}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->append('CHARACTER SET utf8 COLLATE utf8_general_ci')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%machine}}');
    }
}
