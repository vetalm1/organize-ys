<?php


namespace app\controllers;


use app\models\Company;
use app\models\Unit;

class HomeController extends BaseController
{

    public function actionIndex()
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
        return $this->render('index', compact('list', 'model' ));

    }

}