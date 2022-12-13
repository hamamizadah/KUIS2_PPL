<?php 
session_start();

if (!isset($_SESSION['admin'])) {
   echo "<script>
         window.location.replace('../session/login.php');
       </script>";
  exit;
}

require 'functions.php';


$id = $_GET["id"];
$super_user = query("SELECT * FROM super_user WHERE id = $id")[0];

include 'logika/edit-super_user.php';

if (isset($_POST["edit"])) {

if (isset($_POST['ubah_gambar'])) {

  if (ubah_with_gambar($_POST) > 0) {
     echo "<script>
        alert('Data Berhasil Di-Edit!');
        window.location.href='super_user.php';
      </script>";
  } else {
    echo mysqli_error($conn);
  }
}

if (isset($_POST['ubah_password'])) {

  if (ubah_with_password($_POST) > 0) {
     echo "<script>
        alert('Data Berhasil Di-Edit!');
        window.location.href='super_user.php';
      </script>";
  } else {
    echo mysqli_error($conn);
  }
}

if (!isset($_POST['ubah_password'], $_POST['ubah_gambar'])) {

  if (ubah_without_both($_POST) > 0) {
     echo "<script>
        alert('Data Berhasil Di-Edit!');
        window.location.href='super_user.php';
      </script>";
  } else {
    echo mysqli_error($conn);
  }
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
                            <h3>Edit Data Super User</h3>
                            <!-- form -->
                            <div class="card shadow mb-4 p-3">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                         <input type="text" id="username" name="username" placeholder="Username"  value="<?= $super_user['username']; ?>">
                                    </div>
                                    <div class="mb-3 px-5 pt-2">
                                        <input type="checkbox" id="ubah_gambar" name="ubah_gambar">
                                        <label for="ubah_gambar">Centang jika ingin mengubah foto</label>
                                        <br>
                                        <span class="badge text-light rounded-pill bg-danger mb-3">Kosongkan jika tidak ingin merubah foto <i class="fas fa-info-circle"></i></span>
                                    </div>
                                    <div class="mb-3 px-5 pt-2">
                                        <input type="checkbox" id="ubah_password" name="ubah_password">
                                        <label for="ubah_password">Centang jika ingin mengubah password</label>
                                        <br>
                                        <span class="badge text-light rounded-pill bg-danger mb-3">Kosongkan jika tidak ingin merubah password <i class="fas fa-info-circle"></i></span>
                                    </div>
                                    <div class="alert alert-warning">
                                        anda tidak bisa merubah keduanya sementara ini.
                                    </div>
                                    <div class="mb-3">
                                         <input type="password" id="password" name="password" placeholder="Password Baru">
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto">Pas Photo</label>
                                        <input type="file" id="foto" name="foto">
                                    </div>
                                    <div class="mb-3">
                                         <input type="text" id="nama" name="nama" placeholder="Nama Lengkap"  value="<?= $super_user['nama']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <select name="jabatan" id="jabatan">
                                            <option value="<?= $super_user["jabatan"]; ?>" hidden><?= $super_user["jabatan"]; ?></option>
                                            <option value="Admin">Admin</option>
                                            <option value="Wali Kelas">Wali Kelas</option>
                                            <option value="Wali Kelas">Wali Kelas</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" id="jabatan" name="jabatan" placeholder="Jabatan"  value="<?= $super_user['jabatan']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" id="nip" name="nip" placeholder="NIP"  value="<?= $super_user['nip']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" id="nohp" name="nohp" placeholder="Nomor Telepon"  value="<?= $super_user['nohp']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Kelas (Hanya Diisi Oleh Wali Kelas)</label>
                                        <select name="kelas" id="kelas" class="form-control">
                                            <option value="<?= $super_user['kelas']; ?>"><?= $super_user['kelas']; ?></option>
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
                                        <label for="">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            <option value="<?= $super_user['jenis_kelamin']; ?>"><?= $super_user['jenis_kelamin']; ?></option>
                                            <option value="Laki Laki">Laki Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" id="ttl" name="ttl" placeholder="Tanggal Lahir"  value="<?= $super_user['ttl']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" id="nidn" name="nidn" placeholder="NIDN"  value="<?= $super_user['nidn']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" id="jurusan" name="jurusan" placeholder="Jurusan"  value="<?= $super_user['jurusan']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" id="email" name="email" placeholder="Alamat Email"  value="<?= $super_user['email']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" id="jabatan_fungsional" name="jabatan_fungsional" placeholder="Jabatan Fungsional"  value="<?= $super_user['jabatan_fungsional']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" id="jabatan_struktural" name="jabatan_struktural" placeholder="Jabatan Struktural"  value="<?= $super_user['jabatan_struktural']; ?>">
                                    </div>
                                    <button type="submit" name="edit" class="btn btn-info text-white" style="width: 100%;">Edit</button>
                                    <br><br>
                                    <a href="super_user.php" class="btn btn-danger text-white" style="width: 100%;">Batal</a>
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