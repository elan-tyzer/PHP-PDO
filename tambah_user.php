<?php
// Memulai kode PHP untuk memproses data user.
require 'config.php';
// Memuat konfigurasi koneksi database agar objek $pdo dapat digunakan.

$pesan = '';
// Membuat variabel pesan dalam keadaan kosong sebelum ada hasil pemrosesan.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Memeriksa apakah halaman dikirim melalui formulir dengan metode POST.
    $nama = $_POST['name'] ?? '';
    // Mengambil nilai nama dari formulir; gunakan teks kosong jika tidak tersedia.
    $email = $_POST['email'] ?? '';
    // Mengambil nilai email dari formulir; gunakan teks kosong jika tidak tersedia.

    if (!empty($nama) && !empty($email)) {
        // Memastikan nama dan email tidak kosong sebelum disimpan.
        // Menggunakan prepared statement untuk keamanan dari SQL Injection
        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        // Menyiapkan query untuk menyimpan nama dan email dengan parameter terpisah.
        $stmt->execute([$nama, $email]);
        // Menjalankan query dengan nilai nama dan email dari formulir.

        $pesan = "User berhasil ditambahkan dengan ID: " . $pdo->lastInsertId();
        // Menyusun pesan sukses dan menambahkan ID terakhir yang dibuat database.
    } else {
        // Menjalankan bagian ini jika nama atau email belum diisi.
        $pesan = "Nama dan email wajib diisi!";
        // Menyimpan pesan bahwa nama dan email harus diisi.
    }
    // Menutup pemeriksaan kelengkapan input.
}
// Menutup pemeriksaan metode pengiriman formulir.
?>
<!-- Mengakhiri kode PHP dan memulai halaman HTML. -->

<!DOCTYPE html>
<!-- Menandakan bahwa dokumen menggunakan standar HTML5. -->
<html lang="id">
<!-- Membuka dokumen HTML dan menetapkan bahasa halaman ke Bahasa Indonesia. -->
<head>
<!-- Membuka bagian metadata dan pengaturan halaman. -->
    <meta charset="UTF-8">
    <!-- Mengatur encoding karakter agar teks tampil dengan benar. -->
    <title>Tambah User</title>
    <!-- Menetapkan judul yang tampil pada tab browser. -->
</head>
<!-- Menutup bagian metadata halaman. -->
<body>
<!-- Membuka bagian konten yang ditampilkan di browser. -->
    <h2>Tambah User Baru</h2>
    <!-- Menampilkan judul halaman tambah user. -->
    
    <?php if (!empty($pesan)): ?>
    <!-- Memeriksa apakah ada pesan hasil pemrosesan yang perlu ditampilkan. -->
        <p style="color: green;"><?= $pesan ?></p>
        <!-- Menampilkan pesan, misalnya hasil sukses atau validasi input. -->
    <?php endif; ?>
    <!-- Mengakhiri pemeriksaan dan tampilan pesan. -->

    <form method="POST" action="">
    <!-- Membuka formulir yang mengirim data ke halaman ini menggunakan metode POST. -->
        <label>Nama:</label><br>
        <!-- Menampilkan label Nama dan pindah ke baris berikutnya. -->
        <input type="text" name="name" required><br><br>
        <!-- Menyediakan kolom nama yang wajib diisi dan memberi jarak sesudahnya. -->

        <label>Email:</label><br>
        <!-- Menampilkan label Email dan pindah ke baris berikutnya. -->
        <input type="email" name="email" required><br><br>
        <!-- Menyediakan kolom email dengan validasi format email dan wajib diisi. -->

        <button type="submit">Simpan</button>
        <!-- Membuat tombol untuk mengirim data formulir. -->
    </form>
    <!-- Menutup formulir. -->
    
    <br>
    <!-- Memberi jeda baris sebelum tautan. -->
    <a href="daftar_user.php">Lihat Daftar User</a>
    <!-- Menyediakan tautan untuk kembali ke halaman daftar user. -->
</body>
<!-- Menutup bagian konten halaman. -->
</html>
<!-- Menutup dokumen HTML. -->