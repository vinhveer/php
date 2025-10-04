<?php
session_start();

$old    = $_SESSION['old']    ?? [];
$errors   = $_SESSION['errors'] ?? [];
unset($_SESSION['old'], $_SESSION['errors']);

function getOldValue(string $key): string
{
    global $old;
    $value = $_POST[$key] ?? ($old[$key] ?? '');
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function isChecked(string $name, string $value): string
{
    global $old;
    $current = $_POST[$name] ?? ($old[$name] ?? '');
    return ($current === $value) ? 'checked' : '';
}

function printError(array $errors, string $field): void
{
    if (isset($errors[$field])) {
        echo '<div class="error">' . htmlspecialchars($errors[$field], ENT_QUOTES, 'UTF-8') . '</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <h2>Register</h2>
    <form action="process.php" method="post" novalidate>
        <table>
            <tr>
                <td><label for="fullname">Full Name</label></td>
                <td><label for="username">Username</label></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="fullname" id="fullname" value="<?= getOldValue('fullname') ?>">
                    <?php printError($errors, 'fullname') ?>
                </td>
                <td>
                    <input type="text" name="username" id="username" value="<?= getOldValue('username') ?>">
                    <?php printError($errors, 'username') ?>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><label for="phone_number">Phone Number</label></td>
            </tr>
            <tr>
                <td>
                    <input type="email" name="email" id="email" value="<?= getOldValue('email') ?>">
                    <?php printError($errors, 'email') ?>
                </td>
                <td>
                    <input type="number" name="phone_number" id="phone_number" value="<?= getOldValue('phone_number') ?>">
                    <?php printError($errors, 'phone_number') ?>
                </td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><label for="confirm_password">Confirm Password</label></td>
            </tr>
            <tr>
                <td><input type="password" name="password" id="password" autocomplete="new-password"></td>
                <td>
                    <input type="password" name="confirm_password" id="confirm_password" autocomplete="new-password">
                    <?php printError($errors, 'password') ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <strong>Gender</strong>
                    <div class="radio-group">
                        <label><input type="radio" name="gender" value="male"   <?= isChecked('gender', 'male') ?>> Male</label>
                        <label><input type="radio" name="gender" value="female" <?= isChecked('gender', 'female') ?>> Female</label>
                        <label><input type="radio" name="gender" value="prefer" <?= isChecked('gender', 'prefer') ?>> Prefer not to say</label>
                    </div>
                    <?php printError($errors, 'gender') ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Register</button></td>
            </tr>
        </table>
    </form>
</body>

</html>
