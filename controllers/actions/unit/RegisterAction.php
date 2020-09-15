<?php


namespace app\controllers\actions\unit;


use app\models\Register;
use yii\base\Action;

class RegisterAction extends Action
{

    public function run()
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