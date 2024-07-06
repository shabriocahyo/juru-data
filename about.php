<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami | Juru Data Technology School</title>
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
        body {
            font-family: 'Heebo', sans-serif;
        }

        #header {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999;
            width: 100%;
        }

        #about-content {
            padding: 60px 0;
            background-color: #f8f9fa;
        }

        #about-content h2 {
            color: #333;
            margin-bottom: 30px;
            font-size: 2.5rem;
        }

        #about-content p {
            color: #666;
            font-size: 16px;
            line-height: 1.8;
            text-align: justify;
        }

        .statistics {
            margin: 40px 0;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .statistics .stat {
            text-align: center;
            padding: 20px;
        }

        .statistics .stat h3 {
            font-size: 2rem;
            color: #333;
        }

        .statistics .stat p {
            font-size: 1rem;
            color: #666;
        }

        .vision-mission {
            background-color: #fff;
            padding: 60px 0;
            position: relative;
            overflow: hidden;
        }

        .vision-mission .container {
            position: relative;
            z-index: 1;
        }

        .vision-mission h3 {
            margin-bottom: 30px;
            color: #333;
            font-size: 2rem;
        }

        .vision-mission p {
            color: #666;
            font-size: 16px;
            line-height: 1.8;
            text-align: justify;
        }

        .vision-mission .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            z-index: -1;
        }

        .team {
            padding: 60px 0;
            background-color: #f8f9fa;
        }

        .team h2 {
            margin-bottom: 30px;
            color: #333;
            text-align: center;
            font-size: 2.5rem;
        }

        .team .row {
            justify-content: center;
            align-items: center;
        }

        .team .team-member {
            text-align: center;
            margin-bottom: 30px;
        }

        .team-member img {
            max-width: 100%;
            border-radius: 50%;
            border: 6px solid #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
        }

        .team-member img:hover {
            transform: scale(1.05);
        }

        .team-member h4 {
            margin-top: 15px;
            color: #333;
            font-size: 1.25rem;
        }

        .team-member p {
            color: #666;
            font-size: 1rem;
        }

        .team-member .description {
            font-size: 0.875rem;
            color: #999;
            margin-top: 10px;
            text-align: justify;
        }

        .quote {
            padding: 40px 0;
            background-color: #f8f9fa;
            text-align: center;
            font-style: italic;
            color: #555;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <div id="title" class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Tentang Kami</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Tentang</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div id="about-content" class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <img src="img/logo_2.png" alt="Juru Data Technology School" class="img-fluid rounded m-3 p-5">
            </div>
            <div class="col-lg-7">
                <h2>Juru Data Technology School</h2>
                <p>
                    Kami hadir untuk mendukung Indonesia dalam mengarahkan perubahan digital menuju Era Emas Indonesia
                    dengan pemanfaatan teknologi Data Science. Di Juru Data Technology School, kami percaya bahwa
                    teknologi dapat
                    menjadi kekuatan besar untuk transformasi positif, dan kami berkomitmen untuk membantu masyarakat
                    Indonesia dalam mengadopsi dan memanfaatkannya.
                </p>
            </div>
        </div>
    </div>

    <div class="statistics container">
        <div class="row">
            <div class="col-lg-3 col-md-6 stat">
                <h3>50+</h3>
                <p>Pengajar Berpengalaman</p>
            </div>
            <div class="col-lg-3 col-md-6 stat">
                <h3>2000+</h3>
                <p>Peserta Terdaftar</p>
            </div>
            <div class="col-lg-3 col-md-6 stat">
                <h3>30+</h3>
                <p>Kelas Tersedia</p>
            </div>
            <div class="col-lg-3 col-md-6 stat">
                <h3>100+</h3>
                <p>Webinar Dijalankan</p>
            </div>
        </div>
    </div>

    <div class="vision-mission">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 vision">
                    <h3>Visi Kami</h3>
                    <p>
                        Mewujudkan generasi yang siap menghadapi tantangan era digital dengan penguasaan teknologi dan
                        data yang mendalam.
                    </p>
                </div>
                <div class="col-lg-6 mission">
                    <h3>Misi Kami</h3>
                    <p>
                        Memberikan pendidikan terbaik dalam bidang Data Science dan teknologi kepada seluruh lapisan
                        masyarakat Indonesia, sehingga dapat bersaing di tingkat global.
                    </p>
                </div>
            </div>
            <div class="overlay"></div>
        </div>
    </div>

    <div class="team">
        <div class="container">
            <h2>Tim Kami</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="img/dp.png" alt="John Doe" class="img-fluid rounded shadow">
                        <h4>Shabrio Cahyo W</h4>
                        <p>CEO</p>
                        <div class="description">
                            Shabrio Cahyo W adalah pemimpin visioner dengan pengalaman lebih dari 20 tahun di industri
                            teknologi.
                            Ia berfokus pada transformasi digital dan kepemimpinan inovatif untuk menciptakan dampak
                            positif bagi masyarakat.
                        </div>
                        <div class="social-media mt-3">
                            <a href="https://www.instagram.com/johndoe" target="_blank"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/johndoe" target="_blank"><i
                                    class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="img/dp.png" alt="Jane Smith" class="img-fluid rounded shadow">
                        <h4>Jane Smith</h4>
                        <p>COO</p>
                        <div class="description">
                            Jane adalah penggerak operasional dengan latar belakang kuat dalam manajemen proyek dan
                            pengembangan strategi pendidikan. Dia berkomitmen untuk memastikan setiap inisiatif mencapai
                            hasil yang optimal.
                        </div>
                        <div class="social-media mt-3">
                            <a href="https://www.instagram.com/janesmith" target="_blank"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/janesmith" target="_blank"><i
                                    class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="img/dp.png" alt="David Johnson" class="img-fluid rounded shadow">
                        <h4>David Johnson</h4>
                        <p>CFO</p>
                        <div class="description">
                            David membawa keahlian keuangan yang solid dengan pengalaman dalam pengelolaan anggaran dan
                            perencanaan keuangan jangka panjang. Dia bertujuan untuk memastikan keberlanjutan finansial
                            yang kuat bagi organisasi.
                        </div>
                        <div class="social-media mt-3">
                            <a href="https://www.instagram.com/davidjohnson" target="_blank"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/davidjohnson" target="_blank"><i
                                    class="fab fa-linkedin"></i></a>
                        </div>
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