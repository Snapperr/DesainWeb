<?php
$a = 10;
$b = 5;

$hasiltambah = $a + $b;
$hasilkurang = $a - $b;
$hasilkali = $a * $b;
$hasilbagi = $a / $b;
$sisabagi = $a % $b;
$pangkat = $a ** $b;

$hasilSama = $a == $b ? 'True' : 'False';
$hasilTidakSama = $a != $b ? 'True' : 'False';
$hasilLebihKecil = $a < $b ? 'True' : 'False';
$hasilLebihBesar = $a > $b ? 'True' : 'False';
$hasilLebihKecilSama = $a <= $b ? 'True' : 'False';
$hasilLebihBesarSama = $a >= $b ? 'True' : 'False';

echo "Results of Arithmetic Operations between a = $a and b = $b:<br>";
echo "--------------------------------------------<br>";
echo "Addition ($a + $b)            = $hasiltambah<br>";
echo "Subtraction ($a - $b)         = $hasilkurang<br>";
echo "Multiplication ($a * $b)      = $hasilkali<br>";
echo "Division ($a / $b)            = $hasilbagi<br>";
echo "Modulus ($a % $b)             = $sisabagi<br>";
echo "Exponentiation ($a ** $b)     = $pangkat<br>";
echo "--------------------------------------------<br>";

echo "Results of Comparison Operations between a = $a and b = $b:<br>";
echo "--------------------------------------------<br>";
echo "Equal (a == b)                = $hasilSama<br>";
echo "Not Equal (a != b)            = $hasilTidakSama<br>";
echo "Less Than (a < b)             = $hasilLebihKecil<br>";
echo "Greater Than (a > b)          = $hasilLebihBesar<br>";
echo "Less Than or Equal (a <= b)   = $hasilLebihKecilSama<br>";
echo "Greater Than or Equal (a >= b)= $hasilLebihBesarSama<br>";
echo "--------------------------------------------<br>";
?>