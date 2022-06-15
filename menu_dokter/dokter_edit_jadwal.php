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
    <!-- css buatan sendiri -->
    <link rel="stylesheet" href="../css/style_dashboard.css">
    <title>Menu Jadwal Dokter</title>
</head>

<body>
    <?php
    session_start();
    include "../koneksi.php";
    $id_dokter = $_SESSION['id_dokter'];
    $username = $_SESSION['username'];
    $nama = $_SESSION['nama'];

    $id_jadwal_dokter = $_GET['id_jadwal_dokter'];
    $sql = "SELECT * FROM jadwal_dokter WHERE id_jadwal_dokter = '$id_jadwal_dokter'";
    $query = $koneksi->query($sql);
    ?>

    <nav class="navbar navbar-dark" style="background-color: #22333E;">
        <div class="container-fluid">
            <a class="navbar-brand">Ini Hospital Management</a>
            <form class="d-flex" role="search">
                <a href="../logout.php" class="btn btn-outline-danger btn-sm" role="button">LOG OUT</a>
            </form>
        </div>
    </nav>

    <div class="d-flex bg-secondary text-white" id="wrapper">
        <!-- Sidebar -->
        <div class="" id="sidebar-wrapper" style="background-color: #5a636b;">
            <div class="list-group list-group-flush my-3">
                <a href="dokter_dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold "><i class="fas fa-home me-2"></i>Dashboard</a>
                <a href="dokter_keluhan.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-clipboard-list me-2"></i></i>Keluhan</a>
                <a href="dokter_diagnosa.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fa-solid fa-comment-medical me-2"></i>Diagnosa</a>
                <a href="dokter_jadwal.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i class="fas fa-clock me-2"></i>Jadwal</a>

            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Jadwal Dokter</h2>
                </div>
            </nav>
            <div class="container-sm">
                <hr class="border-light border-2 opacity-75">
                <?php
                if ($query) {
                    while ($data = mysqli_fetch_array($query)) {
                ?>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="inputwaktumulai" class="form-label">Waktu Mulai</label>
                                <input type="time" class="form-control" id="inputwaktumulai" name="waktu_mulai" value="<?php echo $data['waktu_mulai']?>">
                            </div>
                            <div class="mb-3">
                                <label for="inputwaktuberakhir" class="form-label">Waktu Berakhir</label>
                                <input type="time" class="form-control" id="inputwaktuberakhir" name="waktu_berakhir" value="<?php echo $data['waktu_berakhir']?>">
                            </div>
                            <input class="btn btn-primary" type="submit" name="edit" value="Edit">
                            <a class="btn btn-danger" href="dokter_jadwal.php" role="button">Cancel</a>
                        </form>
                <?php
                    }
                }
                if(isset($_POST['edit'])){
                    $id_jadwal_dokter = $_GET['id_jadwal_dokter'];
                    $waktu_mulai = $_POST['waktu_mulai'];
                    $waktu_berakhir = $_POST['waktu_berakhir'];
                    $sql = "UPDATE jadwal_dokter SET waktu_mulai = '$waktu_mulai', waktu_berakhir = '$waktu_berakhir' WHERE id_jadwal_dokter = '$id_jadwal_dokter'";
                    $query = $koneksi->query($sql);
                    if ($query) {
                        echo "<script>alert('Data berhasil diubah');
                        window.location.href = ('dokter_jadwal.php');
                        </script>";
                    } else {
                        echo "<script>alert('Data gagal diubah');</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    <!-- <footer class="bg-dark pb-3 pt-4">
        <p class="text-center text-white bg-dark">Created with love by Ilham Shodiq</p>
    </footer> -->

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
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>