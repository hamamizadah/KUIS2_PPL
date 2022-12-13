<?php 
session_start();

if (!isset($_SESSION['kejur'])) {
   echo "<script>
         window.location.replace('../session/login.php');
       </script>";
  exit;
}

require 'functions.php';

$riwayat1 = mysqli_query($conn, "SELECT DISTINCT topik,id_pengirim,id_penerima,status FROM chat WHERE topik != '' AND smester = 1");
$riwayat2 = mysqli_query($conn, "SELECT DISTINCT topik,id_pengirim,id_penerima,status FROM chat WHERE topik != '' AND smester = 2");
$riwayat3 = mysqli_query($conn, "SELECT DISTINCT topik,id_pengirim,id_penerima,status FROM chat WHERE topik != '' AND smester = 3");
$riwayat4 = mysqli_query($conn, "SELECT DISTINCT topik,id_pengirim,id_penerima,status FROM chat WHERE topik != '' AND smester = 4");
$riwayat5 = mysqli_query($conn, "SELECT DISTINCT topik,id_pengirim,id_penerima,status FROM chat WHERE topik != '' AND smester = 5");
$riwayat6 = mysqli_query($conn, "SELECT DISTINCT topik,id_pengirim,id_penerima,status FROM chat WHERE topik != '' AND smester = 6");
$riwayat7 = mysqli_query($conn, "SELECT DISTINCT topik,id_pengirim,id_penerima,status FROM chat WHERE topik != '' AND smester = 7");
$riwayat8 = mysqli_query($conn, "SELECT DISTINCT topik,id_pengirim,id_penerima,status FROM chat WHERE topik != '' AND smester = 8");
$riwayat9 = mysqli_query($conn, "SELECT DISTINCT topik,id_pengirim,id_penerima,status FROM chat WHERE topik != '' AND smester = 9");
$riwayat10 = mysqli_query($conn, "SELECT DISTINCT topik,id_pengirim,id_penerima,status FROM chat WHERE topik != '' AND smester = 10");


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

                <!-- Semester 1 -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#card-pegawai" id="judul" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="card-pegawai">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Konseling Semester 1</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="card-pegawai">
                        <div class="card-body">
                            
                            <?php foreach ($riwayat1 as $data) : ?>
                                <a href="chat.php?id_pengirim=<?= $data['id_pengirim']; ?>&id_penerima=<?= $data['id_penerima']; ?>" class='ahover'>
                                    <div class="mt-3 card px-4 pt-3">
                                        <div class="row justify-content-between">
                                            <div class="col"><p><?= $data['topik']; ?></p></div>
                                            <div class="col"><?= $data['status']; ?></div>
                                        </div>
                                    </div>  
                                </a>
                                <?php endforeach; ?> 
                            </div>
                    </div>
                </div>

                <!-- Semester 2 -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#card-pegawai" id="judul" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="card-pegawai">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Konseling Semester 2</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="card-pegawai">
                        <div class="card-body">
                            
                            <?php foreach ($riwayat2 as $data) : ?>
                                <a href="chat.php?id_pengirim=<?= $data['id_pengirim']; ?>&id_penerima=<?= $data['id_penerima']; ?>" class='ahover'>
                                    <div class="mt-3 card px-4 pt-3">
                                        <div class="row justify-content-between">
                                            <div class="col"><p><?= $data['topik']; ?></p></div>
                                            <div class="col"><?= $data['status']; ?></div>
                                        </div>
                                    </div>  
                                </a>
                                <?php endforeach; ?> 
                            </div>
                    </div>
                </div>

                <!-- Semester 3 -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#card-pegawai" id="judul" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="card-pegawai">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Konseling Semester 3</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="card-pegawai">
                        <div class="card-body">
                            
                            <?php foreach ($riwayat3 as $data) : ?>
                                <a href="chat.php?id_pengirim=<?= $data['id_pengirim']; ?>&id_penerima=<?= $data['id_penerima']; ?>" class='ahover'>
                                    <div class="mt-3 card px-4 pt-3">
                                        <div class="row justify-content-between">
                                            <div class="col"><p><?= $data['topik']; ?></p></div>
                                            <div class="col"><?= $data['status']; ?></div>
                                        </div>
                                    </div>  
                                </a>
                                <?php endforeach; ?> 
                            </div>
                    </div>
                </div>

                <!-- Semester 4 -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#card-pegawai" id="judul" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="card-pegawai">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Konseling Semester 4</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="card-pegawai">
                        <div class="card-body">
                            
                            <?php foreach ($riwayat4 as $data) : ?>
                                <a href="chat.php?id_pengirim=<?= $data['id_pengirim']; ?>&id_penerima=<?= $data['id_penerima']; ?>" class='ahover'>
                                    <div class="mt-3 card px-4 pt-3">
                                        <div class="row justify-content-between">
                                            <div class="col"><p><?= $data['topik']; ?></p></div>
                                            <div class="col"><?= $data['status']; ?></div>
                                        </div>
                                    </div>  
                                </a>
                                <?php endforeach; ?> 
                            </div>
                    </div>
                </div>

                <!-- Semester 5 -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#card-pegawai" id="judul" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="card-pegawai">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Konseling Semester 5</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="card-pegawai">
                        <div class="card-body">
                            
                            <?php foreach ($riwayat5 as $data) : ?>
                                <a href="chat.php?id_pengirim=<?= $data['id_pengirim']; ?>&id_penerima=<?= $data['id_penerima']; ?>" class='ahover'>
                                    <div class="mt-3 card px-4 pt-3">
                                        <div class="row justify-content-between">
                                            <div class="col"><p><?= $data['topik']; ?></p></div>
                                            <div class="col"><?= $data['status']; ?></div>
                                        </div>
                                    </div>  
                                </a>
                                <?php endforeach; ?> 
                            </div>
                    </div>
                </div>

                <!-- Semester 6 -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#card-pegawai" id="judul" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="card-pegawai">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Konseling Semester 6</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="card-pegawai">
                        <div class="card-body">
                            
                            <?php foreach ($riwayat6 as $data) : ?>
                                <a href="chat.php?id_pengirim=<?= $data['id_pengirim']; ?>&id_penerima=<?= $data['id_penerima']; ?>" class='ahover'>
                                    <div class="mt-3 card px-4 pt-3">
                                        <div class="row justify-content-between">
                                            <div class="col"><p><?= $data['topik']; ?></p></div>
                                            <div class="col"><?= $data['status']; ?></div>
                                        </div>
                                    </div>  
                                </a>
                                <?php endforeach; ?> 
                            </div>
                    </div>
                </div>

                <!-- Semester 7 -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#card-pegawai" id="judul" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="card-pegawai">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Konseling Semester 7</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="card-pegawai">
                        <div class="card-body">
                            
                            <?php foreach ($riwayat7 as $data) : ?>
                                <a href="chat.php?id_pengirim=<?= $data['id_pengirim']; ?>&id_penerima=<?= $data['id_penerima']; ?>" class='ahover'>
                                    <div class="mt-3 card px-4 pt-3">
                                        <div class="row justify-content-between">
                                            <div class="col"><p><?= $data['topik']; ?></p></div>
                                            <div class="col"><?= $data['status']; ?></div>
                                        </div>
                                    </div>  
                                </a>
                                <?php endforeach; ?> 
                            </div>
                    </div>
                </div>

                <!-- Semester 8 -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#card-pegawai" id="judul" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="card-pegawai">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Konseling Semester 8</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="card-pegawai">
                        <div class="card-body">
                            
                            <?php foreach ($riwayat8 as $data) : ?>
                                <a href="chat.php?id_pengirim=<?= $data['id_pengirim']; ?>&id_penerima=<?= $data['id_penerima']; ?>" class='ahover'>
                                    <div class="mt-3 card px-4 pt-3">
                                        <div class="row justify-content-between">
                                            <div class="col"><p><?= $data['topik']; ?></p></div>
                                            <div class="col"><?= $data['status']; ?></div>
                                        </div>
                                    </div>  
                                </a>
                                <?php endforeach; ?> 
                            </div>
                    </div>
                </div>

                <!-- Semester 9 -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#card-pegawai" id="judul" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="card-pegawai">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Konseling Semester 9</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="card-pegawai">
                        <div class="card-body">
                            
                            <?php foreach ($riwayat9 as $data) : ?>
                                <a href="chat.php?id_pengirim=<?= $data['id_pengirim']; ?>&id_penerima=<?= $data['id_penerima']; ?>" class='ahover'>
                                    <div class="mt-3 card px-4 pt-3">
                                        <div class="row justify-content-between">
                                            <div class="col"><p><?= $data['topik']; ?></p></div>
                                            <div class="col"><?= $data['status']; ?></div>
                                        </div>
                                    </div>  
                                </a>
                                <?php endforeach; ?> 
                            </div>
                    </div>
                </div>

                <!-- Semester 10 -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#card-pegawai" id="judul" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="card-pegawai">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Konseling Semester 10</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="card-pegawai">
                        <div class="card-body">
                            
                            <?php foreach ($riwayat10 as $data) : ?>
                                <a href="chat.php?id_pengirim=<?= $data['id_pengirim']; ?>&id_penerima=<?= $data['id_penerima']; ?>" class='ahover'>
                                    <div class="mt-3 card px-4 pt-3">
                                        <div class="row justify-content-between">
                                            <div class="col"><p><?= $data['topik']; ?></p></div>
                                            <div class="col"><?= $data['status']; ?></div>
                                        </div>
                                    </div>  
                                </a>
                                <?php endforeach; ?> 
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