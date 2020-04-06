<?php


namespace app\controllers;


use app\models\LoginForm;
use Yii;

class AuthController extends BaseController
{

    public $layout = 'auth';

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect('/home/index');
        }

        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/home/index');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect('/auth/login');
    }

}