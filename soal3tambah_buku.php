<?php
include 'koneksi.php';

$search = "";
$sql = "SELECT * FROM buku";

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $sql .= " WHERE judul LIKE '%$search%' OR penulis LIKE '%$search%'";
}

$result = $conn->query($sql);
?>
htmml
<h2>Daftar Buku</h2>

<form method="GET">
    <input type="text" name="search" placeholder="Cari judul atau penulis" value="<?= htmlspecialchars($search) ?>">
    <button type="submit">Cari</button>
</form>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tahun Terbit</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['judul']) ?></td>
        <td><?= htmlspecialchars($row['penulis']) ?></td>
        <td><?= $row['tahun_terbit'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
