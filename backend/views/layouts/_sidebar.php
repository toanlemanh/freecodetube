<?php
    use yii\bootstrap5\Nav;
?>
<?= Nav::widget([
    'items' => [
        ['label' => 'Dashboard', 'url' => ['/site/index']],
        ['label' => 'Videos', 'url' => ['/video/index']],
    ],
    'options' => ['class' => 'side-item pt-2 d-flex flex-column bg-light vh-100'],
]) ?>

