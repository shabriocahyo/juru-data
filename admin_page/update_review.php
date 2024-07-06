<?php
include '../connection/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modul_id = intval($_POST['modul_id']); // Sanitasi input
    $user_id = intval($_POST['user_id']); // Sanitasi input
    $link_tugas = $conn->real_escape_string($_POST['link_tugas']); // Sanitasi input
    $feedback = $conn->real_escape_string($_POST['feedback']); // Sanitasi input
    $status = $conn->real_escape_string($_POST['status']); // Sanitasi input

    // Update query untuk memperbarui data tugas berdasarkan modul_id dan user_id
    $sql_update = "UPDATE tugas SET link_tugas = '$link_tugas', feedback = '$feedback', status = '$status' WHERE modul_id = $modul_id AND user_id = $user_id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Data tugas berhasil diperbarui.";
        // Redirect kembali ke halaman review_page.php dengan id_user yang sesuai
        header("Location: /juru_data_web/admin_page/review_page.php?id_user=$user_id");
        exit;
    } else {
        echo "Error: " . $sql_update . "<br>" . $conn->error;
    }
} else {
    echo "Metode permintaan tidak valid.";
}

$conn->close();
?>
