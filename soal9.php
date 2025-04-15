9. Buat program PHP untuk mencetak pola segitiga bilangan terbalik seperti ini:
Input: n = 5
Output:
5 4 3 2 1
4 3 2 1
3 2 1
2 1
1
Petunjuk:
- Gunakan looping bersarang (`for` atau `while`).
- Logika perulangan untuk membalik angka.

<?php


function cetakSegitigaTerbalik($n) {
    for ($i = $n; $i >= 1; $i--) {
        for ($j = $i; $j >= 1; $j--) {
            echo $j . " ";
        }
        echo "\n";
    }
}

// Contoh penggunaan:
$n = 5;
echo "Input: n = $n\n";
echo "Output:\n";
cetakSegitigaTerbalik($n);
