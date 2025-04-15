14.Buat fungsi rekursif untuk menghitung faktorial dari sebuah angka.
Input: 5
Output: 120 (karena 5! = 5 * 4 * 3 * 2 * 1)
Petunjuk:
- Gunakan konsep rekursi.


<?php

function faktorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * faktorial($n - 1);
    }
}

// Contoh penggunaan:
$input = 5;
echo "Faktorial dari $input adalah: " . faktorial($input);

