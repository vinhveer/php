<?php
session_start();
$data = $_SESSION['reg_data'] ?? null;
unset($_SESSION['reg_data']);

if (!$data) {
    header('Location: index.php');
    exit;
}

$fullname     = htmlspecialchars($data['fullname'] ?? '', ENT_QUOTES, 'UTF-8');
$username     = htmlspecialchars($data['username'] ?? '', ENT_QUOTES, 'UTF-8');
$email        = htmlspecialchars($data['email'] ?? '', ENT_QUOTES, 'UTF-8');
$phone_number = htmlspecialchars($data['phone_number'] ?? '', ENT_QUOTES, 'UTF-8');
$gender       = htmlspecialchars($data['gender'] ?? '', ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>

<body>
    <a href="index.php">Back to Register</a>
    <h2>Welcome, <?= $fullname ?>!</h2>
    <p>Registration successful. Here are your details:</p>
    <table border="1">
        <tr>
            <td><strong>Full Name</strong></td>
            <td><?= $fullname ?></td>
        </tr>
        <tr>
            <td><strong>Username</strong></td>
            <td><?= $username ?></td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td><?= $email ?></td>
        </tr>
        <tr>
            <td><strong>Phone Number</strong></td>
            <td><?= $phone_number ?></td>
        </tr>
        <tr>
            <td><strong>Gender</strong></td>
            <td><?= $gender ?></td>
        </tr>
    </table>
</body>

</html>
