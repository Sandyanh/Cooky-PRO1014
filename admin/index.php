<!-- Controller admin -->
<?php
include("./layout/header-admin.php");
include("./layout/sidebar-admin.php");
include("./layout/top-navbar.php");

if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'category':
            include("category/list.php"); 
        break;
        case 'category-add':
            include("category/add.php");
        break;
        case 'category-update':
            include("category/update.php");
        break;
        case 'category-delete':
            include("category/list.php");
        break;
        case 'product':
            include("product/list.php");
        break;
        case 'product-add':
            include("product/add.php");
        break;
        case 'product-update':
            include("product/update.php");
        break;
        case 'product-delete':
            include("product/list.php");
        break;
        case 'statistics':
            include("statistics/list.php");
        break;
        case 'chart-comment':
            include("statistics/chart-comment.php");
        break;
    }
}
include("./layout/footer-admin.php")
?>