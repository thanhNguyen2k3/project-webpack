<?php

include "../../connect/connect.php";

$id = $_GET["id"];
$sql = "DELETE FROM `cart` WHERE id = '$id' ";

$conn->exec($sql);
header("location:../../index.php?act=cart");

?>