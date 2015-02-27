<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;

class Meteo extends Model {

    const TYPE_RAINFALL = 1;
    const TYPE_TEMPERATURE = 2;
    const TYPE_HUMIDITY = 3;
    const TYPE_WIND = 4;
    const TYPE_OVERCAST = 5;
    const TYPE_METEOGRAMMA = 6;

    public static function getTypes() {
        return [
            self::TYPE_RAINFALL => 'Осадки',
            self::TYPE_TEMPERATURE => 'Температура',
            self::TYPE_HUMIDITY => 'Влажность',
            self::TYPE_WIND => 'Ветер',
            self::TYPE_OVERCAST => 'Облачность',
            self::TYPE_METEOGRAMMA => 'Метеограмма'
        ];
    }

    public static function getTypesDetails() {
        return [
            self::TYPE_RAINFALL => [
                'pr' => [
                    'code' => 'pr',
                    'name' => 'Часовые осадки',
                    'regexp' => "/^pr_*/"
                ],
                '6hpr' => [
                    'code' => '6hpr',
                    'name' => '6 часовые осадки',
                    'regexp' => "/^6hpr_*/"
                ],
            ],
            self::TYPE_TEMPERATURE => [
                't2m' => [
                    'code' => 't2m',
                    'name' => 'Температура',
                    'regexp' => '/^t2m_*/'
                ],
                't850' => [
                    'code' => 't850',
                    'name' => 'Температура от у. м. 1,5 км',
                    'regexp' => '/^t850_*/'
                ],
            ],
            self::TYPE_HUMIDITY => [
                'h700' => [
                    'code' => 'h700',
                    'name' => 'От земли 3 км влажность',
                    'regexp' => '/^h700_*/'
                ],
                'h500' => [
                    'code' => 'h500',
                    'name' => 'Влажность от земли 5 км',
                    'regexp' => '/^h500_*/'
                ],
                'h925' => [
                    'code' => 'h925',
                    'name' => 'Влажность относительная',
                    'regexp' => '/^h925_*/'
                ],
            ],
            self::TYPE_WIND => [
                'slp' => [
                    'code' => 'slp',
                    'name' => 'Давление над уровнем моря. 10метров',
                    'regexp' => '/^slp_*/'
                ],
            ],
            self::TYPE_OVERCAST => [
                'maxdbz' => [
                    'code' => 'maxdbz',
                    'name' => 'Отражение облачности',
                    'regexp' => '/^maxdbz_*/'
                ],
                'ot500' => [
                    'code' => 'ot500',
                    'name' => 'Слой воздуха от 5 км',
                    'regexp' => '/^ot500_*/'
                ],
                'cl' => [
                    'code' => 'cl',
                    'name' => 'Облачность',
                    'regexp' => '/^cl_*/'
                ],
                'cape' => [
                    'code' => 'cape',
                    'name' => 'Энергоустойчивость',
                    'regexp' => '/^cape_*/'
                ],
            ],
            self::TYPE_METEOGRAMMA => [
                'saint' => [
                    'code' => 'saint',
                    'name' => 'Метеограмма по местностям',
                    'regexp' => '/^Saint_*/'
                ]
            ]
        ];
    }

}
