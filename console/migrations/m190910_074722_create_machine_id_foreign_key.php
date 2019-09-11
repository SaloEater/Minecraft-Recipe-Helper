<?php

use yii\db\Migration;

/**
 * Class m190910_074722_create_machine_id_foreign_key
 */
class m190910_074722_create_machine_id_foreign_key extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('recipe_result', 'machine', 'machine_id');
        $this->alterColumn('recipe_result', 'machine_id', $this->integer());

        $this->createIndex(
            'machine_id_index',
            '{{%recipe_result}}',
            'machine_id'
        );

        $this->addForeignKey(
            'machine_id_fk',
            '{{%recipe_result}}',
            'machine_id',
            '{{%machine}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('machine_id_fk', 'recipe_result');

        $this->dropIndex('machine_id_index', 'recipe_result');

        $this->alterColumn('recipe_result', 'machine_id', $this->string());
        $this->renameColumn('recipe_result', 'machine_id', 'machine');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190910_074722_create_machine_id_foreign_key cannot be reverted.\n";

        return false;
    }
    */
}
