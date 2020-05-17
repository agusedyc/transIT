<?php

namespace app\controllers;

use Yii;
use app\models\Article;
use app\models\Jurnal;
use app\models\Profile;
use app\models\Publication;
use app\models\searchs\ArticleSearch;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
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
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
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
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $user_id = Yii::$app->request->get('user_id');        
        $jurnal = Jurnal::find()->where(['user_id'=>$user_id])->one();
        $pub = Publication::findOne($id);
        $model = new Article();

        if ($model->load(Yii::$app->request->post())) {
            $model->document = UploadedFile::getInstance($model, 'document');

            if ($model->document && $model->validate()) {
                $path = 'uploads/article/'.'VOL'.$pub->vol.'-NO'.$pub->no.'-'.strtoupper(date('F', mktime(0, 0, 0, $pub->month_pub, 10))).'-'.$pub->years_pub;
                FileHelper::createDirectory($path);          
                $model->document->saveAs($path.'/'.$model->document->baseName . '.' . $model->document->extension);
                $model->document = $path.'/'.$model->document;  
                $model->pub_id = $id;
                $model->save();
                $jurnal->reviewed = '1';
                $jurnal->save(false);
                return $this->redirect(['publication/view', 'id' => $id]);    
            }
            
        }

        // echo '<pre>';
        // print_r($user_id);

        return $this->render('create', [
            'model' => $model,
            'jurnal' => $jurnal,
            'profile' => ArrayHelper::map(Profile::find()->where(['in','user_id',Jurnal::find()->select('user_id')->where(['reviewed'=>'0'])->all()])->asArray()->all(), 'user_id', 'name'),
            // 'profile' => Profile::find()->select('name')->asArray()->all(),
        ]);
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $user_id = Yii::$app->request->get('user_id');        
        $jurnal = Jurnal::find()->where(['user_id'=>$user_id])->one();
        $model = $this->findModel($id);
        $pub = Publication::findOne($model->pub_id);
        $old_doc = $model->document;
        if ($model->load(Yii::$app->request->post())) {
            $model->document = UploadedFile::getInstance($model, 'document');
            if ($model->document && $model->validate()) {
                $path = 'uploads/article/'.'VOL'.$pub->vol.'-NO'.$pub->no.'-'.strtoupper(date('F', mktime(0, 0, 0, $pub->month_pub, 10))).'-'.$pub->years_pub;
                FileHelper::createDirectory($path);          
                $model->document->saveAs(Yii::getAlias('@web').$path.'/'.$model->document->baseName . '.' . $model->document->extension);
                $model->document = $path.'/'.$model->document;  
            }else{
                $model->document = $old_doc;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
            'jurnal' => null,
            'profile' => ArrayHelper::map(Profile::find()->where(['in','user_id',Jurnal::find()->select('user_id')->where(['reviewed'=>'0'])->all()])->asArray()->all(), 'user_id', 'name'),
        ]);
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $this->findModel($id)->delete();

        return $this->redirect(['publication']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
