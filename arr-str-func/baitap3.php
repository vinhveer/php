<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phát sinh mảng và tính toán</title>
</head>
<?php
if (isset($_POST['btnsend'])) {
    $n = $_POST['num'] ?? 0;
    if (!is_numeric($n) || $n <= 0) {
        echo "Vui lòng nhập số phần tử hợp lệ (số nguyên dương).";
    } else {
        $array = tao_mang($n);
    }
}

function tao_mang($n)
{
    $array = [];
    for ($i = 0; $i < $n; $i++) {
        $array[] = rand(0, 20);
    }
    return $array;
}

function xuat_mang($array)
{
    return implode(", ", $array);
}
?>
<body>
    <form action="baitap3.php" method="post">
        <table>
            <tr>
                <td colspan="2">
                    <h2>Phát sinh mảng và tính toán</h2>
                </td>
            </tr>
            <tr>
                <td>Nhập số phần tử:</td>
                <td>
                    <input type="text" name="num" value="<?php if (isset($n)) echo $n; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btnsend" value="Phát sinh và tính toán">
                </td>
            </tr>
            <?php if (isset($array)) : ?>
            <tr>
                <td>Mảng:</td>
                <td>
                    <input type="text" value="<?php echo xuat_mang($array) ?>" disabled />
                </td>
            </tr>
            <tr>
                <td>
                    GTLN (MAX) trong mảng:
                </td>
                <td>
                    <input type="text" value="<?php echo max($array) ?>" disabled />
                </td>
            </tr>
            <tr>
                <td>
                    GTNN (MIN) trong mảng:
                </td>
                <td>
                    <input type="text" value="<?php echo min($array) ?>" disabled />
                </td>
            </tr>
            <tr>
                <td>Tổng mảng</td>
                <td>
                    <input type="text" value="<?php echo array_sum($array) ?>" disabled />
                </td>
            </tr>
            <tr>
                <td colspan="2">(<b color="red">Ghi chú:</b> Các giá trị trong mảng sẽ có giá trị từ 0 đến 20)</td>
            </tr>
            <?php endif; ?>
        </table>
    </form>

</body>

</html>