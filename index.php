<?php 
session_start();

if (!isset($_SESSION['mahasiswa'])) {
   echo "<script>
         window.location.replace('session/login.php');
       </script>";
  exit;
}

require 'functions.php';

$username = $_SESSION['username'];

$mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE username = '$username'");
foreach ($mahasiswa as $data) {}


 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'link.php'; ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include 'topbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php include 'admin/animasi.php'; ?>
                    <hr>
                    <br><br>

                    <h3>Profile Anda</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Nomor Handphone</th>
                            <th>Foto</th>
                        </tr>
                        <tr>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['nim']; ?></td>
                            <td><?= $data['nohp']; ?></td>
                            <td><img src="foto/<?= $data['foto']; ?>" width='75px'></td>
                        </tr>
                        </table>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include 'footer.php' ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>