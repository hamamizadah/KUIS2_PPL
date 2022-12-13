<?php 
session_start();

if (!isset($_SESSION['admin'])) {
   echo "<script>
         window.location.replace('../session/login.php');
       </script>";
  exit;
}

require 'functions.php';


if (isset($_POST["register"])) {
  
  if (add_super_user($_POST) > 0 ) {
     echo "<script>
        alert('Data Berhasil Ditambahkan!');
        window.location.href='super_user.php';
      </script>";
  } else {
    echo mysqli_error($conn);
  }

} 

function cari($keyword) {
    $query = "SELECT * FROM super_user
                WHERE
              username LIKE '%$keyword%' OR
              nama LIKE '%$keyword%' OR
              nip LIKE '%$keyword%' OR
              jabatan LIKE '%$keyword%' OR
              kelas LIKE '%$keyword%'
            ";
    return query($query);
}

$super_user = mysqli_query($conn, 'SELECT * FROM super_user ORDER BY id DESC');

// jika tombol cari di tekan
if (isset($_POST["cari"])) {
    $super_user = cari($_POST["keyword"]);
} 

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
                            <!-- btn show -->
                            <a id="btn-show" class="btn btn-info mb-4 text-white"><i class="fas fa-plus"></i> Tambah Data</a>

                            <span id="form">

                            <span><a id="btn-hide" class="btn btn-danger mb-4 text-white"><i class="fas fa-minus-circle"></i> Tutup Form</a></span>
                            <!-- form -->
                            <div class="card shadow mb-4 p-3">
                                <?php $date = date('y-m-d'); ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                         <input type="text" id="username" name="username" placeholder="Username" >
                                    </div>
                                    <div class="mb-3">
                                         <input type="password" id="password" name="password" placeholder="Password" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto">Pas Photo</label>
                                        <input type="file" id="foto" name="foto" >
                                    </div>
                                    <div class="mb-3">
                                         <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" >
                                    </div>
                                    <div class="mb-3">
                                         <select name="jabatan" id="jabatan">
                                             <option value="" hidden>- Pilih Jabatan -</option>
                                             <option value="Admin">Admin</option>
                                             <option value="Wali Kelas">Wali Kelas</option>
                                             <option value="Ketua Jurusan">Ketua Jurusan</option>
                                         </select>
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" id="nohp" name="nohp" placeholder="Nomor Handphone" >
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" id="nip" name="nip" placeholder="NIP" >
                                    </div>
                        <p align="center">Hanya diisi oleh <b>Wali Kelas</b></p>
                        <hr>
                                    <div class="mb-3">
                                        <select name="kelas" id="kelas" class="form-control" >
                                            <option value="" hidden>Pilih Kelas</option>
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
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" >
                                            <option value="" hidden>Pilih Jenis Kelamin</option>
                                            <option value="Laki Laki">Laki Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" id="ttl" name="ttl">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" id="nidn" name="nidn" placeholder="NIDN">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" id="jurusan" name="jurusan" placeholder="Jurusan">
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" id="email" name="email" placeholder="Alamat Email">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" id="jabatan_fungsional" name="jabatan_fungsional" placeholder="Jabatan Fungsional">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" id="jabatan_struktural" name="jabatan_struktural" placeholder="Jabatan Struktural">
                                    </div>
                                    <button type="submit" name="register" class="btn btn-info text-white" style="width: 100%;">Tambah</button>
                                </form>
                              </div>
                            </span>


                            <!-- Data -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#card-super_user" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-super_user">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Super User</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-super_user">
                                    <div class="card-body">
                                        <div class="my-3">
                                            <form action="" method="post">
                                                <center>
                                                <input type="text" name="keyword" style="width: 60%;" autofocus placeholder="Ketik Keyword Pencarian..." autocomplete="off">
                                                <button class="btn text-primary" type="submit" name="cari"><i class="fab fa-searchengin"></i></button>
                                                </center> 
                                            </form>
                                        </div>
                                        <div class="table-responsive">
                                        <table class="table table-striped">
                                          <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>Username</th>
                                              <th>Nama</th>
                                              <th rowspan="2">Foto</th>
                                              <th>NIP</th>
                                              <th>Nomor Handphone</th>
                                              <th>Jabatan</th>  
                                              <th>Jabatan Fungsional</th>  
                                              <th>Jabatan Struktural</th>  
                                              <!-- <th>Jenis Kelamin</th>  
                                              <th>TTL</th>  
                                              <th>NIDN</th>  
                                              <th>Jurusan</th>  
                                              <th>Email</th>   -->
                                              <th colspan="2">Aksi</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                    <?php $i=1; ?>
                                    <?php foreach ($super_user as $data) : ?>
                                            <tr>
                                              <th><?= $i; ?></th>
                                              <td><?= $data['username']; ?></td>
                                              <td><?= $data['nama']; ?></td>
                                              <td><a href="../foto/<?= $data['foto']; ?>" download><img src="../foto/<?= $data['foto']; ?>" width='50'></a>
                                              </td>
                                              <td><?= $data['nip']; ?></td>
                                              <td><?= $data['nohp']; ?></td>
                                              <?php if ($data['jabatan'] == 'Wali Kelas') : ?>
                                                <td><?= $data['jabatan']; ?> - <?= $data['kelas']; ?></td>
                                              <?php else: ?>
                                                <td><?= $data['jabatan']; ?></td>
                                              <?php endif; ?>
                                              <td><?= $data['jabatan_fungsional']; ?></td>
                                              <td><?= $data['jabatan_struktural']; ?></td>
                                           <!--    <td><?= $data['jenis_kelamin']; ?></td>
                                              <td><?= $data['ttl']; ?></td>
                                              <td><?= $data['nidn']; ?></td>
                                              <td><?= $data['jurusan']; ?></td>
                                              <td><?= $data['email']; ?></td> -->
                                              <td>
                                                  <a href="edit-super_user.php?id=<?= $data['id']; ?>"><i class="fas fa-edit text-warning"></i></a>
                                              </td>
                                              <td>
                                                  <a href="hapus-super_user.php?id=<?= $data['id']; ?>"><i class="fas fa-trash text-danger"></i></a>
                                              </td>
                                             <!--  <td>
                                                  <a href="hapus-chat.php?id=<?= $data['id']; ?>"><i class="fas fa-trash text-danger"></i></a>
                                              </td> -->
                                            </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                          </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
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