<?php


namespace app\controllers;

use app\models\Register;
use app\models\Select;
use app\models\Unit;
use app\models\Unit_date;
use yii\web\HttpException;

class UnitController extends BaseController
{

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

    public function actionAddDay()
    {
        if (\Yii::$app->request->isPost) {
            $model = new Register();
            $model->load(\Yii::$app->request->post());
            $session = \Yii::$app->session;
            $model->unit_id = $session['currentUnit'];
            //$model->addDate();
            if ($model->save()){
                \Yii::$app->session->setFlash('success', 'Запись добавлена');
            } else {
                $errMsg = $model->getErrors();
                \Yii::$app->session->setFlash('warning', 'Запись не добавлена - '.$errMsg['start_time'][0]);
            }

            return $this->redirect(\Yii::$app->request->referrer);
        }
    }

    public function actionSelect($date=null, $unit_name=null)
    {
        $model = new Select();
        $session = \Yii::$app->session;
        $date ? $session['date'] = $date : false;
        $model->id = $session['currentUnit'];
        $model->date = $session['date'];
        $unit_name ? $session['unit_name'] = $unit_name : false;
        $model->unitName = $session['unit_name'];

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            $allRecordsUnit = Register::find()->where(['unit_id'=>$model->id])->asArray()->all();
            $model->generateList($allRecordsUnit);

            return $this->render('select', compact('model'));
        }

        return $this->render('select', compact('model'));
    }

    public function actionRegister()
    {
        $model = new Register();
        $session = \Yii::$app->session;
        $model->unit_id = $session['currentUnit'];

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (\Yii::$app->request->isAjax) {
            $model->load(\Yii::$app->request->post());
        }

        if ($model->save()){
           return  true;
        }


    }


}