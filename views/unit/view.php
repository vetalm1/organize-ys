<?php
/* @var $this \yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\Html; ?>


<h2><?=$unit['name']; ?></h2>
<h4>Список записей на 5 ближайших дней </h4>
<?php foreach ($data as $date) :?>
    <a href="unit/select"><?= $date['date'] ?></a><br>
<?php endforeach; ?>

<?php $form = ActiveForm::begin([
    'method' => 'post',
    'action' => ['unit/add-day'],
    'options' => ['class' => 'form-inline'],
]); ?>
<div class="form-group">
<?= $form->field($model, 'date', ['template' => "{label}\n{input}"])  //  {label}\n{input} = чтобы убрать class="help-block"
                ->input('date', ['value' => date('Y-m-d'), 'class' => 'form-control'])
                ->label(false, ['style'=>'display:none']);?>
</div>

    <?= Html::submitButton('Добавить дату', [
        'class' => 'btn btn-default',
        'name'  => 'add',
    ]) ?>

<?php ActiveForm::end(); ?>



