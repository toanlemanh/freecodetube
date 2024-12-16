<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Video $model */
$this->title = 'Update Video: ' . $model->title;
?>
<div class="video-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
