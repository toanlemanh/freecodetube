<?php

/** @var yii\web\View $this */
$this->title = 'Dashboard';
?>

<h1>
    <?php echo 'Welcome' ?>
</h1>
<p>
    <?php echo  yii::$app->language ?>
    <?php echo Yii::$app->session->getFlash("language") ?>
    <?php echo  'Hello everyone, and welcome to my channel! My name is '. yii::$app->user->identity->username .', and I’m a software developer passionate about creating clean, efficient, and scalable web applications. After years of working with different technologies, I’ve found the Yii Framework to be one of the most powerful and developer-friendly tools for building PHP applications.

On this channel, I’ll guide you through the ins and outs of Yii, sharing tutorials, tips, and real-world examples to help you master this framework. Whether you’re a beginner or an experienced developer looking to sharpen your skills, you’ll find something here for you. My goal is to make learning Yii not just educational but also enjoyable.

So, grab your favorite code editor, hit that subscribe button, and let’s build something amazing together with Yii!' ?>
</p>





