<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập và tính trên dãy số</title>
</head>

<?php
if (isset($_POST['btnsub'])) {
    if (is_numeric($_POST['arrNum'])) {
        echo "Vui lòng nhập dãy số hợp lệ, các số cách nhau bởi dấu phẩy.";
        exit;
    }
    $arrNum = $_POST['arrNum'] ?? '';
    $numArray = explode(',', $arrNum);
    $result = array_sum($numArray);
}

function echoValue(&$value) {
    if (isset($value)) {
        echo $value;
    }
}
?>

<body>
    <form action="baitap2.php" method="post">
        <table>
            <tr>
                <td colspan="2">
                    <h2>Nhập và tính trên dãy số</h2>
                </td>
            </tr>
            <tr>
                <td>Nhập dãy số:</td>
                <td>
                    <input type="text" name="arrNum" value="<?php echoValue($arrNum) ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btnsub" value="Tính"></td>
            </tr>
            <?php if (isset($result)): ?>
            <tr>
                <td>Tổng dãy số</td>
                <td>
                    <input type="text" value="<?php echoValue($result) ?>">
                </td>
            </tr>
            <?php endif; ?>
        </table>
    </form>
</body>
</html>