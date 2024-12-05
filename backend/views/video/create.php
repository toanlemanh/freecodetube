<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Video $model */
/** @var yii\bootstrap5\ActiveForm $form */

$this->title = 'Create Video';
?>
<div class="video-create ">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="d-flex justify-content-center flex-column py-5 align-items-center">
        <div class="upload-icon bg-light rounded-circle d-flex justify-content-center align-items-center my-3">
            <i class="fa-solid fa-upload fs-1"></i>
        </div>
        <p>Drag and drop the file you want to upload</p>
        <p class="text-muted">Your video will be private until you publish it</p>
        <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data'],
        ]) ?>
            <!-- Hidden file input -->
            <input type="file" id="videoFile" accept="video/mp4" name="video">
            <!-- Custom button for the file input -->
            <label for="videoFile" class="custom-file-label">Choose File</label>
       <?php ActiveForm::end() ?>
    </div>
</div>
