<?php
// Koneksi ke database
include 'config/koneksi.php';

// Periksa koneksi database
if (mysqli_connect_errno()) {
  echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
  exit();
}

// Periksa apakah parameter 'username' tersedia
if (isset($_GET['username'])) {
  $username = $_GET['username'];

  // Hapus petugas dari database
  $sql = "DELETE FROM tb_login WHERE username = '$username'";
  if (mysqli_query($con, $sql)) {
    echo "Petugas dengan username $username berhasil dihapus.";
    header("Location: home_admin.php");
    exit();
  } else {
    echo "Terjadi kesalahan saat menghapus petugas: " . mysqli_error($con);
  }
} else {
  echo "Parameter 'username' tidak tersedia.";
}

// Tutup koneksi database
mysqli_close($con);
?>