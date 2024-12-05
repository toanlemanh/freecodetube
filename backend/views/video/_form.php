<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Video $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="video-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => 512]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>


        </div>
        <div class="col-sm-4">
            Demo Video Display
            <div class="ratio ratio-16x9">
                <iframe src="<?= $model->generateVideoLink() ?>" title="<?= $model->title ?>" allowfullscreen></iframe>
            </div>
            <?= $form->field($model, 'status')->textInput() ?>
            <p>Video link: <?= $model->generateVideoLink() ?> </p>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
