<?php
include 'connection/database.php';

session_start();
$user_id = $_SESSION['id_user'];

$sql = "SELECT m.id AS modul_id, m.judul, m.deskripsi, m.video, m.thumbnail, t.status, t.feedback 
        FROM modul_data_science m
        LEFT JOIN tugas t ON m.id = t.modul_id AND t.user_id = $user_id
        ORDER BY m.id";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Data Science | Juru Data Technology School</title>

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

        .status-telah-direview {
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

    <div class="container mt-4 main-content">
        <h2 class="mb-4 text-center">Kelas Data Science</h2>

        <div class="video-section row">
            <div class="video-player col-md-7">
                <div class="card video-card mb-4">
                    <div class="card-header" id="videoTitle"></div>
                    <div class="card-body">
                        <div class="embed-responsive embed-responsive-16by9 mb-3">
                            <video class="embed-responsive-item" id="videoPlayer" controls
                                style="width: 100%; height:300px;">
                                <source id="videoSource" src="" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <p class="video-card-text" id="videoDescription"></p>
                        <div class="form-group row">
                            <div class="col">
                                <a class="btn btn-primary start-learning-btn" onclick="toggleSubmitForm()"
                                    style="margin-bottom: 5px">Kumpulkan Tugas</a>
                            </div>
                            <div class="col-auto">
                                <p class="video-card-text mt-2">
                                    <span id="videoStatus" class="status-direview"></span>
                                </p>
                            </div>
                        </div>

                        <div id="submitAssignmentForm">
                            <form id="assignmentForm">
                                <div class="form-group row">
                                    <div class="col">
                                        <input type="text" id="link_tugas" name="link_tugas" required
                                            class="form-control" placeholder="Masukkan link tugas Anda">
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

            <div class="video-list col-md-4" style="margin-left: auto;">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="card video-card mb-4">
                        <img src="<?php echo $row['thumbnail']; ?>" alt="Thumbnail">
                        <div class="video-card-body">
                            <h5 class="video-card-title"><?php echo $row['judul']; ?></h5>
                            <p class="video-card-text">
                                <?php echo $row['deskripsi']; ?>
                            </p>
                            <?php if (!empty($row['feedback'])): ?>
                                <p class="video-card-feedback">
                                    <strong>Feedback:</strong> <?php echo $row['feedback']; ?>
                                </p>
                            <?php endif; ?>
                            <div class="form-group row">
                                <div class="col">
                                    <a href="#" class="btn btn-primary start-learning-btn"
                                        onclick="changeVideo('<?php echo addslashes($row['judul']); ?>', '<?php echo addslashes($row['deskripsi']); ?>', '<?php echo $row['video']; ?>', '<?php echo strtolower(str_replace(' ', '-', $row['status'])); ?>', '<?php echo ucfirst($row['status']); ?>', '<?php echo $row['modul_id']; ?>', '<?php echo addslashes($row['feedback']); ?>'); return false;">
                                        Mulai Belajar
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <p class="video-card-text mt-2">
                                        <span
                                            class="status-<?php echo strtolower(str_replace(' ', '-', $row['status'])); ?>">
                                            <?php echo ucfirst($row['status']); ?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
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

        function createTask(modul_id) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "create_task.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                    // Optionally update the status text on the page
                }
            };
            xhr.send("modul_id=" + modul_id);
        }

        function changeVideo(title, description, videoSrc, statusClass, statusText, modul_id, feedback) {
            document.getElementById('videoTitle').innerText = title;
            document.getElementById('videoDescription').innerText = description;
            document.getElementById('videoSource').src = videoSrc;
            document.getElementById('videoPlayer').setAttribute('data-modul-id', modul_id);
            document.getElementById('videoPlayer').load();

            var statusElement = document.getElementById('videoStatus');
            statusElement.className = 'status-' + statusClass;
            statusElement.innerText = statusText;

            var feedbackElement = document.createElement('p');
            feedbackElement.className = 'video-card-feedback';
            feedbackElement.innerHTML = '<strong>Feedback:</strong> ' + feedback;
            document.getElementById('videoDescription').appendChild(feedbackElement);

            createTask(modul_id);

            window.scrollTo(0, 0);

            return false;
        }


        function toggleSubmitForm() {
            var form = document.getElementById("submitAssignmentForm");
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }
    </script>

    <script>
        document.getElementById('assignmentForm').addEventListener('submit', function (event) {
            event.preventDefault();

            var link_tugas = document.getElementById('link_tugas').value;
            var modul_id = document.getElementById('videoPlayer').getAttribute('data-modul-id');
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "submit_tugas.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                    alert("Tugas berhasil dikirim!");

                    var statusElement = document.getElementById('videoStatus');
                    statusElement.className = 'status-menunggu-review';
                    statusElement.innerText = 'Menunggu Review';

                    document.getElementById('submitAssignmentForm').style.display = 'none';
                } else if (xhr.readyState === 4) {
                    console.error("Error submitting assignment:", xhr.responseText);
                    alert("Gagal mengirim tugas. Silakan coba lagi.");
                }
            };
            xhr.send("link_tugas=" + encodeURIComponent(link_tugas) + "&modul_id=" + encodeURIComponent(modul_id));
        });
    </script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>