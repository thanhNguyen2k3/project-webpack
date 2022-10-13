<?php

include '../connect/connect.php';

$sql = "SELECT * FROM `select` ";

$list_select = $conn->query($sql)->fetchAll();

$error = [];

if (isset($_POST["handel-add"])) {
    $name = $_POST['pro-name'];
    $select = $_POST['select'];
    $img = $_FILES['image'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];

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

    if (empty($detail)) {
        $error["detail_er"] = "Không được bỏ trống";
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

        $_SESSION['image'] = $target_file;
    }

    if (!$error) {
        $sql_upload = " INSERT INTO product(product_name, image, price, detail, select_id) VALUES ('$name', '$target_file', '$price', '$detail',  '$select') ";

        $conn->exec($sql_upload);
    }
}


?>


<form action="" method="POST" class="product-post" enctype="multipart/form-data">

    <h4>Thêm sản phẩm</h4>


    <div class="post-item">
        <label class="name-item">Tên sản phẩm</label>
        <input type="text" name="pro-name">
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
        <input type="number" name="price">
        <p class="error"><?php echo isset($error["price_er"]) ? $error["price_er"] : ""; ?></p>

    </div>

    <div class="post-item">
        <label class="name-item">Mô tả chi tiết sản phẩm</label>
        <textarea name="detail" id="" cols="30" rows="10"></textarea>
        <p class="error"><?php echo isset($error["detail_er"]) ? $error["detail_er"] : ""; ?></p>
    </div>

    <button class="handel-submit" name="handel-add">Thêm sản phẩm</button>

</form>