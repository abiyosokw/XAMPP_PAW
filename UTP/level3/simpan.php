<?php
// Kerjakan mulai dari sini untuk menyimpan data ke Session
// $_SESSION["..."] = ...;

if ($valid) {
    $_SESSION["nama"] = $nama;
    $_SESSION["menu"] = $menu;
    $_SESSION["jumlah"] = $jumlah;
    $_SESSION["kategori"] = $kategori;
    $_SESSION["harga"] = $harga;
    $_SESSION["subtotal"] = $subtotal;
    $_SESSION["diskon"] = $diskon;
    $_SESSION["total"] = $total;
}
?>