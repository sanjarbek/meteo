<?php

use yii\helpers\Html;
use evgeniyrru\yii2slick\Slick;

/* @var $this yii\web\View */
$this->title = 'List of images';

//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <button onclick="$('.mySlide').slick('slickPlay')" class="btn btn-primary">
        <span class="glyphicon glyphicon-play"></span>
    </button>
    <button onclick="$('.mySlide').slick('slickPause')" id="slideStop" class="btn btn-primary">
        <span class="glyphicon glyphicon-pause"></span>
    </button>
    <button onclick="$('.mySlide').slick('slickPrev')" id="slideStop" class="btn btn-primary">
        <span class="glyphicon glyphicon-arrow-left"></span>
    </button>
    <button onclick="$('.mySlide').slick('slickNext')" id="slideStop" class="btn btn-primary">
        <span class="glyphicon glyphicon-arrow-right"></span>
    </button>

    <?php
    $items = [];

    $dirPath = Yii::getAlias('wrf-pics') . '/2015-02-25-12';
    $dir = $dirPath;
    $files = scandir($dir);
    sort($files, SORT_NATURAL);

    $regexp = "/^pr_.*/";

    foreach ($files as $filename) {
        if (!($filename == "." || $filename == "..") && preg_match($regexp, $filename)) {
            $items[] = Html::img($dirPath . '/' . $filename, ['class' => 'img-responsive']);
        }
    }

//    if (count($items) == 0) {
//        $items[ ] = Html::a(Yii::$app->imageCache->thumb($model->getMainImagePath(), 'thumb', [
//                    'class' => 'img-thumbnail img-responsive'
//                ]), $model->getMainImagePath(), [
//                'rel' => 'prettyPhoto[pp_gal]'
//        ]);
//    }

    echo Slick::widget([
//        'id' => 'mySlide',
        // HTML tag for container. Div is default.
        'itemContainer' => 'div',
        // HTML attributes for widget container
        'containerOptions' => ['class' => 'mySlide'],
        // Items for carousel. Empty array not allowed, exception will be throw, if empty
        'items' => $items,
        // HTML attribute for every carousel item
//        'itemOptions' => [
//            'class' => '',
//            'style' => ''
//    ],
        // settings for js plugin
        // @see http://kenwheeler.github.io/slick/#settings
        'clientOptions' => [
            'autoplay' => true,
            'dots' => false,
            'autoplaySpeed' => 1000,
            'speed' => 10,
            'lazyLoad' => 'ondemand', // ondemand, progressive
            'adaptiveHeight' => true,
            'pauseOnHover' => false,
//            'useCSS' => true,
            'fade' => true,
            'cssEase' => 'linear',
//            'cssTransitions' => false,
//            'arrows' => true,
            'centerMode' => true,
            'slidesToShow' => 1,
//            'slidesToScroll' => 1,
        // note, that for params passing function you should use JsExpression object
//                                    'onAfterChange' => new JsExpression('function() {console.log("The cat has shown ")}'),
        ],
    ]);
    ?>

</div>

