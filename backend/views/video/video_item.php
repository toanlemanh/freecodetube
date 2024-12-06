<?php
 /** prepare data */
/** @var Video $data */
use common\models\Video;
use \yii\helpers\StringHelper;
use \yii\helpers\Url;
?>
<a class="text-decoration-none text-dark" href="<?php echo Url::to(['/video/update', 'video_id'=> $data->video_id]) ?>">
    <div class="m-2 " style="max-width: 540px;">
        <div class="row g-3">
            <div class="col-md-8">
                <img  src="<?= $data->generateThumbLink() ?>" class="img-fluid " alt="...">
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <h5 class="card-title"><?php echo StringHelper::truncate($data->video_name, 5) ?></h5>
                    <p class="card-text"><?php echo StringHelper::truncate($data->description, 15) ?></p>
                    <p class="card-text"><small class="text-body-secondary">Last updated <?php echo $time=Yii::$app->formatter->asTime($data->updated_at) ?> ago</small></p>
                </div>
            </div>
        </div>
    </div>
</a>



