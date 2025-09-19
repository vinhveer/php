<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phép tính</title>
</head>

<body>
    <form action="ketquapheptinh.php" method="post">
        <table>
            <tr>
                <td colspan="2">
                    <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
                </td>
            </tr>
            <tr>
                <td>Chọn phép tính: </td>
                <td>
                    <label><input type="radio" name="chon" value="1" checked>Cộng</label>
                    <label><input type="radio" name="chon" value="2">Trừ</label>
                    <label><input type="radio" name="chon" value="3">Nhân</label>
                    <label><input type="radio" name="chon" value="4">Chia</label>
                </td>
            </tr>
            <tr>
                <td>Số 1: </td>
                <td><input type="text" name="numOne"></td>
            </tr>
            <tr>
                <td>Số 2: </td>
                <td><input type="text" name="numTwo"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Tính</button></td>
            </tr>
        </table>
    </form>
</body>

</html>