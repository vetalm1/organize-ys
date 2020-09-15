<?php
/* @var $this \yii\web\View */
/* @var $model app\models\Unit */
echo ''; ?>

<h1>Cейчас свободно</h1>

<?php foreach ($freeUnits as $unit) : ?>

    <p>
        <a href="" class="btn btn-primary">записаться</a>
        <a class="btn btn-info" href=""><?=$unit->company->name ?></a> | <?=$unit->name ?>
    </p>

<?php endforeach ?>
