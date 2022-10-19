<?php

include 'connect/connect.php';

$error = [];

if (isset($_POST['contact'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $text = $_POST['text'];

    if (empty($name)) {
        $error["er_name"] = "tên không được bỏ trống";
    }

    if (empty($address)) {
        $error["er_address"] = "Địa không được bỏ trống";
    }

    if (empty($phone)) {
        $error["er_phone"] = "Số điện thoại không được bỏ trống";
    }

    if (empty($text)) {
        $error["er_text"] = "Nội dung không được bỏ trống";
    }

    if (!$error) {

        $sql = "INSERT INTO `contact` (name, address, phone, text) VALUES ('$name', '$address', '$phone', '$text') ";

        $conn->exec($sql);

        $success = "Bạn đã gửi địa chỉ liên hệ thành công vui lòng chờ Admin phản hồi";
    }
}

?>


<div class="grid">

    
    <form action="" method="POST" class="form-contact">
        <h1>Liên hệ ADMIN</h1>

        <div>
            <?php

            if (isset($success)) {
                echo "<p class='success-login' >'.$success.'</p>";
            }
            ?>
        </div>

        <section class="contact">
            <div class="form-control">
                <label class="" for="">Họ và tên</label>
                <input class="form-input" type="text" name="name">
                <span class="error"><?php echo isset($error["er_name"]) ? $error["er_name"] : "" ?></span>
            </div>

            <div class="form-control">
                <label class="" for="">Địa chị</label>
                <input class="form-input" type="text" name="address">
                <span class="error"><?php echo isset($error["er_address"]) ? $error["er_address"] : ""; ?></span>
            </div>

            <div class="form-control">
                <label class="" for="">Số điện thoại</label>
                <input class="form-input" type="text" name="phone">
                <span class="error"><?php echo isset($error["er_phone"]) ? $error["er_phone"] : ""; ?></span>
            </div>


            <div class="form-control">
                <label class="" for="">Nội dung</label>
                <textarea name="text" cols="0" rows="10"></textarea>
                <span class="error"><?php echo isset($error["er_text"]) ? $error["er_text"] : ""; ?></span>
            </div>
            <button class="handel-submit" name="contact">Gửi</button>
        </section>

    </form>
</div>