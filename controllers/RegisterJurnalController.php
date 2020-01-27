<?php

namespace app\controllers;

use Yii;
use app\models\Jurnal;
use app\models\Pembimbing;
use app\models\User;
use dektrium\user\models\Profile;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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
            // $jurnal->load($request);
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
        $request = Yii::$app->request->post();      
        if (!empty($request)) {
            $jurnal->load($request);            
            $jurnal->save();
            $profile->load($request);            
            $profile->save();
        }

        return $this->render('index',[
            'profile' => $profile,
            'jurnal' => $jurnal,
            'list_pembimbing' => $list_pembimbing,
        ]);
    }

}
