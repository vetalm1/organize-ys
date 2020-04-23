<?php


namespace app\controllers;


use app\models\Company;
use app\models\Unit;
use yii\web\HttpException;

class HomeController extends BaseController
{

    public function actionHomeIndex()
    {

        $freeUnits = Unit::find()->where(['busy'=>1])->all();


        return $this->render('index', compact('freeUnits'));

    }

    public function actionLk($id=null)
    {

        $model = new Unit();
        if ($model->load(\Yii::$app->request->post())) {
            $model->company_id = \Yii::$app->user->identity->id;
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', 'Добавлен новый Юнит');
                return $this->redirect('/home/index');
            }
        }
        $list=Company::find()->where(['id' => \Yii::$app->user->identity->id])->all();

        if ($id!=null) {
            $unit = Unit::findOne($id);
            if ($unit->company_id != \Yii::$app->user->identity->id) {
                throw new  HttpException(403, 'Ошибка доступа');
            }
        } else {
            $company = Unit::find()->where(['company_id'=>\Yii::$app->user->identity->id])->asArray()->all();
            $id = $company[0]['id'];
        }

        $month = date('n', time());
        $year = date('Y', time());
        $calendar = \Yii::$app->calendar->generateCalendar($month, $year, $id);

        return $this->render('lk', compact('list', 'model', 'calendar', 'id'));

    }

}