<?php
// Menyertakan file koneksi
include 'koneksi.php';  // Pastikan file koneksi.php ada di folder yang sama

// Memproses data setelah formulir dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $namaDepan = htmlspecialchars($_POST['NamaDepan']);
    $namaBelakang = htmlspecialchars($_POST['NamaBelakang']);
    $asalSekolah = htmlspecialchars($_POST['AsalSekolah']);

    // Menyimpan data ke dalam database
    $sql = "INSERT INTO pendaftar (nama_depan, nama_belakang, asal_sekolah) 
            VALUES ('$namaDepan', '$namaBelakang', '$asalSekolah')";

    if ($koneksi->query($sql) === TRUE) {
        // Jika data berhasil disimpan
        echo "<h1>Data Pendaftaran Berhasil Disimpan</h1>";
        echo "<p><strong>Nama Depan:</strong> $namaDepan</p>";
        echo "<p><strong>Nama Belakang:</strong> $namaBelakang</p>";
        echo "<p><strong>Asal Sekolah:</strong> $asalSekolah</p>";
    } else {
        // Jika terjadi error saat menyimpan data
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
} else {
    // Jika bukan metode POST
    echo "Akses tidak sah.";
}

$koneksi->close();
?>
