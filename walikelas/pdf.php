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


$super_user = mysqli_query($conn, "SELECT * FROM super_user WHERE username = '$username'");
foreach ($super_user as $data) {}


$kelas = $data['kelas'];


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
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
                                    <h6 class="m-0 font-weight-bold text-primary">Laporan Grup Kelas</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-super_user">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <table class="table table-striped">
                                          
												<form method="POST" action="hasil.php">
													<td><input type="submit" value="Cetak Laporan"></td>
												</form>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Data -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#card-super_user" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-super_user">
                                    <h6 class="m-0 font-weight-bold text-primary">Laporan Personal</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-super_user">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <table class="table table-striped">
                                                <form method="post" action="hasil-personal.php">
                                                    <select name="nim" id="nim" required>
                                                        <?php $mhs = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE kelas = '$kelas'"); ?>
                                                        <?php foreach ($mhs as $m) : ?>
                                                            <option value="<?= $m['nim']; ?>"><?= $m['nim']; ?> - <?= $m['nama']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <td><input type="submit" value="Cetak Laporan"></td>
                                                </form>
                                        </table>
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