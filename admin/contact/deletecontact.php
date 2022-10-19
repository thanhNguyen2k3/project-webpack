<?php

include '../../connect/connect.php';

$id = $_GET["contact_id"];
$sql = "DELETE FROM `contact` WHERE contact_id = '$id'";

$conn->exec($sql);
header("location:../index.php?act=contact");
