<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%recipe_result}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%item}}`
 */
class m190910_072850_create_recipe_result_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%recipe_result}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer(),
            'machine' => $this->string(),
            'amount' => $this->integer()->defaultValue(1),
            'name' => $this->string()
        ]);

        // creates index for column `item_id`
        $this->createIndex(
            '{{%idx-recipe_result-item_id}}',
            '{{%recipe_result}}',
            'item_id'
        );

        // add foreign key for table `{{%item}}`
        $this->addForeignKey(
            '{{%fk-recipe_result-item_id}}',
            '{{%recipe_result}}',
            'item_id',
            '{{%item}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%item}}`
        $this->dropForeignKey(
            '{{%fk-recipe_result-item_id}}',
            '{{%recipe_result}}'
        );

        // drops index for column `item_id`
        $this->dropIndex(
            '{{%idx-recipe_result-item_id}}',
            '{{%recipe_result}}'
        );

        $this->dropTable('{{%recipe_result}}');
    }
}
