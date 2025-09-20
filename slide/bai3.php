<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <?php
    function divisors(int $n)
    {
        for ($i = 1; $i <= $n; $i++) {
            if ($n % $i === 0) {
                echo "$i ";
            }
        }
    }

    function isPrime(int $n): bool
    {
        if ($n < 2) return false;
        if ($n % 2 === 0) return $n === 2;
        for ($i = 3; $i <= sqrt($n); $i++) {
            if ($n % $i === 0) return false;
        }
        return true;
    }

    function sumPrimesBelow(int $n): int
    {
        if ($n <= 2) return 0;
        $sum = 0;
        for ($x = 2; $x < $n; $x++) {
            if (isPrime($x)) {
                $sum += $x;
                echo "$x ";
            } 
        }
        return $sum;
    }

    function isPerfectSquare(int $n): bool
    {
        if ($n < 0) return false;
        $r = (int)sqrt($n);
        return $r * $r === $n;
    }

    $N = random_int(-100, 100);

    echo "<p>$N</p>";

    if ($N > 0) {
        echo "<p>Các ước số dương của N: </p>";
        divisors($N);
        echo "<p>N " . (isPrime($N) ? "là" : "không là") . " số nguyên tố.</p>";
        echo "<p>Tổng các số nguyên tố nhỏ hơn N: " . sumPrimesBelow($N) . "</p>";
        echo "<p>N " . (isPerfectSquare($N) ? "là" : "không là") . " số chính phương.</p>";
    } else {
        echo "<p>Day la so am</p>";
    }


    ?>
</body>

</html>
