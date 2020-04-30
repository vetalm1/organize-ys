<?php


namespace app\controllers;

use app\controllers\actions\unit\AddDayAction;
use app\controllers\actions\unit\RegisterAction;
use app\controllers\actions\unit\SelectAction;
use app\models\Register;
use app\models\Unit;
use yii\web\HttpException;

class UnitController extends BaseController
{

    public function actions(){
        return [
            'register'=> ['class'=>RegisterAction::class /*'unitName'=>'Имя'*/],
            'select'=> ['class'=>SelectAction::class],
            'add-day'=> ['class'=>AddDayAction::class],
        ];
    }

    public function actionView($id, $busy=null)
    {
        $session = \Yii::$app->session;
        $session->open();
        $session['currentUnit'] = $id;
        $model = new Register();
        $unit = Unit::findOne($id);
        if ( $unit->company_id != \Yii::$app->user->identity->id) {
            throw new  HttpException(403, 'Ошибка доступа');
        }

        if ($busy!=null){
            $unit->busy =$busy;
            $unit->save();
        }

        $data = Register::find()->where(['unit_id'=>$id])->all();

        $month = date('n', time());
        $year = date('Y', time());
        $calendar = \Yii::$app->calendar->generateCalendar($month, $year, $id);

        return $this->render('view', compact('data', 'model', 'unit', 'calendar'));
    }


}