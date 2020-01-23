<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jurnal */

$this->title = Yii::t('app', 'Create Jurnal');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jurnals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jurnal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
