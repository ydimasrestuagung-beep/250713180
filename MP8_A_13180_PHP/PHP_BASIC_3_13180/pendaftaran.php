<?php

$error = [];
$benefit = '';

?>

<h2>Pendaftaran Membership</h2>

<form method="POST">

    <p>
        Nama :
        <br />
        <input type="text" name="nama" />
    </p>

    <p>
        NPM :
        <br />
        <input type="text" name="npm" />
    </p>

    <p>
        Paket Membership :
        <br />
        <select name="paket">
            <option value="">-- Pilih Paket --</option>
            <option value="1 bulan">1 bulan</option>
            <option value="3 bulan">3 bulan</option>
        </select>
    </p>

    <button type="submit">Daftar</button>

</form>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama  = $_POST['nama'] ?? '';
    $npm   = $_POST['npm'] ?? '';
    $paket = $_POST['paket'] ?? '';

    if (empty($nama) || empty($npm) || empty($paket)) {
        $error[] = 'Semua data wajib diisi.';
    }

    if (!preg_match("/^[a-zA-Z\s]+$/", $nama) && !empty($nama)) {
        $error[] = 'Nama hanya boleh mengandung huruf dan spasi.';
    }

    if (!preg_match("/^[0-9]+$/", $npm) && !empty($npm)) {
        $error[] = 'NPM hanya boleh mengandung angka.';
    }

    if ($paket == '1 bulan') {
        $benefit = 'Potongan 50% untuk pembelian produk tertentu.';
    } elseif ($paket == '3 bulan') {
        $benefit = 'Gratis cemilan hewan peliharaan untuk 3 bulan pertama.';
    }

    if (!empty($error)) {

        foreach ($error as $e) {
            echo "<p style='color:red;'>" .
                 htmlspecialchars($e) .
                 "</p>";
        }

    } else {

        echo "<h2>Informasi Pendaftaran</h2>";

        echo "<p><strong>Nama :</strong> "
             . htmlspecialchars($nama)
             . "</p>";

        echo "<p><strong>NPM :</strong> "
             . htmlspecialchars($npm)
             . "</p>";

        echo "<p><strong>Keuntungan :</strong> "
             . htmlspecialchars($benefit)
             . "</p>";

        echo "<p><strong>Paket Membership :</strong> "
             . htmlspecialchars($paket)
             . "</p>";

        echo "<p>Selamat! Anda telah berhasil mendaftar sebagai member dengan benefit: "
             . htmlspecialchars($benefit)
             . "</p>";
    }

} else {

    echo "<p>Silahkan lengkapi formulir di atas.</p>";

}

?>