<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jurnal */

$this->title = $model->user->profile->name.'('.$model->user->username.')';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jurnals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jurnal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'user_id',
            'judul',
            // 'jurnal',
            'abstrak:ntext',
            [
                'label' => 'Document',
                'attribute' => 'jurnal',
                'format' => 'raw',
                'value' => function($data){
                    return '<iframe src="https://docs.google.com/viewer?url='.Yii::$app->request->hostInfo.'/'.$data->jurnal.'&embedded=true" style="width:95%; height:500%;" frameborder="0"></iframe>';
                },
            ],
            'upload_ke',
            'tgl_upload',
            // 'pembimbing_1',
            [
                'label' => 'Pembimbing 1',
                'attribute' => 'pembimbing_1',
                'format' => 'raw',
                'value' => function($data){
                    return $data->pembimbingOne->pembimbing;
                },
            ],
            // 'pembimbing_2',
            [
                'label' => 'Pembimbing 2',
                'attribute' => 'pembimbing_2',
                'format' => 'raw',
                'value' => function($data){
                    return (isset($data->pembimbing_2)) ? $data->pembimbingTwo->pembimbing : null;
                },
            ],
            'nourutjurnal',
            'nojurnal',
            'vol',
            'tgl_jurnal',
            [
                'label' => 'Created By',
                'attribute' => 'created_by',
                'format' => 'raw',
                'value' => function($data){
                    return $data->user->profile->name;
                },
            ],
            [
                'label' => 'Updated By',
                'attribute' => 'updated_by',
                'format' => 'raw',
                'value' => function($data){
                    return $data->user->profile->name;
                },
            ],
            // 'created_by',
            // 'updated_by',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>  
