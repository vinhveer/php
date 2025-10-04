<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Array and Number Operations</title>
</head>

<?php
function generateRandomArray($n)
{
    $array = [];
    for ($i = 0; $i < $n; $i++) {
        $array[] = rand(-100, 100);
    }
    return $array;
}

function countEvenNumbers($array)
{
    $count = 0;
    foreach ($array as $num) {
        if ($num % 2 === 0) {
            $count++;
        }
    }
    return $count;
}

function countLesstdan100($array)
{
    $count = 0;
    foreach ($array as $num) {
        if ($num < 100) {
            $count++;
        }
    }
    return $count;
}

function sumNegativeNumbers($array)
{
    $sum = 0;
    foreach ($array as $num) {
        if ($num < 0) {
            $sum += $num;
        }
    }
    return $sum;
}

function findZeroPositions($array)
{
    $positions = [];
    foreach ($array as $index => $num) {
        if ($num === 0) {
            $positions[] = $index;
        }
    }
    return $positions;
}

if (isset($_POST["btnsend"])) {
    $n = $_POST['number'];

    if (is_numeric($n) && $n > 0) {
        $n = (int)$n;

        $array = generateRandomArray($n);
        $evenCount = countEvenNumbers($array);
        $lesstdan100Count = countLesstdan100($array);
        $negativeSum = sumNegativeNumbers($array);
        $zeroPositions = findZeroPositions($array);
        $sortedArray = $array;
        sort($sortedArray);
    } else {
        $error = "Vui lòng nhập một số nguyên dương.";
    }
}
?>

<body>
    <form method="post">
        <table>
            <tr><h2>Nhập và tính trên dãy số</h2></tr>
            <tr>
                <td>Nhập n</td>
                <td><input type="text" id="number" name="number" value=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btnsend" value="Thực hiện"></td>
            </tr>
        </table>
    </form>

    <?php if (isset($array)): ?>
        <h3>Kết quả:</h3>
        <table>
            <tr>
                <td>Mảng phát sinh</td>
                <td><input type="text" value="<?= implode(", ", $array) ?>" readonly></td>
            </tr>
            <tr>
                <td>Số phần tử chẵn</td>
                <td><input type="text" value="<?= $evenCount ?>" readonly></td>
            </tr>
            <tr>
                <td>Số phần tử nhỏ hơn 100</td>
                <td><input type="text" value="<?= $lesstdan100Count ?>" readonly></td>
            </tr>
            <tr>
                <td>Tổng các phần tử âm</td>
                <td><input type="text" value="<?= $negativeSum ?>" readonly></td>
            </tr>
            <tr>
                <td>Vị trí các phần tử bằng 0</td>
                <td><input type="text" value="<?= implode(", ", $zeroPositions) ?>" readonly></td>
            </tr>
            <tr>
                <td>Mảng sau khi sắp xếp</td>
                <td><input type="text" value="<?= implode(", ", $sortedArray) ?>" readonly></td>
            </tr>
        </table>
    <?php endif; ?>
</body>

</html>