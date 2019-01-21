<?php
namespace console\models;

use yii\helpers\ArrayHelper;

class Films extends \common\models\Films
{
    public static function getIdsList() {
        return ArrayHelper::getColumn(self::find()->select('id')->asArray()->all(), 'id');
    }
}
