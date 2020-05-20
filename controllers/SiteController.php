<?php

namespace app\controllers;

use Yii;
use app\models\Article;
use app\models\Categories;
use app\models\ContactForm;
use app\models\LoginForm;
use app\models\Publication;
use app\models\searchs\ArticleSearch;
use app\models\searchs\PostSearch;
use app\models\searchs\PublicationSearch;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    // public function actionMain()
    // {
    //      return $this->render('dashboard');
    // }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            $searchModel = new PostSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->where(['categories_id' => Categories::find()->where(['slug'=>'pengumuman'])->one()->id]);

            $searchModelPublication = new PublicationSearch();
            $dataProviderPublication = $searchModelPublication->search(Yii::$app->request->queryParams);
            $idPublication = $dataProviderPublication->query->select(['id'=>'MAX(`id`)'])->one();

            $searchModelArticle = new ArticleSearch();
            $dataProviderArticle = $searchModelArticle->search(Yii::$app->request->queryParams);
            $dataProviderArticle->query->where(['pub_id'=>$idPublication->id])->all();
            // echo '<pre>';
            // print_r($idPublication->id);
            // echo '</pre>';
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'publication' => Publication::findOne($idPublication),
                'dataProviderArticle' => $dataProviderArticle,
            ]);
        }else{
            return $this->render('dashboard');
        }
        
    }

    public function actionAlurJurnal()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['categories_id' => Categories::find()->where(['slug'=>Yii::$app->controller->action->id])->one()->id]);
        $dataProvider->setPagination(['pageSize' => 5]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTemplateJurnal()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['categories_id' => Categories::find()->where(['slug'=>Yii::$app->controller->action->id])->one()->id]);
        $dataProvider->setPagination(['pageSize' => 5]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionIssue()
    {
        // $publication = Publication::find()->all();
        // echo '<pre>';
        // print_r($publication);
        // echo '</pre>';

        $searchModel = new PublicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('issue', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIssueView($id)
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['pub_id'=>$id]);
        return $this->render('issue-view', [
            'model' => Publication::findOne($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionArticle($title)
    {
        $model = Article::find()->where(['slug'=>$title])->one();
        $model->viewed += 1;
        $model->save(false);  
        return $this->render('article-view', [
            'model' => $model,
        ]);
    }
}
