<?php
    use yii\bootstrap5\Nav;
?>
<?= Nav::widget([
    'items' => [
        ['label' => 'Dashboard', 'url' => ['/site/index']],
        ['label' => 'Videos', 'url' => ['/video/index']],
    ],
    'options' => ['class' => 'd-flex flex-column p-3 bg-light h-100'],
]) ?>

