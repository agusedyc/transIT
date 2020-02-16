<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Trans IT - Issue';
?>
<div class="site-issue">
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Publication</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body">
      <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'label' => 'Publikasi',
                // 'attribute' => 'pembimbing',
                'format' => 'raw',
                'value' => function($data){
                    return '<h2>'.Html::a('Vol '.$data->vol.', No '.$data->no.'('.$data->years_pub.') : '.date('F', mktime(0, 0, 0, $data->month_pub, 10)).' '.$data->years_pub, ['issue-view', 'id' => $data->id]).'</h2><br>'.Html::img('@web/'.$data->file_cover, ['class' => 'img-responsive']);
                },
            ],
            // [
            //     'label' => '',
            //     'attribute' => 'pembimbing',
            //     'format' => 'raw',
            //     'value' => function($data){
            //         return Html::a('Vol '.$data->vol.', No '.$data->no.'('.$data->years_pub.') : '.date('F', mktime(0, 0, 0, $data->month_pub, 10)).' '.$data->years_pub, ['view', 'id' => $data->id]);
            //     },
            // ],
            // 'no',
            // 'vol',
            // 'month_pub',
            // 'years_pub',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>
</div>
