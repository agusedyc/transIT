<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Jurnal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jurnal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jurnal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abstrak')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'upload_ke')->textInput() ?>

    <?= $form->field($model, 'tgl_upload')->textInput() ?>

    <?= $form->field($model, 'pembimbing_1')->textInput() ?>

    <?= $form->field($model, 'pembimbing_2')->textInput() ?>

    <?= $form->field($model, 'nourutjurnal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nojurnal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_jurnal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
