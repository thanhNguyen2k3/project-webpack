<?php

include '../../connect/connect.php';

$id = $_GET["comment_id"];
$sql = "DELETE FROM `comments` WHERE comment_id = '$id'";

$conn->exec($sql);
header("location:../index.php?act=comment");

?>