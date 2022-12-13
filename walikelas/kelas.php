<?php 
session_start();

if (!isset($_SESSION['wali'])) {
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


$kelas = $data['kelas'];
$id_penerima = $data['id'];

$chat_grup = mysqli_query($conn, "SELECT chat_grup.id as id_chat_grup, chat_grup.kelas as kelas, chat_grup.id_penerima as id_penerima, chat_grup.isi as isi, chat_grup.tanggal as tanggal, chat_grup.smester as smester, chat_grup.status as status, chat_grup.username_history as username_history, mahasiswa.nama as nama_mhs, super_user.nama as nama_wali, pengumuman.judul as judul, pengumuman.isi as isi_pengumuman, pengumuman.tanggal as tanggal_pengumuman, pengumuman.file as file FROM chat_grup LEFT JOIN mahasiswa ON chat_grup.id = mahasiswa.nim LEFT JOIN super_user ON chat_grup.id = super_user.id LEFT JOIN pengumuman ON chat_grup.id_pengumuman = pengumuman.id WHERE chat_grup.kelas = '$kelas'");


function add_chat_grup($data) {
    global $conn;

    // htmlspecialchars berfungsi untuk tidak menjalankan script
    $kelas = htmlspecialchars($data["kelas"]);
    $id_penerima = htmlspecialchars($data["id_penerima"]);
    $id_pengumuman = htmlspecialchars($data["id_pengumuman"]);
    $isi = htmlspecialchars($data["isi"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $smester = htmlspecialchars($data["smester"]);
    $status = htmlspecialchars($data["status"]);
    $username = htmlspecialchars($data["username"]);
    

    mysqli_query($conn, "INSERT INTO chat_grup VALUES('', '$kelas', '$id_penerima', '$id_pengumuman', '$isi', '$tanggal', '$smester', '$status', '$username')");
    return mysqli_affected_rows($conn);
}


if (isset($_POST["submit"])) {
  
  if (add_chat_grup($_POST) > 0 ) {
     header("Location: kelas.php");
  } else {
    echo mysqli_error($conn);
  }

} 

function selesai($data) {
        global $conn;
         

        $kelas = $data["kelas"];

        $query = "UPDATE chat_grup SET 
                    status = 'Sudah Selesai'
                  WHERE kelas = '$kelas'
                ";
                
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

if (isset($_POST["selesai"])) {

  if (selesai($_POST) > 0) {
     header("Location: kelas.php");
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
                              <?php foreach ($chat_grup as $hist) : ?>
                              <?php endforeach; ?>
                              <?php $status = $hist['status']; ?>
                              <?php if ($status == 'Sudah Selesai') : ?>


                              <?php else: ?>
                              <form action="" method="post">
                                <input type="hidden" id="kelas" name="kelas" value="<?= $kelas; ?>">
                                <input type="hidden" id="id_penerima" name="id_penerima" value="<?= $id_penerima; ?>">
                               <button type="sumbit" name="selesai" href="" class="btn btn-info"><i class="fas fa-check"></i> &nbsp; Tandai Sudah Selesai</button>
                               <br><br>
                              </form>
                              <?php endif; ?>


                              <?php foreach ($chat_grup as $list) : ?>

                                <h3 align="center"><?= $list['judul']; ?></h3>
                                <br>

                                  <li class="mb-4">
                                    <div class="card">
                                      <div class="card-header d-flex justify-content-between p-3">
                                        <p class="fw-bold mb-0">

                                          <?php $id_mhs = $list['id_penerima'];
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

                              <?php foreach ($chat_grup as $history) : ?>
                              <?php endforeach; ?>
                              <?php $status = $history['status']; ?>
                              <?php if ($status == 'Sudah Selesai') : ?>
                                <b><p class="mt-5 text-success text-center">Pengumuman Sudah Dinyatakan Selesai <i class="fas fa-check"></i></p></b>

                                <form action="" method="post">

                             
                             
                                 <select name="id_pengumuman" id="id_pengumuman" required>
                                  <option value="">Pilih Judul Pengumuman</option>
                                  <?php $pengumuman = mysqli_query($conn, "SELECT * FROM pengumuman"); ?>
                                  <?php foreach ($pengumuman as $pp) : ?>
                                    <option value="<?= $pp['id']; ?>"><?= $pp['judul']; ?></option>
                                  <?php endforeach; ?>
                                </select>
                                <br><br>
                              <input type="number" placeholder="Semester Sekarang" class="form-control mb-3" id="smester" name="smester" required>    
                              
                                  

                                  <textarea class="form-control" placeholder="Pesan.." id="isi" name="isi" rows="4" required></textarea>
                                </div>
                              </li>

                              <input type="hidden" id="kelas" name="kelas" value="<?= $kelas; ?>" required>
                              <input type="hidden" id="id_penerima" name="id_penerima" value="<?= $id_penerima; ?>" required>
                              <?php 
                                 $zona_waktu = time() + (60 * 60 * 9);
                                 $waktu_realtime = gmdate('Y/m/d H:i:s', $zona_waktu);
                                ?>
                              <input type="hidden" id="tanggal" name="tanggal" value="<?= $waktu_realtime; ?>">
                              <input type="hidden" id="username" name="username" value="<?= $username; ?>">
                              <input type="hidden" id="status" name="status" value="Belum Selesai">
                              <button type="submit" name="submit" class="btn btn-info btn-rounded float-end">Kirim</button>
                              </form>
                              <?php else: ?>
                                  
                                  <form action="" method="post">

                              <?php 

                                $cek_topik = mysqli_query($conn, "SELECT chat_grup.id as id_chat_grup, chat_grup.kelas as kelas, chat_grup.id_penerima as id_penerima, chat_grup.isi as isi, chat_grup.tanggal as tanggal, chat_grup.smester as smester, chat_grup.status as status, chat_grup.username_history as username_history, mahasiswa.nama as nama_mhs, super_user.nama as nama_wali, pengumuman.id as id_pengumuman,. pengumuman.judul as judul, pengumuman.isi as isi_pengumuman, pengumuman.tanggal as tanggal_pengumuman, pengumuman.file as file FROM chat_grup LEFT JOIN mahasiswa ON chat_grup.id = mahasiswa.nim LEFT JOIN super_user ON chat_grup.id = super_user.id LEFT JOIN pengumuman ON chat_grup.id_pengumuman = pengumuman.id WHERE chat_grup.kelas = '$kelas' AND id_penerima = '$id_penerima'");
                              ?>
                              <?php 
                              foreach ($cek_topik as $cek ) {
                                $topik = $cek['id_pengumuman'];
                                if ($topik != NULL) {
                                    $terisi = true;
                                }
                              }
                               ?>
                              <?php  if (!isset($terisi)) : ?>

                                <select name="id_pengumuman" id="id_pengumuman" required>
                                  <option value="">Pilih Judul Pengumuman</option>
                                  <?php $pengumuman = mysqli_query($conn, "SELECT * FROM pengumuman"); ?>
                                  <?php foreach ($pengumuman as $pp) : ?>
                                    <option value="<?= $pp['id']; ?>"><?= $pp['judul']; ?></option>
                                  <?php endforeach; ?>
                                </select>
                                <br><br>
                              <input type="number" placeholder="Semester Sekarang" class="form-control mb-3" id="smester" name="smester" required>    

                              
                              
                              <?php endif; ?>
                                  

                                  <textarea class="form-control" placeholder="Pesan.." id="isi" name="isi" rows="4" required></textarea>
                                </div>
                              </li>

                              <input type="hidden" id="kelas" name="kelas" value="<?= $kelas; ?>" required>
                              <input type="hidden" id="id_penerima" name="id_penerima" value="<?= $id_penerima; ?>" required>
                              <?php 
                                 $zona_waktu = time() + (60 * 60 * 9);
                                 $waktu_realtime = gmdate('Y/m/d H:i:s', $zona_waktu);
                                ?>
                              <input type="hidden" id="tanggal" name="tanggal" value="<?= $waktu_realtime; ?>">
                              <input type="hidden" id="username" name="username" value="<?= $username; ?>">
                              <input type="hidden" id="status" name="status" value="Belum Selesai">
                              <button type="submit" name="submit" class="btn btn-info btn-rounded float-end">Kirim</button>
                              </form>

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
    <script src="../js/sb-admin-2.min.js"></script>


</body>

</html>