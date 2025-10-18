<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 7 - Tính năm âm lịch</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .title {
            background-color: #007bff;
            color: #ffffff;
        }

        td {
            background-color: #cce7ff;
            color: #004085;
        }

        input {
            width: 100px;
        }
        
        .result-section {
            text-align: center;
            padding: 20px;
        }
        
        .animal-image {
            margin: 10px 0;
        }
    </style>
</head>

<?php
include("../lib.php");

if (checkPost("calculate")) {
    $nam_duong_lich = getPostValue("namDuongLich", "Năm dương lịch", "isYear");
    
    if (checkIsset($nam_duong_lich)) {
        $result = calculateLunarYear($nam_duong_lich);
        $nam_am_lich = $result['nam_am_lich'];
        $hinh_anh = $result['hinh_anh'];
    }
}
?>

<body>
    <form action="bai7.php" method="post">
        <table>
            <tr>
                <td colspan="3" class="title">
                    <h3>TÍNH NĂM ÂM LỊCH</h3>
                </td>
            </tr>
            <tr>
                <td>Năm dương lịch</td>
                <td></td>
                <td>Năm âm lịch</td>
            </tr>
            <tr>
                <td>
                    <input type="number" name="namDuongLich" value="<?php echo isset($nam_duong_lich) ? $nam_duong_lich : ''; ?>" />
                </td>
                <td>
                    <input type="submit" name="calculate" value="=>" />
                </td>
                <td>
                    <input type="text" name="namAmLich" value="<?php echo isset($nam_am_lich) ? $nam_am_lich : ''; ?>" disabled />
                </td>
            </tr>
            <?php if (isset($hinh_anh)): ?>
            <tr>
                <td colspan="3" class="result-section">
                    <div class="animal-image">
                        <?php echo $hinh_anh; ?>
                    </div>
                </td>
            </tr>
            <?php endif; ?>
        </table>
    </form>
</body>
</html>
