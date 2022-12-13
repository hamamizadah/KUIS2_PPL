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
foreach ($super_user as $m) {}

$id_wali = $m['id'];

$riwayat = mysqli_query($conn, "SELECT DISTINCT topik,id_pengirim,status FROM chat WHERE id_penerima = '$id_wali' AND topik != ''");


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

                    <h3>Riwayat Bimbingan</h3>

                    <?php foreach ($riwayat as $data) : ?>
                    <a href="chat.php?id=<?= $data['id_pengirim']; ?>" class='ahover'>
                        <div class="mt-3 card px-4 pt-3">
                            <div class="row justify-content-between">
                                <div class="col"><p><?= $data['topik']; ?></p></div>
                                <div class="col"><?= $data['status']; ?></div>
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>