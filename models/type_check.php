<?php


namespace app\models;
use yii\db\ActiveRecord;

class type_check extends ActiveRecord
{

    public static function tableName()
    {
        return '{{type_check}}';
    }
}