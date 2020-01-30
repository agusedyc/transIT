<?php

namespace app\controllers;

use Yii;
use app\models\Publication;
use app\models\searchs\ArticleSearch;
use app\models\searchs\PublicationSearch;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * PublicationController implements the CRUD actions for Publication model.
 */
class PublicationController extends Controller
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
     * Lists all Publication models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PublicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Publication model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['pub_id'=>$id]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Publication model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Publication();

        if ($model->load(Yii::$app->request->post())) {
            $pub = $model;
            $model->file_cover = UploadedFile::getInstance($model, 'file_cover');
            if ($model->file_cover && $model->validate()) {
                $no_pub = 'VOL'.$pub->vol.'-NO'.$pub->no.'-'.strtoupper(date('F', mktime(0, 0, 0, $pub->month_pub, 10))).'-'.$pub->years_pub;
                $path = 'uploads/article/'.$no_pub;
                FileHelper::createDirectory($path);
                $model->file_cover->saveAs($path.'/'.$no_pub.'-cover.' . $model->file_cover->extension);
                $model->file_cover = $path.'/'.$no_pub.'-cover.' . $model->file_cover->extension;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Publication model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $pub = $model;

        if ($model->load(Yii::$app->request->post())) {
            $model->file_cover = UploadedFile::getInstance($model, 'file_cover');

            if ($model->file_cover && $model->validate()) {
                $no_pub = 'VOL'.$pub->vol.'-NO'.$pub->no.'-'.strtoupper(date('F', mktime(0, 0, 0, $pub->month_pub, 10))).'-'.$pub->years_pub;
                $path = 'uploads/article/'.$no_pub;
                FileHelper::createDirectory($path);
                $model->file_cover->saveAs($path.'/'.$no_pub.'-cover.' . $model->file_cover->extension);
                $model->file_cover = $path.'/'.$no_pub.'-cover.' . $model->file_cover->extension;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Publication model.
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
     * Finds the Publication model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Publication the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Publication::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
