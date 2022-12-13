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

$walikelas = mysqli_query($conn, "SELECT * FROM super_user WHERE username = '$username'");
foreach ($walikelas as $z) {}

$mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa");




 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'link.php'; ?>

    <style>
        .ahover:hover {
            text-decoration: none;
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

                    <h3>Pilih Mahasiswa</h3>

                    <?php foreach ($mahasiswa as $data) : ?>

                    <?php if ($data['kelas'] == $z['kelas']) : ?>

                    <a href="chat.php?id=<?= $data['nim']; ?>" class='ahover'>
                        <div class="my-3 card">
                            <div class="row">
                                <div class="col"><img src="../foto/<?= $data['foto']; ?>" width='60'></div>
                                <div class="col-11"><p class="mt-4"><?= $data['nama']; ?> &nbsp; <?= $data['nim']; ?></p></div>
                            </div>
                           
                        </div>  
                    </a>
                    <?php else: ?>
                    <?php endif; ?>
                    <?php endforeach; ?>    


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