<?php 
session_start();

if (!isset($_SESSION['wali'])) {
   echo "<script>
         window.location.replace('../session/login.php');
       </script>";
  exit;
}

require 'functions.php';


$username = $_SESSION['username'];

$x = query("SELECT * FROM super_user WHERE username = '$username'")[0];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'link.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script>
         $(document).ready(function() {

         $("#form").hide();

         $("#btn-show").click(function() {
           $("#form").show();
         })

         $("#btn-hide").click(function() {
           $("#form").hide();
         })

       });
    </script>
    <style>
        table img {
            transition: 0.5s;
        }
        table img:hover {
            transition: 0.5s;
            transform: scale(2.5);
        }
    </style>
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

                    <!-- Content Row -->
                    <div class="row">


                        <div class="col mb-4">
                            


                            <!-- Data -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#card-super_user" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-super_user">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Diri</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-super_user">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-6">
                                                    <img src="../foto/<?= $x['foto']; ?>" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <td>Nama : <?= $x['nama']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jenis Kelamin : <?= $x['jenis_kelamin']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>TTL : <?= $x['ttl']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>NIDN : <?= $x['nidn']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>NIP : <?= $x['nip']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jurusan : <?= $x['jurusan']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email : <?= $x['email']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jabatan Fungsional : <?= $x['jabatan_fungsional']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jabatan Struktural : <?= $x['jabatan_struktural']; ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>