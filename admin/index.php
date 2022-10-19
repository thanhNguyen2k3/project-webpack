<?php

include 'header.php';

if(isset($_GET['act'])) {
    $act = $_GET['act'];


    switch ($act) {
        case 'sp':
            include 'sanpham/add.php';
            # code...
            break;

        case 'quanlysp':
            include 'sanpham/view.php';
            # code...
            break;

        case 'edit':
            include 'sanpham/edit.php';
            # code...
            break;

        case 'qluser':
            include 'quanlykh/viewuser.php';
            # code...
            break;

        case 'edituser':
            include 'quanlykh/edituser.php';
            # code...
            break;

        case 'comment':
            include 'comment/comment.php';
            # code...
            break;

        case 'contact':
            include 'contact/contact.php';
            # code...
            break;

        default:
            include 'container.php';
            break;
    }
} else {
    include 'container.php';
}

include 'footer.php';

?>