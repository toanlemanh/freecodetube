<?php

?>
<div class="row container">
    <?php
    if (Yii::$app->user->isGuest) {
        ?>
        <h2>Bạn không thể xem được nhật ký xem khi đã đăng xuất. <a href="http://google.com">Tìm hiểu thêm</a> </h2>
        <?php
    }
    else {
        echo 'User :'. Yii::$app->user->identity->username;
    }
    ?>
</div>
