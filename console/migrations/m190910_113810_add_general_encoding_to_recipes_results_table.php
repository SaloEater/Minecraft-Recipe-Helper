<?php

use yii\db\Migration;

/**
 * Class m190910_113810_add_general_encoding_to_recipes_results_table
 */
class m190910_113810_add_general_encoding_to_recipes_results_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('recipe_result', 'name', $this->string()->append('CHARACTER SET utf8 COLLATE utf8_general_ci'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190910_113810_add_general_encoding_to_recipes_results_table cannot be reverted.\n";

        return false;
    }
    */
}
