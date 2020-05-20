<?php

use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Categories */

$this->title = $model->categories;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<p>
    <?= ((Mimin::checkRoute($this->context->id.'/update',true))) ? Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) : null ?>
    <?= ((Mimin::checkRoute($this->context->id.'/delete',true))) ? Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ],
    ])  : null  ?>
    <?= ((Mimin::checkRoute($this->context->id.'/index',true))) ? Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-warning']) : null ?>
</p>
<div class="box box-default box-solid categories-view">
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
                'id',
                'categories',
                'slug',
                'created_at:datetime',
                // 'updated_at',
                // 'created_by',
                // 'updated_by',
            ],
        ]) ?>
    </div>
</div>