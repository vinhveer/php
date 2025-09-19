<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 5</title>
</head>

<?php
function validate(...$numbers) {
    foreach ($numbers as $number) {
        if (!is_numeric($number)) return false;
    }

    return true;
}

function echoVal(&$var, $replace = "") {
    $temp = isset($var) ? $var : $replace;
    echo "value=\"" . htmlspecialchars($temp, ENT_QUOTES, "UTF-8") . "\"";
}



function calcKaraoke($start, $end) {
    if ($start < 10) throw new Exception("Giờ bắt đầu phải từ 10h");
    if ($end <= $start) throw new Exception("Giờ kết thúc phải lớn hơn giờ bắt đầu");

    if ($end <= 17)
        return ($end - $start) * 20000;
    else
        return ($end - $start) * 45000;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (validate($_POST["gioBatDau"], $_POST["gioKetThuc"])) {
        $gioBatDau = $_POST["gioBatDau"];
        $gioKetThuc = $_POST["gioKetThuc"];
        try {
            $tinhTien = calcKaraoke($gioBatDau, $gioKetThuc);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
?>

<body>
    <form action="bai5.php" method="post">
        <table>
            <tr>
                <td colspan="2">
                    <h2>TÍNH TIỀN KARAOKE</h2>
                </td>
            </tr>
            <tr>
                <td>Giờ bắt đầu: </td>
                <td><input type="text" name="gioBatDau" <?php echoVal($gioBatDau) ?>> (h)</td>
            </tr>
            <tr>
                <td>Giờ kết thúc: </td>
                <td><input type="text" name="gioKetThuc" <?php echoVal($gioKetThuc) ?> > (h)</td>
            </tr>
            <tr>
                <td>Tiền thanh toán: </td>
                <td><input type="text" name="tinhTien" <?php echoVal($tinhTien) ?> disabled> (VND)</td>
            </tr>
            <tr>
                <td>
                    <button type="submit">Tính tiền</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>