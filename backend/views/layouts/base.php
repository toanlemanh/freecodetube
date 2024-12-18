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
//\Yii::$app->language = 'vi';
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="vh-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
<!--  Bug : fixed     -->
        <link rel="stylesheet" href= <?= Yii::getAlias('@web').'/css/fontawesome-6.6.0/css/all.min.css' ?> />

        <?php $this->head() ?>
    </head>
    <body class="h-100">
    <?php $this->beginBody() ?>

    <!-- All Pages have Header -->
    <?php echo $this->render('_header.php') ?>
    <?= $content ?>
    <?php $this->endBody() ?>
    </body>
    <script src=<?=Yii::getAlias('@web').'/js/app.js' ?>></script>
    </html>
<?php $this->endPage();

