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


<?php

$error = [];


if (isset($_POST['handel_cmt']) && $_SESSION['user_name']) {

    $cmt = $_POST["cmt"];

    $date = date('Y/m/d H:i:s');

    $name = $_SESSION["user_name"];

    if (empty($cmt)) {
        $error["er_cmt"] = "Chưa có đánh giá";
    } else {
            $sql = " INSERT INTO `comments` (content, date, user) VALUES ('$cmt', '$date', '$name' )";
        
            $insert = $conn->exec($sql);

    }
}

$sql = "SELECT * FROM `comments` ";

$result = $conn->query($sql)->fetchAll();

?>

<div class="grid">

    <form action="" method="POST" enctype="multipart/form-data" class="form-cart">
        <?php if (isset($message)) {
            foreach ($message as $message) {
                echo  '<p class="message">' . $message . '<i class="fa-solid fa-check"></i></p>';
            }
        } ?>
        <section class="detail-product">


            <div class="detail">
                <img class="img-product" src="<?php echo $row['image'] ?>" alt="tên sản phẩm" name="img">

                <h3 class="detail-title"><?php echo $row['product_name'] ?></h3>
                <p class="price">Giá sản phẩm : <?php echo $row['price'] ?>$</p>
                <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
                <input type="hidden" name="name" value="<?php echo $row['product_name'] ?>">
                <input type="hidden" name="image" value="<?php echo $row['image'] ?>">
                <div class="order">
                    <input type="number" name="quantity" value="1">
                    <button class="handel-submit" name="add_to_cart">Thêm vào giỏ hàng</button>
                </div>
            </div>


            <div class="detail-product-row">
                <h2>Chi tiết sản phẩm</h2>
                <p class="desc"><?php echo $row['detail'] ?>
                </p>
            </div>
        </section>

    </form>

    <div class="user-sta">
        <form action="" method="POST">

            <h4>Bình luận khách hàng</h4>

            <?php if (isset($_SESSION["user_name"])) { ?>

                <input name="cmt" class="input-cmt" type="text" placeholder="Bình luận:">
                <p class="error"><?php echo isset($error["er_cmt"]) ? $error["er_cmt"] : "" ?></p>

                <input name="date" class="input-cmt" type="hidden" value="">

                <input name="name" class="input-cmt" type="hidden" value="<?php $_SESSION['user_name'] ?>">

                <button name="handel_cmt" class="handel-submit">Đánh giá</button>

            <?php } else { ?>

                <p style="margin:20px 0 ;">Bạn cần phải đăng nhập tài khoản để có thế đánh giá sản phẩm ?</p>

            <?php } ?>
        </form>

        <?php foreach ($result as $key => $value) { ?>

            <section class="user-cmt">
                <img class="img-user" src="user/assets/images/8-512 (1).webp" alt="">

                <div class="detail-user">
                    <p><?php echo $value['user'] ?></p>
                    <span class="time"><?php echo $value['date'] ?></span>
                    <p class="cmt"><?php echo $value['content'] ?></p>
                </div>
            </section>

        <?php } ?>
    </div>
</div>