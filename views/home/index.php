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
            <a href="<?= Url::to(['home/index', 'id' => $unit->id]) ?>"><h3 class="btn btn-default glyphicon glyphicon-calendar" ></h3> </a>
        <?php endforeach?>


        <div class="form-inline ">
                <H3 class="">Добавить Юнит(подразделение)</H3>

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

<br>
<p class="panel panel-default "></p>
<?php foreach($units as $unit):?>
    <p class="bold text-warning">
        <?= ($unit->id==$id) ? $unit->name : '' ?>
    </p>

<?php endforeach?>

<div class="row ">
    <div class="col-md-3">
        <div class="calendar-wrap">
            <div class="calendar-weekdays">Пн.</div>
            <div class="calendar-weekdays">Вт.</div>
            <div class="calendar-weekdays">Ср.</div>
            <div class="calendar-weekdays">Чт.</div>
            <div class="calendar-weekdays">Пт.</div>
            <div class="calendar-weekdays">Сб.</div>
            <div class="calendar-weekdays">Вс.</div>

            <?php foreach ($calendar as $day) : ?>
                <div class="calendarItem <?=$day['workDay']?> <?=$day['anotherMonth']?> <?=$day['activity']?> ">
                    <a href="#">
                        <?=$day['dayNum']?>
                    </a>

                    <?php if (!empty($day['titleAndId'])) { $i=1;
                        foreach ($day['titleAndId'] as $titleAndId){
                            echo '<a href="#" class="calendarItem-activities">'.'<br></a>';
                            if (++$i>3){ echo "..."; break;}
                        }
                    } ?>
                </div>
            <?php endforeach ?>

        </div>
    </div>
</div>
