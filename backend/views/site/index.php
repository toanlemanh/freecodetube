<?php

/** @var yii\web\View $this */
\Yii::$app->language = 'vi';
$this->title = 'Dashboard';
?>

    <?php
    if ( yii::$app->session->hasFlash('urlCreated') ) {
        echo  \yii::t('app', 'Welcome,'). yii::$app->user->identity->username;
        echo '<br/>';
        echo yii::$app->session->getFlash('urlCreated');
    }
    else {
        echo \yii::t('app', 'Nothing here');
    }
    ?>

<h1>
    <?php echo 'Index' ?>
</h1>
<p>

    <?php echo  yii::$app->language ?>
    <?php echo Yii::$app->session->getFlash("language") ?>
    <?php echo 'Index'?>
</p>





