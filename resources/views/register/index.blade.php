<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="style/login.css" />

    <title>WeShare!</title>
</head>

<body>
    <section class="login d-flex">
        <!--Login Kotak kiri-->
        <div class="login-left w-50 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-6">
                    <div class="header">
                        <h1>Hello, Friend!</h1>
                        <p>Welcome! Please Enter Your Details</p>
                    </div>

                    <main class="form-signin">
                        <form class="login-form" action="/register" method="post">
                            @csrf

                            <!--Full Name-->
                            <div>
                                <label for="name" class="form-label">Nick Name</label>
                                <input type="name" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" placeholder="Your nick name" required
                                    value="{{ old('name') }}" />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!--Email-->
                            <div>
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" placeholder="Your Email" required
                                    value="{{ old('email') }}" />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!--Password-->
                            <div>
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password" placeholder="Your password" required
                                    value="{{ old('password') }}" />
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button class="signup-form">Signup</button>
                            <div class="text-center">
                                <span class="d-inline">Alredy have an account?<a href="/login"
                                        class="signup d-inline text-decoration-none">
                                        Login</a></span>
                            </div>
                        </form>
                    </main>
                </div>
            </div>
        </div>

        <!--Login Kotak kanan-->
        <div class="login-right w-50 h-100">
            <div class="carousel-inner">
                <div class="carousel-item active vh-100">
                    <img src="../assets/login5.jpg" class="img-cover" alt="..." />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Tentukkan Pilihanmu</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
