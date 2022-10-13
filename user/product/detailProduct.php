<?php

include 'connect/connect.php';

$id = $_GET["product_id"];

$get_id = "SELECT * FROM product WHERE product_id = {$id}";

$row = $conn->query($get_id)->fetch();

if (isset($_POST['add_to_cart'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $img = $_POST['image'];
    $quantity = $_POST['quantity'];



    $stmt = $conn->prepare("SELECT COUNT(*) FROM `cart` WHERE `cart_name` = :cart_name");

    $stmt->execute(array('cart_name' => $name));
    if ($stmt->fetchColumn() > 0) {
        $message[] = "Hàng đã được thêm";
    } else {
        $sql = "INSERT INTO `cart` ( id, cart_name, image, quantity, price ) VALUES (null, '$name', '$img', '$quantity', '$price')";

        $result = $conn->exec($sql);

        $message[] = "Thêm hàng thành công";

    }

    
}

?>

<div class="grid">

    <form action="" method="POST" enctype="multipart/form-data" class="form-cart">
        <?php if (isset($message)) {
            foreach ($message as $message) {
                echo  '<p class="message">' . $message . '<i class="fa-solid fa-check"></i></p>';
            }
        } ?>
        <section class="detail-product">

            <img class="img-product" src="<?php echo $row['image'] ?>" alt="tên sản phẩm" name="img">

            <div class="detail">

                <h3 class="detail-title"><?php echo $row['product_name'] ?></h3>
                <p class="desc"><?php echo $row['detail'] ?>
                </p>
                <p class="price">Giá sản phẩm : <?php echo $row['price'] ?>$</p>
                <input type="hidden" name="name" value="<?php echo $row['product_name'] ?>">
                <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
                <input type="hidden" name="image" value="<?php echo $row['image'] ?>">
                <div class="order">
                    <input type="number" name="quantity" value="1">
                    <button class="handel-submit" name="add_to_cart">Thêm vào giỏ hàng</button>
                </div>
            </div>
        </section>
    </form>
</div>