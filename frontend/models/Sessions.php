<?php
namespace frontend\models;

use frontend\models\forms\SearchFilms;

class Sessions extends \common\models\Sessions
{
    public $session_date;

    public function rules()
    {
        $rules = parent::rules();
        $rules[] = [['session_date'], 'safe'];
        return $rules;
    }

    public static function getBetween(SearchFilms $searchForm) {
        $startDateTime = date('Y-m-d H:i:s', max(strtotime($searchForm->from), time()));
        $endDateTime = $searchForm->to . ' 23:59:59';

        return Sessions::find()
            ->select([
                '(session_time)::date session_date',
                'array_agg(to_char(session_time, \'HH:MI\') ORDER BY session_time) session_time',
                'film_id'
            ])
            ->where(['between', 'session_time', $startDateTime, $endDateTime])
            ->orderBy(['session_date' => SORT_ASC])
            ->groupBy(['(session_time)::date', 'film_id'])
            ->asArray()
            ->all();
    }
}