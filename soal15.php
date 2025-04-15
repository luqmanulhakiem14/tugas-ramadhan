15.Buat program untuk menampilkan deret Fibonacci hingga nilai tertentu.
Input: 10
Output: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34
NB: 
- Pastikan untuk dikerjakan sebelum deadline.
- Dilarang menggunakan ChatGPT atau tool AI sejenis untuk langsung menghasilkan jawaban 
dari soal.
- Dilarang menggunakan fungsi built-in (bawan) dari PHP kecuali diperbolehkan oleh soal 
terkait.


<?php

function fibonacci($jumlah) {
    $a = 0;
    $b = 1;

    for ($i = 0; $i < $jumlah; $i++) {
        echo $a;
        if ($i < $jumlah - 1) {
            echo ", ";
        }

        // Proses geser nilai
        $c = $a + $b;
        $a = $b;
        $b = $c;
    }
}

// Contoh penggunaan:
$input = 10;
echo "Deret Fibonacci sebanyak $input angka:\n";
fibonacci($input);

