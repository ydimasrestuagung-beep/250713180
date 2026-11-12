<?php

require 'koneksi.php';

$id = $_GET['id'] ?? '';

if ($id == '' || !ctype_digit($id)) {

    echo "<p style='color:red;'>!! ID tidak valid. !!</p>";

} else {

    $stmt = mysqli_prepare(
        $conn,
        "DELETE FROM mahasiswa WHERE id = ?"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "i",
        $id
    );

    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Data tidak ditemukan.";
    }
}

echo "<br><br>";
echo "<a href='index.php'>Kembali</a>";

?>