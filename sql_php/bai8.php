<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 8</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 600px;
            margin: 0 auto;
        }

        td {
            border: 1px solid #ddd;
            padding: 8px;
            vertical-align: top;
        }

        h2 {
            color: #ff6600;
            text-align: center;
            font-size: 20px;
            margin: 0;
        }

        a {
            text-decoration: none;
            font-weight: bold;
        }

        .title {
            padding: 20px 0;
        }

        .details-title {
            background-color: #ffeee6;
        }
    </style>
</head>

<?php
include('lib/import.php');

$headers = [
    'sua.Ten_sua'            => 'Ten_sua',
    'hang_sua.Ten_hang_sua'  => 'Ten_hang_sua',
    'sua.Trong_luong'        => 'Trong_luong',
    'ct_hoadon.Don_gia'      => 'Don_gia',
    'sua.Hinh'               => 'Hinh',
    'sua.TP_Dinh_Duong'      => 'Thanh_phan_dinh_duong',
    'sua.Loi_ich'            => 'Loi_ich',
];

$page    = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$count   = 2;
$startAt = ($page - 1) * $count;
$paginationIn = ['count' => $count, 'start_at' => $startAt];

$result = selectJoin(
    $conn,
    'ct_hoadon',
    [
        'sua'       => 'ct_hoadon.Ma_sua = sua.Ma_sua',
        'hang_sua'  => 'sua.Ma_hang_sua = hang_sua.Ma_hang_sua',
    ],
    null,
    $headers,
    $paginationIn
);

$rows = $result['data'] ?? $result;

if (empty($rows) && $page > 1) {
    header("Location: bai8.php?page=1");
    exit();
}
?>

<body>
    <?php
    generateTitle("THÔNG TIN CHI TIẾT CÁC LOẠI SỮA");
    generateMoreDetails($rows);

    if (isset($result['pagination'])) {
        $totalItems = (int)$result['pagination']['count'];
        generatePagination($totalItems, $paginationIn, '/php/sql_php/bai8.php');
    }
    ?>
</body>

</html>