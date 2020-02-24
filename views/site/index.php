<?php

use yii\widgets\LinkPager;

/* @var $this yii\web\View */

$this->title = 'Trans IT - Jurnal Transit FTIK USM';
?>
<div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?php //echo $this->title ?>
          <!-- <small>Example 2.0</small> -->
        </h1>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol> -->
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- <div class="callout callout-info">
          <h4>Tip!</h4>

          <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a
            sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular
            links instead.</p>
        </div> -->
        <!-- <div class="callout callout-danger">
          <h4>Warning!</h4>

          <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
            and the content will slightly differ than that of the normal layout.</p>
        </div> -->
        <?php foreach ($dataProvider->getModels() as $value): ?>
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $value->title; ?></h3>
              </div>
              <div class="box-body">
                <?php echo $value->content; ?>
              </div>
            </div>
        <?php endforeach ?>
        <?php echo LinkPager::widget([
                'pagination' => $dataProvider->pagination,
            ]);
         ?>
      </section>
      <!-- /.content -->
    </div>
