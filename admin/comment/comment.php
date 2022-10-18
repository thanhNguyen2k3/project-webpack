<?php

include '../connect/connect.php';

$sql = "SELECT * FROM `comments` ";

$result = $conn->query($sql)->fetchAll();

?>

<div class="show-user">
    <table class="inner-table">
        <tr>
            <td>ID</td>
            <td>Tên khách hàng</td>
            <td>Bình luận khách hàng</td>
            <td>Thời gian</td>
        </tr>




        <?php foreach ($result as $key => $value) { ?>

            <tr>
                <td><?php echo $value['comment_id'] ?></td>
                <td><?php echo $value['user'] ?></td>
                <td><?php echo $value['content'] ?></td>
                <td><?php echo $value['date'] ?></td>
                <td><a class="handel-delete" href="javascript:confirmDelete('comment/deletecomment.php?comment_id=<?php echo $value["comment_id"] ?>' )">Xóa</a></td>
            </tr>

        <?php } ?>


    </table>
</div>