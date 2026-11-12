<?php
require 'koneksi.php';

echo "<h1>Daftar Mahasiswa</h1>";

$result = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY id");

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>No</th><th>Nama</th><th>NPM</th><th>Hobi</th><th>Aksi</th></tr>";

$no = 1;

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$no."</td>";
    echo "<td>".htmlspecialchars($row['nama'])."</td>";
    echo "<td>".htmlspecialchars($row['npm'])."</td>";
    echo "<td>".htmlspecialchars($row['hobi'])."</td>";
    echo "<td><a href='hapus.php?id=".$row['id']."'>Hapus</a></td>";
    echo "</tr>";
    $no++;
}

echo "</table>";

echo "<p>Jumlah data : ".mysqli_num_rows($result)."</p>";
?>