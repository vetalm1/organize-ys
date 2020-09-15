<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->params['breadcrumbs'][] = $unit['name'];
?>

<?=\app\widgets\Alert::widget() ?>

<h2><?=$unit['name']; ?></h2>

<a href="<?= Url::to(['unit/view', 'id' => $unit->id, 'busy'=>0]) ?>"
       class="btn <?php if($unit->busy==1) {echo 'btn-default';} else {echo 'btn-success';} ?>">Сейчас свободно</a>
<a href="<?= Url::to(['unit/view', 'id' => $unit->id, 'busy'=>1]) ?>"
       class="btn <?php if($unit->busy==1) {echo 'btn-warning';} else {echo 'btn-default';} ?>">Сейчас Занято</a>

<span style="padding: 0 0 0 70px;"></span>  <!-- +++Убереги меня верстальщик от говнокода-->
<a href="#" class="btn btn-primary">Освободится через - </a> <input type="text" style="width: 30px;"> <span>мин.</span>
<br><br>

<p class="panel panel-default "></p>
<div class="row ">

   <div class="col-md-2">
      <br>
      <?php $form = ActiveForm::begin([
            'method' => 'post',
            'action' => ['unit/add-day'],
            'options' => ['class' => ''],]); ?>

        <?=$form->field($model, 'date')->input('date', ['value' => date('Y-m-d'),])
                                                 ->label(false, ['style'=>'display:none']);?>
        <div class="row ">
            <div class="col-md-6" data-toggle="tooltip" title="Введите время">
            <?=$form->field($model, 'start_time')->textInput(['value' => '09:00'])
                                                          ->label(false, ['style'=>'display:none']) ?>
            </div>
            <div class="col-md-6">
            <?=$form->field($model, 'end_time')->textInput(['value' => '10:00'])
                                                        ->label(false, ['style'=>'display:none']) ?>
            </div>
        </div>

        <?=$form->field($model, 'description')->textarea(['rows'=>2, 'placeholder' => 'примечание'])
                                                       ->label(false, ['style'=>'display:none']) ?>

        <?= Html::submitButton('Добавить запись', ['class' => 'btn btn-primary center-block',]) ?>
      <?php ActiveForm::end(); ?>

       <br><br>
       <a class="btn btn-default" href="<?= Url::to(['unit/select',
           'date' => date('Y-m-d'),
           'unit_name' => $unit['name'] ])
       ?>">Сгенерировать день</a>
   </div>

   <div class="col-md-3 col-md-offset-1">
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



<!--        --><?//= $form->field($model, 'date', ['template' => "{label}\n{input}"])  //  {label}\n{input} = чтобы убрать class="help-block"
//                        ->input('date', ['value' => date('Y-m-d'), 'class' => 'form-control'])
//                        ->label(false, ['style'=>'display:none'])
//        ;?>

<br><br>
<p class="panel panel-default "></p>

<div class="row">

    <div class="col-md-6 "> <!--    col-md-offset-1-->
        <h4>Список записей на 5 ближайших дней </h4>
        <?php foreach ($data as $date) :?>
            <a class="label label-info" href="<?= Url::to(['unit/select', 'date' => date('Y-m-d', strtotime($date['start_time']))])?>">
                <?= date('Y-m-d', strtotime($date['start_time'])) ?>
            </a>  ::
            <a class="label label-primary" href="<?= Url::to(['unit/select', 'date' => $date['id']])?>">
                <?= date('H:i', strtotime($date['start_time'])).' - '
                .date('H:i', strtotime($date['end_time'])) ?>
            </a>
            <span class="text-success"> :: [ <?= $date['description'] ?> ]</span>
            <br>
        <?php endforeach; ?>
    </div>
</div>



<?php /* @var $this \yii\web\View */ echo ''; ?>
