<?php

include '../connect/connect.php';

$sql = "SELECT * FROM `product` ";

$result = $conn->query($sql)->fetchAll();

$sql_select = "SELECT * FROM `select` ";
$select_result = $conn->query($sql_select)->fetchAll();

$sql = "SELECT * FROM `select` ";

$list_select = $conn->query($sql)->fetchAll();

if (isset($_POST['check_list'])) {

    $select = $_POST['select_list'];

    $query = " select * from product where select_id='$select' ";

    $result = $conn->query($query)->fetchAll();
}

?>


<section class="table">

    <table class="inner-table">
        <tr>
            <td>Tên sản phẩm</td>
            <td>Loại sản phẩm</td>
            <td>Ảnh sản phẩm</td>
            <td>Giá sản phẩm</td>
            <td>Mô tả chi tiết sản phẩm</td>
        </tr>

        <?php foreach ($result as $key => $value) { ?>
            <tr>

                <td><?php echo $value["product_name"] ?></td>
                <td><?php echo $value["select_id"] ?></td>
                <td><img src="../<?php echo $value["image"] ?>" alt="Sp" width="60" height="60"></td>
                <td><?php echo $value["price"] ?>$</td>
                <td class="view-detail"><?php echo $value['detail']?></td>
                <td><button onclick="location.href='index.php?act=edit&product_id=<?php echo $value['product_id']; ?>' " class="handel-submit">Sửa</button></td>
                <td><a class="handel-delete" href="javascript:confirmDelete('sanpham/delete.php?product_id=<?php echo $value["product_id"] ?>' )">Xóa</a></td>

            </tr>
        <?php } ?>
    </table>

</section>

