<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pembimbing */

$this->title = Yii::t('app', 'Create Pembimbing');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pembimbings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembimbing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
