<?php
$host     = '127.0.0.1';
$user     = 'root';
$pass     = '84648337';
$db       = 'quan_ly_ban_sua';
$port     = 3306;

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_errno) {
    http_response_code(500);
    echo "
    <script>
        alert('Kết nối thất bại: {$conn->connect_error}');
    </script>
    ";
    exit;
} else {
    echo "
    <script>
        console.log('Kết nối thành công.');
    </script>";
}