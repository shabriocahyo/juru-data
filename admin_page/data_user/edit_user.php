<?php
// Pastikan ada parameter id_user yang diterima dari URL
if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    // Proses pengambilan data pengguna dari database berdasarkan id_user
    include '../../connection/database.php';
    $sql = "SELECT * FROM user WHERE id_user = $id_user";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Pre-fill nilai input dengan data yang ada
        $nama_depan = $row["nama_depan"];
        $nama_belakang = $row["nama_belakang"];
        $email_user = $row["email_user"];
        $kata_sandi = $row["kata_sandi"];
        $no_telp = $row["no_telp"];
        $alamat_user = $row["alamat_user"];
        $role_user = $row["role_user"];
        $kelas_ds = $row["kelas_ds"];
    } else {
        // Jika tidak ada data pengguna dengan id yang diberikan, tindakan lain dapat diambil, misalnya redirect atau menampilkan pesan kesalahan
        echo "Data pengguna tidak ditemukan.";
        exit;
    }
} else {
    // Jika tidak ada parameter id_user, tindakan lain dapat diambil, misalnya redirect atau menampilkan pesan kesalahan
    echo "ID Pengguna tidak diberikan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin | Juru Data Technology School</title>
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
            $("#index").load("../index.html");
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
        <div class="mt-5 pt-2" id="index" include-html="../index.html"></div>
        <div class="mt-5 pt-2" id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom fixed-top">
                <div class="container-fluid">
                    <button class="btn bi bi-list" id="sidebarToggle"></button>
                    <div class="sidebar-heading bg-light mt-2">
                        <h5>Admin Juru Data Technology School</h5>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item"><a id="logout" class="nav-link bi bi-box-arrow-left" href="login.html">
                                    Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
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
                            <h1 class="text-center bi bi-people"> Edit Data user</h1>
                            <form method="post" onsubmit="return validateForm()">
                                <div class="form-group">
                                    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                                    <label class="mt-3 mb-2" for="gambar">Nama Depan</label>
                                    <input type="text" class="form-control" name="nama_depan" id="nama_depan"
                                        placeholder="Masukkan Nama Depan" value="<?php echo $nama_depan; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3 mb-2" for="gambar">Nama Belakang</label>
                                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang"
                                        placeholder="Masukkan Nama belakang" value="<?php echo $nama_belakang; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3 mb-2" for="gambar">Email</label>
                                    <input type="text" class="form-control" id="email_user" name="email_user"
                                        placeholder="Masukkan Email" value="<?php echo $email_user; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3 mb-2" for="gambar">Kata Sandi</label>
                                    <input type="password" class="form-control" id="kata_sandi" name="kata_sandi"
                                        placeholder="Masukkan Kata Sandi" value="<?php echo $kata_sandi; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3 mb-2" for="gambar">No. Telepon</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                                        placeholder="Masukkan Nomor Telepon" value="<?php echo $no_telp; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3 mb-2" for="gambar">Alamat</label>
                                    <input type="text" class="form-control" id="alamat_user" name="alamat_user"
                                        placeholder="Masukkan Alamat" value="<?php echo $alamat_user; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3 mb-2" for="role_user">Role User</label>
                                    <select class="form-control" id="role_user" name="role_user"
                                        value="<?php echo $role_user; ?>">
                                        <option value="Peserta">Peserta</option>
                                        <option value="Pengajar">Pengajar</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="mt-3 mb-2" for="kelas_ds">Kelas Data Science</label>
                                    <select class="form-control" id="kelas_ds" name="kelas_ds"
                                        value="<?php echo $kelas_ds; ?>">
                                        <option value="0">FALSE</option>
                                        <option value="1">TRUE</option>
                                    </select>
                                </div>
                                <div class="mt-4 text-center mb-5">
                                    <a class="btn btn-dark bi bi-arrow-left-circle"
                                        onclick="location.href='/juru_data_web/admin_page/user_control.php'"></a>
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
            var nama_depan = document.getElementById("nama_depan").value;
            var nama_belakang = document.getElementById("nama_belakang").value;
            var email_user = document.getElementById("email_user").value;
            var kata_sandi = document.getElementById("kata_sandi").value;
            var no_telp = document.getElementById("no_telp").value;
            var alamat_user = document.getElementById("alamat_user").value;

            if (nama_depan == "" || nama_belakang == "" || email_user == "" || kata_sandi == "" || no_telp == "" || alamat_user == "") {
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
    $id_user = $_POST["id_user"];
    $nama_depan = $_POST["nama_depan"];
    $nama_belakang = $_POST["nama_belakang"];
    $email_user = $_POST["email_user"];
    $kata_sandi = $_POST["kata_sandi"];
    $no_telp = $_POST["no_telp"];
    $alamat_user = $_POST["alamat_user"];
    $role_user = $_POST["role_user"];
    $kelas_ds = $_POST["kelas_ds"];

    include '../../connection/database.php';

    $sql = "UPDATE user SET 
                    nama_depan = '$nama_depan',
                    nama_belakang = '$nama_belakang',
                    email_user = '$email_user',
                    kata_sandi = '$kata_sandi',
                    no_telp = '$no_telp',
                    alamat_user = '$alamat_user',
                    role_user = '$role_user',
                    kelas_ds = '$kelas_ds'
                WHERE id_user = $id_user";

    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>
                alert('Data berhasil diperbarui.');
                window.location.href = '../user_control.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>