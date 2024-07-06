<?php
include 'connection/database.php';

session_start();
$user_id = $_SESSION['id_user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modul_id = $_POST['modul_id'];
    $status = 'dipelajari';

    // Check if the task already exists for the user and module
    $checkSql = "SELECT * FROM tugas WHERE user_id=? AND modul_id=?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param('ii', $user_id, $modul_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // Insert new task if it doesn't exist
        $sql = "INSERT INTO tugas (user_id, modul_id, status) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iis', $user_id, $modul_id, $status);

        if ($stmt->execute()) {
            echo "Task created successfully";
        } else {
            echo "Error creating task: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Task already exists";
    }

    $conn->close();
}
?>
