<?php

use backend\assets\AppAsset;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Dropdown;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\Helpers\Html;
/** @var common\models\Language $model */
/** @var yii\bootstrap5\ActiveForm $form */
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
        echo Html::tag('div',Html::a(\Yii::t('app', 'Login'),['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex w-100 justify-content-end']]);
    } else {
        ?>
        <div class="dropdown d-flex w-100">
            <button class="btn btn-link dropdown-toggle text-decoration-none" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
               <?php echo \Yii::t('app', 'Create video')?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="../video/create">
                        <?php echo \Yii::t('app', 'Upload video') ?>
                    </a></li>
            </ul>
<!--Co gui theo form cua request khong - Co ? render lai page - Khong ? sau khi logout thi nn khong doi-->
            <?php $form = ActiveForm::begin([
                'options' => [ 'class' => 'w-25'],
            ]) ?>
<!--            --><?php //if (isset($form)) {echo $form->errorSummary($model);}  ?>
            <label>
                <select class="form-select" name="language" onchange="this.form.submit()">
                    <option value="vi" <?= Yii::$app->language === 'vi' ? 'selected' : '' ?>> Tiếng Việt </option>
                    <option value="en-US" <?= Yii::$app->language === 'en-US' ? 'selected' : '' ?>>English</option>
                </select>
            </label>
                    <!-- Add more languages here -->

<!--                <p>--><?php //echo yii::$app->language ?><!--</p>-->

            <?php ActiveForm::end() ?>
            <?php
            echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex w-100 justify-content-end'])
                .Html::submitButton(
                    \Yii::t('app', 'Logout').' (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link text-decoration-none text-danger ']
                )
                .Html::tag('img', '', ['class' => 'avatar rounded-circle','alt' =>  'avatar', 'src' => Yii::getAlias('@web').'/favicon.ico'] )
                . Html::endForm();
            }
            NavBar::end();
            ?>
        </div>
</header>

