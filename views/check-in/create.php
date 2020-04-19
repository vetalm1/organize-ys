<?php
/* @var $this \yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>

<?=\app\widgets\Alert::widget() ?>

<div class="row">
    <div class="col-md-4">

        <ul>
            <?php foreach ($list as $item ) : ?>
                <li><?= $item->id.'|'.$item->login.'|'.$item->name.'|'.$item->type_service ?></li>

            <?php endforeach; ?>
        </ul>

        <div class="login-box">
            <div class="login-box-body">
                <H3 class="login-box-msg">Введите данные для регистрации компании</H3>

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'name')->textInput() ?>
                <?= $form->field($model, 'type_service')->textInput() ?>
                <?= $form->field($model, 'login')->textInput() ?>
                <?= $form->field($model, 'password')->textInput() ?>


                <div class="col-xs-5">
                    <?= Html::submitButton('Регистрация', [
                        'class' => 'btn btn-primary btn-block btn-flat',
                        'name'  => 'login-button'
                    ]) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
        <!-- /.login-box-body -->
    </div>

</div>
</div>
