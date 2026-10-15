<h2>Daftar Ransum</h2>
<table>
    <tr>
        <th>Ransum</th>
        <th>Harga</th>
    </tr>
    <tr>
        <td>Pizza Segitiga Polus</td>
        <td>Rp25.000</td>
    </tr>
    <tr>
        <td>Susu Elektrik Electrical</td>
        <td>Rp18.000</td>
    </tr>
    <tr>
        <td>Space Donut Oxygen</td>
        <td>Rp15.000</td>
    </tr>
    <tr>
        <td>Jus Berry MedBay</td>
        <td>Rp20.000</td>
    </tr>
    <tr>
        <td>Emergency Steak Navigation</td>
        <td>Rp45.000</td>
    </tr>
</table>

<h2>Form Pemesanan</h2>
<form action="proses.php" method="post">
<p>
    Nama: <!-- Input Text Nama -->
    <input type="text" name="nama" required>
</p>

<p>
    Ransum: <!-- Input Pilihan Ransum -->
    <select name="menu">
        <option value="Pizza Segitiga Polus">Pizza Segitiga Polus : Rp Rp25.000</option>
        <option value="Susu Elektrik Electrical">Susu Elektrik Electrical : Rp Rp18.000</option>
        <option value="Space Donut Oxygen">Space Donut Oxygen : Rp Rp15.000</option>
        <option value="Jus Berry MedBay">Jus Berry MedBay : Rp Rp20.000</option>
        <option value="Emergency Steak Navigation">Emergency Steak Navigation : Rp Rp45.000</option>
    </select>
</p>
    
<p>
    Jumlah: <!-- Input Jumlah -->
    <input type="number" name="jumlah" required>
</p>

<p>
    Kategori Pelanggan: <!-- Input Pilihan Jenis Pelanggan -->
    <select name="kategori">
        <option value="Crewmate">Crewmate</option>
        <option value="Impostor">Impostor</option>
    </select><br><br>
</p>
    
    <!-- Submit -->
    <button type="submit">pesan</button>
</form>
