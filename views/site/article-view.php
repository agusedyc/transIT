<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
$data = $model; 
$this->title = 'Trans IT - Issue';
?>
<div class="site-issue">
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $model->title ?></h3>

      <div class="box-tools pull-right">
        <?= Html::a('<i class="fa fa-backward"></i> Back',['/site/issue'],['class'=>'btn btn-box-tool']) ?>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body">
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
                    return '<iframe src="https://docs.google.com/viewer?url='.Yii::$app->request->hostInfo.'/'.$data->document.'&embedded=true" style="width:95%; height:100%;" frameborder="0"></iframe>';
                },
            ],
            'issn',
            'doi',
            'viewed',
            'created_at:datetime',
            // 'updated_at:datetime',
            // 'created_by',
            // 'updated_by',
        ],
    ]) ?>
    </div>
</div>
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" align="center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= $model->title ?></h4>
      </div>
      <!-- <div class="modal-body" align="center"> -->
        <!-- <p>One fine body&hellip;</p> -->
        <iframe class="modal-body" src="https://docs.google.com/viewer?url=<?= Yii::$app->request->hostInfo.'/'.$model->document ?>&embedded=true" style="width:95%; height:100%;" frameborder="0"></iframe>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <!-- </div> -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
