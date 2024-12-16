<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

$this->beginContent('@app/views/layouts/base.php');
?>
    <main role="main" class="d-flex">
        <div class="w-100">
            <?= $content ?>
        </div>
    </main>
<?php $this->endContent(); ?>


