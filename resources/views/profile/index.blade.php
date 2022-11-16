<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="style/profile.css" />
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
        <h2>My Profile</h2>
    </section>
    <!--Judul Akhir-->

    <!--Awal Profile-->

    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2"
                            src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <button class="btn btn-primary" type="button">Upload new image</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form>
                            <!-- Form Grup 1-->
                            <div class="row gx-3 mb-3">
                                <!--Form Nick Name-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputName">Nick Name</label>
                                    <input class="form-control" id="inputName" type="text"
                                        placeholder="Enter your nick name" value="Zulfa">
                                </div>
                                <!-- Form Email-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                    <input class="form-control" id="inputEmailAddress" type="email"
                                        placeholder="Enter your email address" value="name@example.com">
                                </div>
                            </div>
                            <!-- Form Grup 2-->
                            <div class="row gx-3 mb-3">
                                <!--Form Age-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputAge">Age</label>
                                    <input class="form-control" id="inputAge" type="number"
                                        placeholder="Enter your age" value="12">
                                </div>
                                <!--Form Gender-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputGender">Gender</label>
                                    <input class="form-control" id="inputGender" type="text"
                                        placeholder="Enter your gender" value="women">
                                </div>
                            </div>
                            <!-- Form Grup 3-->
                            <div class="row gx-3 mb-3">
                                <!--Form Phone-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="tel"
                                        placeholder="Enter your phone number" value="555-123-4567">
                                </div>
                            </div>
                            <!-- Address-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputLocation">Location</label>
                                <input class="form-control" id="inputLocation" type="text"
                                    placeholder="Enter your location" value="San Francisco, CA">
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="button">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Akhir Profile-->

    <!--Footer-->
    <footer class="section-p4 pt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img class="logo" src="../assets/logo.png" alt="logo">
                    <p>Website yang ditunjukkan untuk mendukung pengurangan limbah</p>
                    <p>dan menjadikan kegiatan berbagi seperti <i>food sharing</i> dan <i>preloved clothes</i></p>
                </div>

                <div class="col">
                    <h4>Information</h4>
                    <a href="aboutus.html">About Us</a>
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
