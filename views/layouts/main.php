<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Meteo;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <link href="/css/forecast_icons/flaticon.css"  rel="stylesheet" type="text/css" >

    </head>
    <body>

        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->params['siteName'],
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels' => false,
                'items' => [
                    ['label' => '<span class="flaticon-rain63"></span> Осадки',
                        'url' => ['/site/index', 'type' => Meteo::TYPE_RAINFALL]
                    ],
                    ['label' => '<span class="flaticon-thermometer30"></span> Температура',
                        'url' => ['/site/index', 'type' => Meteo::TYPE_TEMPERATURE]],
                    ['label' => '<span class="flaticon-humidity"></span> Влажность',
                        'url' => ['/site/index', 'type' => Meteo::TYPE_HUMIDITY]],
                    ['label' => '<span class="flaticon-windy9"></span> Ветер',
                        'url' => ['/site/index', 'type' => Meteo::TYPE_WIND]],
                    ['label' => '<span class="flaticon-cloudy46"></span> Облачность',
                        'url' => ['/site/index', 'type' => Meteo::TYPE_OVERCAST]],
                    ['label' => '<span class="flaticon-cloudy49"></span> Метеограмма',
                        'url' => ['/site/index', 'type' => Meteo::TYPE_METEOGRAMMA]],
                ],
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">
                    &copy;
                    <?= Yii::$app->params['siteName'] ?>
                    ,&nbsp;
                    <?= date('Y') ?>
                </p>
                <!--<p class="pull-right"><?php // echo Yii::powered()                                    ?></p>-->
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
