<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="style/sharingmakanan.css" />
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

    <!--Judul kategori-->
    <section id="judul" class="section-p1">
        <h2>Sharing Makanan</h2>
    </section>
    <!--Judul Akhir-->


    <div class="container">
        <div class="row">
            <div class="col-4">
                <!--Awal CRUD-->
                <table>
                    <tr>
                        <td>
                            <form autocomplete="off" onsubmit="onFormSubmit()">
                                <div>
                                    <label for="productID">
                                        ID Produk
                                    </label>
                                    <input type="text" name="productID" id="productID">
                                </div>

                                <div>
                                    <label for="makananID">
                                        ID Makanan
                                    </label>
                                    <input type="text" name="makananID" id="makananID">
                                </div>

                                <div>
                                    <label for="namaMakanan">
                                        Nama Makanan
                                    </label>
                                    <input type="text" name="namaMakanan" id="namaMakanan">
                                </div>

                                <div class="mb-3" id="kategori">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option selected>--Pilih Opsi--</option>
                                        <option value="1">Makanan Olahan</option>
                                        <option value="2">Makanan Instant</option>
                                    </select>
                                </div>

                                <div class="mb-3" id="masaPenyimpanan">
                                    <label for="masaPenyimpanan" class="form-label">Masa Penyimpanan</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option selected>--Pilih Opsi--</option>
                                        <option value="1">1 Hari</option>
                                        <option value="2">2 Hari</option>
                                        <option value="3">3 Hari</option>
                                        <option value="4">4 Hari</option>
                                        <option value="5">5 Hari</option>
                                        <option value="6">6 Hari</option>
                                        <option value="7">7 Hari</option>
                                        <option value="8">8 Hari</option>
                                        <option value="9">9 Hari</option>
                                        <option value="10">10 Hari</option>
                                        <option value="11">11 Hari</option>
                                        <option value="12">12 Hari</option>
                                        <option value="13">13 Hari</option>
                                        <option value="14">14 Hari</option>
                                        <option value="15">15 Hari</option>
                                        <option value="16">16 Hari</option>
                                        <option value="17">17 Hari</option>
                                        <option value="18">18 Hari</option>
                                        <option value="19">19 Hari</option>
                                        <option value="20">20 Hari</option>
                                        <option value="21">21 Hari</option>
                                        <option value="22">22 Hari</option>
                                        <option value="23">23 Hari</option>
                                        <option value="24">24 Hari</option>
                                        <option value="25">25 Hari</option>
                                        <option value="26">26 Hari</option>
                                        <option value="27">27 Hari</option>
                                        <option value="28">28 Hari</option>
                                        <option value="29">29 Hari</option>
                                        <option value="30">30 Hari</option>
                                        <option value="31">31 Hari</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="qty">
                                        Quantity
                                    </label>
                                    <input type="number" name="qty" id="qty">
                                </div>

                                <div>
                                    <label for="perPrice">
                                        Harga
                                    </label>
                                    <input type="number" name="perPrice" id="perPrice">
                                </div>

                                <div>
                                    <label for="rating">
                                        Rating
                                    </label>
                                    <input type="number" name="rating" id="rating">
                                </div>

                                <div class="mb-3">
                                    <label for="fotoProduk" class="form-label">Foto Produk</label>
                                    <input class="form-control" type="file" id="fotoProduk" multiple>
                                </div>

                                <div class="form_action--button">
                                    <input type="submit" value="Submit">
                                    <input type="reset" value="Reset">
                                </div>
                            </form>

                        </td>

                    </tr>
                </table>
                <!--Akhir CRUD-->
            </div>
            <div class="col-8">
                <table class="list" id="storeList">
                    <thead>
                        <tr>
                            <th>ID Produk</th>
                            <th>ID Makanan</th>
                            <th>Nama Makanan</th>
                            <th>Kategori</th>
                            <th>Masa Penyimpanan</th>
                            <th>Quantity</th>
                            <th>Harga</th>
                            <th>Rating</th>
                            <th>Foto Produk</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
    <script type="text/javascript" src="JS/sharingmakanan.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
