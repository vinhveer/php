<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1</title>
    <link rel="stylesheet" href="style.css">
    <style>
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<?php
include('lib/import.php');

$data = selectAll($conn, 'hang_sua');
?>

<body>
    <?php
    generateTitle("THÔNG TIN HÃNG SỮA");
    
    $headers = [
        'Ma_hang_sua' => 'Mã hãng sữa',
        'Ten_hang_sua' => 'Tên hãng sữa',
        'Dia_chi' => 'Địa chỉ',
        'Dien_thoai' => 'Điện thoại',
        'Email' => 'Email'
    ];

    generateTable($data, $headers);
    ?>
</body>
</html>
