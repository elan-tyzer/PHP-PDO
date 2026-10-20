<?php
// Memulai blok kode PHP.
require 'config.php';
// Memuat konfigurasi koneksi database agar variabel $pdo tersedia.

if (isset($_GET['id'])) {
    // Memeriksa apakah parameter id tersedia di alamat URL.
    $id = $_GET['id'];
    // Mengambil nilai id dari URL dan menyimpannya ke variabel $id.

    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    // Menyiapkan perintah SQL untuk menghapus baris pada tabel users yang id-nya cocok.
    $stmt->execute([$id]);
    // Menjalankan perintah SQL dengan nilai id sebagai parameter.

    header("Location: daftar_user.php");
    // Mengarahkan browser kembali ke halaman daftar user.
    exit;
    // Menghentikan eksekusi PHP setelah browser diarahkan.
} else {
    // Menjalankan bagian ini jika parameter id tidak tersedia di URL.
    echo "ID tidak ditemukan!";
    // Menampilkan pesan bahwa ID tidak ditemukan.
    echo "<br><a href='daftar_user.php'>Kembali</a>";
    // Menampilkan tautan untuk kembali ke halaman daftar user.
}
// Menutup blok kondisi if-else.
?>
<!-- Mengakhiri blok kode PHP. -->