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
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $model
 */

$this->title = Yii::t('user', 'Registrasi Jurnal');
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
                <?php $form = ActiveForm::begin([
                    // 'id' => 'profile-form',
                    // 'method' => 'post',
                    // 'action' => ['register-jurnal/index'],
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                        'labelOptions' => ['class' => 'col-lg-3 control-label'],
                    ],
                    // 'enableAjaxValidation' => true,
                    // 'enableClientValidation' => false,
                    // 'validateOnBlur' => false,
                ]); ?>  

                <div class="form-group">
                    <label class="col-lg-3 control-label">Pembimbing</label>
                    <div class="col-lg-9">
                        <?php 
                            echo Select2::widget([
                                'name' => 'pembimbing_1',
                                'data' => $list_pembimbing,
                                'value' => $jurnal->pembimbing_1,
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
                    <label class="col-lg-3 control-label">Print Date</label>
                    <div class="col-lg-9">
                        <?= DatePicker::widget([
							    'name' => 'from_date',
							    'value' => date('d-M-Y'),
							    'type' => DatePicker::TYPE_RANGE,
							    'name2' => 'to_date',
							    'value2' => date('d-M-Y'),
							    'pluginOptions' => [
							        'autoclose'=>true,
							        'format' => 'dd-M-yyyy'
							    ]
							]);
                         ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success']) ?>
                        <br>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

