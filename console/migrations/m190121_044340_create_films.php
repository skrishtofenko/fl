<?php
use yii\db\Migration;

class m190121_044340_create_films extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%films}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(127)->notNull(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%films}}');
    }
}
