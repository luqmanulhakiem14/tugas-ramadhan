<?php


/* 
4. Quinque elementorum, buatlah game quinque elementorum ini seperti game batu, gunting, 
kertas, dengan elemen seperti ini:

Elemen            Menang                 Kalah
Api               Es, Angin              Air, Tanah
Air               Api, Tanah             Angin, Es
Tanah             Api, Angin             Air, Es
Angin             Air, Es                Api, Tanah
Es                Air, Tanah             Api, Angin

*/

// Definisi aturan kemenangan
$aturan = [
    'Api'   => ['menang' => ['Es', 'Angin'], 'kalah' => ['Air', 'Tanah']],
    'Air'   => ['menang' => ['Api', 'Tanah'], 'kalah' => ['Angin', 'Es']],
    'Tanah' => ['menang' => ['Api', 'Angin'], 'kalah' => ['Air', 'Es']],
    'Angin' => ['menang' => ['Air', 'Es'], 'kalah' => ['Api', 'Tanah']],
    'Es'    => ['menang' => ['Air', 'Tanah'], 'kalah' => ['Api', 'Angin']],
];

// Daftar elemen
$elemen = array_keys($aturan);

// Fungsi untuk menentukan hasil pertandingan
function tentukanHasil($pemain, $komputer, $aturan) {
    if ($pemain === $komputer) {
        return "Seri!";
    } elseif (in_array($komputer, $aturan[$pemain]['menang'])) {
        return "Kamu menang!";
    } else {
        return "Kamu kalah!";
    }
}

// CLI
echo "=== Quinque Elementorum ===\n";
echo "Pilih elemen: " . implode(", ", $elemen) . "\n";
echo "Masukkan pilihanmu: ";
$pemain = trim(fgets(STDIN));
$pemain = ucfirst(strtolower($pemain));

// Validasi input
if (!in_array($pemain, $elemen)) {
    echo "Pilihan tidak valid!\n";
    exit;
}

// Komputer memilih secara acak
$komputer = $elemen[array_rand($elemen)];

echo "Kamu memilih: $pemain\n";
echo "Komputer memilih: $komputer\n";

// Tampilkan hasil
$hasil = tentukanHasil($pemain, $komputer, $aturan);
echo "Hasil: $hasil\n";
