<?php

include '../connect/connect.php';

$sql = "SELECT * FROM `sign_up` ";
$result = $conn->query($sql)->fetchAll();


?>

<div class="show-user">
    <table class="inner-table">
        <tr>
            <td>Tên khách hàng</td>
            <td>Email</td>
            <td>Mật phẩu</td>
        </tr>
    
    
        <?php foreach ($result as $key => $value) { ?>
    
            <tr>
                <td><?php echo $value['user_name'] ?></td>
                <td><?php echo $value['email'] ?></td>
                <td><?php echo $value['password'] ?></td>
                <td><button onclick="location.href='index.php?act=edituser&id=<?php echo $value['id']; ?>' " class="handel-submit">Sửa</button></td>
                <td><a class="handel-delete" href="javascript:confirmDelete('quanlykh/deleteuser.php?id=<?php echo $value["id"] ?>' )">Xóa</a></td>
            </tr>
    
        <?php } ?>
    </table>
</div>