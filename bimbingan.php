<?php 
session_start();

if (!isset($_SESSION['mahasiswa'])) {
   echo "<script>
         window.location.replace('session/login.php');
       </script>";
  exit;
}

require 'functions.php';

$walikelas = mysqli_query($conn, "SELECT * FROM super_user WHERE jabatan = 'Wali Kelas'");


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

                    <h3>Pilih Walikelas</h3>

                    <?php foreach ($walikelas as $data) : ?>
                    <a href="chat.php?id=<?= $data['id']; ?>" class='ahover'>
                        <div class="my-3 card">
                            <div class="row">
                                <div class="col"><img src="foto/<?= $data['foto']; ?>" width='60'></div>
                                <div class="col-11"><p class="mt-4"><?= $data['nama']; ?> &nbsp; <?= $data['nip']; ?> &nbsp; <?= $data['kelas']; ?></p></div>
                            </div>
                           
                        </div>  
                    </a>
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