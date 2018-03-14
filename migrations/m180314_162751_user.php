<?php

use yii\db\Migration;

/**
 * Class m180314_162751_user
 */
class m180314_162751_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(128)->notNull()->unique(),
            'name' => $this->string(45)->notNull(),
            'surname' => $this->string(45)->notNull(),
            'password' => $this->string(255)->notNull(),
            'salt' => $this->string(255)->notNull(),
            'access_token' => $this->string(255)->notNull(),
            'create_date' => $this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180314_162751_user cannot be reverted.\n";
        $this->dropTable('user');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180314_162751_user cannot be reverted.\n";

        return false;
    }
    */
}
