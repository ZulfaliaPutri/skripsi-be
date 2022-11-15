<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="style/aboutus.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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

    <!--About Us-->
    <!--Information Awal -->
    <div class="wrapper">
        <div class="about-1">
            <h1 class="mt-5 mb-5">About Us</h1>
            <section id="awal">
                <img src="../assets/Foto1.png" alt="Gambar untuk Hate Speech" />
                <div class="kolom">
                    <h2>Alasan Pembuatan Website</h2>
                    <p>
                        Meningkatnya angka kelahiran manusia di negara ini menimbulkan
                        lonjakan akan makanan dan pakaian sebagai kebutuhan primer dalam
                        menjalankan kehdiupan sehari-hari. Namun, dikarenakan lonjakan
                        akan kebutuhan ini menimbulkan dampak yaitu limbah makanan dan
                        pakaian menjadi menumpuk. Untuk mengatasi itu, dibuatlah website
                        ini agar masyarakat bisa melakukan sharing baik makanan atau
                        pakaian untuk diberikan kepada masyarakat yang membutuhkan.
                        Sehingga limbah makanan dan pakaian bisa berkurang.
                    </p>
                </div>
            </section>

            <!-- Information Kedua -->
            <section id="kedua">
                <div class="kolom">
                    <h2>Lokasi Yang Dijangkau</h2>
                    <p>
                        <i>Website</i> ini masih menjangkau Provinsi Bali saja. Seperti
                        daerah Denpasar, Jimbaran, Nusa Dua, Singaraja, Gianyar ataupun
                        Abiansemel. Bila respon masyarakat yang semakin meningkat maka
                        <i>website</i> ini akan menjangkau sampai seluruh Indonesia.
                    </p>
                </div>
                <img src="../assets/Foto2.png" alt="Gambar untuk Abusive Language" />
            </section>

            <!-- Information Ketiga -->
            <section id="awal">
                <img src="../assets/Foto1.png" alt="Gambar untuk Hate Speech" />
                <div class="kolom">
                    <h2>Tujuan Website</h2>
                    <p>
                        <i>Website</i> ini dibentuk untuk mengurangi limbah makanan dan
                        pakaian yang semakin meningkat. Terlebih diluar sana masih banyak
                        masyarakat yang kekurangan untuk kebutuhan makan ataupun pakaian.
                        Selain itu juga, di beberapa masyarakat ataupun warung masih
                        melakukan pembuangan makanan sisa. Untuk mengatasi
                        <i>food waste</i> pakaian yang dibuang maka dibentuklah
                        <i>Food Sharing</i> dan <i>Preloved Clothes</i>.
                    </p>
                </div>
            </section>
        </div>
    </div>

    <!--About Us Akhir-->

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
