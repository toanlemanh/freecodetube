<?php

namespace frontend\controllers;
use common\models\Video;
use yii\web\Controller;

/**
 * @var \
 */
class VideoController extends Controller
{
    public function actionHistory()
    {

        return $this->render('history');
    }
    public function actionIndex()
    {

        return $this->render('index');
    }
}