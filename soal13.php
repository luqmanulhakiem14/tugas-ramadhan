13.Buat Interface untuk Menghitung Volume
Buat interface `BangunRuang` dengan method `hitungVolume()` dan implementasikan ke 
class `Kubus` dan `Bola`.
Petunjuk:
- Gunakan konsep interface.
- Gunakan metode `pow()` untuk menghitung pangkat


<?php

// Interface BangunRuang
interface BangunRuang {
    public function hitungVolume(): float;
}

// Class Kubus
class Kubus implements BangunRuang {
    private float $sisi;

    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    public function hitungVolume(): float {
        return pow($this->sisi, 3); // sisi^3
    }
}

// Class Bola
class Bola implements BangunRuang {
    private float $jariJari;

    public function __construct($jariJari) {
        $this->jariJari = $jariJari;
    }

    public function hitungVolume(): float {
        return (4/3) * pi() * pow($this->jariJari, 3); // (4/3)πr³
    }
}

// ========== DEMO ==========

$kubus = new Kubus(4);      // sisi = 4
$bola = new Bola(7);        // jari-jari = 7

echo "Volume Kubus (sisi = 4): " . $kubus->hitungVolume() . "\n";
echo "Volume Bola (r = 7): " . $bola->hitungVolume() . "\n";
