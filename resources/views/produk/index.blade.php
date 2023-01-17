<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="/style/produk.css" />
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
            <a class="navbar-brand" href="/">
                <img src="../assets/page.png" alt="" width="50" height="50" class="me-2" />
                WeShare!
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
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
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Sign Up</a>
                    </li>
                @endguest
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
            </ul>
        </div>
    </nav>
    <!--Navbar Akhir-->

    <!--Single Produk-->
    <div class="container mt-5">
        <div class="row row-produk">
            <div class="col-lg-5">
                <figure class="figure">
                    <img src="{{ url('public/images/' . $product->image_path) }}" class="figure-img img-fluid"
                        style="border-radius: 5px; width: 450px" alt="produk babi" />
                    <figcaption class="figure-caption d-flex justify-content-evenly">
                        <a href="#">
                            <img src="{{ url('public/images/' . $product->image_path) }}" class="figure-img img-fluid"
                                style="border-radius: 5px; width: 70px" alt="produk babi" />
                        </a>
                    </figcaption>
                </figure>
            </div>

            <div class="col-lg-7">
                <h3>{{ $product->name }}</h3>
                <h5>{{ $product->seller->store_name }}</h5>
                <div class="garis-nama"></div>
                <div class="star">
                    {{-- todo: later --}}
                    <a href="#" class="d-inline text-decoration-none">
                        @for ($i = 0; $i < $product->rating; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                    </a>
                </div>
                <h3 class="text-muted mb-3">Rp {{ $product->price }}</h3>

                <div class="btn-produk mt-5">
                    <!-- <a href="#" class="btn btn-dark text-white btn-lg me-2 btn-custom"
              ><i class="fas fa-shopping-cart fs-6 me-2"></i>Masukkan
              Keranjang</a
            > -->
                    @auth
                        <a class="btn btn-success text-white btn-lg btn-custom" data-toggle="modal" id="smallButton"
                            data-target="#smallModal" title="show">
                            Beri Ulasan
                        </a>
                    @endauth

                    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog"
                        aria-labelledby="smallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="smallBody">
                                    <div>
                                        <p>Pilih Rating:</p>
                                        <form method="POST" name="form"
                                            action="{{ route('rate-product', ['id' => $params_id]) }}">
                                            @csrf
                                            @method('POST')

                                            <div class="star">
                                                <button name="submit" value="1" type="submit"
                                                    class="fas fa-star"></button>
                                                <button name="submit" value="2" type="submit"
                                                    class="fas fa-star"></button>
                                                <button name="submit" value="3" type="submit"
                                                    class="fas fa-star"></button>
                                                <button name="submit" value="4" type="submit"
                                                    class="fas fa-star"></button>
                                                <button name="submit" value="5" type="submit"
                                                    class="fas fa-star"></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Akhir Single Product-->

        <!--Deskripsi-->
        <div class="row row-produk mb-4">
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
                            {{-- //todo: later --}}
                        <h6>Spesifikasi Produk:</h6>
                        <p>Jenis: {{ $product->category->name }}</p>
                        @if ($type == 1)
                            {{-- food product --}}
                            <p>Expired: {{ $product->food->expired_day_count }} hari</p>
                        @elseif ($type == 2)
                            {{-- clothes product --}}
                            <p>Bahan: {{ $product->clothes->material }}</p>
                            <p>Ukuran: {{ $product->clothes->size }}</p>
                            <p>Panjang Lengan: {{ $product->clothes->sleeve_type }}</p>
                        @endif

                        <p class="deskripsi">
                        <h6>Deskripsi Produk:</h6>
                        {{ $product->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Akhir Deskripsi-->

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
                <a href="/aboutdash">About Us</a>
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
    <!--Footer Akhir-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        // display a modal (small modal)
        $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
    </script>
</body>

</html>
