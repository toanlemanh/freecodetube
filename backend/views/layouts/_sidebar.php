<?php
    use yii\bootstrap5\Nav;
?>
<aside class="sticky-top">
    <?= Nav::widget([
        'items' => [
            ['label' => \Yii::t('app', 'Dashboard'), 'url' => ['/site/index']],
            ['label' => \Yii::t('app', 'Videos'), 'url' => ['/video/index']],
        ],
        'options' => ['class' => 'side-item pt-2 d-flex flex-column bg-light h-100'],
    ]) ?>
</aside>


