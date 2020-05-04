<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\searchs\JurnalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Jurnals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jurnal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a(Yii::t('app', 'Create Jurnal'), ['create'], ['class' => 'btn btn-success']) ?> -->
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
            // 'user_id',
            [
                'label' => 'Nama',
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a($data->user->profile->name, ['view', 'id' => $data->id]);
                },
            ],
            [
                'label' => 'NIM',
                'attribute' => 'user_id',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a($data->user->username, ['view', 'id' => $data->id]);
                },
            ],
            // 'judul',
            [
                // 'label' => 'Pembimbing',
                'attribute' => 'judul',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a($data->judul, ['view', 'id' => $data->id]);
                },
                // 'value' => function($data){
                //     return "<a target=_blank href='http://view.officeapps.live.com/op/view.aspx?src=".\Yii::$app->request->hostInfo."/".$data->jurnal."'>".$data->judul."</a>";
                // },
            ],
            // 'jurnal',
            // 'abstrak:ntext',
            // [
                // 'label' => 'Pembimbing',
                // 'attribute' => 'abstrak',
                // 'contentOptions' => ['class' => 'text-wrap'],
                // 'format' => 'raw',
                // 'value' => function($data){
                //     return Html::a($data->judul, ['view', 'id' => $data->id]);
                // },
            // ],
            'upload_ke',
            //'tgl_upload',
            // 'pembimbing_1',
            [
                'label' => 'Pembimbing 1',
                'attribute' => 'pembimbing_1',
                // 'contentOptions' => ['class' => 'text-wrap'],
                'format' => 'raw',
                'value' => function($data){
                    return $data->pembimbingOne->pembimbing;
                },
            ],
            [
                'label' => 'Pembimbing 2',
                'attribute' => 'pembimbing_2',
                // 'contentOptions' => ['class' => 'text-wrap'],
                'format' => 'raw',
                'value' => function($data){
                    return (isset($data->pembimbing_2)) ? $data->pembimbingTwo->pembimbing : null;
                },
            ],
            // 'pembimbing_2',
            //'nourutjurnal',
            //'nojurnal',
            //'vol',
            //'tgl_jurnal',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
    

    <?php Pjax::end(); ?>

</div>
