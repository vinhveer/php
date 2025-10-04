<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả phép tính</title>
</head>

<?php
function validateNumber(...$numbers) {
    foreach ($numbers as $number) {
        if (!is_numeric($number)) return false;
    }

    return true;
}

function echoValue($var) {
    if (isset($var)) {
        echo htmlspecialchars((string)$var, ENT_QUOTES, 'UTF-8');
    }
}

if (isset($_POST["btnsubmit"])) {
    if (validateNumber($_POST["chon"], $_POST["numOne"], $_POST["numTwo"])) {
        $chon = $_POST["chon"];
        $numOne = $_POST["numOne"];
        $numTwo = $_POST["numTwo"];

        switch ($chon) {
            case 1:
                $phepTinh = "Cộng";
                $numThree = $numOne + $numTwo;
                break;
            case 2:
                $phepTinh = "Trừ";
                $numThree = $numOne - $numTwo;
                break;
            case 3:
                $phepTinh = "Nhân";
                $numThree = $numOne * $numTwo;
                break;
            case 4:
                $phepTinh = "Chia";
                if ($numTwo == 0) {
                    $numThree = "Không thể chia cho 0";
                } else {
                    $numThree = $numOne / $numTwo;
                }
                break;
            default:
                $phepTinh = "Phép tính không hợp lệ";
                $numThree = "Phép tính không hợp lệ";
                break;
        }
    }
} else {
    header("Location: pheptinh.php");
    exit();
}
?>

<body>
    <table>
        <tr>
            <td colspan="2">
                <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
            </td>
        </tr>
        <tr>
            <td>Chọn phép tính:</td>
            <td><?php echoValue($phepTinh) ?></td>
        </tr>
        <tr>
            <td>Số 1: </td>
            <td>
                <input type="text" name="number1" value="<?php echoValue($numOne); ?>">
            </td>
        </tr>
        <tr>
            <td>Số 2: </td>
            <td>
                <input type="text" name="number2" value="<?php echoValue($numTwo); ?>">
            </td>
        </tr>
        <tr>
            <td>Kết quả: </td>
            <td>
                <input type="text" name="number3" disabled value="<?php echoValue($numThree); ?>">
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <a href="javascript:window.history.back(-1);">Trở về trang trước</a>
            </td>
        </tr>
    </table>
</body>

</html>