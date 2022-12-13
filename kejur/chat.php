<?php 
session_start();

if (!isset($_SESSION['kejur'])) {
   echo "<script>
         window.location.replace('../session/login.php');
       </script>";
  exit;
}

require 'functions.php';

error_reporting(0);

$username = $_SESSION['username'];

$super_user = mysqli_query($conn, "SELECT * FROM super_user WHERE username = '$username'");
foreach ($super_user as $data) {}


$id_pengirim = $_GET['id_pengirim'];
$id_penerima = $_GET['id_penerima'];

$chat = mysqli_query($conn, "SELECT chat.id as id_chat, chat.id_pengirim as id_pengirim, chat.id_penerima as id_penerima, chat.topik as topik, chat.isi as isi, chat.tanggal as tanggal, chat.smester as smester, chat.status as status, chat.username_history as username_history, mahasiswa.nama as nama_mhs, super_user.nama as nama_wali FROM chat LEFT JOIN mahasiswa ON chat.id = mahasiswa.nim LEFT JOIN super_user ON chat.id = super_user.id WHERE id_pengirim = '$id_pengirim' AND id_penerima = '$id_penerima'");

if (isset($_POST["submit"])) {
  
  if (add_chat($_POST) > 0 ) {
     header("Location: chat.php?id=$id_pengirim");
  } else {
    echo mysqli_error($conn);
  }

} 

function selesai($data) {
        global $conn;
         

        $id_penerima = $data["id_penerima"];
        $id_pengirim = $data["id_pengirim"];

        $query = "UPDATE chat SET 
                    status = 'Sudah Selesai'
                  WHERE id_pengirim = $id_pengirim AND id_penerima = $id_penerima
                ";
                
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

if (isset($_POST["selesai"])) {

  if (selesai($_POST) > 0) {
     header("Location: chat.php?id=$id_pengirim");
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

                    
                    <section style="box-shadow: 2px 2px 10px lightgrey;" class="rounded mb-4">
                      <div class="container px-3 py-5">

                        <div class="row">

                          <div class="col">

                            <ul class="list-unstyled">


                              <?php foreach ($chat as $list) : ?>

                                <h3 align="center"><?= $list['topik']; ?></h3>
                                <br>

                                  <li class="mb-4">
                                    <div class="card">
                                      <div class="card-header d-flex justify-content-between p-3">
                                        <p class="fw-bold mb-0">

                                          <?php $id_mhs = $list['id_pengirim'];
                                                $id_wali = $list['id_penerima']; 
                                          $mhs = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = '$id_mhs'");
                                          $wali = mysqli_query($conn, "SELECT * FROM super_user WHERE id = '$id_wali'");
                                          ?>
                                          <?php 
                                            $user = $list['username_history'];
                                            $wali2 = "SELECT * FROM super_user WHERE username = '$user'";
                                            $cekwali = mysqli_query($conn, $wali2);

                                            $mahasiswa2 = "SELECT * FROM mahasiswa WHERE username = '$user'";
                                            $cekmhs = mysqli_query($conn, $mahasiswa2);

                                           ?>
                                          
                                          <?php if (mysqli_num_rows($cekwali) > 0 ) : ?>

                                            <?php foreach ($wali as $w) : ?>
                                            <?= $w['nama']; ?>
                                            <?php endforeach; ?>

                                          <?php elseif (mysqli_num_rows($cekmhs) > 0 ) : ?>

                                          <?php foreach ($mhs as $m) : ?>
                                           <?= $m['nama']; ?>
                                          <?php endforeach; ?>

                                          <?php endif; ?>

                                          

                                          
                                          </p>
                                        <p class="text-muted small mb-0"><i class="far fa-clock"></i> <?= $list['tanggal']; ?></p>
                                      </div>
                                      <div class="card-body">
                                        <p class="mb-0">
                                          <?= $list['isi']; ?>
                                        </p>
                                      </div>
                                    </div>
                                  </li>

                              <?php endforeach; ?>


                              <li class="mb-3">
                                <div class="form-outline">

                              <?php foreach ($chat as $history) : ?>
                              <?php endforeach; ?>
                              <?php $status = $history['status']; ?>
                              <?php if ($status == 'Sudah Selesai') : ?>
                                <b><p class="mt-5 text-success text-center">Konseling Sudah Dinyatakan Selesai <i class="fas fa-check"></i></p></b>
                              <?php else: ?>
                                <b><p class="mt-5 text-warning text-center">Konseling Sedang Berlangsung <i class="fas fa-info-circle"></i></p></b>
                              <?php endif; ?>

                              

                            </ul>

                          </div>

                        </div>

                      </div>
                    </section>


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
    <script src="../sb-admin-2.min.js"></script>

</body>

</html>