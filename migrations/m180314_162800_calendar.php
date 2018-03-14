<?php

use yii\db\Migration;

/**
 * Class m180314_162800_calendar
 */
class m180314_162800_calendar extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('calendar', [
            'id' => $this->primaryKey(),
            'text' => $this->text()->notNull(),
            'creator' => $this->integer()->notNull(),
            'date_event' => $this->dateTime()
        ]);

        $this->createIndex(
            'idx-calendar-creator',
            'calendar',
            'creator'
        );

        $this->addForeignKey(
            'fk-calendar-creator',
            'calendar',
            'creator',
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
        echo "m180314_162800_calendar cannot be reverted.\n";
        $this->dropForeignKey('fk-calendar-creator', 'calendar');
        $this->dropTable('calendar');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180314_162800_calendar cannot be reverted.\n";

        return false;
    }
    */
}
