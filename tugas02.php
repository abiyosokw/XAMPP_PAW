<?php
// --- KONEKSI DATABASE (PDO) ---
$host = 'localhost';
$db   = 'toko_db';
$user = 'root';
$pass = '4817050Mysql!';
$charset = 'utf8mb4';

try {
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $conn = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Menentukan URL file saat ini secara dinamis untuk pengalihan halaman (redirect)
$current_page = htmlspecialchars($_SERVER['PHP_SELF']);

// --- LOGIKA CRUD ---

// 1. TAMBAH / INSERT DATA
if (isset($_POST['action']) && $_POST['action'] === 'insert') {
    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];

    $stmt = $conn->prepare("INSERT INTO produk (nama, harga, stok) VALUES (?, ?, ?)");
    $stmt->execute([$nama, $harga, $stok]);
    header("Location: " . $current_page);
    exit();
}

// 2. EDIT / UPDATE DATA
if (isset($_POST['action']) && $_POST['action'] === 'update') {
    $id    = $_POST['id'];
    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];

    $stmt = $conn->prepare("UPDATE produk SET nama = ?, harga = ?, stok = ? WHERE id = ?");
    $stmt->execute([$nama, $harga, $stok, $id]);
    header("Location: " . $current_page);
    exit();
}

// 3. HAPUS / DELETE DATA (Langsung mengeksekusi tanpa konfirmasi)
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM produk WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: " . $current_page);
    exit();
}

// AMBIL DATA UNTUK FORM EDIT (JIKA ADA PARAMETER ?edit=ID)
$edit_data = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM produk WHERE id = ?");
    $stmt->execute([$id]);
    $edit_data = $stmt->fetch();
}

// 4. BACA / READ DATA
$stmt = $conn->query("SELECT * FROM produk ORDER BY id DESC");
$produk_list = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi CRUD Produk</title>
</head>
<body>

    <h2>Management Produk</h2>

    <!-- FORM INPUT / EDIT -->
    <h3><?= $edit_data ? 'Edit Produk' : 'Tambah Produk Baru'; ?></h3>
    <form method="POST" action="<?= $current_page; ?>">
        <input type="hidden" name="action" value="<?= $edit_data ? 'update' : 'insert'; ?>">
        <?php if ($edit_data): ?>
            <input type="hidden" name="id" value="<?= $edit_data['id']; ?>">
        <?php endif; ?>

        <div>
            <label>Nama Produk:</label><br>
            <input type="text" name="nama" value="<?= htmlspecialchars($edit_data['nama'] ?? ''); ?>" required>
        </div><br>

        <div>
            <label>Harga (Rp):</label><br>
            <input type="number" name="harga" value="<?= htmlspecialchars($edit_data['harga'] ?? ''); ?>" required>
        </div><br>

        <div>
            <label>Stok:</label><br>
            <input type="number" name="stok" value="<?= htmlspecialchars($edit_data['stok'] ?? ''); ?>" required>
        </div><br>

        <button type="submit"><?= $edit_data ? 'Update' : 'Simpan'; ?></button>
        <?php if ($edit_data): ?>
            <a href="<?= $current_page; ?>">Batal</a>
        <?php endif; ?>
    </form>

    <hr>

    <!-- TABEL MENAMPILKAN DATA -->
    <h3>Daftar Produk</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($produk_list)): ?>
                <?php foreach ($produk_list as $row): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= htmlspecialchars($row['nama']); ?></td>
                        <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                        <td><?= $row['stok']; ?></td>
                        <td>
                            <a href="<?= $current_page; ?>?edit=<?= $row['id']; ?>">Edit</a> | 
                            <a href="<?= $current_page; ?>?delete=<?= $row['id']; ?>">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Belum ada data.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>