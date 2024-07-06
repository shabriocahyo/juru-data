<?php
include 'connection/database.php';

session_start();
$user_id = $_SESSION['id_user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $link_tugas = $_POST['link_tugas'];
    $modul_id = $_POST['modul_id'];
    $status = 'menunggu review';

    $sql = "UPDATE tugas SET link_tugas=?, status=? WHERE user_id=? AND modul_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssii', $link_tugas, $status, $user_id, $modul_id);

    if ($stmt->execute()) {
        echo "Assignment link updated successfully";
    } else {
        echo "Error updating assignment link: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>