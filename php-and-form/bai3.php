<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 3</title>
</head>

<?php
function validateNumber(...$numbers) {
    foreach ($numbers as $number) {
        if (!is_numeric($number)) return false;
    }

    return true;
}

function echoValue(&$var, $value_replace = null) {
    $val = isset($var) ? $var : $value_replace;

    if ($val !== null) {
        echo 'value="' . htmlspecialchars((string)$val, ENT_QUOTES, 'UTF-8') . '"';
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (validateNumber($_POST["chiSoCu"], $_POST["chiSoMoi"], $_POST["donGia"])) {
        if (empty($_POST["tenChuHo"])) {
            echo "Vui lòng nhập tên chủ hộ";
        } elseif ($_POST["chiSoMoi"] < $_POST["chiSoCu"]) {
            echo "Chỉ số mới phải lớn hơn chỉ số cũ";
        } else {
            $tenChuHo = $_POST["tenChuHo"];
            $chiSoCu = $_POST["chiSoCu"];
            $chiSoMoi = $_POST["chiSoMoi"];
            $donGia = $_POST["donGia"];
            $soTienThanhToan = ($chiSoMoi - $chiSoCu) * $donGia;
        }
    }
}
?>

<body>
    <table>
        <tr>
            <td colspan="2">
                <h2>Thanh toán tiền điện</h2>
            </td>
        </tr>
        <tr>
            <td>Tên chủ hộ: </td>
            <td><input type="text" name="tenChuHo" <?php echoValue($tenChuHo) ?>></td>
        </tr>
        <tr>
            <td>Chỉ số cũ: </td>
            <td><input type="text" name="chiSoCu" <?php echoValue($chiSoCu) ?>> (Kw)</td>
        </tr>
        <tr>
            <td>Chỉ số mới: </td>
            <td><input type="text" name="chiSoMoi" <?php echoValue($chiSoMoi) ?>> (Kw)</td>
        </tr>
        <tr>
            <td>Đơn giá: </td>
            <td><input type="text" name="donGia" <?php echoValue($donGia, 2000) ?>> (VND)</td>
        </tr>
        <tr>
            <td>Số tiền thanh toán: </td>
            <td><input type="text" name="soTienThanhToan" <?php echoValue($soTienThanhToan) ?>> (VND)</td>
        </tr>
        <tr>
            <td>
                <button type="submit">Tính</button>
            </td>
        </tr>
    </table>
</body>

</html>