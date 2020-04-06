<?php


namespace app\models;


use yii\base\Model;

class Select extends Model
{

    public $workTime;
    public $pause;
    public $period;
    public $lunch;

    public function rules()
    {
        return [
            [['workTime', 'pause', 'period', 'lunch'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'workTime' => 'Часы работы (9:00-18:00)',
            'pause' => 'Перерыв (мин.)',
            'period' => 'Длительность (мин.)',
            'lunch' => 'ВОбед(13:00-14:00)',
        ];
    }

}