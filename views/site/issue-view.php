<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
$data = $model; 
$this->title = 'Trans IT - Issue';
?>
<div class="site-issue">
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title"><?= Html::a('Vol '.$data->vol.', No '.$data->no.'('.$data->years_pub.') : '.date('F', mktime(0, 0, 0, $data->month_pub, 10)).' '.$data->years_pub, ['issue']) ?></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body">
      <?php Pjax::begin(); ?>
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
                    'label' => 'Title',
                    'attribute' => 'title',
                    'format' => 'raw',
                    'value' => function ($data)
                    {
                      return Html::a($data->title,['/site/article','title'=>$data->slug]);  
                    },
                ],
                // 'slug',
                'author',
                //'abstract:ntext',
                //'keywords',
                //'document',
                //'issn',
                //'doi',
                //'viewed',
                //'created_at',
                //'updated_at',
                //'created_by',
                //'updated_by',

                // ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

        <?php Pjax::end(); ?>
    </div>
</div>
</div>
