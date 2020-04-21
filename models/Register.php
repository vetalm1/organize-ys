<?php


namespace app\models;


use yii\db\ActiveRecord;

class Register extends ActiveRecord
{
    public $date;

    public static function tableName()
    {
        return 'register';
    }

    public function addDate()
    {
        $this->start_time =  $this->date.''.$this->start_time.':00';
        $this->end_time =  $this->date.''.$this->end_time.':00';
    }

    public function rules()
    {
        return [
            ['start_time',  'string'],
            ['end_time' , 'string'],
            ['date' , 'string'],
            [['description'], 'string']
        ];
    }

    public function attributeLabels()
    {
        return [
            'start_time' => 'с',
            'end_time' => 'до',

        ];
    }
}