<?php

function dapatDiskon($totalBayar)
{
    if ($totalBayar >= 100000) {
        return 0.10;
    }

    return 0;
}

function totalHarga($diskon, $totalBayar)
{
    return $totalBayar - ($totalBayar * $diskon);
}

$error = [];

?>

<h2>Belanja</h2>

<h3>Daftar Kategori:</h3>

<form method="POST">

    <p>
        Makanan dan Minuman :
        <br />
        <select name="makanan">
            <option value="">-- Pilih --</option>
            <option value="daging kaleng">daging kaleng</option>
            <option value="susu">susu</option>
        </select>
    </p>

    <p>
        Aksesoris :
        <br />
        <select name="aksesoris">
            <option value="">-- Pilih --</option>
            <option value="kalung">kalung</option>
            <option value="pakaian">pakaian</option>
        </select>
    </p>

    <button type="submit">Beli</button>

</form>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $makanan = $_POST['makanan'] ?? '';
    $aksesoris = $_POST['aksesoris'] ?? '';

    if (empty($makanan) || empty($aksesoris)) {
        $error[] = 'Semua pilihan harus diisi.';
    }

    if (!empty($error)) {

        foreach ($error as $e) {
            echo "<p style='color:red;'>" .
                 htmlspecialchars($e) .
                 "</p>";
        }

    } else {

        if ($makanan == 'daging kaleng') {
            $hargaMakanan = 10000;
        } else {
            $hargaMakanan = 15000;
        }

        if ($aksesoris == 'kalung') {
            $hargaAksesoris = 50000;
        } else {
            $hargaAksesoris = 100000;
        }

        $totalBayar = $hargaMakanan + $hargaAksesoris;

        $diskon = dapatDiskon($totalBayar);

        $totalAkhir = totalHarga($diskon, $totalBayar);

        echo "<h2>Informasi Belanja</h2>";

        echo "<p><strong>Makanan dan Minuman :</strong> "
             . htmlspecialchars($makanan)
             . "</p>";

        echo "<p><strong>Aksesoris :</strong> "
             . htmlspecialchars($aksesoris)
             . "</p>";

        echo "<p><strong>Total Harga :</strong> Rp "
             . htmlspecialchars($totalAkhir)
             . "</p>";

        echo "<p><strong>Diskon :</strong> "
             . htmlspecialchars($diskon)
             . "</p>";

        if ($diskon == 0) {

            echo "<p>Maaf tidak ada diskon yang diberikan.</p>";

        } else {

            echo "<p>Selamat! Anda mendapatkan diskon "
                 . htmlspecialchars($diskon * 100)
                 . "%.</p>";
        }
    }

} else {

    echo "<p>Silahkan pilih produk yang ingin dibeli.</p>";

}

?>