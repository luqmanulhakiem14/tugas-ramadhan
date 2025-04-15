12.Buat Class untuk Menghitung Luas Bangun Datar
Buat class `BangunDatar` dengan method untuk menghitung luas persegi dan lingkaran.
Input:
- Persegi dengan sisi = 5
- Lingkaran dengan jari-jari = 7
Petunjuk:
- Gunakan konsep OOP (class, method, dan inheritance).
- Gunakan polymorphism untuk membuat metode yang sama dengan hasil berbeda



<?php

// Kelas induk
abstract class BangunDatar {
    abstract public function hitungLuas(): float;
}

// Kelas turunan untuk Persegi
class Persegi extends BangunDatar {
    private float $sisi;

    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    public function hitungLuas(): float {
        return $this->sisi * $this->sisi;
    }
}

// Kelas turunan untuk Lingkaran
class Lingkaran extends BangunDatar {
    private float $jariJari;

    public function __construct($jariJari) {
        $this->jariJari = $jariJari;
    }

    public function hitungLuas(): float {
        return pi() * $this->jariJari * $this->jariJari;
    }
}

// ========== DEMO ==========

$persegi = new Persegi(5);       // sisi = 5
$lingkaran = new Lingkaran(7);   // jari-jari = 7

echo "Luas Persegi (sisi = 5): " . $persegi->hitungLuas() . "\n";
echo "Luas Lingkaran (r = 7): " . $lingkaran->hitungLuas() . "\n";


