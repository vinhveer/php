<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 3</title>
    <link rel="stylesheet" href="style.css">
    <style>
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            border-collapse: collapse;
        }

        th {
            color: #bc1c00;
            text-align: center;
        }

        table tr:nth-child(even) {
            background-color: #fee0c1;
        }
    </style>
</head>

<?php
include('lib/import.php');

$data = selectAll($conn, 'khach_hang');
?>

<body>
    <?php
    generateTitle("THÔNG TIN KHÁCH HÀNG");

    $headers = [
        'Ma_khach_hang' => 'Mã khách hàng',
        'Ten_khach_hang' => 'Tên khách hàng',
        'Phai' => [
            'Phái',
            [
                0 => '<img src="Hinh_sua/nam.png" alt="Nam" width="40">',
                1 => '<img src="Hinh_sua/nu.png" alt="Nữ" width="40">'
            ]
        ],
        'Dia_chi' => 'Địa chỉ',
        'Dien_thoai' => 'Điện thoại',
        'Email' => 'Email'
    ];

    $data = selectAll($conn, 'khach_hang');
    generateTable($data, $headers);
    ?>
</body>
</html>