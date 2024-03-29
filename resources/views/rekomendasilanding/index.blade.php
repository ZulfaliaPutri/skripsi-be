<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="style/rekomendasilanding.css" />
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
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        Pakaian Wanita
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        Pakaian Pria
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

                <!--Awal Kotak Harga-->
                <div class="">
                    <form action="" method="">
                        <div class="mt-3">
                            <label class="mb-2" for="batas-harga" id="batas-harga">Batas Harga</label>
                            <div class="row gx-1">
                                <div class="col-5">
                                    <input type="text" class="input-harga" name="harga-min" id="harga-min"
                                        placeholder="Rp MIN">
                                </div>
                                <div class="col-2">
                                    <hr class="garis-harga">
                                </div>
                                <div class="col-5">
                                    <input type="text" class="input-harga" name="harga-max" id="harga-max"
                                        placeholder="Rp MAX">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--Akhir Kotak Harga-->

                {{-- Button Submit --}}
                <div class="d-grid gap-2 mt-4">
                    <button type="" class="btn btn-dark" id="button">TERAPKAN</button>
                </div>
                {{-- Akhir Button Submit --}}
            </div>

            <div class="col-10">
                <!--All Makanan Olahan-->
                <section id="allproduct" class="">
                    <h3>Recommendation Product</h3>
                    <div class="pro-container">
                        @foreach ($products as $item)
                            <div class="pro">
                                <img src="{{ url('public/images/' . $item->image_path) }}" alt="produk olahan babi"
                                    height="132rem">
                                <div class="des">
                                    <span>{{ $item['category']['name'] }}</span>
                                    <h5>{{ $item['name'] }}</h5>
                                    {{-- todo: change with actual calculation --}}
                                    <div class="star">
                                        @for ($i = 0; $i < $item['rating']; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </div>
                                    <h4>Rp{{ $item['price'] }}</h4>
                                </div>
                                <a href="/produk/{{ $item['id'] }}"><i class="bi bi-cart cart"></i></a>
                            </div>
                        @endforeach
                    </div>
                </section>
                <!--Akhir Makanan Olahan-->
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
