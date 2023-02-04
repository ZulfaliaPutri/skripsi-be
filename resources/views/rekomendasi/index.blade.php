<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="style/rekomendasi.css" />
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
            @auth
                <a class="navbar-brand" href="/dashboard">
                    <img src="../assets/page.png" alt="" width="50" height="50" class="me-2" />
                    WeShare!
                </a>
            @endauth
            @guest
                <a class="navbar-brand" href="/">
                    <img src="../assets/page.png" alt="" width="50" height="50" class="me-2" />
                    WeShare!
                </a>
            @endguest
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    {{-- kalau hrefnya dikasih "dashboard maka akan auto login" --}}
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/rekomendasi">Recommendation</a>
                </li>
                @auth
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
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="/aboutus">About Us</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                        Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Sign Up</a>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <!--Navbar Akhir-->


    <div class="container">
        <div class="row mt-5">
            <div class="col-2 mt-5">
                <form name="search-form" action="{{ route('rekomendasi') }}" method="GET">
                    <div class="list-group">
                        <label for="provinsi" class="form-label">Kategori</label>
                        <label class="list-group-item">
                            <input name="category-1" class="form-check-input me-1" type="checkbox"
                                {{ request()->query('category-1') ? 'checked' : '' }}>
                            Makanan Olahan
                        </label>
                        <label class="list-group-item">
                            <input name="category-2" class="form-check-input me-1" type="checkbox"
                                {{ request()->query('category-2') ? 'checked' : '' }}>
                            Makanan Instant
                        </label>
                        <label class="list-group-item">
                            <input name="category-3" class="form-check-input me-1" type="checkbox"
                                {{ request()->query('category-3') ? 'checked' : '' }}>
                            Pakaian Wanita
                        </label>
                        <label class="list-group-item">
                            <input name="category-4" class="form-check-input me-1" type="checkbox"
                                {{ request()->query('category-4') ? 'checked' : '' }}>
                            Pakaian Pria
                        </label>
                    </div>
                    <!--Akhir Chekbox Untuk Kategori-->

                    <!--Chekbox Untuk Rating-->
                    <div class="list-group mt-3">
                        <label for="provinsi" class="form-label">Rating</label>
                        <label class="list-group-item">
                            <input name="rating-1" class="form-check-input me-1" type="checkbox"
                                {{ request()->query('rating-1') ? 'checked' : '' }}>
                            <i class="fas fa-star"></i>
                        </label>
                        <label class="list-group-item">
                            <input name="rating-2" class="form-check-input me-1" type="checkbox"
                                {{ request()->query('rating-2') ? 'checked' : '' }}>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </label>
                        <label class="list-group-item">
                            <input name="rating-3" class="form-check-input me-1" type="checkbox"
                                {{ request()->query('rating-3') ? 'checked' : '' }}>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </label>
                        <label class="list-group-item">
                            <input name="rating-4" class="form-check-input me-1" type="checkbox"
                                {{ request()->query('rating-4') ? 'checked' : '' }}>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </label>
                        <label class="list-group-item">
                            <input name="rating-5" class="form-check-input me-1" type="checkbox"
                                {{ request()->query('rating-5') ? 'checked' : '' }}>
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
                        <div class="mt-3">
                            <label class="mb-2" for="batas-harga" id="batas-harga">Batas Harga</label>
                            <div class="row gx-1">
                                <div class="col-5">
                                    <input type="text" class="input-harga" name="minPrice" id="harga-min"
                                        placeholder="Rp MIN" value="{{ request()->query('minPrice') ?: '' }}">
                                </div>
                                <div class="col-2">
                                    <hr class="garis-harga">
                                </div>
                                <div class="col-5">
                                    <input type="text" class="input-harga" name="maxPrice" id="harga-max"
                                        placeholder="Rp MAX" value="{{ request()->query('maxPrice') ?: '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Button Submit-->
                    <div class="d-grid gap-2 mt-4">
                        <button type="" class="btn btn-dark" id="button">TERAPKAN</button>
                        <button name="closest" value="true" type="" class="btn btn-dark"
                            id="button-jarak">Terdekat</button>
                    </div>
                    <!--Akhir Button Submit-->

                </form>
                <!--Chekbox Untuk Kategori-->
            </div>

            <div class="col-10">
                <!--All Makanan Olahan-->
                <section id="allproduct" class="">
                    <h3>Recommendation Product</h3>
                    <div class="pro-container">
                        @auth
                            @if (isset($productsRecommended))
                                @foreach ($productsRecommended as $item)
                                    <div class="pro">
                                        <img src="{{ url('public/images/' . $item->image_path) }}"
                                            alt="produk olahan babi" height="132rem">
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
                                            <p>collaborative</p>
                                            @if (isset($item['regencyName']))
                                                <p>{{ $item['regencyName'] }}</p>
                                            @endif
                                        </div>
                                        <a href="/produk/{{ $item['id'] }}"><i class="bi bi-cart cart"></i></a>
                                    </div>
                                @endforeach
                            @endif
                            @if (isset($productsContentBased))
                                @foreach ($productsContentBased as $item)
                                    <div class="pro">
                                        <img src="{{ url('public/images/' . $item->image_path) }}"
                                            alt="produk olahan babi" height="132rem">
                                        <div class="des">
                                            <span>{{ $item['category']['name'] }}</span>
                                            <h5>{{ $item['name'] }}</h5>
                                            {{-- todo: change with actual calculation --}}
                                            {{-- <div class="star">
                                                @for ($i = 0; $i < $item['rating']; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                            </div> --}}
                                            <h4>Rp{{ $item['price'] }}</h4>
                                            <p>content-based</p>
                                            @if (isset($item['regencyName']))
                                                <p>{{ $item['regencyName'] }}</p>
                                            @endif
                                        </div>
                                        <a href="/produk/{{ $item['id'] }}"><i class="bi bi-cart cart"></i></a>
                                    </div>
                                @endforeach
                            @endif
                        @endauth
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
                                    @if (isset($item['regencyName']))
                                        <p>{{ $item['regencyName'] }}</p>
                                    @endif
                                </div>
                                <a href="/produk/{{ $item['id'] }}"><i class="bi bi-cart cart"></i></a>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!--Footer-->
    <footer class="section-p4 pt-5">
        <div class="d-flex justify-content-between">
            <div>
                <img class="logo" src="../assets/logo.png" alt="logo">
                <p>Website yang ditunjukkan untuk mendukung<br>pengurangan limbah dan menjadikan<br>kegiatan berbagi
                    seperti <i>food sharing</i><br>dan <i>preloved clothes</i></p>
            </div>
            <div>
                <h4>Information</h4>
                <a href="/aboutus">About Us</a>
            </div>
            <div>
                <h4>Contact Us</h4>
                <div>
                    <i class="bi bi-envelope"></i> foodclothesshare@gmail.com</a>
                </div>
                <div>
                    <a href="#"><i class="bi bi-telephone"></i> 08657234589</a>
                </div>
            </div>
            <div>
                <div class="follow">
                    <h4 class="">Media Social</h4>
                    <div class="d-flex justify-content-between">
                        <div><i class="fab fa-facebook-f"></i></div>
                        <div><i class="fab fa-twitter"></i></div>
                        <div><i class="fab fa-instagram"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="copyright">
                <p>2022, Website WeShare! - Sistem Rekomendasi <i>food sharing</i> dan <i>preloved clothes</i>
                </p>
            </div>
        </div>
    </footer>
    {{-- <div class="row d-flex justify-content-center">
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
                <p>2022, Website WeShare! - Sistem Rekomendasi <i>food sharing</i> dan <i>preloved clothes</i>
                </p>
            </div>
        </div> --}}
    <!--Footer Akhir-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
