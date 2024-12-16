<?php

use common\models\Video;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Videos';
?>
<div class="video-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Video', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//fill data from model to columns
            ['attribute' => 'title',
                'content' => function($model)
                {
                    return $this->render('video_item', ['data' => $model]);
                },
                'contentOptions' => ['style' => 'max-width: 500px !important;'],
            ],
            ['attribute' => 'status',
                'content' => function ($model)
                {
                    return $model->getStatusLabels()[$model->status];
                }
            ],
            'description:ntext',
            [ 'attribute'=>'created_at',
                'format'=> 'datetime',
            //'contentOptions' => ['style' => 'width: 150px;'],
                ],
            'tags',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Video $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'video_id' => $model->video_id]);
                 },
//        Overriding ActionColumn => rewrite template
                'template' => '{delete}',
                'buttons' => [
                        'delete' => function ($url) {
                            return Html::a("Delete", $url, [
                                    'data-method' => 'post',
                                'data-confirm' => 'Are you sure you want to delete this item?',
                            ]);
                        }
                ],
            ],
        ],
        'options' => ['class' => 'table-responsive'],
    ]); ?>


</div>
