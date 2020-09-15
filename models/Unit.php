<?php


namespace app\models;


use yii\db\ActiveRecord;

class Unit extends ActiveRecord
{

    public static function tableName()
    {
        return 'unit';
    }

    public function getCompany(){
        return $this->hasOne(Company::class, ['id' =>'company_id']);
    }

    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id'=>'company_id',
            'name' => 'Название Юнита',
            'description' => 'Описание',
        ];
    }

}