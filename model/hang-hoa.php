<?php
require_once 'pdo.php';

function hang_hoa_insert($productName, $price, $discount, $image, $weight, $description, $category_id)
{
    $created_at = date('Y-m-d H:i:s');
    $sql = "INSERT INTO `sanpham`(`name`, `price`, `img`, `mota`, `iddm`, `discount`, `weight`, `created_at`) VALUES ('$productName','$price','$image','$description','$category_id','$discount','$weight', '$created_at')";
    pdo_execute($sql);
}

function hang_hoa_update($id, $productName, $price, $discount, $image, $weight, $description, $category_id)
{
    // $updated_at = date('Y-m-d H:i:s');
    if ($image != "") {
        $sql = "UPDATE sanpham SET name='" . $productName . "', price='" . $price . "', img='" . $image . "', mota='" . $description . "', iddm='" . $category_id . "', discount='" . $discount . "', weight='" . $weight . "'WHERE id=" . $id;
    } else {
        $sql = "UPDATE sanpham SET name='" . $productName . "', price='" . $price . "', mota='" . $description . "', iddm='" . $category_id . "', discount='" . $discount . "', weight='" . $weight . "'WHERE id=" . $id;
    }
    pdo_execute($sql);
}

function hang_hoa_delete($id)
{
    $sql = "DELETE FROM `sanpham` WHERE id =" . $id;
    pdo_execute($sql);
}

function hang_hoa_select_all($keyword, $category_id)
{
    $sql = "SELECT * FROM sanpham WHERE 1";
    if ($keyword != "") {
        $sql .= " AND name LIKE '%" . $keyword . "%'";
    }
    if ($category_id > 0) {
        $sql .= " AND category_id = '" . $category_id . "'";
    }
    $sql .= " ORDER BY id DESC";
    $list_product = pdo_query($sql);
    return $list_product;
}

function hang_hoa_select_by_id($id)
{
    $sql = "SELECT * FROM sanpham WHERE id =" . $id;
    $product = pdo_query_one($sql);
    return $product;
}

function hang_hoa_exist($ma_hh)
{
    $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
    return pdo_query_value($sql, $ma_hh) > 0;
}

function hang_hoa_tang_so_luot_xem($ma_hh)
{
    $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
    pdo_execute($sql, $ma_hh);
}

function hang_hoa_select_top10()
{
    $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
    return pdo_query($sql);
}

function hang_hoa_select_dac_biet()
{
    $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
    return pdo_query($sql);
}

function hang_hoa_select_by_loai($ma_loai)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
    return pdo_query($sql, $ma_loai);
}

function hang_hoa_select_keyword($keyword)
{
    $sql = "SELECT * FROM hang_hoa hh "
        . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
        . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
    return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
}

function hang_hoa_select_page()
{
    if (!isset($_SESSION['page_no'])) {
        $_SESSION['page_no'] = 0;
    }
    if (!isset($_SESSION['page_count'])) {
        $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
        $_SESSION['page_count'] = ceil($row_count / 10.0);
    }
    if (exist_param("page_no")) {
        $_SESSION['page_no'] = $_REQUEST['page_no'];
    }
    if ($_SESSION['page_no'] < 0) {
        $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
    }
    if ($_SESSION['page_no'] >= $_SESSION['page_count']) {
        $_SESSION['page_no'] = 0;
    }
    $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT " . $_SESSION['page_no'] . ", 10";
    return pdo_query($sql);
}
