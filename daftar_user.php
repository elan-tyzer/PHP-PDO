<?php
// Memulai kode PHP untuk mengambil data user.
require 'config.php';
// Memuat konfigurasi koneksi database sehingga objek $pdo dapat digunakan.

$stmt = $pdo->query("SELECT * FROM users");
// Menjalankan query untuk mengambil seluruh baris dari tabel users.
$users = $stmt->fetchAll();
// Mengambil semua hasil query dan menyimpannya ke dalam array $users.
?>
<!-- Mengakhiri kode PHP dan memulai struktur halaman HTML. -->

<!DOCTYPE html>
<!-- Menandakan bahwa dokumen ini menggunakan standar HTML5. -->
<html lang="id">
<!-- Membuka dokumen HTML dan menetapkan bahasa halaman ke Bahasa Indonesia. -->
<head>
<!-- Membuka bagian metadata dan pengaturan halaman. -->
    <meta charset="UTF-8">
    <!-- Mengatur encoding karakter agar teks dan simbol tampil dengan benar. -->
    <title>Daftar User</title>
    <!-- Menetapkan judul yang tampil pada tab browser. -->
    <style>
    /* Membuka aturan CSS untuk mengatur tampilan tabel. */
        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        /* Menggabungkan garis tabel, mengatur lebar penuh, dan memberi jarak atas. */
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        /* Memberi garis, jarak isi, dan perataan kiri pada sel tabel. */
        th { background-color: #f2f2f2; }
        /* Memberi warna latar abu-abu muda pada judul kolom. */
    </style>
    <!-- Menutup aturan CSS. -->
</head>
<!-- Menutup bagian metadata halaman. -->
<body>
<!-- Membuka bagian konten yang ditampilkan di browser. -->
    <h2>Daftar User</h2>
    <!-- Menampilkan judul halaman. -->
    <a href="tambah_user.php">+ Tambah User Baru</a>
    <!-- Menyediakan tautan menuju halaman untuk menambah user. -->
    <br><br>
    <!-- Memberi dua baris jeda sebelum tabel. -->

    <table>
    <!-- Membuka tabel untuk menampilkan data user. -->
        <thead>
        <!-- Membuka bagian kepala tabel. -->
            <tr>
            <!-- Membuka baris judul kolom. -->
                <th>ID</th>
                <!-- Menampilkan judul kolom ID user. -->
                <th>Nama</th>
                <!-- Menampilkan judul kolom nama user. -->
                <th>Email</th>
                <!-- Menampilkan judul kolom email user. -->
                <th>Aksi</th>
                <!-- Menampilkan judul kolom tindakan yang tersedia. -->
            </tr>
            <!-- Menutup baris judul kolom. -->
        </thead>
        <!-- Menutup bagian kepala tabel. -->
        <tbody>
        <!-- Membuka bagian tabel yang berisi data user. -->
            <?php if (count($users) > 0): ?>
            <!-- Memeriksa apakah array $users berisi setidaknya satu data. -->
                <?php foreach ($users as $user): ?>
                <!-- Mengulangi tampilan untuk setiap user dalam array $users. -->
                    <tr>
                    <!-- Membuka baris data untuk satu user. -->
                        <td><?= $user['id'] ?></td>
                        <!-- Menampilkan ID user pada kolom pertama. -->
                        <td><?= htmlspecialchars($user['name']) ?></td>
                        <!-- Menampilkan nama yang sudah diamankan agar karakter HTML tidak dieksekusi. -->
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <!-- Menampilkan email yang sudah diamankan dari karakter HTML berbahaya. -->
                        <td>
                        <!-- Membuka kolom berisi tindakan untuk user ini. -->
                            <!-- Link untuk menghapus user berdasarkan ID -->
                            <a href="hapus_user.php?id=<?= $user['id'] ?>" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
                            <!-- Membuka halaman hapus dengan ID user setelah meminta konfirmasi. -->
                        </td>
                        <!-- Menutup kolom tindakan. -->
                    </tr>
                    <!-- Menutup baris data user. -->
                <?php endforeach; ?>
                <!-- Mengakhiri pengulangan seluruh user. -->
            <?php else: ?>
            <!-- Menjalankan bagian ini jika belum ada data user. -->
                <tr>
                <!-- Membuka baris untuk pesan bahwa tabel kosong. -->
                    <td colspan="4" style="text-align: center;">Belum ada data user.</td>
                    <!-- Menampilkan pesan kosong di tengah dengan lebar empat kolom. -->
                </tr>
                <!-- Menutup baris pesan kosong. -->
            <?php endif; ?>
            <!-- Mengakhiri kondisi pemeriksaan data. -->
        </tbody>
        <!-- Menutup bagian isi tabel. -->
    </table>
    <!-- Menutup tabel data user. -->
</body>
<!-- Menutup bagian konten halaman. -->
</html>
<!-- Menutup dokumen HTML. -->