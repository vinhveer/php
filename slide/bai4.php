<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function giaiThua($n)
    {
        if ($n < 0) return null;
        $result = 1;
        for ($i = 1; $i <= $n; $i++) {
            $result *= $i;
        }
        return $result;
    }

    function c($k, $n)
    {
        if ($k < 0 || $n < 0 || $k > $n) return null;
        return giaiThua($n) / (giaiThua($k) * giaiThua($n - $k));
    }


    function a($k, $n)
    {
        if ($k < 0 || $n < 0 || $k > $n) return null;
        return giaiThua($n) / giaiThua($n - $k);
    }

    $k = random_int(1, 30);
    $n = random_int($k, 30);

    echo "<p>$n". "C" . "$k= " . c($k, $n) . "</p>";
    echo "<p>$n". "A" . "$k= " . a($k, $n) . "</p>";
    ?>
</body>

</html>