<?php



/* @var $this \yii\web\View */
/* @var $model \app\models\LoginForm */


use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="login-box">
    <div class="login-box-body">
        <p class="login-box-msg">Введите данные для авторизации</p>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username', ['template' =>
            "<div class='form-group has-feedback'> {input}<span class=\"glyphicon glyphicon-user form-control-feedback\"></span><div>{error}</div></div>",])
            ->textInput(['placeholder' => 'Login']) ?>

        <?= $form->field($model, 'password', ['template' =>
            "<div class='form-group has-feedback'> {input}<span class=\"glyphicon glyphicon-lock form-control-feedback\"></span><div>{error}</div></div>",])
            ->passwordInput(['placeholder' => 'Password']) ?>

        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox2">
                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "{label} {input}"
                    ]) ?>
                </div>
            </div>

            <div class="col-xs-4">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

        <a href="/" class="bold">На главную</a>

    </div>
</div>
