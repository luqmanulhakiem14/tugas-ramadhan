<?php

/*
7. Pak Guru ingin menilai anak muridnya, akan tetapi karena anak muridnya ada banyak dia 
mencoba untuk membuat suatu program agar dia bisa bekerja dengan lebih cepat, berikut 
kriterianya :

Nilai                           Output
100                             Sempurna
98-90                           Sangat Bagus
89-80                           Bagus
79-70                           Lumayan
69-50                           Belajar Lagi (Remidi)
59-0                            Ulangi Lagi pelajarannya 10x (Remidi)

Pastikan program tadi agar tidak menghasilkan output apabila nilai siswa lebih dari 
seratus atau kurang dari nol (minus), jangan lupa berikan lampiran juga berapa orang yang 
remidi dan berapa orang yang lulus serta siapa saja yang dibawah KKM walaupun tidak remidi.

Ket : KKM = 75.


*/


function getPredikat($nilai) {
    if ($nilai === 100) return "Sempurna";
    elseif ($nilai >= 90) return "Sangat Bagus";
    elseif ($nilai >= 80) return "Bagus";
    elseif ($nilai >= 70) return "Lumayan";
    elseif ($nilai >= 50) return "Belajar Lagi (Remidi)";
    elseif ($nilai >= 0) return "Ulangi Lagi pelajarannya 10x (Remidi)";
    else return null;
}

$murid = [
    ['nama' => 'Dinda', 'nilai' => 100],
    ['nama' => 'Budi', 'nilai' => 85],
    ['nama' => 'Cici', 'nilai' => 72],
    ['nama' => 'Dina', 'nilai' => 45],
    ['nama' => 'Eka', 'nilai' => 60],
    ['nama' => 'Farah', 'nilai' => 74],
    ['nama' => 'Gilang', 'nilai' => 91],
    ['nama' => 'Hana', 'nilai' => 101], // Tidak valid
    ['nama' => 'Ivan', 'nilai' => -10], // Tidak valid
];

$jumlahRemidi = 0;
$jumlahLulus = 0;
$dibawahKKM = [];

echo "=== Hasil Penilaian Siswa ===\n\n";

foreach ($murid as $siswa) {
    $nama = $siswa['nama'];
    $nilai = $siswa['nilai'];

    // Validasi nilai
    if ($nilai < 0 || $nilai > 100) {
        echo "$nama: Nilai tidak valid ($nilai)\n";
        continue;
    }

    $predikat = getPredikat($nilai);

    echo "$nama ($nilai): $predikat\n";

    // Hitung statistik
    if ($nilai < 75) {
        $dibawahKKM[] = $nama;
    }

    if ($nilai < 70) {
        $jumlahRemidi++;
    } else {
        $jumlahLulus++;
    }
}

echo "\n=== Statistik ===\n";
echo "Jumlah siswa remidi     : $jumlahRemidi\n";
echo "Jumlah siswa lulus      : $jumlahLulus\n";
echo "Siswa di bawah KKM (75) : " . implode(", ", $dibawahKKM) . "\n";


