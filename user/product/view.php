<?php

include 'connect/connect.php';

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



<form action="" method="POST">
    <select name="select_list">
        <?php foreach ($list_select as $key => $value) { ?>
            
            <option value="<?php echo $value["select_id"] ?>"><?php echo $value["select_name"] ?></option>

        <?php  } ?>

    </select>

    <button class="handel-submit" name="check_list">Tìm</button>
</form>

<?php foreach ($result as $key => $value) { ?>

    <div class="product-item">


        <div class="product-img">
            <img src="<?php echo $value["image"]; ?>" alt="SP">
        </div>

        <h4 class="pro-name"><?php echo $value["product_name"]; ?></h4>

        <span class="price"><?php echo $value["price"]; ?>$</span>
        <span class="vote"><i class="fas fa-star"></i></span>


        <button class="handel-submit"><a href="index.php?act=buy&product_id=<?php echo $value['product_id']; ?>">Đặt mua</a></button>
    </div>

<?php } ?>