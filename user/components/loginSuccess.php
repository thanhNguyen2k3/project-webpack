<?php

session_start();

header('location:../index.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/globalStyle.css">
    <link rel="stylesheet" href="css/form.css">
    <title>Document</title>
</head>

<body>


    <!-- <div class="info-user">

        <div class="info">
            <?php if (isset($_SESSION['user_name'])) : ?>

                <p class="user-login">Hello <?php echo htmlspecialchars($_SESSION['user_name']); ?></p>

                <p class="user"><a href="logout.php">Đăng xuất</a></p>

                <p class="user"><a href="../../index.php">Về trang chủ</a></p>

            <?php else : ?>

                <h4 class="heading">Bạn chưa có tài khoản</h4>

                <p class="user"><a href="./login.php">Đăng nhập</a><span>Hoặc</span><a href="signup.php">Đăng ký</a></p>

                <p class="user"><a href="../../index.php">Về trang chủ</a></p>


            <?php endif;


            ?>
        </div>
    </div> -->
</body>

</html>