<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Video $model */
/** @var yii\bootstrap5\ActiveForm $form */

$this->title = 'Create Video';
\backend\assets\AppAsset::register($this);
?>
<div class="video-create ">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="d-flex justify-content-center flex-column py-5 ">
        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data', 'class' => 'mb-4 d-flex flex-column align-items-center justify-content-center'],
        ]) ?>
        <?php if (isset($form)) {echo $form->errorSummary($model);}  ?>
        <div class="upload-icon bg-light rounded-circle d-flex justify-content-center align-items-center my-3">
            <i class="fa-solid fa-upload fs-1"></i>
        </div>
        <p>Drag and drop the file you want to upload</p>
        <p class="text-muted">Your video will be private until you publish it</p>
            <!-- Hidden file input -->
            <input type="file" id="videoFile" accept="video" name="video">
            <!-- Custom button for the file input -->
            <label for="videoFile" class="custom-file-label">Choose File</label>
       <?php ActiveForm::end() ?>
    </div>
</div>
