<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
</head>

<?php
if (isset($_POST['btnsend'])) {
    $arrNum = $_POST['arrNum'] ?? '';
    $keyNum = $_POST['keyNum'] ?? '';

    $arrNum = trim($arrNum);
    $keyNum = trim($keyNum);

    if (!is_numeric($keyNum)) {
        echo "Vui lòng nhập số hợp lệ cho keyNum.";
    }

    $numArray = array_map('trim', explode(',', $arrNum));

    foreach ($numArray as $num) {
        if ($num === '' || !is_numeric($num)) {
            echo "Vui lòng nhập dãy số hợp lệ, các số cách nhau bởi dấu phẩy.";
        }
    }

    $result = array_search($keyNum, $numArray);
}

function echoValue(&$value) {
    if (isset($value) && $value !== '') {
        echo 'value="' . $value . '"';
    }
}

function echoArray($array) {
    if (!empty($array)) {
        echo 'value="' . implode(", ", $array) . '"';
    }
}
?>

<body>
    <form action="baitap4.php" method="post">
        <table>
            <tr>
                <td colspan="2">
                    <h2>Tìm kiếm</h2>
                </td>
            </tr>
            <tr>
                <td>Nhập mảng</td>
                <td><input type="text" name="arrNum" <?php echoValue($arrNum) ?>></td>
            </tr>
            <tr>
                <td>Nhập số cần tìm</td>
                <td><input type="text" name="keyNum" <?php echoValue($keyNum) ?>></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btnsend" value="Tìm kiếm"></td>
            </tr>
            <?php if (isset($result)): ?>
                <tr>
                    <td>Mảng</td>
                    <td><input type="text" <?php echoArray($numArray) ?>></td>
                </tr>
                <tr>
                    <td>Kết quả tìm kiếm</td>
                    <td>
                        <?php if ($result !== false): ?>
                            <input type="text" value="Tìm thấy tại vị trí <?php echo $result + 1; ?>">
                        <?php else: ?>
                            <input type="text" value="Không tìm thấy">
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endif; ?>
        </table>
    </form>
</body>

</html>
