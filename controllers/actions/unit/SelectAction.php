<?php


namespace app\controllers\actions\unit;


use app\models\Register;
use app\models\Select;
use yii\base\Action;

class SelectAction extends Action
{

    public function run($date=null, $unit_name=null)
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

            return $this->controller->render('select', compact('model'));
        }

        return $this->controller->render('select', compact('model'));

    }

}