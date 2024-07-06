<?php
include '../connection/database.php';

$id_user = $_GET['id_user'];

$sql_user = "SELECT nama_depan, nama_belakang FROM user WHERE id_user = $id_user";
$result_user = $conn->query($sql_user);

if ($result_user->num_rows > 0) {
    $row_user = $result_user->fetch_assoc();
    $user_id = $id_user;
    $nama_depan = $row_user['nama_depan'];
    $nama_belakang = $row_user['nama_belakang'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Review Page | Juru Data Technology School</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/header.js" defer></script>
    <script>
        $(function () {
            $("#header_pengajar").load("header_pengajar.html");
        });
    </script>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <div class="mt-5 pt-2" id="index_pengajar" include-html="index_pengajar.html"></div>
        <div class="mt-5 pt-2" id="page-content-wrapper">
            <div id="header_pengajar"></div>
            <div class="container-fluid">
                <div class="row">
                    <div id="index_pengajar" include-html="index_pengajar.html"></div>
                    <!-- Konten Utama -->
                    <main>
                        <div class="container mt-4">
                            <h1 class="text-center mb-3 bi bi-people">
                                <?php echo ' ' . '(ID:' . $user_id . ')' . ' ' . $nama_depan . ' ' . $nama_belakang; ?>
                            </h1>
                            <div class="input-group mb-3">
                                <!-- <input type="text" class="form-control" id="myInput" onkeyup="searchTable()"
                                    placeholder="Cari Peserta .."> -->
                                <!-- <button class="btn btn-success" onclick="location.href='data_user/tambah_user.php'">Tambah User</button> -->
                            </div>
                            <div class="container mt-3">
                                <table class="table mt-3">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Judul Modul</th>
                                            <th class="text-center">Link Tugas</th>
                                            <th class="text-center">Feedback</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../connection/database.php';

                                        // Ambil id user dari halaman sebelumnya (contoh menggunakan $_GET['id_user'])
                                        $id_user = intval($_GET['id_user']); // Sanitasi input
                                        
                                        // Query untuk mengambil semua modul dari tabel modul_data_science
                                        $sql_modul = "SELECT id, judul FROM modul_data_science";
                                        $result_modul = $conn->query($sql_modul);

                                        $no = 1; // Inisialisasi nomor
                                        
                                        if ($result_modul->num_rows > 0) {
                                            // Memunculkan data dalam bentuk tabel HTML
                                            while ($row_modul = $result_modul->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td class='text-center'>" . $no . "</td>";
                                                echo "<td>" . $row_modul["judul"] . "</td>";

                                                // Query untuk mencari tugas berdasarkan id_modul dan id_user
                                                $modul_id = intval($row_modul["id"]); // Sanitasi input
                                                $sql_tugas = "SELECT link_tugas, feedback, status FROM tugas WHERE user_id = $id_user AND modul_id = $modul_id";
                                                $result_tugas = $conn->query($sql_tugas);

                                                if ($result_tugas->num_rows > 0) {
                                                    // Jika ada tugas yang ditemukan
                                                    $row_tugas = $result_tugas->fetch_assoc();
                                                    if (!empty($row_tugas["link_tugas"])) {
                                                        echo "<td><a href='" . $row_tugas["link_tugas"] . "' target='_blank' class='btn btn-secondary btn-sm'>Tugas Link</a></td>";
                                                    } else {
                                                        echo "<td>Belum ada link tugas</td>";
                                                    }

                                                    // Tombol untuk mengarahkan ke halaman feedback
                                                    if (!empty($row_tugas["feedback"])) {
                                                        echo "<td><a href='" . $row_tugas["feedback"] . "' target='_blank' class='btn btn-secondary btn-sm'>Lihat Feedback</a></td>";
                                                    } else {
                                                        echo "<td>Belum ada feedback</td>";
                                                    }

                                                    // Ubah status "Menunggu Review" menjadi "Untuk Direview"
                                                    if ($row_tugas["status"] == "menunggu review") {
                                                        echo "<td>Untuk Direview</td>";
                                                    } else {
                                                        echo "<td>" . $row_tugas["status"] . "</td>";
                                                    }
                                                } else {
                                                    // Jika tidak ada tugas yang ditemukan
                                                    echo "<td>Belum ada link tugas</td>"; // Link Tugas
                                                    echo "<td>Belum ada feedback</td>"; // Feedback
                                                    echo "<td>-</td>"; // Status
                                                }

                                                echo "<td class='text-center'> <a href='review_form.php?modul_id=" . $modul_id . "&user_id=" . $id_user . "' class='btn btn-primary btn-sm me-2 bi bi-pencil-square'> Review</a></td>";

                                                echo "</tr>";
                                                $no++; // Increment nomor
                                            }
                                        } else {
                                            echo "<tr><td colspan='6' class='text-center'>Tidak ada data</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi94Nm"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
<script>
    function confirmDelete() {
        // Tampilkan pesan konfirmasi sebelum menghapus data
        var confirmation = confirm("Apakah Anda yakin ingin menghapus data pengguna ini?");

        // Jika pengguna mengkonfirmasi untuk menghapus, lanjutkan dengan mengarahkan ke halaman hapus
        if (confirmation) {
            return true;
        } else {
            // Jika pengguna membatalkan penghapusan, batalkan operasi default (mengarahkan ke halaman hapus)
            event.preventDefault();
            return false;
        }
    }

</script>

</html>