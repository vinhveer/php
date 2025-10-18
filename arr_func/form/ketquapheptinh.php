<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kết quả phép tính</title>
  <link rel="stylesheet" href="../style.css"/>
</head>

<?php
include("../lib.php");

if (checkPost("tinh")) {
    $so_thu_nhat = getPostValue("so_thu_nhat", "Số thứ nhất", "isNumber");
    $so_thu_hai  = getPostValue("so_thu_hai",  "Số thứ hai",  "isNumber");
    $phep_tinh   = getPostValue("phep_tinh",   "Phép tính");

    $phep_tinh_map = [
        "cong" => "Cộng",
        "tru"  => "Trừ",
        "nhan" => "Nhân",
        "chia" => "Chia"
    ];

    if (checkIsset($so_thu_nhat, $so_thu_hai, $phep_tinh)) {
        switch ($phep_tinh) {
            case "cong":
                $ket_qua = $so_thu_nhat + $so_thu_hai;
                break;
            case "tru":
                $ket_qua = $so_thu_nhat - $so_thu_hai;
                break;
            case "nhan":
                $ket_qua = $so_thu_nhat * $so_thu_hai;
                break;
            case "chia":
                if ((float)$so_thu_hai != 0.0) {
                    $ket_qua = $so_thu_nhat / $so_thu_hai;
                } else {
                    $ket_qua = "Không thể chia cho 0";
                }
                break;
            default:
                $ket_qua = "Phép tính không hợp lệ";
        }
    } else {
        if (checkPost("error")) {
            echo $_POST['error'];
        }
    }
} else {
    header("Location: pheptinh.php");
    exit();
}
?>

<body>
  <form action="">
    <table>
      <?php
      generateTitle("KẾT QUẢ PHÉP TÍNH TRÊN HAI SỐ");
      if (!empty($phep_tinh) && isset($phep_tinh_map[$phep_tinh])) {
          generateTd("Phép tính: ", $phep_tinh_map[$phep_tinh]);
      } else {
          generateTd("Phép tính: ", "—");
      }

      generateInput("Số thứ nhất", "so_thu_nhat", "text", $so_thu_nhat ?? '', "disabled");
      generateInput("Số thứ hai",  "so_thu_hai",  "text", $so_thu_hai  ?? '', "disabled");
      generateInput("Kết quả",     "ket_qua",     "text", isset($ket_qua) ? $ket_qua : '', "disabled");
      ?>
      <td>
        <a href="javascript:window.history.back()">Trở về trang trước</a>
      </td>
    </table>
  </form>
</body>
</html>
