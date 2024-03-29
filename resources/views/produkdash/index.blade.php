<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="style/produkdash.css" />
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
            <a class="navbar-brand" href="/dashboard">
                <img src="../assets/page.png" alt="" width="50" height="50" class="me-2" />
                WeShare!
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/dashboard">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Product
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/makanan">Food</a></li>
                        <li><a class="dropdown-item" href="/pakaian">Clothes</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Sharing
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/sharingmakanan">Food</a></li>
                        <li><a class="dropdown-item" href="/sharingpakaian">Clothes</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/aboutdash">About Us</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Welcome back, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/profile"><i class="bi bi-person"></i> My Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                    Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!--Navbar Akhir-->

    <!--Breadcrumb-->
    <div class="container">
        <nav aria-label="breadcrumb" style="background-color: #f9f9f9" class="mt-3">
            <ol class="breadcrumb p-3">
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none">Kategori</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Produk</li>
            </ol>
        </nav>
    </div>
    <!--Akhir Breadcrumb-->

    <!--Single Produk-->
    <div class="container">
        <div class="row row-produk">
            <div class="col-lg-5">
                <figure class="figure">
                    <img src="../assets/produk/nasi babi1.jpg" class="figure-img img-fluid"
                        style="border-radius: 5px; width: 450px" alt="produk babi" />
                    <figcaption class="figure-caption d-flex justify-content-evenly">
                        <a href="#">
                            <img src="../assets/produk/nasi babi1.jpg" class="figure-img img-fluid"
                                style="border-radius: 5px; width: 70px" alt="produk babi" />
                        </a>
                    </figcaption>
                </figure>
            </div>

            <div class="col-lg-7">
                <h3>Nasi Babi Guling</h3>
                <h5>Warung Bu Ajus</h5>
                <div class="garis-nama"></div>
                <div class="star">
                    <a href="#" class="d-inline text-decoration-none">
                        Rating
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i></a>
                </div>
                <h3 class="text-muted mb-3">Rp 150.000</h3>
                <button type="button" class="btn btn-dark btn-sm">
                    <i class="fas fa-minus"></i>
                </button>
                <span class="mx-2">2</span>
                <button type="button" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i>
                </button>

                <div class="btn-produk mt-5">
                    <!-- <a href="#" class="btn btn-dark text-white btn-lg me-2 btn-custom"
              ><i class="fas fa-shopping-cart fs-6 me-2"></i>Masukkan
              Keranjang</a
            > -->
                    <a href="#" class="btn btn-success text-white btn-lg btn-custom">Beli Sekarang</a>
                </div>
            </div>
        </div>
        <!--Akhir Single Product-->

        <!--Deskripsi-->
        <div class="row row-produk">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="deskrip nav-link active" id="deskripsi-tab" data-bs-toggle="tab"
                            data-bs-target="#deskripsi" type="button" role="tab" aria-controls="deskripsi"
                            aria-selected="true">
                            Deskripsi Produk
                        </button>
                    </li>
                </ul>
                <div class="tab-content p-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="deskripsi" role="tabpanel"
                        aria-labelledby="deskripsi-tab">
                        <p class="spesifikasi">
                        <h6>Spesifikasi Produk:</h6>
                        Expired: 22 Juni 2022 </br>
                        Kategori: Makanan Olahan </br> </p>
                        <p class="deskripsi">
                        <h6>Deskripsi Produk:</h6>
                        Makanan khas bali yang berasal dari hewan
                        yaitu Babi. Dimana pada makanan ini memiliki cita rasa yang
                        sangat menarik.<br> Makanan ini merupakan makanan yang tidak habis
                        di jual dan dilakukan sharing.</br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Akhir Deskripsi-->

    <!--Rekomendasi Product-->
    <section id="allproduct" class="section-p2">
        <div class="container pro-container">
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
    <!--Rekomendasi Product Akhir-->

    <!--Rekomendasi Product 1-->
    <section id="allproduct" class="section-p2">
        <div class="container pro-container">
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
    <!--Rekomendasi Product 1 Akhir-->

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
                    <a href="/aboutdash">About Us</a>
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
