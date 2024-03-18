<!-- Controller user-->
<?php
include("view/header-site.php");

if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'product-detail':
            include("view/product-detail.php");
            break;
        case 'product-list':
            include("view/product-list.php");
            break;
        case 'checkout':
            include("view/cart/checkout.php");
            break;
        case 'login':
            include("view/auth/login.php");
            break;
        case 'register':
            include("view/auth/register.php");
            break;
        case 'forgot-password':
            include("view/auth/forgot-password.php");
            break;
        case 'logout':
            header('Location: index.php');
            break;
        default:
            include("view/homepage.php");
            break;
    }
} else {
    include("view/homepage.php");
}
include("view/footer-site.php");
?>