<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = (int)$_POST['tahun'];

    $stmt = $conn->prepare("INSERT INTO buku (judul, penulis, tahun_terbit) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $judul, $penulis, $tahun);

    if ($stmt->execute()) {
        echo "Buku berhasil ditambahkan.";
    } else {
        echo "Gagal menambahkan buku: " . $stmt->error;
    }
}
?>

<h2>Tambah Buku</h2>
<form method="POST">
    Judul: <input type="text" name="judul" required><br>
    Penulis: <input type="text" name="penulis" required><br>
    Tahun Terbit: <input type="number" name="tahun" required><br>
    <button type="submit">Tambah</button>
</form>
