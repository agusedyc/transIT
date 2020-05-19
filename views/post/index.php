<?php

use hscstudio\mimin\components\Mimin;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\searchs\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
    <?= ((Mimin::checkRoute($this->context->id.'/create',true))) ? Html::a(Yii::t('app', 'Create Post'), ['create'], ['class' => 'btn btn-success']) : null ?>
</p>
<div class="box box-default box-solid post-index">
    <div class="box-header with-border">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body" style="">
        <?php Pjax::begin(); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                'title',
                [
                    'label' => 'Categories',
                    'attribute' => 'categories_id',
                    'format' => 'raw',
                    'value' => function($data){
                        return $data->categories->categories;
                    },
                ],
                // 'slug',
                // 'content:ntext',
                'created_at:datetime',
                //'updated_at',
                //'created_by',
                //'updated_by',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

        <?php Pjax::end(); ?>
    </div>
</div>
