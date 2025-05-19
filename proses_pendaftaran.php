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
        echo '
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <title>Data Disimpan</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body {
                    background-color: #ffeef2;
                    font-family: Arial, sans-serif;
                }
                .card {
                    background-color: #fff0f5;
                    border: 2px solid #c7607b;
                    color: #5a1a1a;
                }
                .card-header {
                    background-color: #801336;
                    color: white;
                    text-align: center;
                    font-weight: bold;
                    font-size: 1.25rem;
                }
                .btn-maroon {
                    background-color: #801336;
                    color: white;
                }
                .btn-maroon:hover {
                    background-color: #a63e5a;
                }
            </style>
        </head>
        <body>
            <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
                <div class="card p-4 shadow" style="width: 100%; max-width: 500px;">
                    <div class="card-header">
                        Data Pendaftaran Berhasil Disimpan
                    </div>
                    <div class="card-body">
                        <p><strong>Nama Depan:</strong> ' . $namaDepan . '</p>
                        <p><strong>Nama Belakang:</strong> ' . $namaBelakang . '</p>
                        <p><strong>Asal Sekolah:</strong> ' . $asalSekolah . '</p>
                        <a href="pendaftaran.html" class="btn btn-maroon mt-3 w-100">Kembali ke Formulir</a>
                    </div>
                </div>
            </div>
        </body>
        </html>
        ';
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
} else {
    echo "Akses tidak sah.";
}

$koneksi->close();
?>
