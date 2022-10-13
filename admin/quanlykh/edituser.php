<h1>Edit</h1>

<?php

include '../connect/connect.php';

$id = $_GET["id"];

$get_id = "SELECT * FROM sign_up WHERE id = {$id}";

$row = $conn->query($get_id)->fetch();

print_r($row);

if(isset($_POST['edit_user'])) {

    $name = $_POST['user_name'];
    $password = $_POST['password'];

    $sql_update = " UPDATE sign_up SET `user_name` = '$name',  password = '$password' WHERE id = {$id} ";

    $conn->exec($sql_update);

    header('Location:index.php?act=qluser');
}


?>

<form id="form" action="" method="POST">

    <div class="form-control">
        <label class="title" for="">Tên đăng nhập</label>
        <input class="form-input" type=" text" name="user_name" value="<?php echo $row['user_name'] ?>">
    </div>

    <div class="form-control">
        <label class="title" for="">Mật khẩu</label>
        <input class="form-input" type="text" name="password" value="<?php echo $row['password'] ?>">
    </div>

    <button class="handel-submit" name="edit_user">Sửa</button>
</form>