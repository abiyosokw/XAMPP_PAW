<!-- JANGAN DIUBAH -->
<?php
session_start();

if (!isset($_POST["nama"], $_POST["menu"], $_POST["jumlah"], $_POST["kategori"])) {
    echo "Data pesanan belum lengkap.";
    exit;
}

include "level2/hitung.php";

if (!$valid) {
    echo "<p>$pesan</p>";
    echo '<a href="index.php">Kembali</a>';
    exit;
}

include "level3/simpan.php";
include "level4/ingat.php";
header("Location: ringkasan.php");
exit;
