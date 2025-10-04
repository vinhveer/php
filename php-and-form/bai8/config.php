<?php
function validateNumber(...$numbers)
{
    foreach ($numbers as $number) {
        if (!is_numeric($number)) return false;
    }

    return true;
}

function echoValue($var)
{
    if (isset($var)) {
        echo (string)$var;
    }
}

if (isset($_POST["btnsend"])) {
    $fullname = $_POST['fullname'] ?? '';
    $address  = $_POST['address']  ?? '';
    $phone    = $_POST['phone']    ?? '';
    $gender   = $_POST['gender']   ?? '';
    $country  = $_POST['country']  ?? '';
    $note     = $_POST['note']     ?? '';

    if (empty($fullname)) {
        $error = "Họ tên không được để trống";
    } elseif (empty($address)) {
        $error = "Địa chỉ không được để trống";
    } elseif (empty($phone)) {
        $error = "Số điện thoại không được để trống";
    } elseif (!validateNumber($phone)) {
        $error = "Số điện thoại phải là số";
    } elseif (empty($gender)) {
        $error = "Giới tính không được để trống";
    } elseif (empty($country)) {
        $error = "Quốc gia không được để trống";
    } else {
        echo "<h2>Bạn đã nhập thành công, dưới đây là những thông tin tin bạn đã nhập:</h2>";
        echo "<p>Họ tên: " . $_POST['fullname'] . "</p>";
        echo "<p>Address: " . $_POST['address'] . "</p>";
        echo "<p>Phone: " . $_POST['phone'] . "</p>";
        echo "<p>Gender: " . $_POST['gender'] . "</p>";
        echo "<p>Country: " . $_POST['country'] . "</p>";
        echo "<p>Note: " . nl2br($_POST['note']) . "</p>";
    }
}
