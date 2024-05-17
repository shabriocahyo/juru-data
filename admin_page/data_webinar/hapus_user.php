<?php
include '../../connection/database.php';

// Periksa apakah parameter ID pengguna telah diterima
if (isset($_GET['id_user']) && !empty($_GET['id_user'])) {
    // Escape parameter ID pengguna untuk mencegah SQL Injection
    $id_user = mysqli_real_escape_string($conn, $_GET['id_user']);

    // Buat dan jalankan perintah SQL DELETE
    $sql = "DELETE FROM user WHERE id_user = '$id_user'";

    if ($conn->query($sql) === TRUE) {
        // Redirect kembali ke halaman utama dengan pesan sukses
        header("location: /juru_data_web/admin_page/user_control.php");
        exit();
    } else {
        // Redirect kembali ke halaman utama dengan pesan gagal
        header("location: /juru_data_web/admin_page/user_control.php");
        exit();
    }
} else {
    // Redirect kembali ke halaman utama jika parameter ID pengguna tidak ditemukan
    header("location: /juru_data_web/admin_page/user_control.php");
    exit();
}
?>