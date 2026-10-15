<?php
// Jangan ubah ini!
$nama = $_POST["nama"];
$menu = $_POST["menu"];
$jumlah = (int) $_POST["jumlah"];
$kategori = $_POST["kategori"];

// Kerjakan mulai darisini

// Hitung harga
$harga = 0;

if($menu == "Pizza Segitiga Polus") {
    $harga = 25000;
} else if ($menu == "Susu Elektrik Electrical"){
    $harga = 18000;
} else if ($menu == "Space Donut Oxygen"){
    $harga = 15000;
} else if ($menu == "Jus Berry MedBay"){
    $harga = 20000;
} else if ($menu == "Emergency Steak Navigation"){
    $harga = 45000;
}

$subtotal = $harga * $jumlah;

// Hitung Diskon
$diskon = 0;
if ($kategori == "Crewmate" && $jumlah >= 4) {
    $diskon = $subtotal * 0.15;
}

// total harga
$total = $subtotal - $diskon;

// cek valid
$valid = true;
$pesan = "";

if ($jumlah < 1) {
    $valid = false;
    $pesangagal = "Pemesanan Gagal (Min. 1 item)";
}
?>