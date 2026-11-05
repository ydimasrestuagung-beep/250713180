<?php

if ($_POST) {

    $bayaran = $_POST['bayaran'] ?? '';
    $undian  = $_POST['undian'] ?? '';

    $harga = 500000;

    $message  = array();
    $message2 = '';
    $bayaranKembali = 0;

    if(empty($bayaran) || empty($undian)) {

        $message[] = "Harap lengkapi semua data.";

    } else {

        if(!preg_match("/^[0-9]*$/", $bayaran) || !preg_match("/^[0-9]*$/", $undian)) {

            $message[] =
            "Jumlah yang dibayar atau undian hanya boleh mengandung angka.";
        }
    }

    if(!empty($message)) {

        foreach($message as $msg) {
            echo "<p style='color:red;'>!!" .
                 htmlspecialchars($msg) .
                 "!!</p>";
        }

    } else {

        function undian($undian) {

            switch($undian) {

                case 1:
                    $diskon = 0.10;
                    break;

                case 2:
                    $diskon = 0.20;
                    break;

                case 3:
                    $diskon = 0.30;
                    break;

                default:
                    $diskon = 0;
            }

            return $diskon;
        }

        $diskon = undian($undian);

        function totalBayar($harga, $diskon) {
            return $harga - ($harga * $diskon);
        }

        $totalBayar = totalBayar($harga, $diskon);

        function pembayaran($bayaran, $totalBayar) {

            if($bayaran < $totalBayar) {
                return null;
            } else {

                $bayaranKembali = $bayaran - $totalBayar;
                return $bayaranKembali;
            }
        }

        $bayaranKembali = pembayaran($bayaran, $totalBayar);

        if($bayaranKembali === null) {

            $message2 =
            "Jumlah uang dibayar kurang dari total pembayaran. Silakan bayar sesuai jumlah yang ditentukan.";

            $bayaranKembali = 0;
        }

        if(!empty($message2)) {

            echo "<p style='color:red;'>!!" .
                 htmlspecialchars($message2) .
                 "!!</p>";

        } else {

            echo "<h2>Informasi Pembayaran</h2>";
            echo "<p><strong>Jumlah yang dibayar:</strong> Rp " .
                 htmlspecialchars($bayaran) .
                 "</p>";

            echo "<p><strong>Diskon:</strong> " .
                 htmlspecialchars($undian) .
                 "</p>";

            if($diskon == 0) {

                echo "<p>Maaf nomor undian tidak valid. Tidak ada diskon yang diberikan.</p>";

            } else {

                echo "<p>Selamat! Anda mendapatkan diskon " .
                     (htmlspecialchars($diskon * 100)) .
                     "% berkat nomor undian Anda.</p>";
            }

            echo "<p style='font-weight:bold; font-size:18px;'>Total Pembayaran : Rp "
                 . htmlspecialchars($totalBayar) .
                 "</p>";

            echo "<p style='font-weight:bold; font-size:18px;'>Kembalian : Rp "
                 . htmlspecialchars($bayaranKembali) .
                 "</p>";
        }
    }

} else {

    echo "Silahkan isi formulir untuk melakukan pembayaran.";
}

?>