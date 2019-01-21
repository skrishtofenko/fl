<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%films}}".
 *
 * @property int $id
 * @property string $title
 *
 * @property Sessions[] $sessions
 */
class Films extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%films}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 127],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSessions()
    {
        return $this->hasMany(Sessions::className(), ['film_id' => 'id'])->inverseOf('film');
    }
}
