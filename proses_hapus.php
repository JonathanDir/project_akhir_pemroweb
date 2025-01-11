<?php
session_start();
include "koneksi.php"; // Pastikan koneksi database sudah benar

if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $gambar = $_POST['gambar'];

    // Cek apakah ID valid
    if (empty($id)) {
        echo "<script>alert('ID tidak valid');</script>";
        exit;
    }

    // Hapus gambar jika ada
    if ($gambar != '' && file_exists("gambar/" . $gambar)) {
        unlink("gambar/" . $gambar);
    }

    // Hapus artikel dari database
    $stmt = $conn->prepare("DELETE FROM article WHERE id = ?");
    $stmt->bind_param("i", $id);
    $hapus = $stmt->execute();

    if ($hapus) {
        echo "<script>
            alert('Hapus data sukses');
            document.location='admin.php?page=article';
        </script>";
    } else {
        echo "<script>
            alert('Hapus data gagal: " . $stmt->error . "');
            document.location='admin.php?page=article';
        </script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Tidak ada data yang dihapus');</script>";
}
?>