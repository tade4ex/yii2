<?php

use yii\db\Migration;

/**
 * Class m180314_162806_access
 */
class m180314_162806_access extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('access', [
            'id' => $this->primaryKey(),
            'user_owner' => $this->integer()->notNull(),
            'user_guest' => $this->integer()->notNull(),
            'date' => $this->date()
        ]);

        $this->createIndex(
            'idx-access-user_owner',
            'access',
            'user_owner'
        );

        $this->createIndex(
            'idx-access-user_guest',
            'access',
            'user_guest'
        );

        $this->addForeignKey(
            'fk-access-user_owner',
            'access',
            'user_owner',
            'user',
            'id',
            'no action',
            'no action'
        );

        $this->addForeignKey(
            'fk-access-user_guest',
            'access',
            'user_guest',
            'user',
            'id',
            'no action',
            'no action'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180314_162806_access cannot be reverted.\n";
        $this->dropForeignKey('fk-access-user_owner', 'access');
        $this->dropForeignKey('fk-access-user_guest', 'access');
        $this->dropTable('access');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180314_162806_access cannot be reverted.\n";

        return false;
    }
    */
}
