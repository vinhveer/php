<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
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

        .details-title {
            background-color: #ffeee6;
        }
    </style>
</head>

<?php
include('lib/import.php');

if (isset($_GET['ma_sua'])) {
    $ma_sua = $_GET['ma_sua'] ?? '';

    if (is_array($ma_sua)) {
        $ma_sua = reset($ma_sua);
    }

    $ma_sua = trim($ma_sua);

    $condition = "sua.Ma_sua = '$ma_sua'";

    $header = [
        'sua.Ten_sua'           => 'Ten_sua',
        'hang_sua.Ten_hang_sua' => 'Ten_hang_sua',
        'sua.Trong_luong'       => 'Trong_luong',
        'ct_hoadon.Don_gia'     => 'Don_gia',
        'sua.Hinh'              => 'Hinh',
        'sua.TP_dinh_duong' => 'Thanh_phan_dinh_duong',
        'sua.Loi_ich'           => 'Loi_ich'
    ];

    $result = selectJoin(
        $conn,
        'ct_hoadon',
        [
            'sua'       => 'ct_hoadon.Ma_sua = sua.Ma_sua',
            'hang_sua'  => 'sua.Ma_hang_sua = hang_sua.Ma_hang_sua',
        ],
        $condition,
        $header
    );

    $rows = $result['data'] ?? $result;

    $data = $rows[0] ?? null;

    if (!$data) {
        header("Location: bai7.php");
        exit();
    }
} else {
    header("Location: bai7.php");
    exit();
}
?>

<body>
    <table>
        <?php
        echo generateDetails($data, 'bai7.php');
        ?>
    </table>

</body>

</html>