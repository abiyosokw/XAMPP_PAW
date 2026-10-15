<?php
// JANGAN DIUBAH IF INI
if (!isset($_SESSION["nama"])) {
    echo "<p>Belum ada pesanan.</p>";
} else {
    // Kerjakan ELSE ini
    echo "<table>";
    echo "<tr><td>Nama Pelanggan</td><td>" . $_SESSION["nama"] . "</td></tr>";
    echo "<tr><td>Ransum</td><td>" . $_SESSION["menu"] . "</td></tr>";
    echo "<tr><td>Jumlah</td><td>" . $_SESSION["jumlah"] . " item</td></tr>";
    echo "<tr><td>Kategori Pelanggan</td><td>" . $_SESSION["kategori"] . "</td></tr>";
    echo "<tr><td>Harga Satuan</td><td>Rp" . number_format($_SESSION["harga"], 0, ",", ".") . "</td></tr>";
    echo "<tr><td>Subtotal</td><td>Rp" . number_format($_SESSION["subtotal"], 0, ",", ".") . "</td></tr>";
    echo "<tr><td>Diskon</td><td>Rp" . number_format($_SESSION["diskon"], 0, ",", ".") . "</td></tr>";
    echo "<tr><td>Total</td><td>Rp" . number_format($_SESSION["total"], 0, ",", ".") . "</td></tr>";
    echo "</table>";
}
