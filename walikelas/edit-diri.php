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
$diri = query("SELECT * FROM super_user WHERE id = $id")[0];

function ubah($data) {
        global $conn;
         

        $id = $data["id"];
        $username = $data["username"];
        $foto_old = $data["foto_old"];
        $pw_old = $data["pw_old"];
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $nama = $data["nama"];
        $foto = $data["foto"];
        $nip = $data["nip"];
        $nohp = $data["nohp"];
        $jabatan = $data["jabatan"];

        
        if ($password == NULL) {
            $password = $pw_old;
        } else {
            // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        }

        if ($foto != NULL) {
           $foto = upload_foto();
        } elseif (!isset($foto)) {
            $foto = $foto_old;
        }

      
        


        $query = "UPDATE super_user SET 
                    username = '$username',
                    password = '$password',
                    nama = '$nama',
                    nip = '$nip',
                    nohp = '$nohp',
                    foto = '$foto',
                    jabatan = '$jabatan'
                  WHERE id = $id
                ";
                
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

if (isset($_POST["edit"])) {

  if (ubah($_POST) > 0) {
     echo "<script>
        alert('Data Berhasil Di-Edit!');
        window.location.href='diri.php';
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
                            <h3>Edit Data Diri</h3>
                            <!-- form -->
                            <div class="card shadow mb-4 p-3">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="id" value="<?= $diri['id']; ?>">
                                    <input type="hidden" name="foto_old" id="foto_old" value="<?= $diri['foto']; ?>">
                                    <input type="hidden" name="pw_old" id="pw_old" value="<?= $diri['password']; ?>">
                                    <input type="hidden" name="jabatan" id="jabatan" value="<?= $diri['jabatan']; ?>">
                                    <div class="mb-3">
                                         <input type="text" id="username" name="username" placeholder="Username" required value="<?= $diri['username']; ?>">
                                    </div>
                                    <div class="mb-3">
                                         <input type="password" id="password" name="password" placeholder="Password Baru">
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto">Pas Photo</label>
                                        <input type="file" id="foto" name="foto">
                                    </div>
                                    <div class="mb-3">
                                         <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" required value="<?= $diri['nama']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" id="nip" name="nip" placeholder="nip" required value="<?= $diri['nip']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" id="nohp" name="nohp" placeholder="Nomor Telepon" required value="<?= $diri['nohp']; ?>">
                                    </div>
                                    <button type="submit" name="edit" class="btn btn-info text-white" style="width: 100%;">Edit</button>
                                    <br><br>
                                    <a href="diri.php" class="btn btn-danger text-white" style="width: 100%;">Batal</a>
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