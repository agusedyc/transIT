<?php

use kartik\widgets\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pembimbing */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembimbing-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'pembimbing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jabatan')->textInput() ?>

    <?= $form->field($model, 'tlp')->textInput() ?>

    <small class="label pull-right bg-orange">Only .jpg .jpeg</small>
                <?= $form->field($model, 'foto')->fileInput() ?>

    <!-- <?= $form->field($model, 'status_active')->widget(SwitchInput::classname(), [
        'pluginOptions' => [
            'onText' => 'Active',
            'offText' => 'Deactive',
        ],
    ]); ?> -->

    <!-- <?= $form->field($model, 'created_at')->textInput() ?> -->

    <!-- <?= $form->field($model, 'updated_at')->textInput() ?> -->

    <!-- <?= $form->field($model, 'created_by')->textInput() ?> -->

    <!-- <?= $form->field($model, 'updated_by')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
