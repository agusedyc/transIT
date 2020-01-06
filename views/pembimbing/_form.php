<?php

use kartik\widgets\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pembimbing */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembimbing-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pembimbing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_active')->widget(SwitchInput::classname(), [
        'pluginOptions' => [
            'onText' => 'Active',
            'offText' => 'Deactive',
        ],
    ]); ?>

    <!-- <?= $form->field($model, 'status_active')->textInput() ?> -->

    <!-- <?= $form->field($model, 'created_at')->textInput() ?> -->

    <!-- <?= $form->field($model, 'updated_at')->textInput() ?> -->

    <!-- <?= $form->field($model, 'created_by')->textInput() ?> -->

    <!-- <?= $form->field($model, 'updated_by')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
