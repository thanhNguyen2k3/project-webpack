<?php
include '../../connect/connect.php';

$error = [];

if (isset($_POST["sign_up"])) {

    $username = $_POST["user_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $re_pass = $_POST["re_pass"];

    //check user

    $message = "Đã đăng ký thành công";

    //error validate

    if (empty($username)) {
        $error["user_er"] = "tên không được bỏ trống";
    } else {
        if (strlen($username) < 6) {
            $error["user_er"] = "< 6";
        } else {
            $stmt = $conn->prepare("SELECT COUNT(*) FROM `sign_up` WHERE `user_name` = :user_name");
            $stmt->execute(array('user_name' => $username));
            if ($stmt->fetchColumn() > 0) {
                $error["user_er"] = "Username đã được đăng ký";
            }
        }
    }

    if (empty($email)) {
        $error["email_er"] = "email không được bỏ trống";
    } else {
        if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
            $error["email_er"] = "email không hợp lệ";
        } else {
            $stmt = $conn->prepare("SELECT COUNT(*) FROM `sign_up` WHERE `email` = :email");
            $stmt->execute(array('email' => $email));
            if ($stmt->fetchColumn() > 0) {
                $error["email_er"] = "Email đã được đăng ký";
            }
        }
    }

    if (empty($password)) {
        $error["password_er"] = "mật khẩu không được bỏ trống";
    } else {
        if (!preg_match("/[a-z]/i", $password)) {
            $error["password_er"] = "mật khẩu phải có ít nhất một chữ cái";
        } else if (!preg_match("/[0-9]/", $password)) {
            $error["password_er"] = "mật khẩu phải có ít nhất một số";
        }
    }

    if (empty($re_pass)) {
        $error["re_pass_er"] = "re-password không được bỏ trống";
    } else {
        if ($re_pass != $password) {
            $error["re_pass_er"] = "re-pass word phải trùng với password";
        }
    }

    if (!$error) {
        $sql = "INSERT INTO sign_up VALUES (null, '$username', '$email', '$password' ) ";
        $result = $conn->exec($sql);

        header("location:login.php");
    }
} else {
    // upload database
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
        <div class="form-control">
            <label class="title" for="">Tên đăng nhập</label>
            <input class="form-input" type="text" name="user_name" value="<?php echo isset($error["user_er"]) ? $username : ""  ?>">
            <span class="error"><?php echo isset($error["user_er"]) ? $error["user_er"] : "" ?></span>
        </div>

        <div class="form-control">
            <label class="title" for="">Email</label>
            <input class="form-input" type="text" name="email" value="<?php echo isset($error["email_er"]) ? $email : ""  ?>">
            <span class="error"><?php echo isset($error["email_er"]) ? $error["email_er"] : ""; ?></span>
        </div>

        <div class="form-control">
            <label class="title" for="">Mật khẩu</label>
            <input class="form-input" type="text" name="password" value="<?php echo $password; ?>">
            <span class="error"><?php echo isset($error["password_er"]) ? $error["password_er"] : ""; ?></span>
        </div>

        <div class="form-control">
            <label class="title" for="">Mật khẩu( trùng với mật khẩu bên trên )</label value="<?php echo $re_pass; ?>">
            <input class="form-input" type="text" name="re_pass">
            <span class="error"><?php echo isset($error["re_pass_er"]) ? $error["re_pass_er"] : ""; ?></span>
        </div>

        <button class="handel-submit" name="sign_up">Đăng ký</button>

        <p class="suggest">Bạn đã có tài khoản ? <a href="login.php">Đăng nhập</a></p>
    </form>
</body>

</html>