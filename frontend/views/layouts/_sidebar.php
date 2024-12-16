<?php
use yii\bootstrap5\Nav;

?>

<aside class="shadow">
    <?php echo Nav::widget([
        'options' => [
                //d-flex flex-column nav-pills
            'class' => ' side-item pt-2 d-flex flex-column bg-light vh-100'
        ],
        'encodeLabels' => false,
        'items' => [
            [
                'label' => '<i class="fas fa-home"></i> Home',
                'url' => ['/video/index']
            ],
            [
                'label' => '<i class="fas fa-history"></i> History',
                'url' => ['/video/history']
            ]
        ]
    ]) ?>
</aside>
