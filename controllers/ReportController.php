<?php

namespace app\controllers;

use Yii;
use app\models\Jurnal;
use app\models\Pembimbing;
use dektrium\user\models\User;
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

    public function actionReportPembimbing()
    {
        $post = Yii::$app->request->post();
        $reportPembimbing = Jurnal::find()
        ->where(['between','tgl_upload',date('Y-m-d H:i:s',strtotime($post['from_date'])),date('Y-m-d H:i:s',strtotime($post['to_date']))])
        ->where(['pembimbing_1'=>$post['pembimbing']])
        ->all();
        // return $this->renderPartial('report-jurnal', [
        //         'user' => Yii::$app->user,
        //         'report' => $reportPembimbing,
        //         'logo' => 'uploads/assets/img/usm.jpg',
        // ]);
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'Legal',
            'orientation' => 'L',
            'margin_left' => 4,
            'margin_right' => 3,
            'margin_top' => 2,
            'margin_bottom' => 2,
        ]);
        // $mpdf->SetWatermarkImage('uploads/assets/img/usm.jpg',0.1,'P',[0,50]);
        // $mpdf->showWatermarkImage = true;
        $mpdf->WriteHTML($this->renderPartial('report-jurnal', [
                'date_from' => $post['from_date'],
                'date_to' => $post['to_date'],
                'report' => $reportPembimbing,
                'logo' => 'uploads/assets/img/usm.jpg',
                'user' => User::findOne(Yii::$app->user->id)->profile->name,
        ]));
        $mpdf->Output();
        exit;

        // echo '<pre>';
        // print_r($post);
        // echo '<br>';
        // print_r($reportPembimbing);
        // echo date('Y-m-d H:i:s',strtotime($post['from_date']));
        // echo '</pre>';
    }

    public function actionReportTanggal()
    {
        $post = Yii::$app->request->post();
        $reportPembimbing = Jurnal::find()
        ->where(['between','tgl_upload',date('Y-m-d H:i:s',strtotime($post['from_date'])),date('Y-m-d H:i:s',strtotime($post['to_date']))])
        ->all();

        $mpdf = new \Mpdf\Mpdf([
            'format' => 'Legal',
            'orientation' => 'L',
            'margin_left' => 4,
            'margin_right' => 3,
            'margin_top' => 2,
            'margin_bottom' => 2,
        ]);
        // $mpdf->SetWatermarkImage('uploads/assets/img/usm.jpg',0.1,'P',[0,50]);
        // $mpdf->showWatermarkImage = true;
        $mpdf->WriteHTML($this->renderPartial('report-jurnal', [
                'date_from' => $post['from_date'],
                'date_to' => $post['to_date'],
                'report' => $reportPembimbing,
                'logo' => 'uploads/assets/img/usm.jpg',
                'user' => User::findOne(Yii::$app->user->id)->profile->name,
        ]));
        $mpdf->Output();
        exit;
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
