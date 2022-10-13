<?php


include 'user/layouts/header.php';

// control panel
if(isset($_GET['act'])) {

    $act = $_GET['act'];
    switch ($act) {
        case 'intro':
            include 'user/pages/introduce.php';
            break;

        case 'product':
            include 'user/pages/product.php';
            break;

        // edit product

        case 'buy':
            include 'user/product/detailProduct.php';
            break;

        //

        case 'edit':
            include 'user/product/edit.php';
            break;

        case 'post':
            include 'user/pages/post.php';
            break;

        case 'contact':
            include 'user/pages/contact.php';
            break;
        //components form

        case 'user':
            include 'user/components/user.php';
            break;

            // user login and sign up

            //

        case 'cart':
            include 'user/product/cart.php';
            break;

        case 'updatecart':
            include 'user/product/cartupdate.php';
            break;

        default:
            include 'user/layouts/nav.php';
            break;
    }
} else {
    include 'user/layouts/nav.php';
}


include 'user/layouts/footer.php';
