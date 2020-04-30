<?php


namespace app\controllers\actions\unit;


use app\models\Register;
use yii\base\Action;

class AddDayAction extends Action
{

    public function run()
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

            return $this->controller->redirect(\Yii::$app->request->referrer);
        }
    }

}