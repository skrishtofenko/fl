<?php
use yii\db\Migration;

class m190121_055456_fill_films extends Migration
{
    public function safeUp()
    {
        for ($i = 1; $i <= 100; $i++) {
            $this->insert('{{%films}}', ['title' => "Some film title $i"]);
        }
    }

    public function safeDown()
    {
        $this->delete('{{%films}}', []);
    }
}
