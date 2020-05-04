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
                    'action' => ['report/report-tanggal'],
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
                        <?= Html::submitButton(Yii::t('user', 'Show'), ['class' => 'btn btn-block btn-success']) ?>
                        <br>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

