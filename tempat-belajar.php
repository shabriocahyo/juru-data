<?php
include 'connection/database.php';

$sql = "SELECT judul, deskripsi, video, thumbnail FROM modul_data_science";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

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

    <!-- Custom CSS for dashboard layout -->
    <style>
        body {
            background-color: #f9f9f9;
        }

        .video-section {
            display: flex;
            flex-wrap: nowrap;
            gap: 20px;
        }

        .video-player {
            flex: 0 0 70%;
            max-width: 70%;
        }

        .video-list {
            flex: 0 0 30%;
            max-width: 30%;
            overflow-y: auto;
        }

        .video-card {
            background-color: #fff;
            border: none;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .video-card img {
            width: 100%;
            height: auto;
        }

        .video-card-body {
            padding: 15px;
        }

        .video-card-title {
            font-size: 16px;
            font-weight: 600;
            margin: 10px 0;
        }

        .video-card-text {
            font-size: 14px;
            color: #606060;
        }

        .embed-responsive-item {
            border-radius: 8px;
        }

        .card-header {
            background-color: #fff;
            border-bottom: none;
            font-size: 24px;
            font-weight: 600;
            padding: 15px;
        }

        .main-content {
            padding: 20px;
        }

        .status-dipelajari {
            background-color: yellow;
            padding: 5px;
            border-radius: 5px;
        }

        .status-menunggu-review {
            background-color: gray;
            padding: 5px;
            border-radius: 5px;
            color: white;
        }

        .status-direview {
            background-color: red;
            padding: 5px;
            border-radius: 5px;
            color: white;
        }

        .status-selesai {
            background-color: green;
            padding: 5px;
            border-radius: 5px;
            color: white;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <!-- Main Content -->
    <div class="container mt-4 main-content">
        <h2 class="mb-4 text-center">Kelas Data Science</h2>

        <!-- Video Section -->
        <div class="video-section row">
            <!-- Video Player -->
            <div class="video-player col-md-7">
                <div class="card video-card mb-4">
                    <div class="card-header">
                        <?php echo $row['judul']; ?>
                    </div>
                    <div class="card-body">
                        <div class="embed-responsive embed-responsive-16by9 mb-3">
                            <video class="embed-responsive-item" controls style="width: 100%; height:300px;">
                                <source src="vid/ds-vid.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>

                        <p class="video-card-text">
                            <?php echo $row['deskripsi']; ?>
                        </p>

                        <div class="form-group row">
                            <div class="col">
                                <a class="btn btn-primary start-learning-btn" onclick="toggleSubmitForm()"
                                    style="margin-bottom: 5px">Kumpulkan Tugas</a>
                            </div>
                            <div class="col-auto">
                                <p class="video-card-text mt-2"><span class="status-direview">Direview</span></p>
                            </div>
                        </div>

                        <!-- Formulir untuk mengumpulkan tugas -->
                        <div id="submitAssignmentForm" style="display: none;">
                            <form id="assignmentForm">
                                <div class="form-group row">
                                    <div class="col">
                                        <input type="text" class="form-control" id="assignmentLink"
                                            placeholder="Masukkan link tugas Anda">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Video List -->
            <div class="video-list col-md-4" style="margin-left: auto;">
                <!-- Loop untuk menampilkan semua modul -->
                <?php
                // Mengembalikan pointer ke awal hasil query
                $result->data_seek(0);

                while ($row = $result->fetch_assoc()): ?>
                    <div class="card video-card mb-4">
                        <img src="<?php echo $row['thumbnail']; ?>" alt="Thumbnail">
                        <div class="video-card-body">
                            <h5 class="video-card-title"><?php echo $row['judul']; ?></h5>
                            <p class="video-card-text">
                                <?php echo $row['deskripsi']; ?>
                            </p>
                            <a href="#" class="btn btn-primary start-learning-btn"
                                onclick="changeVideo('<?php echo $row['judul']; ?>', '<?php echo $row['deskripsi']; ?>', '<?php echo $row['video']; ?>'); return false;">
                                Mulai Belajar
                            </a>

                        </div>
                    </div>
                <?php endwhile; ?>
                <!-- Akhir loop modul -->
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

    <script>
        function toggleSubmitForm() {
            var form = document.getElementById('submitAssignmentForm');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        }
    </script>

    <script>
        // Fungsi untuk mengubah konten video section
        function changeVideo(judul, deskripsi, videoSrc) {
            // Ubah judul video section
            document.querySelector('.video-section .video-player .card-header').innerText = judul;

            // Ubah deskripsi video section
            document.querySelector('.video-section .video-player .video-card-text').innerText = deskripsi;

            // Ubah video source
            var videoPlayer = document.querySelector('.video-section .video-player video');
            videoPlayer.src = videoSrc;
            videoPlayer.load(); // Muat ulang video
        }
    </script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>