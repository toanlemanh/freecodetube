<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
$this->beginContent('@app/views/layouts/base.php');
?>

<main role="main" class="mt-5 d-flex h-100 ">
<!--  Side bar   -->
    <?php echo $this->render('_sidebar.php') ?>
    <div class="w-100 pt-4 mx-5">
        <?= $content ?>
    </div>
</main>
<?php
$this->endContent();
?>

