<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Tambah User | Juru Data Technology School</title>
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
                            <h1 class="text-center bi bi-people"> Tambah Data user</h1>
                            <form method="post" onsubmit="return validateForm()">
                                <div class="form-group">
                                    <label class="mt-3 mb-2" for="gambar">Nama Depan</label>
                                    <input type="text" class="form-control" name="nama_depan" id="nama_depan"
                                        placeholder="Masukkan Nama Depan">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3 mb-2" for="gambar">Nama Belakang</label>
                                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang"
                                        placeholder="Masukkan Nama belakang">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3 mb-2" for="gambar">Email</label>
                                    <input type="text" class="form-control" id="email_user" name="email_user"
                                        placeholder="Masukkan Email">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3 mb-2" for="gambar">Kata Sandi</label>
                                    <input type="password" class="form-control" id="kata_sandi" name="kata_sandi"
                                        placeholder="Masukkan Kata Sandi">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3 mb-2" for="gambar">No. Telepon</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                                        placeholder="Masukkan Nomor Telepon">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3 mb-2" for="gambar">Alamat</label>
                                    <input type="text" class="form-control" id="alamat_user" name="alamat_user"
                                        placeholder="Masukkan Alamat">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3 mb-2" for="role_user">Role User</label>
                                    <select class="form-control" id="role_user" name="role_user">
                                        <option value="Peserta">Peserta</option>
                                        <option value="Pengajar">Pengajar</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>
                                <div class="mt-4 text-center mb-5">
                                    <a class="btn btn-dark bi bi-arrow-left-circle"
                                        onclick="location.href='/juru_data_web/admin_page/user_control.php'"></a>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
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

            var namaDepan = nama_depan.trim();
            var namaBelakang = nama_belakang.trim();
            var email = email_user.trim();
            var kataSandi = kata_sandi.trim();
            var noTelp = no_telp.trim();
            var alamat = alamat_user.trim();

            // Validasi Nama Depan dan Nama Belakang
            var namePattern = /^[a-zA-Z\s]*$/;
            if (namaDepan === "" || namaBelakang === "") {
                alert("Nama Depan dan Nama Belakang harus diisi");
                return false;
            }
            if (!namePattern.test(namaDepan) || !namePattern.test(namaBelakang)) {
                alert("Nama Depan dan Nama Belakang hanya boleh berisi huruf dan spasi");
                return false;
            }

            // Validasi Email
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email === "") {
                alert("Email harus diisi");
                return false;
            }
            if (!emailPattern.test(email)) {
                alert("Format email tidak valid");
                return false;
            }

            // Validasi Kata Sandi
            if (kataSandi === "") {
                alert("Kata Sandi harus diisi");
                return false;
            }
            if (kataSandi.length < 6) {
                alert("Kata Sandi harus memiliki minimal 6 karakter");
                return false;
            }
            // Anda bisa menambahkan validasi lebih lanjut untuk kekuatan kata sandi di sini.

            // Validasi Nomor Telepon
            var phonePattern = /^\d{10,15}$/;
            if (noTelp === "") {
                alert("Nomor Telepon harus diisi");
                return false;
            }
            if (!phonePattern.test(noTelp)) {
                alert("Nomor Telepon hanya boleh berisi angka dan panjangnya antara 10 hingga 15 karakter");
                return false;
            }

            // Validasi Alamat
            if (alamat === "") {
                alert("Alamat harus diisi");
                return false;
            }

            // Semua validasi berhasil
            return true;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>

<?php
// Periksa apakah formulir telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari setiap input formulir
    $nama_depan = $_POST["nama_depan"];
    $nama_belakang = $_POST["nama_belakang"];
    $email = $_POST["email_user"];
    $kata_sandi = $_POST["kata_sandi"];
    $no_telp = $_POST["no_telp"];
    $alamat = $_POST["alamat_user"];
    $role_user = $_POST["role_user"];

    include '../../connection/database.php';

    // Buat query untuk menyimpan data ke dalam database
    $sql = "INSERT INTO user (nama_depan, nama_belakang, email_user, kata_sandi, no_telp, alamat_user, role_user, tanggal_gabung)
            VALUES ('$nama_depan', '$nama_belakang', '$email', '$kata_sandi', '$no_telp', '$alamat', '$role_user',NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>