<?php

/*
5. Buatlah quiz menggunakan PHP, gunakan CLI (antarmuka terminal) saja apabila kamu tidak 
bisa membuatnya di web, contoh:
- pertanyaan :
1. Di mana Ibukota Indonesia? Jakarta.
Kamu bisa menggunakan opsi pilihan ganda jika mau, jadi output nya seperti ini :
“ Dimanah Ibukota Indonesia? 
a. IKN b. Jakarta
c. Aceh d. Papua?
Jawaban : b

*/


// Daftar pertanyaan quiz
$quiz = [
    [
        'pertanyaan' => 'Di mana Ibukota Indonesia?',
        'opsi' => ['a' => 'IKN', 'b' => 'Jakarta', 'c' => 'Aceh', 'd' => 'Papua'],
        'jawaban' => 'b'
    ],
    [
        'pertanyaan' => 'Apa ibukota Jepang?',
        'opsi' => ['a' => 'Osaka', 'b' => 'Tokyo', 'c' => 'Kyoto', 'd' => 'Nagasaki'],
        'jawaban' => 'b'
    ],
    [
        'pertanyaan' => 'Gunung tertinggi di dunia adalah?',
        'opsi' => ['a' => 'Everest', 'b' => 'Kilimanjaro', 'c' => 'Alps', 'd' => 'Fuji'],
        'jawaban' => 'a'
    ]
];

// Menyimpan skor
$skor = 0;

echo "=== Quiz CLI Sederhana ===\n\n";

// Menampilkan setiap pertanyaan
foreach ($quiz as $index => $soal) {
    echo ($index + 1) . ". " . $soal['pertanyaan'] . "\n";

    // Menampilkan opsi jawaban
    foreach ($soal['opsi'] as $key => $value) {
        echo "   $key. $value\n";
    }

    // Minta jawaban dari user
    echo "Jawaban: ";
    $jawaban = trim(fgets(STDIN));

    // Cek jawaban
    if (strtolower($jawaban) === strtolower($soal['jawaban'])) {
        echo "✅ Benar!\n\n";
        $skor++;
    } else {
        echo "❌ Salah! Jawaban yang benar: " . strtoupper($soal['jawaban']) . ". " . $soal['opsi'][$soal['jawaban']] . "\n\n";
    }
}

// Tampilkan skor akhir
echo "=== Skor Akhir: $skor / " . count($quiz) . " ===\n";
