<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4</title>
    <link rel="stylesheet" href="style.css">
    <style>
        th,
        td {
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

        .title h2 {
            color: #aa1f00;
        }
    </style>
</head>

<?php
include('lib/import.php');
?>

<body>
    <?php
    generateTitle("THÔNG TIN SỮA");

    $headers = [
        'sua.Ten_sua'           => 'Tên sữa',
        'hang_sua.Ten_hang_sua' => 'Hãng sữa',
        'sua.Trong_luong'       => 'Trọng lượng',
        'ct_hoadon.Don_gia'     => 'Đơn giá'
    ];

    $page    = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $count   = 5;
    $startAt = ($page - 1) * $count;

    $paginationIn = ['count' => $count, 'start_at' => $startAt];

    $result = selectJoin(
        $conn,
        'ct_hoadon',
        [
            'sua'       => 'ct_hoadon.Ma_sua = sua.Ma_sua',
            'hang_sua'  => 'sua.Ma_hang_sua = hang_sua.Ma_hang_sua'
        ],
        null,
        $headers,
        $paginationIn
    );

    $data = isset($result['data']) ? $result['data'] : $result;

    if (empty($data) && $page > 1) {
        header("Location: bai4.php?page=1");
        exit();
    }

    generateTable($data, $headers, true);

    if (isset($result['pagination'])) {
        $totalItems = $result['pagination']['count'];
        generatePagination($totalItems, $paginationIn, '/php/sql_php/bai4.php');
    }
    ?>
</body>

</html>