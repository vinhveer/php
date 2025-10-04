<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 5</title>
</head>

<?php
function validateTime($t) {
    return preg_match('/^\d{2}:\d{2}$/', $t);
}

function echoVal(&$var, $replace = "") {
    $temp = isset($var) ? $var : $replace;
    echo "value=\"$temp\"";
}

function calcKaraoke($start, $end) {
    if ($end <= 17)
        return ($end - $start) * 20000;
    else
        return ($end - $start) * 45000;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $gioBatDau = $_POST["gioBatDau"] ?? '';
    $gioKetThuc = $_POST["gioKetThuc"] ?? '';

    if (!validateTime($gioBatDau) || !validateTime($gioKetThuc)) {
        echo "Vui lòng nhập đúng định dạng giờ (HH:MM)";
    } else {
        [$sbH, $sbM] = explode(':', $gioBatDau);
        [$skH, $skM] = explode(':', $gioKetThuc);
        $start = $sbH + $sbM / 60;
        $end   = $skH + $skM / 60;

        if ($start < 10) {
            echo "Giờ bắt đầu phải từ 10h";
        } elseif ($end <= $start) {
            echo "Giờ kết thúc phải lớn hơn giờ bắt đầu";
        } else {
            $tinhTien = calcKaraoke($start, $end);
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
                <td><input type="time" name="gioBatDau" <?php echoVal($gioBatDau) ?>></td>
            </tr>
            <tr>
                <td>Giờ kết thúc: </td>
                <td><input type="time" name="gioKetThuc" <?php echoVal($gioKetThuc) ?>></td>
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
