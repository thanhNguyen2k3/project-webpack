<?php

?>

<div class="info-user">

    <div class="info">
        <?php if (isset($_SESSION['user_name'])) : ?>

            <p class="user-login">Xin chào <?php echo htmlspecialchars($_SESSION['user_name']); ?></p>
            <p class="back-home"><a href="user/components/logout.php">Đăng xuât</a></p>

        <?php else : ?>

            <h4 class="heading">Bạn chưa có tài khoản</h4>

            <p class="check"><a href="user/components/login.php">Đăng nhập</a><span>Hoặc</span><a href="user/components/signup.php">Đăng ký</a></p>

            <p class="check"><a href="./index.php">Về trang chủ</a></p>


        <?php endif;


        ?>
    </div>
</div>