<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 9</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 800px;
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

        .title {
            padding: 20px 0;
        }

        .details-title {
            background-color: #ffeee6;
        }

        .search-row td {
            border: none;
        }

        .search-row input[type="text"], .search-row select {
            width: 200px;
        }

        .result-count {
            text-align: center;
            padding: 8px 0;
            font-weight: bold;
        }
    </style>
</head>

<?php
include('lib/import.php');
?>

<body>
    <?php
    // Sticky values
    $ma_loai = isset($_GET['loai_sua']) ? $_GET['loai_sua'] : '';
    $ma_hang = isset($_GET['hang_sua']) ? $_GET['hang_sua'] : '';
    $ten_sua = isset($_GET['ten_sua']) ? $_GET['ten_sua'] : '';

    if (is_array($ma_loai)) $ma_loai = reset($ma_loai);
    if (is_array($ma_hang)) $ma_hang = reset($ma_hang);
    if (is_array($ten_sua)) $ten_sua = reset($ten_sua);

    $ma_loai = trim($ma_loai);
    $ma_hang = trim($ma_hang);
    $ten_sua = trim($ten_sua);

    // Load options
    $loais = selectAll($conn, 'loai_sua');
    $hangs = selectAll($conn, 'hang_sua');
    $loaiRows = $loais['data'] ?? $loais;
    $hangRows = $hangs['data'] ?? $hangs;

    generateTitle("TÌM KIẾM THÔNG TIN SỮA");
    echo "<table>";
    echo "<tr class='search-row'>";
    echo "<td colspan='2' class='details-title'>";
    echo "<form method='get'>";
    echo "<table class='search-row' style='width:100%'>";

    // Row 1: Loại sữa + Hãng sữa (same row)
    echo "<tr>";
    echo "<td>Loại sữa:</td>";
    echo "<td><select name='loai_sua'>";
    echo "<option value=''>Tất cả</option>";
    foreach ($loaiRows as $row) {
        $selected = ($ma_loai === $row['Ma_loai_sua']) ? 'selected' : '';
        echo "<option value='" . htmlspecialchars($row['Ma_loai_sua']) . "' $selected>" . htmlspecialchars($row['Ten_loai']) . "</option>";
    }
    echo "</select></td>";
    echo "<td>Hãng sữa:</td>";
    echo "<td><select name='hang_sua'>";
    echo "<option value=''>Tất cả</option>";
    foreach ($hangRows as $row) {
        $selected = ($ma_hang === $row['Ma_hang_sua']) ? 'selected' : '';
        echo "<option value='" . htmlspecialchars($row['Ma_hang_sua']) . "' $selected>" . htmlspecialchars($row['Ten_hang_sua']) . "</option>";
    }
    echo "</select></td>";
    echo "</tr>";

    // Row 3: Tên sữa + submit
    echo "<tr class='details-title'>";
    echo "<td>Tên sữa:</td>";
    echo "<td><input type='text' name='ten_sua' value='" . htmlspecialchars($ten_sua) . "' /> &nbsp;<input type='submit' value='Tìm kiếm' /></td>";
    echo "</tr>";

    echo "</table>";
    echo "</form>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";

    // Build conditions
    $whereParts = [];
    if ($ma_loai !== '') {
        $val = $conn->real_escape_string($ma_loai);
        $whereParts[] = "sua.Ma_loai_sua = '$val'";
    }
    if ($ma_hang !== '') {
        $val = $conn->real_escape_string($ma_hang);
        $whereParts[] = "sua.Ma_hang_sua = '$val'";
    }
    if ($ten_sua !== '') {
        $val = $conn->real_escape_string($ten_sua);
        $whereParts[] = "sua.Ten_sua LIKE '%$val%'";
    }
    $condition = empty($whereParts) ? null : implode(' AND ', $whereParts);

    $headers = [
        'sua.Ten_sua'           => 'Ten_sua',
        'hang_sua.Ten_hang_sua' => 'Ten_hang_sua',
        'sua.Trong_luong'       => 'Trong_luong',
        'ct_hoadon.Don_gia'     => 'Don_gia',
        'sua.Hinh'              => 'Hinh',
        'sua.TP_dinh_duong'     => 'TP_dinh_duong',
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
        $headers,
        null
    );

    $rows = $result['data'] ?? $result;

    echo "<div class='result-count'>Có " . count($rows) . " sản phẩm được tìm thấy</div>";
    generateMoreDetails($rows);
    ?>
</body>
</html>