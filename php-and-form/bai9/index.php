<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <style>
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 10px;
        }
        nav ul li a {
            text-decoration: none;
            color: blue;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
        main {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php?page=trangchu">Trang chủ</a></li>
            <li><a href="index.php?page=gioithieu">Giới thiệu</a></li>
            <li><a href="index.php?page=tintuc">Tin tức</a></li>
            <li><a href="index.php?page=lienhe">Liên hệ</a></li>
            <li><a href="index.php?page=diendan">Diễn đàn</a></li>
        </ul>
    </nav>
    <main>
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            include "$page.php";
        } else {
            include "trangchu.php";
        }
        ?>
    </main>
</body>
</html>