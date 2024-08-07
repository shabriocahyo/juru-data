<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas Data Science | Juru Data Technology School</title>
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

    <style>
        #header {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <div id="title" class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Kelas</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Program</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Kelas Data Science</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-5 shadow">
                    <img src="img/kelas-ds.png" class="card-img-top" alt="Class Thumbnail">
                    <div class="card-body">
                        <p class="card-text" style="text-align: justify;">Program pendidikan yang dirancang untuk
                            memberikan pemahaman mendalam
                            tentang konsep, alat, dan teknik yang digunakan dalam analisis data. Materi pelatihan
                            mencakup statistik, pemrograman, machine learning, dan visualisasi data. Peserta akan
                            belajar mengumpulkan, membersihkan, menganalisis, dan menafsirkan data untuk membuat
                            keputusan yang didukung oleh bukti. Pelatihan ini sering kali melibatkan proyek praktis yang
                            memungkinkan peserta untuk mengaplikasikan pengetahuan mereka dalam skenario dunia nyata.
                        </p>
                        <h3>Silabus</h3>
                        <ul class="list-group">
                            <li class="list-group-item">Pengantar Data Science</li>
                            <li class="list-group-item">Matematika dan Statistik Dasar</li>
                            <li class="list-group-item">Pengolahan Data</li>
                            <li class="list-group-item">Pemrograman Dasar</li>
                            <li class="list-group-item">Machine Learning</li>
                            <li class="list-group-item">Visualisasi Data</li>
                            <li class="list-group-item">Proyek Praktis</li>
                            <li class="list-group-item">Kajian Kasus</li>
                        </ul>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <a href="https://wa.me/6281319522590" class="btn btn-primary bi bi-whatsapp"> Daftar
                                Sekarang</a>
                            <h3 class="card-text"><strong>Rp 899.000 </strong><small
                                    style="font-size: smaller; color: rgba(0, 0, 0, 0.331);"><del>Rp
                                        1.299.000</del></small></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div id="footer"></div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        function adjustTitlePosition() {
            var headerHeight = document.getElementById('header').offsetHeight;
            document.getElementById('title').style.marginTop = headerHeight + 'px';
        }

        window.addEventListener('load', adjustTitlePosition);
        window.addEventListener('scroll', adjustTitlePosition);
    </script>
</body>

</html>