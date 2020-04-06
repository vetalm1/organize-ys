<?php


namespace app\models;


use Yii;
use yii\db\ActiveRecord;

class Unit_date extends ActiveRecord
{

    public static function tableName()
    {
        return 'unit_date';
    }

    public function rules()
    {
        return [

            [['date'], 'required' ],
            [['unit_id', 'date'], 'unique', 'targetAttribute' => ['unit_id', 'date'] ],

        ];
    }


}