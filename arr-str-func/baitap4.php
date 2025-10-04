<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
</head>

<?php
if (isset($_POST['btnsend'])) {
    if (!is_numeric($keyNum)) {
        echo "Vui lòng nhập số hợp lệ cho keyNum.";
        exit;
    }

    $numArray = explode(',', $arrNum);


    foreach ($numArray as $num) {
        if (!is_numeric($num)) {
            echo "Vui lòng nhập dãy số hợp lệ, các số cách nhau bởi dấu phẩy.";
            exit;
        }
    }

    $result = array_search($keyNum, $numArray);
}

function array_search($key, $array)
{
    $positions = [];
    foreach ($array as $index => $value) {
        if ($value == $key) {
            $positions[] = $index;
        }
    }
    return empty($positions) ? "Không tìm thấy" : implode(", ", $positions);
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
                <td><input type="text" name="arrNum"></td>
            </tr>
            <tr>
                <td>Nhập số cần tìm</td>
                <td><input type="text" name="keyNum"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btnsend" value="Tìm kiếm"></td>
            </tr>
            <?php if (isset($result)): ?>
                <tr>
                    <td>Mảng</td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>Kết quả tìm kiếm</td>
                    <td><input type="text"></td>
                </tr>
            <?php endif; ?>
        </table>
    </form>
</body>

</html>