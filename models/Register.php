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

    public function rules()
    {
        return [
            ['start_time',  'string', 'max'=>5 ],
            ['start_time',  'isInDB'],
            ['end_time' , 'string'],
            ['date' , 'string'],
            //[['start_time', 'unit_id'], 'unique','targetAttribute' => ['start_time', 'unit_id']],
            [['description'], 'string']
        ];
    }

    public function isInDB()
    {
        $start = $this->date.' '.$this->start_time.':00';
        $end = $this->date.' '.$this->end_time.':00';

        $data = Register::find()
            ->andWhere('start_time <=:start ', [':start' =>$end] )
            ->andWhere('end_time >=:end ', [':end' =>$start] )
            ->andWhere('unit_id =:unit_id ', [':unit_id' =>$this->unit_id] )
            ->createCommand()
            ->queryAll();
        if (!empty($data)){
            $this->addError('start_time', '( Данное время уже занято )');
        }

    }

    public function beforeSave($insert)
    {
        $this->start_time =  $this->date.' '.$this->start_time.':00';
        $this->end_time =  $this->date.' '.$this->end_time.':00';
        return parent::beforeSave($insert);
    }

    public function attributeLabels()
    {
        return [
            'start_time' => 'с',
            'end_time' => 'до',

        ];
    }
}