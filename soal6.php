<?php

/*
6. Buatlah fungsi yang mengembalikan string menjadi “Capital sentence Only” atau hanya 
kapital pada awal katanya saja, contoh :
Input Output
DAUN YANG JATUH TAK AKAN MENYALAHKAN 
ANGIN
Daun yang Jatuh Tak Akan Menyalahkan Angin
laut bercerita Laut Bercerita
NeGeRi AntAH BerAntAH Negeri Antah Berantah

Pastikan kata hubung dan kata sambung kecil ya..

*/



function capitalSentenceOnly($kalimat) {
    // Daftar kata hubung yang harus tetap lowercase (selain di awal kalimat)
    $kata_kecil = ['yang', 'dan', 'di', 'ke', 'dari', 'untuk', 'atau', 'pada', 'dengan', 'karena', 'tetapi', 'jika', 'sehingga'];

    // Pecah kalimat menjadi kata-kata (mengatasi spasi tidak beraturan juga)
    $kata = preg_split('/\s+/', strtolower(trim($kalimat)));

    $hasil = [];

    foreach ($kata as $i => $k) {
        // Jika kata pertama, selalu kapital
        if ($i === 0 || !in_array($k, $kata_kecil)) {
            $hasil[] = ucfirst($k);
        } else {
            $hasil[] = $k; // biarkan lowercase
        }
    }

    return implode(' ', $hasil);
}

// Contoh penggunaan
$contoh = [
    "DAUN YANG JATUH TAK AKAN MENYALAHKAN ANGIN",
    "laut bercerita",
    "NeGeRi AntAH BerAntAH",
   
];

foreach ($contoh as $kalimat) {
    echo capitalSentenceOnly($kalimat) . "\n";
}

