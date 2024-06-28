<?php
session_start();
include 'connection/database.php';

if (!isset($_SESSION['id_user'])) {
    echo "User ID tidak ditemukan di sesi.";
    exit;
}

$id_user = $_SESSION['id_user'];

$sql = "SELECT nama_depan, nama_belakang FROM user WHERE id_user = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id_user);
$stmt->execute();
$stmt->bind_result($nama_depan, $nama_belakang);

if ($stmt->fetch()) {

} else {
    echo "Tidak ada data yang ditemukan untuk User ID: " . $id_user;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="img/logo_2.png" alt="" style="width: 25%;">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Program</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="data_science.php" class="dropdown-item">Data Science</a>
                        <a href="#" class="dropdown-item text-muted">Data Analyst (soon)</a>
                        <a href="#" class="dropdown-item text-muted">Data Engineer (soon)</a>
                        <a href="#" class="dropdown-item text-muted">Data Visualization (soon)</a>
                    </div>
                </div>
                <!-- <a href="index.html#webinar" class="nav-item nav-link active">Webinar</a> -->
                <a href="index.php#ulasan" class="nav-item nav-link">Ulasan</a>
                <a href="index.php#artikel" class="nav-item nav-link">Artikel</a>
                <a href="index.php#tentang" class="nav-item nav-link">Tentang</a>
            </div>
            <div class="d-flex align-items-center">
                <div class="" style="width: 200px;">
                    <div class="nav-item dropdown">
                        <a class="btn btn-primary pt-4 d-none d-lg-block">
                            <i class="bi bi-person-circle me-2"></i>
                            <?php echo htmlspecialchars($nama_depan . ' ' . $nama_belakang); ?>
                        </a>
                        <div class="dropdown-menu fade-down m-0">
                            <a href="dashboard.php" class="dropdown-item">Dashboard</a>
                            <a href="sign-in.php" class="dropdown-item">Keluar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>