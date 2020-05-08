<?php

use hscstudio\mimin\components\Mimin;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Publication */

// $this->title = $model->id;
$this->title = 'Vol '.$model->vol.', No '.$model->no.'('.$model->years_pub.') : '.date('F', mktime(0, 0, 0, $model->month_pub, 10)).' '.$model->years_pub;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Publications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?php Pjax::begin(); ?>
<div class="publication-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= ((Mimin::checkRoute($this->context->id.'/delete',true))) ? Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) : null ?>
        <?= ((Mimin::checkRoute($this->context->id.'/update',true))) ? Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) : null ?>
        <?= ((Mimin::checkRoute('article/create',true))) ? Html::a(Yii::t('app', 'Create Article'), ['article/create', 'id' => $model->id], ['class' => 'btn btn-success']) : null ?>
        <?= ((Mimin::checkRoute($this->context->id.'/index',true))) ? Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-warning']) : null ?>
    </p>

<div class="box box-success box-solid">
<div class="box-header with-border">
  <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
  </div>
</div>
<div class="box-body" style="">
  <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'no',
            // 'vol',
            // [
            //     'label' => 'Publikasi',
            //     'attribute' => 'month_pub',
            //     'value' => date('F', mktime(0, 0, 0, $model->month_pub, 10)),
            // ],
            // 'years_pub',
            [
                'label' => 'Cover Publikasi',
                'attribute' => 'file_cover',
                'format' => 'raw',
                'value' => Html::img('@web/'.$model->file_cover, ['width' => '310','height' => '439']),
            ],
            'created_at:datetime',
            'updated_at:datetime',
            // 'created_by',
            // 'updated_by',
        ],
    ]) ?>
</div>
</div>

<div class="box box-default box-solid">
<div class="box-header with-border">
  <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
  </div>
</div>
<div class="box-body" style="">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'pub_id',
            // 'title',
            [
                // 'label' => 'Title',
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a($data->title, ['article/view', 'id' => $data->id]);
                },
            ],
            // 'slug',
            'author',
            //'abstract:ntext',
            // 'keywords',
            //'document',
            'issn',
            // 'doi',
            'viewed',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',

            // [
            // 'class' => 'yii\grid\ActionColumn',
            // 'template' => '{view} {update} {delete} {myButton}',  // the default buttons + your custom button

            // ]
        ],
    ]); ?>

    
</div>
</div>


</div>
<?php Pjax::end(); ?>
