<?php

include '../../connect/connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["user_name"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM sign_up WHERE user_name = :user_name AND password = :password ";

    $query = $conn->prepare($sql);

    $query->bindParam(':user_name', $username);
    $query->bindParam(':password', $password);

    $query->execute();

    $count = $query->rowCount();



    if (
        $count == 1
    ) {

        session_start();

        session_regenerate_id();

        $_SESSION["user_name"] = $username;

        header('Location:../../index.php');
    } else {

        //
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/globalStyle.css">
    <link rel="stylesheet" href="../../css/form.css">

    <title>Document</title>
</head>

<body>



    <form id="form" action="" method="POST">
        <h2 class="back-home"><a href="../../index.php">Trở về trang chủ</a></h2>

        <div>
            <?php

            if (isset($_SESSION["user_name"])) {

                echo "<p class='success-login' >Bạn đã đăng nhập thành công</p>";
            } else {
                echo "<p class='error-login' >Tên đăng nhập hoặc mật khẩu sai </p>";
            }

            ?>
        </div>

        <div class="form-control">
            <label class="title" for="">Tên đăng nhập</label>
            <input class="form-input" type=" text" name="user_name" value="">
        </div>

        <div class="form-control">
            <label class="title" for="">Mật khẩu</label>
            <input class="form-input" type="text" name="password" value="">
        </div>

        <button class="handel-submit" name="sign_up">Đăng nhập</button>

        <p class="suggest">Bạn chưa có tài khoản ? <a href="signup.php">Đăng ký</a></p>
    </form>
</body>

</html>