<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Admin Juru Data Technology School</title>
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
  <script>
    $(function () {
      $("#index").load("index.html");
    });
  </script>
</head>

<body>
  <div class="d-flex" id="wrapper">
    <div class="mt-5 pt-2" id="index" include-html="index.html"></div>
    <div class="mt-5 pt-2" id="page-content-wrapper">
      <!-- Top navigation-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom fixed-top">
        <div class="container-fluid">
          <button class="btn bi bi-list" id="sidebarToggle"></button>
          <div class="sidebar-heading bg-light mt-2">
            <h5>Admin Juru Data Technology School</h5>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
              <li class="nav-item"><a id="logout" class="nav-link bi bi-box-arrow-left" href="login.html"> Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navigation -->
      <div class="container-fluid">
        <div class="row">
          <div id="index" include-html="index.html"></div>
          <!-- Konten Utama -->
          <main>
            <div class="container mt-4">
              <h1 class="text-center mb-3 bi bi-people"> Data User</h1>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Cari User ..">
                <button class="btn btn-success" onclick="location.href='data_user/tambah_user.php'">Tambah User</button>
              </div>
              <div class="container mt-3">
                <table class="table mt-3">
                  <thead>
                    <tr>
                      <th class="text-center">Nama Depan</th>
                      <th class="text-center">Nama Belakang</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Telepon</th>
                      <th class="text-center">Alamat</th>
                      <th class="text-center">Role</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="myTable">
                    <!-- Tempat untuk memunculkan data -->
                    <?php
                    include '../connection/database.php';

                    // Query untuk mengambil data dari tabel
                    $sql = "SELECT id_user, nama_depan, nama_belakang, email_user, no_telp, alamat_user, role_user FROM user";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      // Memunculkan data dalam bentuk tabel HTML
                      while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["nama_depan"] . "</td>";
                        echo "<td>" . $row["nama_belakang"] . "</td>";
                        echo "<td>" . $row["email_user"] . "</td>";
                        echo "<td>" . $row["no_telp"] . "</td>";
                        echo "<td>" . $row["alamat_user"] . "</td>";
                        echo "<td>" . $row["role_user"] . "</td>";
                        echo "<td class='text-center'>
                                <a href='data_user/edit_user.php?id_user=" . $row["id_user"] . "' class='btn btn-primary btn-sm me-2 bi bi-pencil-square'></a>
                                <a href='data_user/hapus_user.php?id_user=" . $row["id_user"] . "' class='btn btn-danger btn-sm bi bi-trash' onclick='return confirmDelete();'></a>
                              </td>";
                        echo "</tr>";
                      }
                    } else {
                      echo "<tr><td colspan='7' class='text-center'>Tidak ada data</td></tr>";
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
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi94Nm" crossorigin="anonymous"></script>
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