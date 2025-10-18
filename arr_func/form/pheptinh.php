<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Phép tính</title>
  <link rel="stylesheet" href="../style.css"/>
</head>

<?php
include("../lib.php");

if (checkPost("tinh")) {
    $so_thu_nhat = getPostValue("so_thu_nhat", "Số thứ nhất", "isNumber");
    $so_thu_hai  = getPostValue("so_thu_hai", "Số thứ hai", "isNumber");
    $phep_tinh   = getPostValue("phep_tinh", "Phép tính");

    if (checkIsset($so_thu_nhat, $so_thu_hai, $phep_tinh)) {
        echo '
        <form id="redirectForm" action="ketquapheptinh.php" method="post">
          <input type="hidden" name="tinh" value="1"/>
          <input type="hidden" name="so_thu_nhat" value="'.htmlspecialchars($so_thu_nhat).'"/>
          <input type="hidden" name="so_thu_hai"  value="'.htmlspecialchars($so_thu_hai).'"/>
          <input type="hidden" name="phep_tinh"   value="'.htmlspecialchars($phep_tinh).'"/>
        </form>
        <script>document.getElementById("redirectForm").submit();</script>
        ';
        exit();
    }
}
?>

<body>
  <form action="pheptinh.php" method="post">
    <table>
      <?php
      generateTitle("PHÉP TÍNH TRÊN HAI SỐ");
      generateInput("Số thứ nhất", "so_thu_nhat", "text", $so_thu_nhat);
      generateInput("Số thứ hai",  "so_thu_hai",  "text", $so_thu_hai);
      $options = [
        "cong" => "Cộng",
        "tru"  => "Trừ",
        "nhan" => "Nhân",
        "chia" => "Chia"
      ];
      generateRadioChoice("Phép tính", "phep_tinh", $options, $phep_tinh);
      generateSubmit("tinh", "Tính");
      ?>
    </table>
  </form>
</body>
</html>
