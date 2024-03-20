<!-- Controller user-->
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
include("model/pdo.php");
include("global.php");
include("model/taikhoan.php");
include("model/loai.php");
include("model/hang-hoa.php");

include("view/header-site.php");

$listdanhmuc = loadall_danhmuc_trangchu();
$listdanhmuc_all = loadall_danhmuc();
$newProductList = hang_hoa_select_moi_nhat("created_at", 12);
$topViewProductList = hang_hoa_select_moi_nhat("luotxem", 12);

if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'product':
            if (isset($_GET['category_id'])) {
                $category_id = $_GET['category_id'];
                if ($category_id == 1) {
                    $categoryDetail['name'] = 'Tất cả';
                    $productList = hang_hoa_select_all_no_param();
                    include("view/product-list.php");
                } elseif ($category_id > 0) {
                    $categoryDetail = loadone_danhmuc($category_id);
                    $productList = hang_hoa_select_all("", $category_id);
                    include("view/product-list.php");
                }
            } else {
                include("view/home-page.php");
            }
            break;
        case 'product-detail':
            include("view/product-list.php");
            break;
        case 'checkout':
            include("view/cart/checkout.php");
            break;
        case 'login':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('Location:index.php');
                } else {
                    $thongbao = "Đăng nhập thấp lại vui lòng kiểm tra lại hoặc điền email đăng ký để lấy lại mật khẩu!";
                }
            }
            include "view/auth/login.php";
            break;
        case 'register':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                insert_taikhoan($email, $user, $pass);
                $thongbao = "Đã đăng ký thành công vui lòng đăng nhập!";
            }
            include "view/auth/register.php";
            break;
        case 'forgot-password':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là:" . $checkemail['pass'];
                } else {
                    $thongbao = "Email này không tồn tại!";
                }
            }
            include "view/auth/forgot-password.php";
            break;
        case 'logout':
        case 'thoat':
            session_unset();
            header('Location: index.php');
            include "view/login.php";
            break;
        case 'form_account':
            include("view/auth/form_account.php");
            break;
        case 'home_admin':
            header("location: admin/index.php");
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