    <?php
    
    include 'connect/connect.php';
    
    ?>
    
    <nav class="container grid">
        <div class="banner">
            <div class="banner-left w-65">
                <div class="banner-item">
                    <img src="user/assets/images/col-1.png" alt="" class="banner-img">
                    <img src="user/assets/images/col-5.png" alt="" class="banner-img">
                    <img src="user/assets/images/col-6.png" alt="" class="banner-img">
                    <img src="user/assets/images/col-7.png" alt="" class="banner-img">
                </div>

                <div class="owl-list">
                    <span class="owl active"></span>
                    <span class="owl"></span>
                    <span class="owl"></span>
                    <span class="owl"></span>
                </div>
            </div>

            <div class="banner-right w-35">
                <img src="user/assets/images/b-2.png" alt="">
                <img src="user/assets/images/b-1.png" alt="" style="margin-top: 8px;">
            </div>
        </div>

        <div class="content">
            <h2 class="heading margin-left-heading">Các dạng sản phẩm</h2>

            <section class="list-item">
                <div class="food-type type-1">
                    <p class="food-content">
                        Thịt có thành phần chủ yếu là nước, protein và chất béo. Thịt có thể được ăn sống,
                        nhưng thông dụng nhất là sau khi đã được nấu chín và tẩm gia vị hoặc chế biến bằng
                        nhiều cách khác nhau. Thịt chưa qua chế biến sẽ bị ôi thiu hoặc thối rữa trong vòng
                        vài giờ hoặc vài ngày do bị nhiễm vi khuẩn và nấm.
                    </p>
                    <button class="handel-view">Xem</button>
                </div>

                <div class="food-type type-2">
                    <p class="food-content">
                        Trái của cây bơ hình như cái bầu nước, dài 7–20 cm, nặng 100g-1 kg. Vỏ mỏng, hơi cứng,
                        màu xanh lục đậm, có khi gần như màu đen. Khi chín, bên trong thịt mềm, màu vàng nhạt,
                        giống như chất bơ, có vị ngọt nhạt. Hột trái bơ hình tựa quả trứng, dài 5 – 6 cm, nằm
                        trong trung tâm, màu nâu đậm, và rất cứng
                    </p>
                    <button class="handel-view">Xem</button>
                </div>

                <div class="food-type type-3">
                    <p class="food-content">
                        Thịt có thành phần chủ yếu là nước, protein và chất béo. Thịt có thể được ăn sống,
                        nhưng thông dụng nhất là sau khi đã được nấu chín và tẩm gia vị hoặc chế biến bằng
                        nhiều cách khác nhau. Thịt chưa qua chế biến sẽ bị ôi thiu hoặc thối rữa trong vòng
                        vài giờ hoặc vài ngày do bị nhiễm vi khuẩn và nấm.
                    </p>
                    <button class="handel-view">Xem</button>
                </div>

                <div class="food-type type-4">
                    <p class="food-content">
                        Trái cây là một nguồn chất dinh dưỡng thiết yếu trong chế độ ăn lành mạnh, chế độ ăn nhiều trái
                        cây có liên quan đến tất cả các loại lợi ích sức khỏe, bao gồm giảm nguy cơ mắc nhiều bệnh tật.
                        Trái cây có nhiều chất dinh dưỡng và lượng calo tương đối thấp khiến chúng trở thành lựa chọn
                        tcho những người muốn giảm cân.
                    </p>
                    <button class="handel-view">Xem</button>
                </div>
            </section>
            <div class="grid">

                <h2 class="heading">Danh mục</h2>
                <section class="list-item">
                    <?php

                    $sql = "SELECT * FROM `product` ";

                    $result = $conn->query($sql)->fetchAll();

                    $sql_select = "SELECT * FROM `select` ";
                    $select_result = $conn->query($sql_select)->fetchAll();

                    $sql = "SELECT * FROM `select` ";

                    $list_select = $conn->query($sql)->fetchAll();

                    ?>

                    <?php foreach ($result as $key => $value) { ?>

                        <div class="product-item">


                            <div class="product-img">
                                <img src="<?php echo $value["image"]; ?>" alt="SP">
                            </div>

                            <h4 class="pro-name"><?php echo $value["product_name"]; ?></h4>

                            <span class="price"><?php echo $value["price"]; ?>$</span>
                            <span class="vote"><i class="fas fa-star"></i></span>


                            <button class="handel-submit">Đặt hàng</button>
                        </div>

                    <?php } ?>
                </section>
            </div>
        </div>
    </nav>