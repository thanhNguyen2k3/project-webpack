<?php

include '../connect/connect.php';

$sql = "SELECT * FROM `contact` ";

$result = $conn->query($sql)->fetchAll();

?>

<div class="show-user">
    <table class="inner-table">
        <tr>
            <td>ID</td>
            <td>Tên khách hàng</td>
            <td>Địa chỉ</td>
            <td>Số điện thoại</td>
            <td>Liên hệ khách hàng</td>
        </tr>

        <?php foreach ($result as $key => $value) { ?>

            <tr>
                <td><?php echo $value['contact_id'] ?></td>
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['address'] ?></td>
                <td><?php echo $value['phone'] ?></td>
                <td><?php echo $value['text'] ?></td>
                <td><a class="handel-delete" href="javascript:confirmDelete('contact/deletecontact.php?contact_id=<?php echo $value["contact_id"] ?>' )">Xóa</a></td>
            </tr>

        <?php } ?>


    </table>
</div>