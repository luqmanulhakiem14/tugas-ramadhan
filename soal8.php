<?php

/*
8. Buatlah mekanisme enkripsi dan deskripsinya gunakan saja metode yang sederhana seperti 
“A = B” atau “M =N”.

*/



function enkripsi($teks) {
    $hasil = '';
    $panjang = strlen($teks);

    for ($i = 0; $i < $panjang; $i++) {
        $karakter = $teks[$i];

        // Proses enkripsi hanya jika huruf alfabet
        if (ctype_alpha($karakter)) {
            $kode = ord($karakter);
            $offset = ctype_upper($karakter) ? ord('A') : ord('a');
            // Geser 1 huruf
            $kodeBaru = ($kode - $offset + 1) % 26 + $offset;
            $hasil .= chr($kodeBaru);
        } else {
            $hasil .= $karakter; // karakter non-huruf tidak berubah
        }
    }

    return $hasil;
}

function dekripsi($teks) {
    $hasil = '';
    $panjang = strlen($teks);

    for ($i = 0; $i < $panjang; $i++) {
        $karakter = $teks[$i];

        if (ctype_alpha($karakter)) {
            $kode = ord($karakter);
            $offset = ctype_upper($karakter) ? ord('A') : ord('a');
            // Geser mundur 1 huruf
            $kodeBaru = ($kode - $offset - 1 + 26) % 26 + $offset;
            $hasil .= chr($kodeBaru);
        } else {
            $hasil .= $karakter;
        }
    }

    return $hasil;
}

// Contoh Penggunaan
$teksAsli = "Halo Dunia!";
$teksEnkripsi = enkripsi($teksAsli);
$teksDekripsi = dekripsi($teksEnkripsi);

echo "Teks Asli    : $teksAsli\n";
echo "Terenkripsi  : $teksEnkripsi\n";
echo "Terdeskripsi : $teksDekripsi\n";
