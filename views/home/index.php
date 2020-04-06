<?php
/* @var $this \yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm; ?>

<?=\app\widgets\Alert::widget() ?>

<div class="row">
    <div class="col-md-8">
        <h1>Личный кабинет</h1>
        <div><?='' //$list[0]->id?> </div>
        <div><?='' //$list[0]->id?> </div>
        <h2>Компания "  <?= $list[0]->name?> "</h2>
        <h3>            <?= $list[0]->type_service ?> </h3>

        <?php $units = $list[0]->unit?>
        <?php foreach($units as $unit):?>
            <a href="<?= Url::to(['unit/view', 'id' => $unit->id]) ?>">
                <h3 class="btn btn-success"> <?= $unit->name ?> </h3>
            </a>
        <?php endforeach?>


        <div class="form-inline ">
                <H3 class="">Добавить Юнит(подразделение/)</H3>

                <?php $form = ActiveForm::begin([
                    'fieldConfig' => ['labelOptions' => ['class' => 'sr-only'],],
                ]); ?>

                <?= $form->field($model, 'name')->textInput(['placeholder' => 'Название Юнита']) ?>
                <?= $form->field($model, 'description')->textInput(['placeholder' => 'Описание']) ?>
                <div class="col-lg-2">
                   <?= Html::submitButton('Добавить', [
                        'class' => 'btn btn-primary ',
                        'name'  => 'add',
                        'style' => 'margin-left: -15px' //костыль, разобраться

                   ]) ?>
                </div>

                <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>