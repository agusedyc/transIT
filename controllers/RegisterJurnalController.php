<?php

namespace app\controllers;

use Yii;
use app\models\Jurnal;
use app\models\Pembimbing;
use app\models\User;
use dektrium\user\models\Profile;
use mdm\autonumber\AutoNumber;
use yii\db\Expression;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class RegisterJurnalController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$id = Yii::$app->user->id;
    	$profile = Profile::findOne($id);
    	$list_pembimbing = ArrayHelper::map(Pembimbing::find()->asArray()->all(), 'id', 'pembimbing'); 
    	$jurnal = Jurnal::find(['user_id'=>$id])->one(); 
        // print_r(empty($jurnal));
    	if (empty($jurnal)) {
            $jurnal_create = new Jurnal;
    		$jurnal_create->user_id = $id;
    		$jurnal_create->save(false);
    	}
        $request = Yii::$app->request->post();    	
        if (!empty($request)) {
            // echo '<pre>';
            // print_r($request);
            // echo '</pre>';
            $jurnal->load($request);
            $jurnal->pembimbing_1 = $request['pembimbing_1'];
            $jurnal->pembimbing_2 = $request['pembimbing_2'];    
            $jurnal->save();
            $profile->load($request);            
            $profile->save(false);
            Yii::$app->session->setFlash('success', 'Data tersimpan');
        }

        return $this->render('index',[
            'profile' => $profile,
            'jurnal' => $jurnal,
            'list_pembimbing' => $list_pembimbing,
        ]);

        
    }

    public function actionUpload()
    {
        $id = Yii::$app->user->id;
        $profile = Profile::findOne($id);
        $list_pembimbing = ArrayHelper::map(Pembimbing::find()->asArray()->all(), 'id', 'pembimbing'); 
        $jurnal = Jurnal::find(['user_id'=>$id])->one(); 
        // $request = Yii::$app->request->post();      
        if (Yii::$app->request->post()) {
            $jurnal->jurnal = UploadedFile::getInstance($jurnal, 'jurnal');
            // echo '<pre>';
            // // print_r($request);
            // echo '<br>';
            // print_r($jurnal->jurnal);
            // echo '</pre>';
        // if (!is_null($jurnal->jurnal)) {
            if ($jurnal->jurnal && $jurnal->validate()) {
                $path = 'uploads/pre-journal/'.$jurnal->user->username;
                FileHelper::createDirectory($path);            
                $jurnal->jurnal->saveAs($path.'/'.$jurnal->jurnal->baseName . '.' . $jurnal->jurnal->extension);
                $jurnal->jurnal = $path.'/'.$jurnal->jurnal;  
                $jurnal->updateCounters(['upload_ke'=>1]);
                $jurnal->tgl_upload = new Expression('NOW()');
                (empty($jurnal->nourutjurnal)) ? $jurnal->nourutjurnal = AutoNumber::generate('{Y}????') : null ;
                $jurnal->save();
                return $this->redirect(['register-jurnal/upload']);
            }

        }

        return $this->render('upload',[
            'profile' => $profile,
            'jurnal' => $jurnal,
            'list_pembimbing' => $list_pembimbing,
        ]);
    }

    public function actionPrint()
    {
        $id = Yii::$app->user->id;
        $profile = Profile::findOne($id);
        $jurnal = Jurnal::find(['user_id'=>$id])->one(); 

        $mpdf = new \Mpdf\Mpdf([
            'format' => 'Legal',
            'margin_left' => 4,
            'margin_right' => 3,
            'margin_top' => 2,
            'margin_bottom' => 2,
        ]);
        $mpdf->SetWatermarkImage('uploads/assets/img/usm.jpg',0.1,'P',[0,50]);
        $mpdf->showWatermarkImage = true;
        $mpdf->WriteHTML($this->renderPartial('upload-validation', [
                'user' => Yii::$app->user,
                'profile' => $profile,
                'jurnal' => $jurnal,
                'logo' => 'uploads/assets/img/usm.jpg',
        ]));
        $mpdf->Output();
        exit;
    }

}
