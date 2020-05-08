<?php

use hscstudio\mimin\components\Mimin;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\searchs\PublicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Publications');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(); ?>
<div class="publication-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?=((Mimin::checkRoute($this->context->id.'/create',true))) ? Html::a(Yii::t('app', 'Create Publication'), ['create'], ['class' => 'btn btn-success']) : null ?>
    </p>
<div class="box box-default collapsed-box">
<div class="box-header with-border">
  <h3 class="box-title">Search Publication</h3>

  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
    </button>
  </div>
</div>
<div class="box-body">
  <?php echo $this->render('_search', ['model' => $searchModel]); ?>
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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'label' => 'Publikasi',
                // 'attribute' => 'pembimbing',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a('Vol '.$data->vol.', No '.$data->no.'('.$data->years_pub.') : '.date('F', mktime(0, 0, 0, $data->month_pub, 10)).' '.$data->years_pub, ['view', 'id' => $data->id]);
                },
            ],
            // 'no',
            // 'vol',
            // 'month_pub',
            // 'years_pub',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    
</div>
</div>
    

    

</div>
<?php Pjax::end(); ?>
