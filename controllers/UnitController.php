<?php


namespace app\controllers;


use app\models\Select;
use app\models\Unit;
use app\models\Unit_date;

class UnitController extends BaseController
{

    public function actionView($id)
    {
        $session = \Yii::$app->session;
        $session->open();
        $session['currentUnit'] = $id;
        $model = new Unit_date();
        $unit = Unit::findOne($id);
        $data = Unit_date::find()->where(['unit_id'=>$id])->all();
        return $this->render('view', compact('data', 'model', 'unit'));
    }

    public function actionAddDay()
    {
        if (\Yii::$app->request->isPost) {
            $model = new Unit_date();
            $model->load(\Yii::$app->request->post());
            $session = \Yii::$app->session;
            $model->unit_id = $session['currentUnit'];
            $model->save();
            $data = Unit_date::find()->where(['unit_id'=>$session['currentUnit']])->all();
            return $this->render('view', compact('data', 'model' , 'unit'));
        }
    }

    public function actionSelect()
    {
        $model = new Select();
        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
        }

        return $this->render('select', compact('model'));
    }

    public function actionGenerateDay()
    {

    }


}