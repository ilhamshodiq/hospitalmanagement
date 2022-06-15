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

    <title>Menu Akun Admin</title>
</head>

<body>
    <?php
    session_start();
    include "../koneksi.php";
    $sql = "SELECT * FROM admin";
    $query = $koneksi->query($sql);
    $no = 1;

    ?>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> Ini Hospital Management</a>
            <a href="../logout.php" class="btn btn-outline-danger btn-sm" role="button">LOG OUT</a>
        </div>
    </nav>

    <div class="d-flex bg-dark text-white" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark" id="sidebar-wrapper">
            <div class="list-group list-group-flush my-3">
                <a href="admin_dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text"><i class="fas fa-home me-2"></i>Dashboard</a>
                <a class="active navbar-toggler list-group-item list-group-item-action bg-transparent second-text fw-bold nav-link dropdown-toggle second-text fw-bold" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user me-2"></i>Akun
                </a>
                <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                    <li><a class="dropdown-item" href="admin_akunadmin.php">Akun Admin</a></li>
                    <li><a class="dropdown-item" href="admin_akundokter.php">Akun Dokter</a></li>
                    <li><a class="dropdown-item" href="admin_akunpasien.php">Akun Pasien</a></li>
                </ul>
                <a href="admin_poliklinik.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-house-medical-flag me-2"></i>Poliklinik</a>
                <a href="admin_obat.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-pills me-2"></i>Obat</a>
                <a href="admin_ruangan.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-door-open me-2"></i>Ruangan</a>                
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Akun Admin</h2>
                </div>
            </nav>
            <div class="container-sm">
                <hr class="border-light border-2 opacity-75">
                <a class="btn btn-primary mb-2 btn-sm" href="admin_tambah_akunadmin.php" role="button">Tambah</a>
                <table class="table table-light table-striped rounded table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="50">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama</th>
                            <th scope="col" width="200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = $query->fetch_array()) { ?>
                            <tr>
                                <th scope="row"><?php echo $no++ ?></th>
                                <td><?php echo $data['username'] ?></td>
                                <td><?php echo $data['nama_admin'] ?></td>
                                <td>
                                    <form action="admin_edit_akunadmin.php?id_admin=<?php echo $data['id_admin'] ?>" method="post">
                                        <input type="hidden" name="username_admin">
                                        <input class="btn btn-success btn-sm" type="submit" value="edit">
                                    </form>
                                    <p></p>
                                    <form action="aksi/aksi_hapusadmin.php" method="post">
                                        <input type="hidden" name="username_admin" value="<?php echo $data['username'] ?>">
                                        <input class="btn btn-danger btn-sm" type="submit" name="hapus" value="hapus" onClick="return confirm('Apakah Anda ingin menghapus akun?')">
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

    <footer class="bg-dark text-center text-white p-4">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="mailto:ilhambheh@gmail.com">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
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