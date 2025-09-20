<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="bai1.php" method="post">
        <input type="text" name="number" id="" placeholder="Nhap so vao day">
        <button type="submit">Tinh</button>
    </form>
    <?php
    $number = random_int()

    if ($number <= 100 && $number >= 1) {
        for ($i = 0; $i < $number; $i += 2) {
            echo $i . " ";
        }
    }

    ?>
</body>

</html>