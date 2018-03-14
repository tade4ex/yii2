<?php

use yii\db\Migration;

/**
 * Class m180314_164431_login_history
 */
class m180314_164431_login_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('login_history', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'date_time' => $this->dateTime(),
        ]);

        $this->createIndex(
            'idx-login_history-user_id',
            'login_history',
            'user_id'
        );

        $this->addForeignKey(
            'fk-login_history-user_id',
            'login_history',
            'user_id',
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
        echo "m180314_164431_login_history cannot be reverted.\n";
        $this->dropForeignKey('fk-login_history-user_id', 'login_history');
        $this->dropTable('login_history');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180314_164431_login_history cannot be reverted.\n";

        return false;
    }
    */
}
