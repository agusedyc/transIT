<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
?>
<div class="site-about">
    <div class="box box-default box-solid">
      <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode('Pengelola Trans IT USM') ?></h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body" style="">
        <div class="row">
          <?php foreach ($pembimbing as $value): ?>
          <div class="col-lg-3 col-xs-6">
              <div class="box box-widget widget-user">
                  <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username"><?= $value->pembimbing ?></h3>
                    <h5 class="widget-user-desc"><?= $value->jabatan ?></h5>
                    <h5 class="widget-user-desc"><?= $value->tlp ?></h5>
                  </div>
                  <div class="widget-user-image">
                    <img class="img-circle" style="width:128px; height:128px" src="<?= Yii::$app->request->hostInfo.'/'.$value->foto ?>" alt="<?= $value->pembimbing ?>">
                  </div>
                  <!-- <div class="box-footer">
                    <div class="row">
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <h5 class="description-header">3,200</h5>
                          <span class="description-text">SALES</span>
                        </div>
                      </div>
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <h5 class="description-header">13,000</h5>
                          <span class="description-text">FOLLOWERS</span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="description-block">
                          <h5 class="description-header">35</h5>
                          <span class="description-text">PRODUCTS</span>
                        </div>
                      </div>
                    </div>
                  </div> -->
                </div>        
          </div>        
          <?php endforeach ?>     
          </div>
      </div>
      </div>
</div>
