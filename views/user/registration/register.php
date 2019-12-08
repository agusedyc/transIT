<?php
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">
    <div class="login-logo">    
        <a href="#"><b>Trans</b>IT</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

       <?php $form = ActiveForm::begin([
                    'id' => 'register-form',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                ]); ?>
                <?= $form->field($model, 'item_name')->widget(Select2::className(), [
                    'data' => $list_role,
                    'hideSearch' => true,
                    // 'options' => ['placeholder' => 'Change'],
                    // 'readonly' => true,
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]) ?>

                <?= $form->field($model, 'nim')->widget(\yii\widgets\MaskedInput::className(), ['mask' => 'G.999.99.9999',]) ?>

                <?= $form->field($model, 'full_name') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'username') ?>

                <?php if ($module->enableGeneratingPassword == false): ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                <?php endif ?>

                <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block']) ?>

                <?php ActiveForm::end(); ?>
            <p class="text-center">
            <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
        </p>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
