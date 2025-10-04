<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$data = [
    'fullname'         => trim($_POST['fullname'] ?? ''),
    'username'         => trim($_POST['username'] ?? ''),
    'email'            => trim($_POST['email'] ?? ''),
    'phone_number'     => trim($_POST['phone_number'] ?? ''),
    'gender'           => $_POST['gender'] ?? '',
    'password'         => $_POST['password'] ?? '',
    'confirm_password' => $_POST['confirm_password'] ?? ''
];

$errors = [];

$required = [
    'fullname' => 'Full name',
    'username' => 'Username', 
    'email' => 'Email',
    'phone_number' => 'Phone number',
    'gender' => 'Gender',
    'password' => 'Password',
    'confirm_password' => 'Confirm password'
];

foreach ($required as $field => $label) {
    if ($data[$field] === '') {
        $errors[$field] = $label . " is required.";
    }
}

if (!in_array($data['gender'], ['male', 'female', 'prefer'], true)) {
    $errors['gender'] = 'Gender is invalid.';
}

if ($data['password'] !== $data['confirm_password']) {
    $errors['password'] = 'Passwords do not match.';
}

if ($errors) {
    $_SESSION['old'] = [
        'fullname'     => $data['fullname'],
        'username'     => $data['username'],
        'email'        => $data['email'],
        'phone_number' => $data['phone_number'],
        'gender'       => $data['gender']
    ];
    $_SESSION['errors'] = $errors;
    header('Location: index.php');
    exit;
}

$_SESSION['reg_data'] = [
    'fullname'     => $data['fullname'],
    'username'     => $data['username'],
    'email'        => $data['email'],
    'phone_number' => $data['phone_number'],
    'gender'       => $data['gender']
];

header('Location: welcome.php');
exit;