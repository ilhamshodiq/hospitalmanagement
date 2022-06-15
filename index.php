<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap 5.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Menu Awal</title>
</head>
<style>
    .top-wrapper {
        padding: 180px 0 262px 0;
        background-image: url("gambar/bg.jpg");
        background-size: cover;
        text-align: center;
    }
</style>

<body>
    <nav class="navbar navbar-dark" style="background-color: #22333E;">
        <div class="container-fluid">
            <a class="navbar-brand">Ini Hospital Management</a>
        </div>
    </nav>
    <div class="top-wrapper">
        <div class="container">
            <div class="row">
                <div class="mb-3">
                    <a class="btn btn-secondary text-light" href="login/login_admin.php" role="button">Login Admin</a>
                </div>
                <div class="mb-3">
                    <a class="btn btn-secondary text-light" href="login/login_dokter.php" role="button">Login Dokter</a>
                </div>
                <div class="mb-3">
                    <a class="btn btn-secondary text-light" href="login/login_pasien.php" role="button">Login Pasien</a>
                </div>
            </div>
        </div>
    </div>



    <!-- <h1 class="text-center">Ini Hospital Management</h1> -->
    <!-- <div class="container bg-dark">
        <div class="text-center">
            <a class="btn btn-secondary btn-lg" href="login/login_admin.php" role="button">Login Admin</a>
            <a class="btn btn-secondary btn-lg" href="login/login_dokter.php" role="button">Login Dokter</a>
            <a class="btn btn-secondary btn-lg" href="login/login_pasien.php" role="button">Login Pasien</a>
        </div>
    </div> -->


    <footer class="text-center text-white p-4" style="background-color: #22333E;">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="mailto:ilhambheh@gmail.com">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-envelope fa-stack-1x fa-inverse"> </i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://twitter.com/The12sMB">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com/ilham_shodq/">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://github.com/ilhamshodiq">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                </ul>
                <div class="small text-center">Created with love by Ilham Shodiq</div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>