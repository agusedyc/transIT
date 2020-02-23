<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

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
            'toolbarButtons' => ['fullscreen', 'bold', 'italic', 'underline', '|', 'paragraphFormat', 'insertImage'],
            'imageUploadParam' => 'file',
            'imageUploadURL' => \yii\helpers\Url::to(['post/upload']),
            'imageUploadParams' => [
                Yii::$app->request->csrfParam => Yii::$app->request->getCsrfToken(),
            ],
            'imageManagerDeleteParams' => [
                Yii::$app->request->csrfParam => Yii::$app->request->getCsrfToken(),
            ],
        ],
        'clientPlugins'=> ['fullscreen', 'paragraph_format', 'image']
    ]); ?>

    <!-- <?= $form->field($model, 'created_at')->textInput() ?> -->

    <!-- <?= $form->field($model, 'updated_at')->textInput() ?> -->

    <!-- <?= $form->field($model, 'created_by')->textInput() ?> -->

    <!-- <?= $form->field($model, 'updated_by')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
