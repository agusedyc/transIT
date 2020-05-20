<?php

use hscstudio\mimin\components\Mimin;
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-default box-solid post-form">
    <div class="box-header with-border">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body" style="">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <!-- <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?> -->

        <!-- <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?> -->

        <?php echo froala\froalaeditor\FroalaEditorWidget::widget([
            'model' => $model,
            'attribute' => 'content',
            'options' => [
                // html attributes
                'id'=>'content'
            ],
            'clientOptions' => [
                'toolbarInline'=> false,
                'height' => 600,
                'theme' => 'royal',//optional: dark, red, gray, royal
                // 'language' => 'en_gb' ,
                'toolbarButtons' => ['fullScreen','insertImage','insertFile','insertLink', 'bold', 'italic', 'underline', 'paragraphStyle', 'paragraphFormat','alignRight','alignCenter','alignLeft','alignJustify','formatOL','formatUL','outdent', 'indent','table'],
                'imageUploadParam' => 'file',
                'imageUploadURL' => \yii\helpers\Url::to(['post/upload']),
                'imageUploadParams' => [
                    Yii::$app->request->csrfParam => Yii::$app->request->getCsrfToken(),
                ],
                'imageManagerDeleteParams' => [
                    Yii::$app->request->csrfParam => Yii::$app->request->getCsrfToken(),
                ],
                'fileUploadParam' => 'file',
                'fileUploadURL' => \yii\helpers\Url::to(['post/upload']),
                'fileUploadParams' => [
                    Yii::$app->request->csrfParam => Yii::$app->request->getCsrfToken(),
                ],
                'fileManagerDeleteParams' => [
                    Yii::$app->request->csrfParam => Yii::$app->request->getCsrfToken(),
                ],
            ],
            'clientPlugins'=> ['fullscreen', 'paragraph_format', 'image','link','align','table','lists','file']
        ]); ?>

        <?= $form->field($model, 'categories_id')->widget(Select2::classname(), [
            'data' => $categories_list,
            'options' => ['placeholder' => 'Select ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>  

        <!-- <?= $form->field($model, 'created_at')->textInput() ?> -->

        <!-- <?= $form->field($model, 'updated_at')->textInput() ?> -->

        <!-- <?= $form->field($model, 'created_by')->textInput() ?> -->

        <!-- <?= $form->field($model, 'updated_by')->textInput() ?> -->

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            <?= ((Mimin::checkRoute($this->context->id.'/index',true))) ? Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-warning']) : null ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
