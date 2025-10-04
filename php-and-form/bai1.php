<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 1</title>
    <style>
        input {
            width: 100%;
        }
    </style>
</head>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (is_numeric($_POST["length"]) && is_numeric($_POST["wide"])) {
        $length = $_POST["length"];
        $wide = $_POST["wide"];
        $area = $length * $wide;
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
    <form action="bai1.php" method="post" style="width: 300px; margin: 0 auto;">
        <table>
            <tr>
                <th colspan="2">    
                    <h2>Calculate Rectangle Area</h2>
                </th>
            </tr>
            <tr>
                <td>Length:</td>
                <td>
                    <input type="text" name="length" <?php echo echoValue($length) ?>>
                </td>
            </tr>
            <tr>
                <td>Wide:</td>
                <td>
                    <input type="text" name="wide" <?php echo echoValue($wide) ?>>
                </td>
            </tr>
            <tr>
                <td>Area:</td> 
                <td>
                    <input type="text" name="area" disabled <?php echo echoValue($area) ?>>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Calculate</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>