<?php

namespace app\controllers;

use app\models\AddSchedule;
use app\models\AuditoriesSchedule;
use app\models\EditAuditory;
use app\models\EditGraph;
use app\models\EditGroup;
use app\models\EditSpec;
use app\models\EditSubject;
use app\models\EditTeacher;
use app\models\GroupSchedule;
use app\models\NewGraph;
use app\models\NewScheduleVersion;
use app\models\NewSubject;
use app\models\NewTarific;
use app\models\TeachersSchedule;
use Yii;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\CreateTeacher;
use app\models\NewAuditory;
use app\models\NewGroup;
use app\models\NewSpec;
use app\models\MyEducation;
use app\models\LayoutModel;
use app\models\UploadForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
		Yii::$app->auth->auth();
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
     * @inheritdoc
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }*/

    /**
     * Logout action.
     *
     * @return string

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
     }
     */
    /**
     * Displays contact page.
     *
     * @return string
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
    
    public function actionHello()
    {
        return $this->render('hello');
    }
    
    public function actionSchedule()
    {
        return $this->render('schedule');
    }
    public function actionReplacements()
    {
        return $this->render('replacements');
    }
    public function actionAdministration()
    {

        $session = Yii::$app->session;
        if (!isset($session->isActive))
        {
            $session->open();
        }
        return $this->render('administration');
    }
    public function actionNewteacher()
    {
        $CreateTeacher = new CreateTeacher();

        return $this->render('newteacher',
            ['form' => $CreateTeacher]
        );
    }
    public function actionNewauditory()
    {
        $form = new NewAuditory();

        return $this->render('newauditory',
            ['form' => $form]
        );
    }
    public function actionNewgroup()
    {
        $form = new NewGroup();

        return $this->render('newgroup',
            ['form' => $form]
        );
    }
    public function actionNewspec()
    {
        $form = new NewSpec();
        $session = Yii::$app->session;
        if (!isset($session->isActive))
        {
            $session->open();
        }

        return $this->render('newspec',
            ['form' => $form]
        );
    }
    public function actionNewscheduleversion()
    {
        $form = new NewScheduleVersion();

        return $this->render('newscheduleversion',
            ['form' => $form]
        );
    }
    public function actionNewsubject()
    {
        $form = new NewSubject();

        return $this->render('newsubject',
            ['form' => $form]
        );
    }
    public function actionNewgraph()
    {
        $form = new NewGraph();

        return $this->render('newgraph',
            ['form' => $form]
        );
    }
    public function actionAddschedule()
    {
        $form = new AddSchedule();

        return $this->render('addschedule',
            ['form' => $form]
        );
    }
    public function actionGroupschedule()
    {
        $form = new GroupSchedule();

        return $this->render('groupschedule',
            ['form' => $form]
        );
    }
    public function actionTeachersschedule()
    {
        $form = new TeachersSchedule();

        return $this->render('teachersschedule',
            ['form' => $form]
        );
    }
    public function actionAuditoriesschedule()
    {
        $form = new AuditoriesSchedule();

        return $this->render('auditoriesschedule',
            ['form' => $form]
        );
    }
    public function actionTarific()
    {
        $form = new NewTarific();

        return $this->render('tarific',
            ['form' => $form]
        );
    }
    public function actionEditauditory()
    {
        $form = new EditAuditory();

        return $this->render('editauditory',
            ['form' => $form]
        );
    }
    public function actionEditteacher()
    {
        $form = new EditTeacher();

        return $this->render('editteacher',
            ['form' => $form]
        );
    }
    public function actionEditgraph()
    {
        $form = new EditGraph();

        return $this->render('editgraph',
            ['form' => $form]
        );
    }
    public function actionEditgroup()
    {
        $form = new EditGroup();

        return $this->render('editgroup',
            ['form' => $form]
        );
    }
    public function actionEditspec()
    {
        $form = new EditSpec();

        return $this->render('editspec',
            ['form' => $form]
        );
    }
    public function actionEditsubject()
    {
        $form = new EditSubject();

        return $this->render('editsubject',
            ['form' => $form]
        );
    }
    public function actionEducation()
    {
        $form = new MyEducation();
        return $this->render('education',
            ['form' => $form]
        );
    }

    public function actionTask3()
    {
        return $this->render('task3');
    }
    public function actionCodethree()
    {
        $this->layout = 'empty';
        return $this->render('codethree');
    }


    public function actionTask4()
    {
        return $this->render('task4');
    }

    public function actionShto_eta1()
    {
        return $this->render('shto_eta1');
    }

    public function actionLook_prepod_tarific()
    {
        return $this->render('look_prepod_tarific');
    }
    public function actionTry()
    {
        $name =  Yii::$app->request->post("name");

        return $this->render('user', [
            'name' => $name
        ]);
    }
}
