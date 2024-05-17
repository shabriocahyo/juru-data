<?php
// Masukkan file koneksi database
include '../connection/database.php';

// Tangkap nilai dari formulir sign up
$nama_depan = isset($_POST['nama_depan']) ? $_POST['nama_depan'] : '';
$nama_belakang = isset($_POST['nama_belakang']) ? $_POST['nama_belakang'] : '';
$email_user = isset($_POST['email_user']) ? $_POST['email_user'] : '';
$no_telp = isset($_POST['no_telp']) ? $_POST['no_telp'] : '';
$kata_sandi = isset($_POST['kata_sandi']) ? $_POST['kata_sandi'] : '';

// Query untuk memeriksa apakah email sudah terdaftar
$query = "SELECT * FROM user WHERE email_user='$email_user'";
$result = mysqli_query($conn, $query);

// Periksa apakah email sudah terdaftar
if (mysqli_num_rows($result) > 0) {
    echo "Email sudah terdaftar. Silakan gunakan email lain.";
} else {
    // Jika email belum terdaftar, lakukan pendaftaran
    $query = "INSERT INTO user (nama_depan, nama_belakang, email_user, no_telp, kata_sandi) VALUES ('$nama_depan', '$nama_belakang', '$email_user', '$no_telp', '$kata_sandi')";
    if (mysqli_query($conn, $query)) {
        echo "Pendaftaran berhasil! Silakan login.";
    } else {
        echo "Pendaftaran gagal. Silakan coba lagi.";
    }
}

// Tutup koneksi database
mysqli_close($conn);
?>
