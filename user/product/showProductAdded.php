<?php

include 'connect/connect.php';

$sql = "SELECT * FROM `product` ";

$result = $conn->query($sql)->fetchAll();

$sql_select = "SELECT * FROM `select` ";
$select_result = $conn->query($sql_select)->fetchAll();

?>


<?php foreach ($result as $key => $value) { ?>


    <div class="product-item">


        <div class="product-img">
            <img src="<?php echo $value["image"]; ?>" alt="SP">
        </div>

        <h4 class="pro-name"><?php echo $value["product_name"]; ?></h4>

        <span class="price"><?php echo $value["price"]; ?>$</span>
        <span class="vote"><i class="fas fa-star"></i></span>

        <button onclick="location.href='index.php?act=edit&product_id=<?php echo $value['product_id']; ?>' " class="handel-submit">Sửa</button>
        <a class="handel-delete" href="javascript:confirmDelete('user/product/delete.php?product_id=<?php echo $value["product_id"] ?>' )">Xóa</a>
    </div>

<?php } ?>