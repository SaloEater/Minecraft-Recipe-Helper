<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%recipe}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%item}}`
 * - `{{%recipe_result}}`
 */
class m190910_072940_create_recipe_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%recipe}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer(),
            'recipe_result_id' => $this->integer(),
            'amount' => $this->integer(),
        ]);

        // creates index for column `item_id`
        $this->createIndex(
            '{{%idx-recipe-item_id}}',
            '{{%recipe}}',
            'item_id'
        );

        // add foreign key for table `{{%item}}`
        $this->addForeignKey(
            '{{%fk-recipe-item_id}}',
            '{{%recipe}}',
            'item_id',
            '{{%item}}',
            'id',
            'CASCADE'
        );

        // creates index for column `recipe_result_id`
        $this->createIndex(
            '{{%idx-recipe-recipe_result_id}}',
            '{{%recipe}}',
            'recipe_result_id'
        );

        // add foreign key for table `{{%recipe_result}}`
        $this->addForeignKey(
            '{{%fk-recipe-recipe_result_id}}',
            '{{%recipe}}',
            'recipe_result_id',
            '{{%recipe_result}}',
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
            '{{%fk-recipe-item_id}}',
            '{{%recipe}}'
        );

        // drops index for column `item_id`
        $this->dropIndex(
            '{{%idx-recipe-item_id}}',
            '{{%recipe}}'
        );

        // drops foreign key for table `{{%recipe_result}}`
        $this->dropForeignKey(
            '{{%fk-recipe-recipe_result_id}}',
            '{{%recipe}}'
        );

        // drops index for column `recipe_result_id`
        $this->dropIndex(
            '{{%idx-recipe-recipe_result_id}}',
            '{{%recipe}}'
        );

        $this->dropTable('{{%recipe}}');
    }
}
