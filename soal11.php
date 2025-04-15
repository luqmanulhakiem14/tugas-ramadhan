11.Buat program untuk menghitung jumlah bilangan prima dalam rentang tertentu.
Input: 10 - 30
Output: 11, 13, 17, 19, 23, 29 (Total: 6)
Petunjuk:
- Buat fungsi `isPrime()` untuk memeriksa bilangan prima.
- Gunakan perulangan untuk menghitung jumlah bilangan prima dalam rentang tersebut.


<?php

function isPrime($angka) {
    if ($angka <= 1) return false;
    if ($angka == 2) return true;
    if ($angka % 2 == 0) return false;

    for ($i = 3; $i <= sqrt($angka); $i += 2) {
        if ($angka % $i == 0) return false;
    }
    return true;
}

function hitungPrima($awal, $akhir) {
    $primas = [];

    for ($i = $awal; $i <= $akhir; $i++) {
        if (isPrime($i)) {
            $primas[] = $i;
        }
    }

    echo "Bilangan prima antara $awal - $akhir:\n";
    echo implode(', ', $primas);
    echo " (Total: " . count($primas) . ")\n";
}

// Contoh penggunaan:
hitungPrima(10, 30);
