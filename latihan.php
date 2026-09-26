<!DOCTYPEhtml>
<html>
    <head>
        <title>Kalkulator PHP</title>
    </head>
    <body>
        <h2>Identitas</h2>
        <p> NIM: 255150707111011 <br>
            Nama: Abiyoso Kayana Wibowo </p>
        <hr>
        <h1>Kalkulator</h1>

        <form action="" method="post">
            <label>Angka Pertama:</label><br>
            <input type="number" step="any" name="angka1" required><br><br>

            <label>Angka Kedua:</label><br>
            <input type="number" step="any" name="angka2" required><br><br>

            <label>Operasi:</label><br>
            <input type="radio" name="operasi" value="Tambah" required> Tambah (+) <br>
            <input type="radio" name="operasi" value="Kurang" required> Kurang (-) <br>
            <input type="radio" name="operasi" value="Kali" required> Kali (×) <br>
            <input type="radio" name="operasi" value="Bagi" required> Bagi (÷) <br><br>

            <input type="submit" name="hitung" value="hitung">
        </form>

        <br>

        <?php
        if (isset($_POST['hitung'])) {
            $angka1 = $_POST['angka1'];
            $angka2 = $_POST['angka2'];
            $operasi = $_POST['operasi'];
            $hasil = 0;

            if (is_numeric($angka1) && is_numeric($angka2)) {
                switch ($operasi) {
                    case 'Tambah':
                        $hasil = $angka1 + $angka2;
                        break;
                    case 'Kurang':
                        $hasil = $angka1 - $angka2;
                        break;
                    case 'Kali':
                        $hasil = $angka1 * $angka2;
                        break;
                    case 'Bagi':
                        if ($angka2 != 0) {
                            $hasil = $angka1 / $angka2;
                        } else {
                            echo "Error: Pembagian dengan nol tidak diperbolehkan.";
                            exit();
                        }
                        break;
                }

                echo "<h3>Hasil: " . $hasil . "</h3>";
            } else {
                echo "Error: Masukkan angka yang valid.";
            }
        }