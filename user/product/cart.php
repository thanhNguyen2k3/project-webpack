<?php

include 'connect/connect.php';

$sql = "select * from `cart` ";

$result = $conn->query($sql)->fetchAll();

$result = $conn->prepare($sql);

$result->execute();

$count = $result->rowCount();


if ($count == 0) {
    $message = "Chưa có sản phẩm nào được them vào giỏi hàng của bạn";
}


?>

<div class="grid" style="margin-top: 60px; min-height:400px;">

    <?php if (isset($message)) {

        echo '<p class="cart-empty">'.$message.'</p>';
    } else { ?>


        <table class="cart" border="1">
            <tr>
                <td>Tên sản phẩm</td>
                <td>Ảnh sản phẩm</td>
                <td>Số lượng</td>
                <td>Tổng giá</td>
            </tr>

            <?php foreach ($result as $key => $value) { ?>

                <tr>
                    <td><?php echo $value['cart_name'] ?></td>
                    <td><img src="<?php echo $value['image'] ?>" alt="SP" width="100" height="100"></td>
                    <td><?php echo $value['quantity'] ?></td>
                    <td><?php echo ($value['price'] * $value['quantity'])  ?>$</td>
                    <td><a class="handel-delete" href="javascript:confirmDelete('user/product/deletecart.php?id=<?php echo $value["id"] ?>')">Xóa</a></td>
                </tr>

            <?php } ?>
        </table>

    <?php } ?>
</div>