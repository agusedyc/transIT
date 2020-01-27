<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\searchs\PembimbingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pembimbings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembimbing-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Pembimbing'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="box box-warning">
<div class="box-header with-border">
  <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
  </div>
</div>
<div class="box-body">
  <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'pembimbing',
            [
                'label' => 'Pembimbing',
                'attribute' => 'pembimbing',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a($data->pembimbing, ['view', 'id' => $data->id]);
                },
            ],

            // 'status_active',
            [
                'label' => 'Status',
                'attribute' => 'status_active',
                'value' => function($model){
                    return $model->getStatus($model->status_active);
                },
            ],
            'created_at:datetime',
            // 'updated_at',
            //'created_by',
            //'updated_by',
            [
                'label' => 'Created By',
                'attribute' => 'created_by',
                'format' => 'raw',
                'value' =>  function($data){
                    return $data->userCreate->username;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
    <?php Pjax::end(); ?>

</div>
