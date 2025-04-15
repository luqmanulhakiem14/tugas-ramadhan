10. Buatlah sistem management berbasis OOP di PHP dengan 3 level pengguna:
pengguna                            kemampuan
• User                              Mengunggah pesan
• Moderator(turunan dari User )     mengunggah pesan, menghapus pesan
• Admin(turunan dari Moderator)     mengunggah, menghapus dan menyematkan pesan

Setiap perlakuan/aksi terdeteksi di Log yang menyimpan timestamp, jenis pengguna, 
Username, dan Deskripsi Aksi, Log harus di urutkan dari yang terbaru sampai dengan yang 
terlama gunakan kelas Logger dengan metode static untuk logging, dan pastikan User tidak 
menjalankan aksi yang tidak diizinkan (misal: Menghapus pesan) , fokus pada struktur kelas, 
dan pewarisan


<?php

class Logger {
    private static array $logs = [];

    public static function log($username, $role, $aksi) {
        $timestamp = date('Y-m-d H:i:s');
        self::$logs[] = "[$timestamp][$role][$username] $aksi";
    }

    public static function tampilkanLog() {
        // Tampilkan log dari terbaru ke terlama
        $terbalik = array_reverse(self::$logs);
        foreach ($terbalik as $log) {
            echo $log . "\n";
        }
    }
}

class Pesan {
    public static array $semuaPesan = [];

    public static function tambah($username, $isi) {
        $id = count(self::$semuaPesan) + 1;
        self::$semuaPesan[$id] = ['id' => $id, 'user' => $username, 'isi' => $isi, 'pinned' => false];
        return $id;
    }

    public static function hapus($id) {
        unset(self::$semuaPesan[$id]);
    }

    public static function sematkan($id) {
        if (isset(self::$semuaPesan[$id])) {
            self::$semuaPesan[$id]['pinned'] = true;
        }
    }

    public static function tampil() {
        foreach (self::$semuaPesan as $pesan) {
            echo "[" . ($pesan['pinned'] ? "📌" : "") . " ID {$pesan['id']}] {$pesan['user']}: {$pesan['isi']}\n";
        }
    }
}

// Kelas dasar
class User {
    protected string $username;
    protected string $role = 'User';

    public function __construct($username) {
        $this->username = $username;
    }

    public function unggahPesan($isi) {
        $id = Pesan::tambah($this->username, $isi);
        Logger::log($this->username, $this->role, "Mengunggah pesan ID $id");
    }

    public function hapusPesan($id) {
        echo "❌ Akses ditolak: User tidak bisa menghapus pesan\n";
    }

    public function sematkanPesan($id) {
        echo "❌ Akses ditolak: User tidak bisa menyematkan pesan\n";
    }
}

// Moderator
class Moderator extends User {
    protected string $role = 'Moderator';

    public function hapusPesan($id) {
        Pesan::hapus($id);
        Logger::log($this->username, $this->role, "Menghapus pesan ID $id");
    }
}

// Admin
class Admin extends Moderator {
    protected string $role = 'Admin';

    public function sematkanPesan($id) {
        Pesan::sematkan($id);
        Logger::log($this->username, $this->role, "Menyematkan pesan ID $id");
    }
}

// ========== DEMO ==========

$user = new User("azka");
$mod = new Moderator("budi");
$admin = new Admin("citra");

$user->unggahPesan("Pesan dari User");
$mod->unggahPesan("Pesan dari Moderator");
$admin->unggahPesan("Pesan dari Admin");

$mod->hapusPesan(1);         // Moderator menghapus pesan
$admin->sematkanPesan(2);    // Admin menyematkan pesan
$user->hapusPesan(3);        // Ditolak
$user->sematkanPesan(2);     // Ditolak

echo "\n== Daftar Pesan ==\n";
Pesan::tampil();

echo "\n== Log Aktivitas ==\n";
Logger::tampilkanLog();
