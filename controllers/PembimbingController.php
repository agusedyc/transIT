<?php

namespace app\controllers;

use Yii;
use app\models\Pembimbing;
use app\models\searchs\PembimbingSearch;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * PembimbingController implements the CRUD actions for Pembimbing model.
 */
class PembimbingController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pembimbing models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PembimbingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pembimbing model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pembimbing model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pembimbing();

        if (Yii::$app->request->post()) {
            $model->foto = UploadedFile::getInstance($model, 'foto');
            if ($model->foto && $model->validate()) {
                $path = 'uploads/pembimbing/';
                FileHelper::createDirectory($path);            
                $model->foto->saveAs($path.'/'.$model->foto->baseName . '.' . $model->foto->extension);
                $model->foto = $path.'/'.$model->foto;
                // $model->status_active = $model->status_active==1?10:0;
                $model->load(Yii::$app->request->post());
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);    
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pembimbing model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // echo '<pre>';
        // print_r(Yii::$app->request->post());
        // echo '</pre>';
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            // $model->status_active = $model->status_active==1?10:0;
            $model->foto = UploadedFile::getInstance($model, 'foto');
            if ($model->foto && $model->validate()) {
                $path = 'uploads/pembimbing/';
                FileHelper::createDirectory($path);            
                $model->foto->saveAs($path.'/'.$model->foto->baseName . '.' . $model->foto->extension);
                $model->foto = $path.'/'.$model->foto;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);    
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pembimbing model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pembimbing model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pembimbing the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pembimbing::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionSetStatus($id)
    {
        $model = $this->findModel($id);
        if ($model->status_active == '10') {
            // Jikas Status Aktif
            $model->status_active = 0;
            $model->save();
            return $this->redirect(Yii::$app->request->referrer);
        }else{
            // Jikas Status Tidak Aktif
            $model->status_active = 10;
            $model->save();
            return $this->redirect(Yii::$app->request->referrer);
        }
    }
}
