<?php 
session_start();

if (!isset($_SESSION['wali'])) {
   echo "<script>
         window.location.replace('../session/login.php');
       </script>";
  exit;
}

error_reporting(0);

require 'functions.php';


$id = $_GET["id"];
$pengumuman = query("SELECT * FROM pengumuman WHERE id = $id")[0];

function ubah($data) {
        global $conn;
         

        $id = $data["id"];
        $kelas = $data["kelas"];
        $judul = $data["judul"];
        $isi = $data["isi"];


        $query = "UPDATE pengumuman SET 
                    kelas = '$kelas',
                    judul = '$judul',
                    isi = '$isi'
                  WHERE id = $id
                ";
                
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

if (isset($_POST["edit"])) {

  if (ubah($_POST) > 0) {
     echo "<script>
        alert('Data Berhasil Di-Edit!');
        window.location.href='pengumuman.php';
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
                            <h3>Edit Data Pengumuman</h3>
                            <!-- form -->
                            <div class="card shadow mb-4 p-3">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="id" value="<?= $pengumuman['id']; ?>">
                                    <div class="mb-3">
                                        <label for="">Kelas</label>
                                        <select name="kelas" id="kelas" class="form-control" required>
                                            <option value="<?= $pengumuman['kelas']; ?>"><?= $pengumuman['kelas']; ?></option>
                                            <option value="1a">1a</option>
                                            <option value="1b">1b</option>
                                            <option value="1c">1c</option>
                                            <option value="2a">2a</option>
                                            <option value="2b">2b</option>
                                            <option value="2c">2c</option>
                                            <option value="3a">3a</option>
                                            <option value="3b">3b</option>
                                            <option value="3c">3c</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                         <input type="text" id="judul" name="judul" placeholder="Judul" required value="<?= $pengumuman['judul']; ?>">
                                    </div>
                                    <div class="mb-3">
                                         <input type="text" id="isi" name="isi" placeholder="Isi Pengumuman.." value="<?= $pengumuman['isi']; ?>">
                                    </div>
                                    <button type="submit" name="edit" class="btn btn-info text-white" style="width: 100%;">Edit</button>
                                    <br><br>
                                    <a href="pengumuman.php" class="btn btn-danger text-white" style="width: 100%;">Batal</a>
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