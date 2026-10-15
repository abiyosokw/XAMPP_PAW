<?php
// Level 4: Kerjakan mulai darisini
if(isset($_COOKIE["History"])) {
    echo "<p>Selamat datang kembali di Cafeteria, ". $_COOKIE["History"] . "! Tetap waspada terhadap Impostor!</p>";
} else {
    echo "<p>Selamat datang di Kantin Pesawat The Skeld!</p>";
}