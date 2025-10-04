<?php
function validateNumber(...$numbers) {
    foreach ($numbers as $number) {
        if (!is_numeric($number)) return false;
    }

    return true;
}

function echoValue($var) {
    if (isset($var)) {
        echo (string)$var;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "<h2>Bạn đã nhập thành công, dưới đây là những thông tin tin bạn đã nhập:</h2>";
    echo "<p>Họ tên: " . $_POST['fullname'] . "</p>";
    echo "<p>Address: " . $_POST['address'] . "</p>";
    echo "<p>Phone: " . $_POST['phone'] . "</p>";
    echo "<p>Gender: " . $_POST['gender'] . "</p>";
    echo "<p>Country: " . $_POST['country'] . "</p>";
    echo "<p>Note: " . nl2br($_POST['note']) . "</p>";
}
?>
