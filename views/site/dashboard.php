<?php

/* @var $this yii\web\View */

$this->title = 'Jurnal Transit FTIK USM';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Trans IT FTIK USM</h1>

        <p class="lead">Selamat Datang Jurnal Fakultas Teknologi Informasi dan Komunikasi Universitas Semarang.</p>
    </div>

    <div class="body-content">
        <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Statistik Jurnal Brdasarkan Kelompok</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <?php
                 foreach ($stats_kelompok as $var): ?>
                    <div class="col-lg-6 col-xs-6">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                              <h3><?= $var['jumlah']; ?> Jurnal</h3>

                              <h5><?= $var['kelompok']; ?></h5>
                            </div>
                            <div class="icon">
                              <i class="fa fa-bookmark-o"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                              Trans IT FTIK Universitas Semarang <!-- <i class="fa fa-arrow-circle-right"></i> -->
                            </a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            </div>
        </div>

        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Statistik Jurnal Brdasarkan Pembimbing</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <?php
                 foreach ($stats_pembimbing as $var): ?>
                    <div class="col-lg-6 col-xs-6">
                        <div class="small-box bg-green">
                            <div class="inner">
                              <h3><?= $var['counters']; ?> Jurnal</h3>

                              <h5><?= $var['pembimbing']; ?></h5>
                            </div>
                            <div class="icon">
                              <i class="fa fa-files-o"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                              Pembimbing <?= $var['status'] ?>  Trans IT FTIK Universitas Semarang <!-- <i class="fa fa-arrow-circle-right"></i> -->
                            </a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            </div>
        </div>
    
    </div>
</div>
