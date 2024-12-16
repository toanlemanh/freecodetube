<?php

/** @var yii\web\View $this */
$this->title = 'Trang chu';
?>

<h1>
    <?php echo 'Chao mung'; ?>
</h1>
<p>

    <?php echo  yii::$app->language ?>
    <?php echo Yii::$app->session->getFlash("language") ?>
    Xin chào mọi người, chào mừng đến với kênh của mình! Mình là <strong><?= yii::$app->user->identity->username ?></strong> , một lập trình viên đam mê tạo ra những ứng dụng web sạch, hiệu quả và có khả năng mở rộng. Sau nhiều năm làm việc với các công nghệ khác nhau, mình nhận thấy Yii Framework là một trong những công cụ mạnh mẽ và thân thiện nhất với lập trình viên để xây dựng các ứng dụng PHP.

    Trên kênh này, mình sẽ hướng dẫn các bạn từng bước khám phá Yii, chia sẻ các bài hướng dẫn, mẹo hay, và ví dụ thực tế để giúp bạn làm chủ framework này. Dù bạn là người mới bắt đầu hay một lập trình viên có kinh nghiệm muốn nâng cao kỹ năng, thì mình tin rằng bạn sẽ tìm thấy nội dung hữu ích ở đây. Mục tiêu của mình là biến việc học Yii trở nên không chỉ bổ ích mà còn thú vị.

    Vậy nên, hãy mở trình soạn thảo mã yêu thích của bạn, nhấn nút đăng ký và cùng mình tạo ra những điều tuyệt vời với Yii nhé!
</p>





