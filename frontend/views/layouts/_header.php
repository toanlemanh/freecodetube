<?php

use backend\assets\AppAsset;
use yii\bootstrap5\Dropdown;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\Helpers\Url;

?>
<header>
    <?php
  NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
//    navbar navbar-expand-md navbar-light shadow-sm bg-light fixed-top
    'options' => ['class' => 'navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top'],
//    'innerContainerOptions' => [
//        'class' => 'container-fluid'
//    ]
]);
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = [
        'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
        'url' => ['/site/logout'],
        'linkOptions' => [
            'data-method' => 'post'
        ]
    ];
}
?>
<!--  <form action="--><?php //echo Url::to(['/video/search']) ?><!--"-->
<!--        class="form-inline my-2 my-lg-0">-->
<!--    <input class="form-control mr-sm-2" type="search" placeholder="Search"-->
<!--           name="keyword"-->
<!--           value="--><?php //echo Yii::$app->request->get('keyword') ?><!--">-->
<!--    <button class="btn btn-outline-success my-2 my-sm-0">Search</button>-->
<!--  </form>-->
<?php
echo Nav::widget([
    'options' => ['class' => 'navbar-nav d-flex justify-content-end w-100'],
    'items' => $menuItems,
]);
NavBar::end();
?>
</header>

