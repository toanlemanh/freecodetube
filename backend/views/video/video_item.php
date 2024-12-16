<?php
 /** prepare data */
/** @var Video $data */
use common\models\Video;
use \yii\helpers\StringHelper;
use \yii\helpers\Url;
?>
<a class="text-decoration-none text-dark " href="<?php echo Url::to(['/video/update', 'video_id'=> $data->video_id]) ?>">
    <div class="m-1 w-100" style="">
        <div class="row m-0 w-100" >
            <div class="col-md-8 col-sm-12" >
                <?php if ( file_exists(Yii::getAlias("@frontend/storage/thumbs/".$data->video_id.".jpg"))) : ?>
                    <img src="<?= $data->generateThumbLink() ?>" class="img-fluid" alt=<?= $data->video_name ?>>
                <?php else : ?>
                    <p>No thumbnail</p>
                <?php endif; ?>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card-body">
                    <h5 class="card-title fs-6 text-truncate"><?php echo StringHelper::truncate($data->title, 20) ?></h5>
                    <p class="card-text fs-6 text-truncate"><?php echo StringHelper::truncate($data->description, 20) ?></p>
                    <p class="card-text fs-6 text-truncate"><small class="text-body-secondary">Last updated <?php echo $time=Yii::$app->formatter->asTime($data->updated_at) ?> ago</small></p>
                </div>
            </div>
        </div>
    </div>
</a>



