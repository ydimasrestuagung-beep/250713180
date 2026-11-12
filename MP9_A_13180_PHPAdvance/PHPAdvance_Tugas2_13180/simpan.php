<?php

require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama = trim($_POST['nama'] ?? '');
    $npm = trim($_POST['npm'] ?? '');
    $hobi = trim($_POST['hobi'] ?? '');

    if ($nama == '' || $npm == '' || $hobi == '') {

        echo "<p style='color:red;'>!! Harap lengkapi semua data. !!</p>";

    } elseif (!preg_match('/^[0-9]+$/', $npm)) {

        echo "<p style='color:red;'>!! NPM hanya boleh mengandung angka. !!</p>";

    } else {

        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO mahasiswa(nama,npm,hobi) VALUES(?,?,?)"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "sss",
            $nama,
            $npm,
            $hobi
        );

        mysqli_stmt_execute($stmt);

        echo "<p>Data berhasil disimpan ("
            . mysqli_stmt_affected_rows($stmt)
            . " baris).</p>";
    }

} else {

    echo "<p>Silakan isi formulir terlebih dahulu.</p>";

}

echo "<a href='index.xhtml'>Kembali</a>";

?>