<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include 'connect.php';
    include 'table-components.php';

    $sql = "SELECT * FROM city";

    $result = mysqli_query($mysqli, $sql);

    displayTable($result);
    ?>
</body>
</html>