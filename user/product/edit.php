<?php
include 'connect/connect.php';

$sql = "SELECT * FROM `select` ";

$list_select = $conn->query($sql)->fetchAll();

// Edit info
$id = $_GET["product_id"];

$get_id = "SELECT * FROM product WHERE product_id = {$id}";

$row = $conn->query($get_id)->fetch();

// error

$error = [];

// isset

if (isset($_POST["handel-edit"])) {
    $name = $_POST['pro-name'];
    $select = $_POST['select'];
    $price = $_POST['price'];


    if (empty($name)) {
        $error["name_er"] = "Không được bỏ trống";
    }

    if (empty($price)) {
        $error["price_er"] = "Không được bỏ trống";
    } else {
        if ($price <= 0) {
            $error["price_er"] = "giá phải lớn hơn 0";
        }
    }

    $target_file = "image/" . $_FILES["image"]["name"];
    $allowType = ['png', 'jpeg', 'jpg', 'gif', 'jfif'];
    $allowUpload = true;
    $filetype = pathinfo($target_file, PATHINFO_EXTENSION);

    if (!in_array(strtolower($filetype), $allowType)) {
        $error["file_er"] = "Định dạng file không hợp lệ";

        $allowUpload = false;
    }

    if ($allowUpload) {
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

        $_SESSION['new_image'] = $target_file;
    }

    if (!$error) {

        $sql_update = " UPDATE product SET  product_name = '$name', image = '$target_file' , price = '$price' WHERE product_id = {$id} ";

        $conn->exec($sql_update);

        $notify = "Bạn đã sửa thành công";
    }
}

?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/globalStyle.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/product.css">


    <title>Sửa thông tin</title>
</head>

<body> -->

<form action="" method="POST" class="product-post" enctype="multipart/form-data">

    <h4>Sửa thông tin sản phẩm</h4>


    <div class="post-item">
        <label class="name-item">Tên sản phẩm</label>
        <input type="text" name="pro-name" value="<?php echo $row["product_name"];  ?>">
        <p class="error"><?php echo isset($error["name_er"]) ? $error["name_er"] : ""; ?></p>
    </div>

    <div class="post-item">
        <label class="name-item">Dạng sản phẩm</label>
        <select name="select">
            <?php foreach ($list_select as $key => $value) { ?>

                <option value="<?php echo $value["select_id"] ?>"><?php echo $value["select_name"] ?></option>

            <?php  } ?>

        </select>
    </div>

    <div class="post-item">
        <label class="name-item">Ảnh sản phẩm</label>
        <input type="file" name="image">
        <p class="error"><?php echo isset($error["file_er"]) ? $error["file_er"] : ""; ?></p>
    </div>

    <div class="post-item">
        <label class="name-item">Giá sản phẩm</label>
        <input type="number" name="price" value="<?php echo $row["price"] ?>">
        <p class="error"><?php echo isset($error["price_er"]) ? $error["price_er"] : ""; ?></p>

    </div>

    <button class="handel-submit" name="handel-edit">Sửa</button>


    <p><span class="back"><?php echo isset($notify) ? $notify : "" ; ?></span><a href="index.php?act=post" class="handel-submit" name="handel-edit">Trở về</a></p>

</form>
<!-- </body>

</html> -->