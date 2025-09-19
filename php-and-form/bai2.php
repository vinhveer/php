<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 2</title>
</head>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (is_numeric($_POST["radius"])) {
        $radius = $_POST["radius"];
        $perimeter = 2 * pi() * $radius;
        $area = pi() * ($radius ** 2);
    }
}

function echoValue(&$var, $value_replace = null) {
    $val = isset($var) ? $var : $value_replace;

    if ($val !== null) {
        echo 'value="' . htmlspecialchars((string)$val, ENT_QUOTES, 'UTF-8') . '"';
    }
}

?>
<body>
    <form action="bai2.php" method="post">
        <table>
            <tr>
                <td colspan="2">
                    <h2>Calculate Circle Area and Perimeter</h2>
                </td>
            </tr>
            <tr>
                <td>Radius:</td>
                <td>
                    <input type="text" name="radius" <?php echoValue($radius) ?>>
                </td>
            </tr>
            <tr>
                <td>Perimeter:</td>
                <td>
                    <input type="text" name="perimeter" disabled <?php echoValue($perimeter) ?>>
                </td>
            </tr>
            <tr>
                <td>Area:</td>
                <td>
                    <input type="text" name="area" disabled <?php echoValue($area) ?>>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit">Calculate</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>