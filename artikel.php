<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel | Juru Data Technology School</title>

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

    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s" id="artikel">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Artikel Terbaru</h6>
                <h1 class="mb-5">Perluas Wawasan Anda!</h1>
            </div>
            <div class="row">
                <?php
                $json_data = file_get_contents('articles.json');
                $articles = json_decode($json_data, true);

                foreach ($articles as $article) {
                    echo '<div class="col-lg-4 col-md-6 mb-4">';
                    echo '    <div class="card h-100">';
                    echo '        <img class="card-img-top" src="' . $article['image'] . '" alt="">';
                    echo '        <div class="card-body">';
                    echo '            <h5 class="card-title">' . $article['title'] . '</h5>';
                    echo '        </div>';
                    echo '        <div class="d-flex justify-content-between align-items-center px-3">';
                    echo '            <small class="text-muted">Penulis: ' . $article['author'] . '</small>';
                    echo '        </div>';
                    echo '        <div class="card-footer">';
                    echo '            <a href="' . $article['url'] . '" class="btn btn-primary">Baca Selengkapnya</a>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Artikel End -->

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