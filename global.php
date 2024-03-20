<?php
$imagePath = "upload/";

function formatCurrency($amount)
{
    return number_format($amount) . 'đ';
}
function displayToastrMessageSuccess($message_success)
{
    echo '<script>';
    echo 'toastr.success("' . $message_success . '", "Thành công")';
    echo '</script>';
}
function displayToastrMessageError($message_error)
{
    echo '<script>';
    echo 'toastr.error("' . $message_error . '", "Thất bại")';
    echo '</script>';
}
function displayToastrMessageWarning($message_warning)
{
    echo '<script>';
    echo 'toastr.warning("' . $message_warning . '", "Cảnh báo")';
    echo '</script>';
}
