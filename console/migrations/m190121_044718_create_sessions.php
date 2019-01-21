<?php
use yii\db\Migration;

class m190121_044718_create_sessions extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%sessions}}', [
            'id' => $this->primaryKey(),
            'film_id' => $this->integer()->notNull(),
            'session_time' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
        ]);

        $this->addForeignKey('FK_sessions_film_id', '{{%sessions}}', 'film_id', '{{%films}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('FK_sessions_film_id', '{{%sessions}}');
        $this->dropTable('{{%sessions}}');
    }
}
