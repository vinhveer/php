<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 4</title>
</head>

<?php
function validate(...$numbers)
{
    foreach ($numbers as $number) {
        if (!is_numeric($number)) {
            return false;
        }
    }

    return true;
}

function echoValue(&$var, $replace = "")
{
    $value = isset($var) ? $var : $replace;
    echo "value=\"" . htmlspecialchars($value, ENT_QUOTES, "UTF-8") . "\"";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (validate($_POST["diemToan"], $_POST["diemLy"], $_POST["diemHoa"], $_POST["diemChuan"])) {
        $diemToan = $_POST["diemToan"];
        $diemLy = $_POST["diemLy"];
        $diemHoa = $_POST["diemHoa"];
        $diemChuan = $_POST["diemChuan"];
        $tongDiem = $diemToan + $diemLy + $diemHoa;
        if ($diemToan != 0 && $diemLy != 0 && $diemHoa != 0 && $tongDiem >= $diemChuan) $ketQuaThi = "Đậu"; else $ketQuaThi = "Rớt";
    }
}
?>

<body>
    <form action="bai4.php" method="post">
        <table>
            <tr>
                <td colspan="2">
                    <h2>KẾT QUẢ THI ĐẠI HỌC</h2>
                </td>
            </tr>
            <tr>
                <td>Toán:</td>
                <td><input type="text" name="diemToan" <?php echoValue($diemToan) ?>></td>
            </tr>
            <tr>
                <td>Lý:</td>
                <td><input type="text" name="diemLy" <?php echoValue($diemLy) ?>></td>
            </tr>
            <tr>
                <td>Hóa:</td>
                <td><input type="text" name="diemHoa" <?php echoValue($diemHoa) ?>></td>
            </tr>
            <tr>
                <td>Điểm chuẩn:</td>
                <td><input type="text" name="diemChuan" <?php echoValue($diemChuan) ?>></td>
            </tr>
            <tr>
                <td>Tổng điểm:</td>
                <td><input type="text" name="tongDiem" disabled <?php echoValue($tongDiem) ?>></td>
            </tr>
            <tr>
                <td>Kết quả thi:</td>
                <td><input type="text" name="ketQuaThi" disabled <?php echoValue($ketQuaThi) ?>></td>
            </tr>
            <tr>
                <td>
                    <button type="submit">Xem kết quả</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>