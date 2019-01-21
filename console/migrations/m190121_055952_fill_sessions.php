<?php
use yii\db\Migration;
use console\models\Films;

class m190121_055952_fill_sessions extends Migration
{
    public function safeUp()
    {
        $films = Films::getIdsList();
        $startDate = time();
        $endDate = $startDate + (60 * 60 * 24 * 90);
        for ($i = 0; $i < 10000; $i++) {
            $this->insert('{{%sessions}}', [
                'film_id' => $films[rand(0, count($films) - 1)],
                'session_time' => date('Y-m-d H:i:s', (ceil(rand($startDate, $endDate) / 600)) * 600),
            ]);
        }
    }

    public function safeDown()
    {
        $this->truncateTable('{{%sessions}}');
    }
}
