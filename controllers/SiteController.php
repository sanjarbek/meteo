<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Meteo;
use yii\helpers\Html;

class SiteController extends Controller {

    public function behaviors() {
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

    public function actions() {
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

    public function actionIndex($type = Meteo::TYPE_RAINFALL, $subtype = 'pr') {
        if (!array_key_exists($type, Meteo::getTypes())) {
            $type = Meteo::TYPE_RAINFALL;
            $subtype = 'pr';
        }

        $details = Meteo::getTypesDetails();
        if (!array_key_exists($subtype, $details[$type])) {
            $subtype = array_keys($details[$type])[0];
        }

        $founded = $details[$type][$subtype];
        $regexp = $founded['regexp'];

        $items = [];

        $dirPath = Yii::getAlias('wrf-pics');
        $dir = scandir($dirPath);
        rsort($dir);
        Yii::warning($dir[0]);
        $files = scandir($dirPath . '/' . $dir[0]);
        sort($files, SORT_NATURAL);

        foreach ($files as $filename) {
            if (!($filename == "." || $filename == "..") && preg_match($regexp, $filename)) {
                $items [] = Html::img($dirPath . '/' . $dir[0] . '/' . $filename, ['class' => 'img-responsive']);
            }
        }
        if (count($items) == 0) {
            $items[] = Html::tag('h3', 'Данные обновляются, попробуйте через некоторое время.');
        }

        return $this->render('list', [
                'items' => $items,
                'details' => $details[$type],
                'type' => $type,
                'founded' => $founded
        ]);
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                    'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                    'model' => $model,
            ]);
        }
    }

    public function actionAbout() {
        return $this->render('about');
    }

}
