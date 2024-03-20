<!-- Controller admin -->
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
include("./layout/header-admin.php");
include("./layout/sidebar-admin.php");
include("./layout/top-navbar.php");
include("./layout/header-admin.php");

include("../model/loai.php");
include("../model/hang-hoa.php");



if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'category':
            $listdanhmuc = loadall_danhmuc();
            include("category/list.php");
            break;
        case 'category-add':
            if (isset($_POST["submit"]) && ($_POST["submit"])) {
                $tenloai = $_POST['categoryName'];
                $image = $_FILES['image']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                insert_danhmuc($tenloai, $image);
                $thongbao = "Thêm thành công";
            }
            include("category/add.php");
            break;

        case 'category-detail':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include("./category/update.php");
            break;

        case 'category-update':
            if (isset($_POST["submit"]) && ($_POST["submit"])) {
                $id = $_POST["id"];
                $tenloai = $_POST['categoryName'];
                $image = $_FILES['image']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                update_danhmuc($id, $tenloai, $image);
                $thongbao = "Cập nhật thành công";
                loadall_danhmuc();
            }
            include("category/update.php");
            break;
        case 'category-delete':
            if (isset($_GET['id']) && ($_GET['id'])) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include("category/list.php");
            break;
        case 'product':
            $keyword = isset($_POST["search"]) && $_POST["search"] ? $_POST['keyword'] : "";
            $category_id = isset($_POST["search"]) && $_POST["search"] ? $_POST['category_id'] : 0;

            $listdanhmuc = loadall_danhmuc();
            $list_product = hang_hoa_select_all($keyword, $category_id);
            include("product/list.php");
            break;
        case 'product-add':
            if (isset($_POST["submit"]) && ($_POST["submit"])) {
                $category_id = $_POST['category_id'];
                $productName = $_POST['productName'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $weight = $_POST['weight'];
                $description = $_POST['description'];

                $image = $_FILES['image']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                hang_hoa_insert($productName, $price, $discount, $image, $weight, $description, $category_id);
                $message_success = "Đã thêm thành công sản phẩm";
            }
            $listdanhmuc = loadall_danhmuc();
            include("product/add.php");
            break;
        case 'product-detail':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $product = hang_hoa_select_by_id($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include("./product/update.php");
            break;
        case 'product-update':
            if (isset($_POST["submit"]) && $_POST["submit"]) {
                $id = $_POST["id"];
                $category_id = $_POST["category_id"];
                $productName = $_POST["productName"];
                $price = $_POST["price"];
                $discount = $_POST["discount"];
                $weight = $_POST["weight"];
                $description = $_POST["description"];

                $image = $_FILES['image']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                hang_hoa_update($id, $productName, $price, $discount, $image, $weight, $description, $category_id);
                $message_success = "Cập nhật thành công sản phẩm";
            }
            $list_product = hang_hoa_select_all("", 0);
            $listdanhmuc = loadall_danhmuc();
            include("product/list.php");
            break;
        case 'product-delete':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                hang_hoa_delete($_GET['id']);
            }
            $list_product = hang_hoa_select_all("", 0);
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