<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="box box-default box-solid categories-form">
    <div class="box-header with-border">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body" style="">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'categories')->textInput(['maxlength' => true]) ?>

            <!-- <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?> -->

            <!-- <?= $form->field($model, 'created_at')->textInput() ?> -->

            <!-- <?= $form->field($model, 'updated_at')->textInput() ?> -->

            <!-- <?= $form->field($model, 'created_by')->textInput() ?> -->

            <!-- <?= $form->field($model, 'updated_by')->textInput() ?> -->

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>     
    </div>
</div>