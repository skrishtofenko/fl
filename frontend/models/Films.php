<?php
namespace frontend\models;

use yii\helpers\ArrayHelper;
use frontend\models\forms\SearchFilms;

class Films extends \common\models\Films
{
    public static function getSchedule(SearchFilms $searchForm)
    {
        $sessions = Sessions::getBetween($searchForm);

        $films = ArrayHelper::map(self::find()
            ->where(['in', 'id', array_unique(ArrayHelper::getColumn($sessions, 'film_id'))])
            ->orderBy(['title' => SORT_ASC])
            ->asArray()
            ->all(), 'id', 'title');

        return [
            'sessions' => $sessions,
            'films' => $films
        ];
    }
}
