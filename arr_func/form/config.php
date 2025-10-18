<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
</head>

<?php
include("../lib.php");

if (checkPost("send")) {
    $fullname = getPostValue("fullname", "Fullname");
    $gender = getPostValue("gender", "Gender");
    $country = getPostValue("country", "Country");
    $study = getPostValue("study", "Study");
    $note = getPostValue("note", "Note");

    if (checkIsset($fullname, $gender, $country, $study, $note)) {
        echo "<body>";
        echo "<p>Bạn đã nhập thành công, dưới đây là những thông tin bạn đã nhập:</p>";
        echo "<p><strong>Fullname:</strong> " . htmlspecialchars($fullname) . "</p>";
        echo "<p><strong>Gender:</strong> " . htmlspecialchars($gender) . "</p>";
        echo "<p><strong>Country:</strong> " . htmlspecialchars($country) . "</p>";
        echo "<p><strong>Study:</strong> " . htmlspecialchars(implode(", ", $study)) . "</p>";
        echo "<p><strong>Note:</strong> " . nl2br(htmlspecialchars($note)) . "</p>";
        echo "</body>";
    }
} else {
    header("Location: form.htm");
    exit();
}
?>

</html>