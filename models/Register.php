<?php


namespace app\models;


use yii\db\ActiveRecord;

class Register extends ActiveRecord
{

    public static function tableName()
    {
        return 'register';
    }

    public function rules()
    {
        return [
            ['start_time',  'string'],
            ['end_time' , 'string'],
            [['description'], 'string']
        ];
    }

    public function attributeLabels()
    {
        return [
            'start_time' => 'ID',
            'start_time' => 'ID',

        ];
    }
}