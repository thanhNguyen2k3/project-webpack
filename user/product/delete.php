<?php

include "../../connect/connect.php";

$id = $_GET["product_id"];
$sql = "DELETE FROM product WHERE product_id = '$id' ";

$conn->exec($sql);
header("location:../../index.php?act=post");

?>
