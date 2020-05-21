<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <!-- <p>
        This is the About page. You may modify the following file to customize its content:
    </p> -->

    <!-- <code><?= __FILE__ ?></code> -->
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
