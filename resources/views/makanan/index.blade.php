<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="style/food.css" />
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
            <ul class="navbar-nav e-auto mb-2 mb-lg-0">
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome back, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> My Profile</a></li>
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


    <div class="container">
        <div class="row mt-5">
            <div class="col-2 mt-5">
                <!--Chekbox Untuk Kategori-->
                <div class="list-group">
                    <label for="provinsi" class="form-label">Kategori</label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        Makanan Olahan
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        Makanan Instant
                    </label>
                </div>
                <!--Akhir Chekbox Untuk Kategori-->

                <!--Chekbox Untuk Rating-->
                <div class="list-group mt-3">
                    <label for="provinsi" class="form-label">Rating</label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        <i class="fas fa-star"></i>
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </label>
                </div>
                <!--Akhir Chekbox Untuk Rating-->

                {{-- Awal Kotak Harga --}}
                <div class="me-5">
                    <form action="" method="">
                        <div class="row mt-3">
                            <label for="batas-harga" id="batas-harga">Batas Harga</label>
                            <div class="col">
                                <label for="harga-min" id="harga-min"></label>
                                <input type="text" name="harga-min" id="harga-min" placeholder="Rp MIN">
                            </div>
                            <div class="garis-nama ms-3"></div>
                            <div class="col">
                                <label for="harga-max" id="harga-max"></label>
                                <input type="text" name="harga-max" id="harga-max" placeholder="Rp MAX">
                            </div>
                        </div>
                    </form>
                </div>
                {{-- Akhir Kotak Harga --}}

                {{-- Button Submit --}}
                <div class="d-grid gap-2 mt-4">
                    <button type="" class="btn btn-dark" id="button">TERAPKAN</button>
                </div>
                {{-- Akhir Button Submit --}}
            </div>

            <div class="col-10">
                <!--All Makanan Olahan-->
                <section id="allproduct" class="">
                    <h3>Makanan</h3>
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
                <!--Akhir Makanan Olahan-->

                <!--Awal Makanan 1-->
                <section id="allproduct" class="">
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
                <!--Akhir Makanan 2-->

                <!--Awal Makanan 3-->
                <section id="allproduct" class="">
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
                <!--Akhir Makanan 3-->

                <!--Awal Makanan 4-->
                <section id="allproduct" class="">
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
                <!--Akhir Makanan 4-->

                <!--Awal Makanan 5-->
                <section id="allproduct" class="">
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
                <!--Akhir Makanan 5-->
            </div>
        </div>
    </div>

    <!--Footer-->
    <footer class="section-p4 pt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img class="logo" src="../assets/logo.png" alt="logo">
                    <p>Website yang ditunjukkan untuk mendukung pengurangan limbah dan menjadikan kegiatan berbagi
                        seperti <i>food sharing</i> dan <i>preloved clothes</i></p>
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
