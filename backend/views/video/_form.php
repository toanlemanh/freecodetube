<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Video $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="video-form">

    <?php $form = ActiveForm::begin([
            'options'=>['enctype'=>'multipart/form-data']
    ]); ?>

    <div class="row gx-5">
        <div class="col-sm-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => 512]) ?>
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'thumbnailFile')->fileInput([
                    'name' => 'thumbnailFile',
                    'accept' => 'image/*',
            ])->hint('To upload a new file')->label('Choose your thumbnail:') ;
            ?>
        </div>
        <div class="col-sm-4">
            Demo Video Display
            <div class="ratio ratio-16x9 mb-5">
                <video poster="<?php echo $model->generateThumbLink() ?>" src="<?= $model->generateVideoLink() ?>" title="<?= $model->title ?>" controls></video>
            </div>
            <div class="text-muted">Video name:
                <p class="text-dark"> <?= $model->video_name ?></p>
            </div>
            <div class="text-muted">Video link:
                <p class="text-primary"> <?php echo $model->generateVideoLink() ?></p>
            </div>
            <p><?= $form->field($model, 'status')->dropDownList($model->getStatusLabels()) ?></p>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
