<?php

use backend\assets\AppAsset;
use yii\bootstrap5\Dropdown;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\Helpers\Html;

AppAsset::register($this);
?>
<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
//        'brandImage' => Yii::getAlias('@web') . '/images/logo.png',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-light shadow-sm bg-light fixed-top',
        ],
    ]);

    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex w-100 justify-content-end']]);
    } else {
        ?>
        <div class="dropdown d-flex w-100 justify-content-end">
            <button class="btn btn-link dropdown-toggle text-decoration-none" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
               Create video
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="../video/create">Upload Video</a></li>
            </ul>
            <?php
            echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex w-100 justify-content-end'])
                .Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link text-decoration-none text-danger ']
                )
                .Html::tag('img', '', ['class' => 'avatar rounded-circle','alt' =>  'avatar', 'src' => Yii::getAlias('@web').'/favicon.ico'] )
                . Html::endForm();
            }
            NavBar::end();
            ?>
        </div>
</header>

