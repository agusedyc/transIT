<?php

namespace app\controllers;

use Yii;
use app\models\Jurnal;
use app\models\Pembimbing;
use yii\helpers\ArrayHelper;

class ReportController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$id = Yii::$app->user->id;
    	$jurnal = Jurnal::find(['user_id'=>$id])->one(); 
    	$list_pembimbing = ArrayHelper::map(Pembimbing::find()->asArray()->all(), 'id', 'pembimbing'); 

    	// echo '<pre>';
    	// print_r($this->getYear());
    	// echo '</pre>';

        return $this->render('index',[
            'jurnal' => $jurnal,
            'list_pembimbing' => $list_pembimbing,
            'list_month' => $this->getMonth(),
            'list_year' => $this->getYear(),
        ]);
    }

    public function actionDateRange()
    {
    	$id = Yii::$app->user->id;
    	$jurnal = Jurnal::find(['user_id'=>$id])->one(); 
    	$list_pembimbing = ArrayHelper::map(Pembimbing::find()->asArray()->all(), 'id', 'pembimbing'); 

    	// echo '<pre>';
    	// print_r($this->getYear());
    	// echo '</pre>';

        return $this->render('date-range',[
            'jurnal' => $jurnal,
            'list_pembimbing' => $list_pembimbing,
            'list_month' => $this->getMonth(),
            'list_year' => $this->getYear(),
        ]);
    }

    public function getMonth()
    {
    	$months = array();
		for ($i = 0; $i < 12; $i++) {
		    $timestamp = mktime(0, 0, 0, date('n') - $i, 1);
		    $months[date('n', $timestamp)] = date('F', $timestamp);
		}

		ksort($months);

		return $months;
    }

    public function getYear()
    {
    	$years = array();
		for ($i = 2013; $i <= date('Y'); $i++) {
		    $years[$i] = $i;
		}

		ksort($years);

		return $years;
    }

}
