<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sắp xếp mảng</title>
</head>
<?php
if (isset($_POST['btnsend'])) {
    $numArr = $_POST['numArr'];

    $numArr = trim($numArr);
    $numArray = array_map('trim', explode(',', $numArr));

    foreach ($numArray as $num) {
        if ($num === '' || !is_numeric($num)) {
            echo "Vui lòng nhập dãy số hợp lệ, các số cách nhau bởi dấu phẩy.";
            exit;
        }
    }

    $ascArray = $numArray;
    sort($ascArray);

    $descArray = $numArray;
    rsort($descArray);
}

function echoValue(&$value) {
    if (isset($value) && $value !== '') {
        echo 'value="' . $value . '"';
    }
}

function echoArray(&$array) {
    if (!empty($array)) {
        echo 'value="' . implode(", ", $array) . '"';
    }
}
?>
<body>
    <form action="baitap6.php" method="post">
        <table>
            <tr>
                <td>
                    <h2>Sắp xếp mảng</h2>
                </td>
            </tr>
            <tr>
                <td>Nhập mảng:</td>
                <td><input type="text" name="numArr" <?php echoValue($numArr) ?>></td>
            </tr>
            <tr>
                <td><input type="submit" name="btnsend" value="Sắp xếp tăng / giảm"></td>
            </tr>
            <?php if (isset($ascArray) && isset($descArray)): ?>
            <tr>
                <td>Tăng dần:</td>
                <td><input type="text" <?php echoArray($ascArray) ?>></td>
            </tr>
            <tr>
                <td>Giảm dần:</td>
                <td><input type="text" <?php echoArray($descArray) ?>></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td colspan="2">(<b style="color:red">Ghi chú:</b> Các số được nhập sẽ cách nhau bởi dấu ",")</td>
            </tr>
        </table>
    </form>
</body>
</html>
