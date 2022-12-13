<?php 
session_start();

if (!isset($_SESSION['mahasiswa'])) {
   echo "<script>
         window.location.replace('session/login.php');
       </script>";
  exit;
}

require 'functions.php';


if (isset($_POST["register"])) {
  
  if (add_pengumuman($_POST) > 0 ) {
     echo "<script>
        alert('Data Berhasil Ditambahkan!');
        window.location.href='pengumuman.php';
      </script>";
  } else {
    echo mysqli_error($conn);
  }

} 

$username = $_SESSION['username'];
$mhs = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE username = '$username'");
foreach ($mhs as $key) {}
$nim = $key['nim'];

$pengumuman = mysqli_query($conn, 'SELECT * FROM pengumuman');


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
                
                    
                            <?php $i=1; ?>
                            <?php foreach ($pengumuman as $data) : ?>

                            <?php if ($data['kelas'] == $key['kelas']) : ?>  

                                <div class="card p-4">
                                        <table style="width:100%;">
                                            <tr>
                                                <th style="text-align: center"><?= $data['judul']; ?></th>
                                                <th style="text-align: center"><?= $data['tanggal']; ?></th>
                                            </tr>
                                        </table>
                                        <center>
                                            <div class="my-3 alert alert-warning">
                                                <?= $data['isi']; ?>
                                            </div>
                                            <p><a href="file/<?= $data['file']; ?>"><?= $data['file']; ?></a></p>
                                            <div style="border-bottom: 2px dotted #424242;"></div>
                                        </center>
                                        <br>
                                        <?php 
                                        $username = $_SESSION['username'];

$mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE username = '$username'");
foreach ($mahasiswa as $data) {}

$kelas = $data['kelas']; ?>
                                        <a href="grup.php?kelas=<?= $kelas; ?>" class="btn btn-sm btn-info" style="width:100%;">Lihat Diskusi</a>
                                </div>

                             <?php endif ?>   

                            <?php $i++; ?>
                            <?php endforeach; ?>
                                          
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>