<?php 
session_start();

if (!isset($_SESSION['admin'])) {
   echo "<script>
         window.location.replace('../session/login.php');
       </script>";
  exit;
}

error_reporting(0);

require 'functions.php';


$nim = $_GET["nim"];
$mahasiswa = query("SELECT * FROM mahasiswa WHERE nim = $nim")[0];

function ubah($data) {
        global $conn;
         

        $nim = $data["nim"];
        $foto = $data["foto"];

        $foto = upload_foto();


        $query = "UPDATE mahasiswa SET 
                    foto = '$foto'
                  WHERE nim = $nim
                ";
                
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

if (isset($_POST["edit"])) {

  if (ubah($_POST) > 0) {
     echo "<script>
        alert('Data Berhasil Di-Edit!');
        window.location.href='mahasiswa.php';
      </script>";
  } else {
    echo mysqli_error($conn);
  }
}



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

                    <!-- Content Row -->
                    <div class="row">


                        <div class="col mb-4">
                            <h3>Edit Gambar</h3>
                            <!-- form -->
                            <div class="card shadow mb-4 p-3">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="nim" id="nim" value="<?= $mahasiswa['nim']; ?>">
                                    <div class="mb-3">
                                         <input type="file" id="foto" name="foto" required>
                                    </div>
                                    
                                    <button type="submit" name="edit" class="btn btn-info text-white" style="width: 100%;">Edit</button>
                                    <br><br>
                                    <a href="mahasiswa.php" class="btn btn-danger text-white" style="width: 100%;">Batal</a>
                                </form>
                              </div>
                                
                       
                        </div>

                        <!-- End Row -->
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