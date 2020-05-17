<?php

use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
// $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= ((Mimin::checkRoute($this->context->id.'/update',true))) ? Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) : null ?>
        <?= ((Mimin::checkRoute($this->context->id.'/delete',true))) ?  Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) : null ?>
        <?= ((Mimin::checkRoute('publication/view',true))) ?  Html::a(Yii::t('app', 'Back'), ['publication/view', 'id' => $model->pub_id], ['class' => 'btn btn-warning']) : null ?>
    </p>

    <div class="box box-warning">
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
                        // 'pub_id',
                        'title',
                        // 'slug',
                        'author',
                        'abstract:ntext',
                        'keywords',
                        // 'document',
                        [
                            'label' => 'Document',
                            // 'attribute' => 'document',
                            'format' => 'raw',
                            'value' => function($data){
                                return '<iframe src="https://docs.google.com/viewer?url='.Yii::$app->request->hostInfo.'/'.$data->document.'&embedded=true" style="width:95%; height:500%;" frameborder="0"></iframe>';
                            },
                        ],
                        'issn',
                        'doi',
                        'pages',
                        'viewed',
                        'created_at:datetime',
                        'updated_at:datetime',
                        // 'created_by',
                        // 'updated_by',
                    ],
                ]) ?>
            </div>
          </div>


</div>

