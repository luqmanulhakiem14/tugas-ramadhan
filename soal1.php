<?php


/* 
1. Terdapat Class Mahasiswa yang menampung atribut yang di dalamnya nama, nim, nilai, dan 
jurusan .
Buatlah method logic untuk mensortir mengurutkan berdasarkan dari nilai yang terbesar ke 
yang terkecil, kemudian berdasarkan nama
- Gunakan metode usort untuk mengurutkan data mahasiswa.
- Buatlah sebuah fungsi callback yang dapat mengurutkan data mahasiswa berdasarkan 
  nilai, kemudian berdasarkan nama.
- Pastikan Anda mempertimbangkan kasus-kasus seperti nilai yang sama, nama yang sama, 
  dan lain-lain.
*/


class Mahasiswa {
    public $nama;
    public $nim;
    public $nilai;
    public $jurusan;

    public function __construct($nama, $nim, $nilai, $jurusan) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->nilai = $nilai;
        $this->jurusan = $jurusan;
    }
}

// Data Mahasiswa
$mahasiswa = [
    new Mahasiswa("Alam", "123", 85, "Informatika"),
    new Mahasiswa("Dinda", "124", 95, "Sistem Informasi"),
    new Mahasiswa("Ayu", "125", 95, "Teknik Komputer"),
    new Mahasiswa("Rizal", "126", 70, "Informatika"),
];

// Callback untuk usort
function sortMahasiswa($a, $b) {
    if ($a->nilai === $b->nilai) {
        return strcmp($a->nama, $b->nama); // urut nama ascending jika nilai sama
    }
    return $b->nilai - $a->nilai; // urut nilai descending
}

usort($mahasiswa, "sortMahasiswa");

// Output
foreach ($mahasiswa as $m) {
    echo "{$m->nama} | {$m->nim} | {$m->nilai} | {$m->jurusan}\n";
}
?>