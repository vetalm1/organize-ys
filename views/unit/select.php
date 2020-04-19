<?php
/* @var $this \yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<?php foreach ($model->list as $key=> $item) :?>
    <div class="form-inline ">
      с   <input type="text" class="form-control input-start<?= $key; ?>" style="width:100px" value="<?=$item[0]?>" >
      по  <input type="text" class="form-control input-end<?= $key; ?>" style="width:100px" value="<?=$item[1]?>" >
          <input type="text" class="form-control input-desc<?= $key; ?>" style="width:100px" placeholder="Имя" >

        <?php if ($item[3]!=1) :?>
            <div class="btn btn-primary add-to-base" data-key="<?= $key; ?>"
                 onclick="this.className = (this.className == 'btn btn-primary add-to-base' ? 'hidden' : 'primary')"
            >
            +
            </div>
        <?php endif; ?>

    </div>
<?php endforeach; ?>


<div class="row">
    <div class="col-md-3">
        (<?= $model->id?>)
<h1 class="date"><?= $model->date;?></h1>

<?php $form = ActiveForm::begin([
    'method' => 'post',
    'action' => ['unit/select'],
    //'options' => ['class' => 'form-inline'],
]); ?>

        <?= $form->field($model, 'workTime' )->textInput(['value' => $model->workTime]); ?>
        <?= $form->field($model, 'pause' )->textInput(['value' => $model->pause]); ?>
        <?= $form->field($model, 'period' )->textInput(['value' => $model->period]); ?>
        <?= $form->field($model, 'lunch' )->textInput(['value' => $model->lunch, 'style'=>'display:none'])->label(false, ['style'=>'display:none']); ?>

<?= Html::submitButton('Сгенерировать список', [
    'class' => 'btn btn-primary',
    'name'  => 'add',
]) ?>

<br><br> <a href="#" class="btn btn-success">Произвольный выбор</a>
<?php ActiveForm::end();  /* @var $this \yii\web\View */  ?>

    </div>
</div>


