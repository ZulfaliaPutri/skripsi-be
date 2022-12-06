<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="style/sharingpakaian.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Import fontawesome icon -->
    <script src="https://kit.fontawesome.com/e3be59a47f.js" crossorigin="anonymous"></script>
    <!-- Import boostrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>WeShare!</title>
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

    <!--Judul kategori-->
    <section id="judul" class="section-p1">
        <h2>Sharing Pakaian</h2>
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
                                    <label for="namaPakaian">
                                        Nama Pakaian
                                    </label>
                                    <input type="text" name="namaPakaian" id="namaPakaian">
                                </div>

                                <div class="mb-3" id="kategori">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option selected>--Pilih Opsi--</option>
                                        <option value="1">Pria</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>

                                <div class="mb-3" id="panjangLengan">
                                    <label for="panjangLengan" class="form-label">Panjang Lengan</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option selected>--Pilih Opsi--</option>
                                        <option value="1">Panjang</option>
                                        <option value="2">Pendek</option>
                                    </select>
                                </div>

                                <div class="mb-3" id="ukuranPakaian">
                                    <label for="kategori" class="form-label">Ukuran</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option selected>--Pilih Opsi--</option>
                                        <option value="1">S</option>
                                        <option value="2">M</option>
                                        <option value="3">L</option>
                                        <option value="4">XL</option>
                                        <option value="5">XXL</option>
                                    </select>
                                </div>

                                <div class="mb-3" id="bahanPakaian">
                                    <label for="bahanPakaian" class="form-label">Bahan</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option selected>--Pilih Opsi--</option>
                                        <option value="1">Freelace</option>
                                        <option value="2">Katun</option>
                                        <option value="3">Polyester</option>
                                        <option value="4">Knitt</option>
                                        <option value="5">Sifon</option>
                                        <option value="6">Rajut</option>
                                        <option value="7">Canvas</option>
                                        <option value="8">Flanel</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="qty">
                                        Jumlah Barang
                                    </label>
                                    <input type="number" name="qty" id="qty">
                                </div>

                                <div>
                                    <label for="perPrice">
                                        Harga
                                    </label>
                                    <input type="number" name="perPrice" id="perPrice">
                                </div>

                                <div class="mb-3">
                                    <label for="fotoProduk" class="form-label">Foto Produk</label>
                                    <input class="form-control" type="file" id="fotoProduk" multiple>
                                </div>

                                <div>
                                    <label for="description">
                                        Deskripsi
                                    </label>
                                    <input type="text" name="Deksripsi" id="decription">
                                </div>

                                <div class="form_action--button">
                                    <input type="submit" value="Submit">
                                    <input type="reset" value="Reset">
                                </div>
                            </form>

                        </td>

                    </tr>
                </table>
            </div>
            <div class="col-8">
                <table class="list" id="storeList">
                    <thead>
                        <tr>
                            <th>Nama Pakaian</th>
                            <th>Kategori</th>
                            <th>Panjang Lengan</th>
                            <th>Ukuran</th>
                            <th>Bahan</th>
                            <th>Foto Produk</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!--Akhir CRUD-->

    <!--Footer-->
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
    <script type="text/javascript" src="JS/sharingpakaian.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
