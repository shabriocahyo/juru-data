<?php
// Masukkan file koneksi database
include '../connection/database.php';

// Tangkap nilai dari formulir sign up
$nama_depan = isset($_POST['nama_depan']) ? $_POST['nama_depan'] : '';
$nama_belakang = isset($_POST['nama_belakang']) ? $_POST['nama_belakang'] : '';
$email_user = isset($_POST['email_user']) ? $_POST['email_user'] : '';
$no_telp = isset($_POST['no_telp']) ? $_POST['no_telp'] : '';
$kata_sandi = isset($_POST['kata_sandi']) ? $_POST['kata_sandi'] : '';

$query = "SELECT * FROM user WHERE email_user='$email_user'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "Email sudah terdaftar. Silakan gunakan email lain.";
} else {
    $query = "INSERT INTO user (nama_depan, nama_belakang, email_user, no_telp, kata_sandi, role_user) VALUES ('$nama_depan', '$nama_belakang', '$email_user', '$no_telp', '$kata_sandi', 'Peserta')";
    if (mysqli_query($conn, $query)) {
        header('Location: ../sign-in.php');
        exit();
    } else {
        echo "Pendaftaran gagal. Silakan coba lagi.";
    }
}

mysqli_close($conn);
?>
