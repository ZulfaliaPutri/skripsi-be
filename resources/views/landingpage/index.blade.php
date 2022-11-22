<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="style/landingpage.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Import fontawesome icon -->
    <script src="https://kit.fontawesome.com/e3be59a47f.js" crossorigin="anonymous"></script>
    <!-- Import boostrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>WeShare!</title>
</head>

<body>
    <!--NavBar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/landingpage">
                <img src="../assets/page.png" alt="" width="50" height="50" class="me-2" />
                WeShare!
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/landingpage">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Product
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/food">Food</a></li>
                        <li><a class="dropdown-item" href="/clothes">Clothes</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/aboutus">About Us</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Sign Up</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--Navbar Akhir-->

    <!--Carousel-->
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide mt-5" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../assets/Food.png" class="d-block w-100 img-fluid img-carousel" alt="Food" />
                    <div class="carousel-caption d-none d-md-block" id="slidesatu">
                        <h5>Berbelanja dan Sharing Dengan Mudah</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../assets/slidepat.png" class="d-block w-100 img-fluid img-carousel" alt="Pakaian" />
                    <div class="carousel-caption d-none d-md-block" id="slidedua">
                        <h5>Jadilah Agen Penggerak Untuk Yang Membutuhkan</h5>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!--Carousel Akhir-->

    <!--Judul kategori-->
    <section id="judul" class="section-p1">
        <h2>Our Categories</h2>
    </section>
    <!--Judul Akhir-->

    <!--Kategori awal-->
    <div class="container overflow-hidden">
        <div class="row gx-5 text-center row-container">
            <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                <div class="" id="olahan">
                    <div class="menu-kategori">
                        <a href="makananolahan.html"><img src="../assets/kategori/olahan.png" alt="produk olahan"
                                class="img-categori mt-2" /></a>
                        <p class="mt-2">Processed Food</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                <div class="" id="instant">
                    <div class="menu-kategori">
                        <a href="#"><img src="../assets/kategori/instant.png" alt="produk olahan"
                                class="img-categori mt-2" /></a>
                        <p class="mt-2">Instant Food</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                <div class="" id="wanita">
                    <div class="menu-kategori">
                        <a href="#"><img src="../assets/kategori/wanita.png" alt="produk olahan"
                                class="img-categori mt-2" /></a>
                        <p class="mt-2">Women Clothes</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                <div class="" id="pria">
                    <div class="menu-kategori">
                        <a href="#"><img src="../assets/kategori/pria.png" alt="produk olahan"
                                class="img-categori mt-2" /></a>
                        <p class="mt-2">Man Clothes</p>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>
    <!--Kategori Akhir-->

    <!--Recommendation Product-->
    <section id="allproduct" class="container section-p2">
        <h3>Recommendation Product</h3>
        <div class="row">
            <div class="d-flex align-items-center justify-content-end">
                <a class="see-more" href="/rekomendasi">See All</a>
            </div>
        </div>
        <div class="pro-container">
            <div class="pro">
                <img src="../assets/produk/nasi babi.jpg" alt="produk olahan babi">
                <div class="des">
                    <span>Nasi Babi Guling</span>
                    <h5>Enak</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Rp78.000</h4>
                </div>
                <a href="#"><i class="bi bi-cart cart"></i></a>
            </div>

            <div class="pro">
                <img src="../assets/produk/nasi babi.jpg" alt="produk olahan babi">
                <div class="des">
                    <span>Nasi Babi Guling</span>
                    <h5>Enak</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Rp78.000</h4>
                </div>
                <a href="#"><i class="bi bi-cart cart"></i></a>
            </div>

            <div class="pro">
                <img src="../assets/produk/nasi babi.jpg" alt="produk olahan babi">
                <div class="des">
                    <span>Nasi Babi Guling</span>
                    <h5>Enak</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Rp78.000</h4>
                </div>
                <a href="#"><i class="bi bi-cart cart"></i></a>
            </div>

            <div class="pro">
                <img src="../assets/produk/nasi babi.jpg" alt="produk olahan babi">
                <div class="des">
                    <span>Nasi Babi Guling</span>
                    <h5>Enak</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Rp78.000</h4>
                </div>
                <a href="#"><i class="bi bi-cart cart"></i></a>

            </div>

            <div class="pro">
                <img src="../assets/produk/nasi babi.jpg" alt="produk olahan babi">
                <div class="des">
                    <span>Nasi Babi Guling</span>
                    <h5>Enak</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Rp78.000</h4>
                </div>
                <a href="#"><i class="bi bi-cart cart"></i></a>

            </div>
        </div>
    </section>
    <!--Recommendation Product Akhir-->

    <!--Banner-->
    <section class="container section-m1">
        <div id="banner">
            <h3>Gerakkan Kegiatan</h3>
            <h2><i>Food Sharing </i> dan <i>Preloved Clothes</i> Untuk Teman-Teman Membutuhkan</h2>
        </div>
    </section>
    <!--Banner Akhir-->

    <!--Banner Bagi 2-->
    <section id="sm-banner" class="container section-p2">
        <div class="banner-box">
            <h4>Pilih Produkmu</h4>
            <h2>Product Food</h2>
            <button class="normal">Pilih Makanan</button>
        </div>

        <div class="banner-box banner-box2">
            <h4>Tentukkan Pilihan</h4>
            <h2>Product Clothes</h2>
            <button class="normal">Pilih Koleksi</button>
        </div>
    </section>
    <!--Banner Bagi dua Selesai-->

    <!--Footer-->
    <footer class="section-p4 pt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img class="logo" src="../assets/logo.png" alt="logo">
                    <p>Website yang ditunjukkan untuk mendukung pengurangan limbah
                        dan menjadikan kegiatan berbagi seperti <i>food sharing</i> dan <i>preloved clothes</i></p>
                </div>

                <div class="col">
                    <h4>Information</h4>
                    <a href="/aboutus">About Us</a>
                </div>

                <div class="col">
                    <h4>Contact Us</h4>
                    <a href="#"><i class="bi bi-envelope"></i> foodclothesshare@gmail.com</a>
                    <a href="#"><i class="bi bi-telephone"></i> 08657234589</a>
                </div>
                <div class="col">
                    <div class="follow">
                        <h4 class="">Media Social</h4>
                        <div class="icon d-inline-block">
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-instagram"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="copyright">
                    <p>2022, Website WeShare! - Sistem Rekomendasi <i>food sharing</i> dan <i>preloved clothes</i></p>
                </div>

            </div>
    </footer>
    <!--Footer Akhir-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
