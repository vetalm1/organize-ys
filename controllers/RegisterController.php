<?php


namespace app\controllers;


use app\models\Company;
use yii\web\Controller;

class RegisterController extends Controller
{

    public function actionAddCompany()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect('/home/index');
        }

        $model = new Company();
        if ($model->load(\Yii::$app->request->post())) {
            $model->password = \Yii::$app->security->generatePasswordHash($model->password, 13);
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', 'Ваша компания зарегистрирована');
                return $this->redirect(['add-company']);
            }
            $model->password ='';
        }

        $list=Company::find()->all();
        return $this->render('create', compact('model', 'list'));

    }

}