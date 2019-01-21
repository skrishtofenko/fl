<?php
namespace frontend\models\forms;

use yii\base\Model;

class SearchFilms extends Model {
    public $from;
    public $to;

    public function rules() {
        return [
            [['from', 'to'], 'required'],
            [['from', 'to'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }
}
