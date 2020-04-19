<?php


namespace app\models;


use yii\base\Model;

class Select extends Model
{

    public $id;
    public $date;
    public $workTime = '09:00-18:00';
    public $pause = '5';
    public $period = '60';
    public $lunch = '13:00-14:00';
    public $list=[];


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
            'lunch' => 'Обед(13:00-14:00)',
        ];
    }

    public function generateList($allRecordsUnit)
    {

        $start = substr($this->workTime, 0,5);
        $end =substr($this->workTime, 6,5);

        $this->list[] = [
            $start,
            date("H:i", strtotime('+'.$this->period.' minutes', strtotime($start))),
            $this->id,
            $this->existInDB($allRecordsUnit , $this->date.' '.$start.':00') ? '1' : ''
        ];

        $i=0;
        while ( substr($end,0,2)>substr($this->list[$i][1],0,2))
        {
            $i++;
            $addition = ((int)$this->period + (int)$this->pause)*$i;
            $time = strtotime(substr($this->workTime, 0,5));
                $this->list[] = [
                    date("H:i", strtotime('+' . $addition . ' minutes', $time)),
                    date("H:i", strtotime('+' . ($addition + (int)$this->period) . ' minutes', $time)),
                    $this->id,
                ];

             $dateTime =  $this->list[$i][0];
            if ($this->existInDB($allRecordsUnit , $this->date.' '.$dateTime.':00')) {
                $this->list[$i][] = '1';
            }
        }

    }

    public function existInDB($allRecordsUnit,$date)
    {
        foreach ($allRecordsUnit as $item){
            if ($item['start_time'] == $date){
                return true;
            }
        }
        return false;
    }


}