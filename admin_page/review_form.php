<?php
if (isset($_GET['modul_id']) && isset($_GET['user_id'])) {
    $modul_id = intval($_GET['modul_id']); // Sanitasi input
    $user_id = intval($_GET['user_id']); // Sanitasi input

    include '../connection/database.php';
    $sql = "SELECT * FROM tugas WHERE modul_id = $modul_id AND user_id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Pre-fill nilai input dengan data yang ada
        $judul = $row["judul"];
        $link_tugas = $row["link_tugas"];
        $feedback = $row["feedback"];
        $status = $row["status"];
    } else {
        // Jika tidak ada data tugas dengan modul_id dan user_id yang diberikan
        echo "Data tugas tidak ditemukan.";
        exit;
    }

    $sql_modul = "SELECT judul FROM modul_data_science WHERE id = $modul_id";
    $result_modul = $conn->query($sql_modul);

    if ($result_modul->num_rows == 1) {
        $row_modul = $result_modul->fetch_assoc();
        $judul_modul = $row_modul["judul"];
    } else {
        // Jika tidak ada data modul dengan modul_id yang diberikan
        echo "Data modul tidak ditemukan.";
        exit;
    }
} else {
    // Jika tidak ada parameter modul_id atau user_id
    echo "Modul ID atau User ID tidak diberikan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Review Form | Juru Data Technology School</title>
    <link href="../css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script>
        $(function () {
            $("#index_pengajar").load("index_pengajar.html");
        });
    </script>
    <style>
        #file-input {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <div class="mt-5 pt-2" id="index_pengajar" include-html="index_pengajar.html"></div>
        <div class="mt-5 pt-2" id="page-content-wrapper">
            <!-- Top navigation-->
            <div id="header_pengajar"></div>
            <!-- End Navigation -->
            <div class="container-fluid">
                <div class="row">
                    <div id="index" include-html="index.html"></div>
                    <div class="toast align-items-center text-white bg-danger position-fixed bottom-0 end-0 p-3"
                        id="kuantitasToast" role="alert" aria-live="assertive" aria-atomic="true"
                        data-bs-autohide="true" data-bs-delay="3000">
                        <div class="d-flex">
                            <div class="toast-body">
                                Kesalahan dalam input data!
                            </div>
                            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                    </div>
                    <main>
                        <div class="container mt-4">
                            <h1 class="text-center bi bi-people"> Review Form</h1>
                            <form method="post" action="update_review.php" onsubmit="return validateForm()">
                                <div class="form-group">
                                    <input type="hidden" name="modul_id" value="<?php echo $modul_id; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                    <label class="mt-3 mb-2" for="judul">Judul Modul</label>
                                    <input type="text" class="form-control" name="judul" id="judul"
                                        placeholder="Masukkan Judul Modul" value="<?php echo $judul_modul; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="mt-3 mb-2" for="link_tugas">Link Tugas</label>
                                    <input type="text" class="form-control" id="link_tugas" name="link_tugas"
                                        placeholder="Masukkan Link Tugas" value="<?php echo $link_tugas; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3 mb-2" for="feedback">Feedback</label>
                                    <input type="text" class="form-control" id="feedback" name="feedback"
                                        placeholder="Masukkan Feedback" value="<?php echo $feedback; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3 mb-2" for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="selesai" <?php if ($status == 'selesai')
                                            echo 'selected'; ?>>
                                            Selesai</option>
                                        <option value="telah direview" <?php if ($status == 'telah direview')
                                            echo 'selected'; ?>>Telah Direview</option>
                                    </select>
                                </div>
                                <div class="mt-4 text-center mb-5">
                                    <a class="btn btn-dark bi bi-arrow-left-circle"
                                        onclick="location.href='/juru_data_web/admin_page/review_page.php?id_user=<?php echo $user_id; ?>'"></a>
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </div>
                            </form>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <script>
        function validateForm() {
            var judul = document.getElementById("judul").value;
            var link_tugas = document.getElementById("link_tugas").value;
            var feedback = document.getElementById("feedback").value;
            var status = document.getElementById("status").value;

            if (judul == "" || nlink_tugas == "" || feedback == "" || status == "") {
                alert("Semua input harus diisi");
                return false;
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modul_id = $_POST["modul_id"];
    $judul = $_POST["judul"];
    $link_tugas = $_POST["link_tugas"];
    $feedback = $_POST["feedback"]; // tambahkan ini untuk feedback
    $status = $_POST["status"];

    include '../connection/database.php';

    $sql = "UPDATE tugas SET 
                judul = '$judul',
                link_tugas = '$link_tugas',
                feedback = '$feedback',
                status = '$status'
            WHERE modul_id = $modul_id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diperbarui";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>