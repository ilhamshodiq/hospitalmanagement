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
    <title>Menu Keluhan</title>
</head>

<body>
    <?php
    session_start();
    include "../koneksi.php";
    $id_dokter = $_SESSION['id_dokter'];
    $username = $_SESSION['username'];
    $nama = $_SESSION['nama'];

    $sql = "SELECT * FROM keluhan WHERE id_dokter = '$id_dokter' AND  status = 'belum disetujui'";    
    $query = $koneksi->query($sql);
    $no = 1;
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
                <a href="dokter_keluhan.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i class="fas fa-clipboard-list me-2"></i></i>Keluhan</a>
                <a href="dokter_diagnosa.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fa-solid fa-comment-medical me-2"></i>Diagnosa</a>
                <a href="dokter_jadwal.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-clock me-2"></i>Jadwal</a>

            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Keluhan</h2>
                </div>
            </nav>
            <div class="container-sm">
                <hr class="border-light border-2 opacity-75">
                <table class="table table-light table-striped rounded table-hover">
                    <thead>
                        <tr>
                            <!-- <th scope="col" width="50">#</th> -->
                            <th scope="col">Id Keluhan</th>
                            <th scope="col">Id Pasien</th>
                            <th scope="col">tanggal</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Status</th>
                            <th scope="col">Id Ruangan</th>
                            <th scope="col" width="100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = $query->fetch_array()) { ?>
                            <tr>
                                <td><?php echo $data['id_keluhan'] ?></td>
                                <td><?php echo $data['id_pasien'] ?></td>
                                <td><?php echo $data['tanggal'] ?></td>
                                <td><?php echo $data['jam'] ?></td>
                                <td><?php echo $data['deskripsi'] ?></td>
                                <td><?php echo $data['status'] ?></td>
                                <td><?php echo $data['id_ruangan'] ?></td>
                                <td>
                                    <form action="dokter_prosesdiagnosa.php" method="post">
                                        <input type="hidden" name="id_keluhan" value="<?php echo $data['id_keluhan'] ?>">
                                        <input class="btn btn-success btn-sm" type="submit" name="submit" value="proses">
                                    </form>
                                    <p></p>
                                    <form action="aksi/aksi_hapuskeluhan.php" method="post">
                                        <input type="hidden" name="id_keluhan" value="<?php echo $data['id_keluhan'] ?>">
                                        <input class="btn btn-danger btn-sm" type="submit" name="hapus" value="hapus" onClick="return confirm('Apakah Anda ingin menghapus keluhan?')">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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