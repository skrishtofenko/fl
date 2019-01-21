<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%sessions}}".
 *
 * @property int $id
 * @property int $film_id
 * @property string $session_time
 *
 * @property Films $film
 */
class Sessions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sessions}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['film_id'], 'required'],
            [['film_id'], 'default', 'value' => null],
            [['film_id'], 'integer'],
            [['session_time'], 'safe'],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Films::className(), 'targetAttribute' => ['film_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'film_id' => 'Film ID',
            'session_time' => 'Session Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Films::className(), ['id' => 'film_id'])->inverseOf('sessions');
    }
}
