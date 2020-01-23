<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\JurnalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jurnal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'judul') ?>

    <?= $form->field($model, 'jurnal') ?>

    <?= $form->field($model, 'abstrak') ?>

    <?php // echo $form->field($model, 'upload_ke') ?>

    <?php // echo $form->field($model, 'tgl_upload') ?>

    <?php // echo $form->field($model, 'pembimbing_1') ?>

    <?php // echo $form->field($model, 'pembimbing_2') ?>

    <?php // echo $form->field($model, 'nourutjurnal') ?>

    <?php // echo $form->field($model, 'nojurnal') ?>

    <?php // echo $form->field($model, 'vol') ?>

    <?php // echo $form->field($model, 'tgl_jurnal') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
