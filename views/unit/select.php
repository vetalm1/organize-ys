<?php
/* @var $this \yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="row">
    <div class="col-md-3">

<?php $form = ActiveForm::begin([
    'method' => 'post',
    'action' => ['unit/select'],
    //'options' => ['class' => 'form-inline'],
]); ?>

        <?= $form->field($model, 'workTime' )->textInput(['value' => '9:00-18:00']); ?>
        <?= $form->field($model, 'pause' )->textInput(['value' => '5']); ?>
        <?= $form->field($model, 'period' )->textInput(['value' => '60']); ?>
        <?= $form->field($model, 'lunch' )->textInput(['value' => '13:00-14:00']); ?>

<?= Html::submitButton('Сгенерировать список', [
    'class' => 'btn btn-primary',
    'name'  => 'add',
]) ?>

<br><br> <a href="#" class="btn btn-success">Произвольный выбор</a>
<?php ActiveForm::end(); ?>


    </div>
</div>

