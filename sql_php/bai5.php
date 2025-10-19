<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 5</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        .image {
            text-align: center;
        }

        .title {
            background-color: #ffeee6;
            color: #fc5705;
        }
    </style>
</head>

<?php
include('lib/import.php');
?>

<body>
    <?php
    $headers = [
        'sua.Ten_sua'           => 'Tên sữa',
        'hang_sua.Ten_hang_sua' => 'Hãng sữa',
        'sua.Trong_luong'       => 'Trọng lượng',
        'ct_hoadon.Don_gia'     => 'Đơn giá',
        'sua.Hinh'             => 'Hình ảnh',
    ];

    $result = selectJoin(
        $conn,
        'ct_hoadon',
        [
            'sua'       => 'ct_hoadon.Ma_sua = sua.Ma_sua',
            'hang_sua'  => 'sua.Ma_hang_sua = hang_sua.Ma_hang_sua',
        ],
        null,       
        $headers,  
        null  
    );

    generateList($result, "THÔNG TIN CÁC SẢN PHẨM");
    ?>
</body>

</html>