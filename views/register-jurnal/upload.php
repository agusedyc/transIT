<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\helpers\Timezone;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $model
 */

$this->title = Yii::t('user', 'Upload Jurnal');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Html::encode($this->title) ?>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-lg-3 control-label"></label>
                    <div class="col-lg-9">
                        <?php if (empty($jurnal->jurnal)): ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Jurnal Belum Di Upload...!</h4>
                                Segera Upload File Jurnal.
                            </div>
                        <?php else: ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Jurnal Sudah Di Upload...!</h4>
                                Silahkan Cetak Bukti Upload <?= Html::a('Cetak Disini', ['/register-jurnal/print'], ['target'=>'_blank']); ?>.
                            </div>
                        <?php endif ?>
                    </div>
                </div> 
                <?php $form = ActiveForm::begin([
                    // 'id' => 'profile-form',
                    // 'method' => 'post',
                    // 'action' => ['register-jurnal/index'],
                    'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                        'labelOptions' => ['class' => 'col-lg-3 control-label'],
                    ],
                    // 'enableAjaxValidation' => true,
                    // 'enableClientValidation' => false,
                    // 'validateOnBlur' => false,
                ]); ?>

                <div class="form-group">
                    <label class="col-lg-3 control-label">NIM</label>
                    <div class="col-lg-9">
                        <?php $user = Yii::$app->user->identity; ?>
                        <?= Html::textInput('', $user->username, ['class' => 'form-control', 'disabled' => true]); ?>
                    </div>
                </div>                

                <?= $form->field($profile, 'name')->textInput(['class' => 'form-control', 'disabled' => true]) ?>

                <?= $form->field($jurnal, 'judul')->textInput(['class' => 'form-control', 'disabled' => true]) ?>

                <?= $form->field($jurnal, 'abstrak')->textarea(['rows' => '6', 'class' => 'form-control', 'disabled' => true]) ?>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Pembimbing 1</label>
                    <div class="col-lg-9">
                        <?php 
                            echo Select2::widget([
                                'name' => 'pembimbing_1',
                                'data' => $list_pembimbing,
                                'value' => $jurnal->pembimbing_1,
                                'disabled' => true,
                                'options' => [
                                    'placeholder' => 'Select ...',
                                    // 'class' => 'form-control',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                         ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Pembimbing 2</label>
                    <div class="col-lg-9">
                        <?php 
                            echo Select2::widget([
                                'name' => 'pembimbing_2',
                                'data' => $list_pembimbing,
                                'value' => $jurnal->pembimbing_2,
                                'disabled' => true,
                                'options' => [
                                    'placeholder' => 'Select ...',
                                    // 'class' => 'form-control',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                         ?>
                    </div>
                </div>

                <?= $form->field($jurnal, 'jurnal')->fileInput() ?>
                
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-block btn-success']) ?>
                        <br>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

