<?php


/* 
2. Casting dari array berikut:
$orang = [
 [
 'nama' => 'John Doe',
 'umur' => '25 tahun',
 'jenis_kelamin' => 'L'
 ],
 [
 'nama' => 'Jane Doe',
 'umur' => '30 tahun',
 'jenis_kelamin' => 'P'
 ],
 [
 'nama' => 'Bob Smith',
 'umur' => '20 tahun',
 'jenis_kelamin' => 'L'
 ]
];
buatlah sebuah fungsi yang dapat mengubah data orang tersebut menjadi sebuah array yang 
berisi data orang dengan umur yang sudah diubah menjadi angka (integer) dan jenis kelamin 
yang sudah diubah menjadi singkatan (L/P menjadi Laki-laki/Perempuan).

*/


function ubahDataOrang(array $orang): array {
    // Array untuk hasil yang telah diubah
    $hasil = [];

    foreach ($orang as $data) {
        // Mengubah umur dari "25 tahun" menjadi 25 (integer)
        $umur = (int) filter_var($data['umur'], FILTER_SANITIZE_NUMBER_INT);

        // Mengubah jenis kelamin dari 'L' atau 'P' menjadi 'Laki-laki' atau 'Perempuan'
        $jenisKelamin = $data['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan';

        // Menyusun array baru
        $hasil[] = [
            'nama' => $data['nama'],
            'umur' => $umur,
            'jenis_kelamin' => $jenisKelamin
        ];
    }

    return $hasil;
}

// Contoh pemakaian
$orang = [
    ['nama' => 'John Doe', 'umur' => '25 tahun', 'jenis_kelamin' => 'L'],
    ['nama' => 'Jane Doe', 'umur' => '30 tahun', 'jenis_kelamin' => 'P'],
    ['nama' => 'Bob Smith', 'umur' => '20 tahun', 'jenis_kelamin' => 'L']
];

$hasil = ubahDataOrang($orang);
print_r($hasil);

