<?php

use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
$request = Yii::$app->request;
// echo '<pre>';
// echo print_r();
// echo '</pre>';
?>
<?php if (empty($request->get('user_id')) && !strstr(Yii::$app->request->url, 'update')): ?>
<div class="box box-default box-solid">
    <div class="box-header with-border">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body" style="">
        <?php $form = ActiveForm::begin(['method' => 'GET']); ?>
        <?= $form->field($model, 'id', ['options' => ['value'=> $model->id] ])->hiddenInput()->label(false); ?>
        <div class="form-group">
            <label class="col-lg-3 control-label">Author</label>
            <div class="col-lg-9">
                <?php 
                    echo Select2::widget([
                        'name' => 'user_id',
                        'data' => $profile,
                        'value' => $request->get('user_id'),
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
            <?= Html::submitButton(Yii::t('app', 'Show'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>        
    </div>
</div>

<?php else: ?>
<div class="box box-default box-solid">
    <div class="box-header with-border">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body" style="">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <input type="hidden" name="user_id" value="<?= (!empty($jurnal)) ? $jurnal->id : '' ?>">
        <!-- <?= $form->field($model, 'pub_id')->textInput() ?> -->


        <?= $form->field($model, 'title')->textInput(['value'=> (!empty($jurnal)) ? $jurnal->judul : $model->title,'maxlength' => true]) ?>

        <!-- <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?> -->

        <?= $form->field($model, 'author')->textInput(['value'=> (!empty($jurnal)) ? $jurnal->user->profile->name : $model->author,'maxlength' => true]) ?>

        <?= $form->field($model, 'abstract')->textarea(['value'=> (!empty($jurnal)) ? $jurnal->abstrak : $model->abstract,'rows' => 6]) ?>

        <!-- <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?> -->

        <?= $form->field($model, 'document')->fileInput() ?>

        <?= $form->field($model, 'issn')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'doi')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'pages')->textInput(['maxlength' => true]) ?>

        <!-- <?= $form->field($model, 'viewed')->textInput() ?> -->

        <!-- <?= $form->field($model, 'created_at')->textInput() ?> -->

        <!-- <?= $form->field($model, 'updated_at')->textInput() ?> -->

        <!-- <?= $form->field($model, 'created_by')->textInput() ?> -->

        <!-- <?= $form->field($model, 'updated_by')->textInput() ?> -->

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            <?= Html::a(Yii::t('app', 'Kembali'), ['publication/view', 'id' => $request->get('id')], ['class' => 'btn btn-info'])?>
        </div>

        <?php ActiveForm::end(); ?>        
    </div>
</div>
<?php endif ?>
