<?php

use yii\helpers\Html;
use evgeniyrru\yii2slick\Slick;

/* @var $this yii\web\View */
$this->title = $founded['name'];

//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="btn-group" role="group" aria-label="...">
        <?php foreach ($details as $key => $detail): ?>
            <a href="<?= yii\helpers\Url::to(['/site/index', 'type' => $type, 'subtype' => $key]) ?>"
               data-toggle="tooltip"
               title="<?= $key ?>"
               data-placement="bottom"
               class="btn btn-default">
                   <?= $detail['name'] ?>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="pull-right">
        <button onclick="$('.mySlide').slick('slickPlay')" class="btn btn-primary"
                data-toggle="tooltip"
                title="Play"
                data-placement="bottom">
            <span class="glyphicon glyphicon-play"></span>
        </button>
        <button onclick="$('.mySlide').slick('slickPause')" id="slideStop" class="btn btn-primary"
                data-toggle="tooltip"
                title="Пауза"
                data-placement="bottom">
            <span class="glyphicon glyphicon-pause"></span>
        </button>
        <button onclick="$('.mySlide').slick('slickGoTo', 0)" id="slideStop" class="btn btn-primary"
                data-toggle="tooltip"
                title="Первый снимок"
                data-placement="bottom">
            <span class="glyphicon glyphicon-fast-backward"></span>
        </button>
        <button onclick="$('.mySlide').slick('slickPrev')" id="slideStop" class="btn btn-primary"
                data-toggle="tooltip"
                title="Предыдущий снимок"
                data-placement="bottom">
            <span class="glyphicon glyphicon-backward"></span>
        </button>
        <button onclick="$('.mySlide').slick('slickNext')" id="slideStop" class="btn btn-primary"
                data-toggle="tooltip"
                title="Следующий снимок"
                data-placement="bottom">
            <span class="glyphicon glyphicon-forward"></span>
        </button>
        <button onclick="$('.mySlide').slick('slickGoTo', <?= count($items) - 1 ?>)" id="slideStop" class="btn btn-primary"
                data-toggle="tooltip"
                title="Последний снимок"
                data-placement="bottom">
            <span class="glyphicon glyphicon-fast-forward"></span>
        </button>
    </div>
    <hr />
    <?php
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
            'autoplay' => false,
            'dots' => false,
            'autoplaySpeed' => 1000,
            'speed' => 10,
            'lazyLoad' => 'progressive', // ondemand, progressive
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

