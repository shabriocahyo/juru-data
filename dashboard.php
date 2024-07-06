<?php
include 'connection/database.php';

$sql = "SELECT kelas_ds FROM user";
$result = $conn->query($sql);

session_start();
$user_id = $_SESSION['id_user'];

$sql_tugas_selesai = "SELECT COUNT(*) as count FROM tugas WHERE status = 'selesai' AND user_id = $user_id";
$result_tugas_selesai = $conn->query($sql_tugas_selesai);
$row_tugas_selesai = $result_tugas_selesai->fetch_assoc();
$jumlah_tugas_selesai = $row_tugas_selesai['count'];

$sql_modul = "SELECT COUNT(*) as count FROM modul_data_science";
$result_modul = $conn->query($sql_modul);
$row_modul = $result_modul->fetch_assoc();
$jumlah_modul = $row_modul['count'];

$conn->close();

$persentase_progres = ($jumlah_modul > 0) ? ($jumlah_tugas_selesai / $jumlah_modul) * 100 : 0;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Juru Data Technology School</title>

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

    <script src="js/header.js" defer></script>
    <script src="js/footer.js" defer></script>

</head>

<body>
    <?php include 'header.php'; ?>

    <div class="container mt-4">
        <h2 class="mb-4">Selamat Belajar, <?php echo htmlspecialchars($nama_depan . ' ' . $nama_belakang); ?></h2>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Profile Peserta
                    </div>
                    <div class="card-body d-flex flex-column align-items-center">
                        <img src="img/dp.png" class="img-fluid rounded-circle mb-3" alt="Profile Picture"
                            style="max-width: 150px; max-height: 150px;">
                        <h5 class="card-title"><?php echo htmlspecialchars($nama_depan . ' ' . $nama_belakang); ?></h5>
                        <!-- <p class="card-text"><?php echo htmlspecialchars($email_user); ?><br> Universitas Mercu Buana<br> Tangerang, Banten
                        </p> -->
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Program yang Diikuti
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php
                            include 'connection/database.php';

                            $id_user = $_SESSION['id_user'];

                            $query = "SELECT kelas_ds FROM user WHERE id_user = ?";
                            $stmt = $conn->prepare($query);

                            $stmt->bind_param("i", $id_user);

                            $stmt->execute();

                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $kelas_ds = $row['kelas_ds'];

                                if ($kelas_ds == true || $kelas_ds == 1) {
                                    ?>
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-0">Kelas Data Scientist</h6>
                                                <small class="text-muted">Progres:
                                                    <?php echo round($persentase_progres, 2); ?>%</small>
                                            </div>
                                            <div style="margin-left:auto; margin-right:10px">
                                                <?php if ($jumlah_tugas_selesai == $jumlah_modul): ?>
                                                    <a href="download-sertifikat.php?id_user=<?php echo $id_user; ?>"
                                                        class="btn btn-sm btn-info">Download Sertifikat</a>
                                                <?php endif; ?>
                                            </div>
                                            <div>
                                                <a href="tempat-belajar.php" class="btn btn-sm btn-primary">Mulai Belajar</a>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="footer"></div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>