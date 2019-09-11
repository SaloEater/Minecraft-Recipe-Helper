<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%}}`.
 */
class m190908_122144_create_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%item}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->append('CHARACTER SET utf8 COLLATE utf8_general_ci'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%item}}');
    }
}
