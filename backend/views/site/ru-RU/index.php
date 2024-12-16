<?php

/** @var yii\web\View $this */
\Yii::$app->language = 'ru-RU';
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
    <?php echo 'Добро пожаловать' ?>
</h1>





