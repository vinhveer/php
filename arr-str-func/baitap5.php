<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay thế</title>
</head>

<?php
if (isset($_POST['btnsend'])) {
    $arrNum = $_POST['arrNum'];
    $keyNum = $_POST['keyNum'];
    $newNum = $_POST['newNum'];

    $arrNum = trim($arrNum);
    $keyNum = trim($keyNum);
    $newNum = trim($newNum);

    if ($arrNum === '') {
        echo "Vui lòng nhập dãy số hợp lệ, các số cách nhau bởi dấu phẩy.";
        exit;
    }

    $numArray = array_map('trim', explode(',', $arrNum));

    foreach ($numArray as $num) {
        if ($num === '' || !is_numeric($num)) {
            echo "Vui lòng nhập dãy số hợp lệ, các số cách nhau bởi dấu phẩy.";
            exit;
        }
    }

    if (!is_numeric($keyNum) || !is_numeric($newNum)) {
        echo "Vui lòng nhập số hợp lệ cho keyNum và newNum.";
        exit;
    }

    if ($keyNum === $newNum) {
        echo "Giá trị cần thay thế và giá trị thay thế không được giống nhau.";
        exit;
    }

    if (!in_array($keyNum, $numArray)) {
        echo "Giá trị cần thay thế không tồn tại trong mảng.";
        exit;
    }

    $replaceArray = str_replace($keyNum, $newNum, $numArray);
}

function echoArray(&$array) {
    if (!empty($array)) {
        echo 'value="' . implode(", ", $array) . '"';
    }
}

function echoValue(&$value) {
    if (isset($value) && $value !== '') {
        echo 'value="' . $value . '"';
    }
}
?>

<body>
    <form action="baitap5.php" method="post">
        <table>
            <tr>
                <td>
                    <h2>Thay thế</h2>
                </td>
            </tr>
            <tr>
                <td>Nhập các phần tử:</td>
                <td><input type="text" name="arrNum" <?php echoValue($arrNum) ?>></td>
            </tr>
            <tr>
                <td>Giá trị cần thay thế:</td>
                <td><input type="text" name="keyNum" <?php echoValue($keyNum) ?>></td>
            </tr>
            <tr>
                <td>Giá trị thay thế:</td>
                <td><input type="text" name="newNum" <?php echoValue($newNum) ?>></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btnsend" value="Thay thế">
                </td>
            </tr>
            <?php if (isset($replaceArray)): ?>
            <tr>
                <td>Mảng cũ</td>
                <td><input type="text" <?php echoArray($numArray) ?>></td>
            </tr>
            <tr>
                <td>Mảng sau khi thay thế</td>
                <td><input type="text" <?php echoArray($replaceArray) ?>></td>
            </tr>
            <tr>
                <td colspan="2">(<b color="red">Ghi chú:</b> Các số được nhập sẽ cách nhau bởi dấu ",")</td>
            </tr>
            <?php endif; ?>
        </table>
    </form>
</body>
</html>