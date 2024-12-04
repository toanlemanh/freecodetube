<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Video $model */

$this->title = 'Create Video';
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="upload-icon bg-light rounded-circle d-flex justify-content-center align-items-center">
        <i class="fa-solid fa-upload fs-1"></i>
    </div>
    <p>Drag and drop the file you want to upload</p>
    <p class="text-muted">Your video will be private until you publish it</p>
<!--    <button class="btn btn-primary btn-file text-center text-white d-flex justify-content-center align-items-center">-->
<!--        Choose file-->
<!--        <input hidden id="videoFile" type="file" name="video"/>-->
<!--    </button>-->

    <form>
        <!-- Hidden file input -->
        <input type="file" id="fileInput">
        <!-- Custom button for the file input -->
        <label for="fileInput" class="custom-file-label">Choose File</label>
    </form>


</div>
