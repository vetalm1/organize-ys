<?php
/* @var $this \yii\web\View */

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html; ?>


<h2><?=$unit['name']; ?></h2>
<h4>Список записей на 5 ближайших дней </h4>
<?php foreach ($data as $date) :?>
    <a href="<?= Url::to(['unit/select', 'date' => date('Y-m-d', strtotime($date['start_time']))])?>">
        <?= date('Y-m-d', strtotime($date['start_time'])).'::'  ?>
    </a>
    <a class="text-danger" href="<?= Url::to(['unit/select', 'date' => $date['id']])?>">
        <?= date('H:i', strtotime($date['start_time'])).' - '
        .date('H:i', strtotime($date['end_time'])) ?>
    </a>
    <br>
<?php endforeach; ?>

<?php $form = ActiveForm::begin([
    'method' => 'post',
    'action' => ['unit/add-day'],
    'options' => ['class' => 'form-inline'], ]); ?>

    <div class="form-group">
        <?= $form->field($model, 'date', ['template' => "{label}\n{input}"])  //  {label}\n{input} = чтобы убрать class="help-block"
                        ->input('date', ['value' => date('Y-m-d'), 'class' => 'form-control'])
                        ->label(false, ['style'=>'display:none'])
        ;?>
        <?=$form->field($model, 'start_time')->textInput(['placeholder' => '09:00']) ?>
        <?=$form->field($model, 'end_time')->textInput(['placeholder' => '09:00']) ?>
    </div>
    <?= Html::submitButton('Добавить дату', ['class' => 'btn btn-default',]) ?>
<?php ActiveForm::end(); ?>

<br>
<a href="<?= Url::to(['unit/view', 'id' => $unit->id, 'busy'=>0]) ?>"
   class="btn <?php if($unit->busy==1) {echo 'btn-default';} else {echo 'btn-success';} ?>">Сейчас свободно</a>
<a href="<?= Url::to(['unit/view', 'id' => $unit->id, 'busy'=>1]) ?>"
   class="btn <?php if($unit->busy==1) {echo 'btn-warning';} else {echo 'btn-default';} ?>">Сейчас Занято</a>
