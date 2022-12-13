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

$x = query("SELECT * FROM super_user WHERE username = '$username'")[0];

$kelas = $x['kelas'];

function add_absensi($data) {
    global $conn;

    // htmlspecialchars berfungsi untuk tidak menjalankan script
    $nim = htmlspecialchars($data["nim"]);
    $minggu_ke = htmlspecialchars($data["minggu_ke"]);
    $senin_a = htmlspecialchars($data["senin_a"]);
    $senin_i = htmlspecialchars($data["senin_i"]);
    $senin_s = htmlspecialchars($data["senin_s"]);
    $selasa_a = htmlspecialchars($data["selasa_a"]);
    $selasa_i = htmlspecialchars($data["selasa_i"]);
    $selasa_s = htmlspecialchars($data["selasa_s"]);
    $rabu_a = htmlspecialchars($data["rabu_a"]);
    $rabu_i = htmlspecialchars($data["rabu_i"]);
    $rabu_s = htmlspecialchars($data["rabu_s"]);
    $kamis_a = htmlspecialchars($data["kamis_a"]);
    $kamis_i = htmlspecialchars($data["kamis_i"]);
    $kamis_s = htmlspecialchars($data["kamis_s"]);
    $jumat_a = htmlspecialchars($data["jumat_a"]);
    $jumat_i = htmlspecialchars($data["jumat_i"]);
    $jumat_s = htmlspecialchars($data["jumat_s"]);

    
    
    // cek nim sudah ada atau belum

    $ceknim = "SELECT * FROM absensi where nim = $nim AND minggu_ke = $minggu_ke";
    $prosescek= mysqli_query($conn, $ceknim);

    if (mysqli_num_rows($prosescek)>0) { 

        if ($senin_a != NULL AND $senin_i != NULL AND $senin_s != NULL) {
            mysqli_query($conn, "UPDATE absensi SET senin_a = $senin_a, senin_i = $senin_i, senin_s = $senin_s WHERE nim = $nim AND minggu_ke = $minggu_ke");
            return mysqli_affected_rows($conn);
        }

        if ($selasa_a != NULL AND $selasa_i != NULL AND $selasa_s != NULL) {
            mysqli_query($conn, "UPDATE absensi SET selasa_a = $selasa_a, selasa_i = $selasa_i, selasa_s = $selasa_s WHERE nim = $nim AND minggu_ke = $minggu_ke");
            return mysqli_affected_rows($conn);
        }

        if ($rabu_a != NULL AND $rabu_i != NULL AND $rabu_s != NULL) {
            mysqli_query($conn, "UPDATE absensi SET rabu_a = $rabu_a, rabu_i = $rabu_i, rabu_s = $rabu_s WHERE nim = $nim AND minggu_ke = $minggu_ke");
            return mysqli_affected_rows($conn);
        }

        if ($kamis_a != NULL AND $kamis_i != NULL AND $kamis_s != NULL) {
            mysqli_query($conn, "UPDATE absensi SET kamis_a = $kamis_a, kamis_i = $kamis_i, kamis_s = $kamis_s WHERE nim = $nim AND minggu_ke = $minggu_ke");
            return mysqli_affected_rows($conn);
        }

        if ($jumat_a != NULL AND $jumat_i != NULL AND $jumat_s != NULL) {
            mysqli_query($conn, "UPDATE absensi SET jumat_a = $jumat_a, jumat_i = $jumat_i, jumat_s = $jumat_s WHERE nim = $nim AND minggu_ke = $minggu_ke");
            return mysqli_affected_rows($conn);
        }

    
    } else {
        mysqli_query($conn, "INSERT INTO absensi VALUES('', '$nim', '$minggu_ke', '$senin_a', '$senin_i', '$senin_s', '$selasa_a', '$selasa_i', '$selasa_s', '$rabu_a', '$rabu_i', '$rabu_s', '$kamis_a', '$kamis_i', '$kamis_s', '$jumat_a', '$jumat_i', '$jumat_s')");
        return mysqli_affected_rows($conn);
    }

}

if (isset($_POST["register"])) {
  
  if (add_absensi($_POST) > 0 ) {
     echo "<script>
        alert('Data Berhasil Ditambahkan!');
        window.location.href='absensi.php';
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
        th, td {
            vertical-align: center;
            text-align: center;
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
                            
                              <a id="btn-show" class="btn btn-info mb-4 text-white"><i class="fas fa-plus"></i> Tambah Data</a>

                              <span id="form">

                            <span><a id="btn-hide" class="btn btn-danger mb-4 text-white"><i class="fas fa-minus-circle"></i> Tutup Form</a></span>
                            <!-- form -->
                            <div class="card shadow mb-4 p-3">
                                <?php $date = date('y-m-d'); ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                         <label for="">Pilih Minggu Pertemuan</label>
                                         <select id="minggu_ke" name="minggu_ke" required>
                                             <option value="" hidden>Pilih Minggu Pertemuan</option>
                                             <?php for ($i=1; $i <= 16; $i++) : ?>
                                                <option value="<?= $i; ?>"><?= $i; ?></option>
                                             <?php endfor; ?>
                                         </select>
                                    </div>
                                    <div class="mb-3">
                                         <label for="">Pilih Mahasiswa</label>
                                         <select id="nim" name="nim" required>
                                             <option value="" hidden>Pilih Mahasiswa</option>
                                             <?php $mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE kelas = '$kelas'"); ?>
                                             <?php foreach ($mahasiswa as $mhs) :?>
                                                <option value="<?= $mhs['nim']; ?>"><?= $mhs['nim']; ?> - <?= $mhs['nama']; ?></option>
                                             <?php endforeach; ?>
                                         </select>
                                    </div>
                                    <div class="mb-3">
                                        <div class="alert alert-warning">
                                            <center>
                                            Hanya isi <b>saat diperlukan</b>, selain yang diperlukan biarkan kosong.
                                            <b><BR>HARAP ISIKAN 0 SEBAGAI NILAI DEFAULT, CONTOH : JIKA INGIN INPUT DATA ABSENSI HARI SELASA, DAN JIKA IZIN 1 JAM ALPHA DAN SAKIT TIDAK ADA, MAKA KOLOM ALPHA DAN SAKIT ISI DENGAN ANGKA 0.</b></center>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <br>
                                        <center><b>Absensi Senin</b></center>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Alpha</label>
                                                <input type="number" id="senin_a" name="senin_a"> *Jam
                                            </div>
                                            <div class="col">
                                                <label for="">Izin</label>
                                                <input type="number" id="senin_i" name="senin_i"> *Jam
                                            </div>
                                            <div class="col">
                                                <label for="">Sakit</label>
                                                <input type="number" id="senin_s" name="senin_s"> *Jam
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <br>
                                        <center><b>Absensi Selasa</b></center>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Alpha</label>
                                                <input type="number" id="selasa_a" name="selasa_a"> *Jam
                                            </div>
                                            <div class="col">
                                                <label for="">Izin</label>
                                                <input type="number" id="selasa_i" name="selasa_i"> *Jam
                                            </div>
                                            <div class="col">
                                                <label for="">Sakit</label>
                                                <input type="number" id="selasa_s" name="selasa_s"> *Jam
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <br>
                                        <center><b>Absensi Rabu</b></center>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Alpha</label>
                                                <input type="number" id="rabu_a" name="rabu_a"> *Jam
                                            </div>
                                            <div class="col">
                                                <label for="">Izin</label>
                                                <input type="number" id="rabu_i" name="rabu_i"> *Jam
                                            </div>
                                            <div class="col">
                                                <label for="">Sakit</label>
                                                <input type="number" id="rabu_s" name="rabu_s"> *Jam
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <br>
                                        <center><b>Absensi Kamis</b></center>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Alpha</label>
                                                <input type="number" id="kamis_a" name="kamis_a"> *Jam
                                            </div>
                                            <div class="col">
                                                <label for="">Izin</label>
                                                <input type="number" id="kamis_i" name="kamis_i"> *Jam
                                            </div>
                                            <div class="col">
                                                <label for="">Sakit</label>
                                                <input type="number" id="kamis_s" name="kamis_s"> *Jam
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <br>
                                        <center><b>Absensi Jumat</b></center>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Alpha</label>
                                                <input type="number" id="jumat_a" name="jumat_a"> *Jam
                                            </div>
                                            <div class="col">
                                                <label for="">Izin</label>
                                                <input type="number" id="jumat_i" name="jumat_i"> *Jam
                                            </div>
                                            <div class="col">
                                                <label for="">Sakit</label>
                                                <input type="number" id="jumat_s" name="jumat_s"> *Jam
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="register" class="btn btn-info text-white" style="width: 100%;">Tambah</button>
                                </form>
                              </div>
                            </span>



                            <!-- Minggu 1 -->
                            <div class="card shadow mb-3">
                                <!-- Card Header - Accordion -->
                                <a href="#card-1" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-1">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi Minggu Ke-1</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-1">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" valign="center">Nama</th><th rowspan="2" valign="center">NIM</th><th colspan="3" style="text-align: center;">Senin</th><th colspan="3" style="text-align: center;">Selasa</th><th colspan="3" style="text-align: center;">Rabu</th><th colspan="3" style="text-align: center;">Kamis</th><th colspan="3" style="text-align: center;">Jumat</th><th colspan="3" style="text-align: center;">Jumlah Minggu Ini</th><th colspan="3" style="text-align: center;">Jumlah Minggu Lalu</th><th colspan="3" style="text-align: center;">Total</th><th rowspan="2">Kompensasi</th><th rowspan="2">Keterangan</th>
                                                </tr>
                                                <tr class="ais">
                                                    <th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE kelas = '$kelas'"); ?>
                                                <?php foreach ($mahasiswa as $mhs) : ?>
                                                <tr>
                                                    <td><?= $mhs['nama']; ?></td>
                                                    <td><?= $mhs['nim']; ?></td>
                                                    <?php $nim = $mhs['nim']; ?>
                                                    <?php $cek1 = mysqli_query($conn, "SELECT * FROM absensi WHERE nim = $nim AND minggu_ke = 1"); ?>

                                                    <?php if (mysqli_num_rows($cek1) > 0) : ?>

                                                    <?php foreach ($cek1 as $key1) : ?>
                                                        <td><?= $key1['senin_a']; ?></td>
                                                        <td><?= $key1['senin_i']; ?></td>
                                                        <td><?= $key1['senin_s']; ?></td>
                                                        <td><?= $key1['selasa_a']; ?></td>
                                                        <td><?= $key1['selasa_i']; ?></td>
                                                        <td><?= $key1['selasa_s']; ?></td>
                                                        <td><?= $key1['rabu_a']; ?></td>
                                                        <td><?= $key1['rabu_i']; ?></td>
                                                        <td><?= $key1['rabu_s']; ?></td>
                                                        <td><?= $key1['kamis_a']; ?></td>
                                                        <td><?= $key1['kamis_i']; ?></td>
                                                        <td><?= $key1['kamis_s']; ?></td>
                                                        <td><?= $key1['jumat_a']; ?></td>
                                                        <td><?= $key1['jumat_i']; ?></td>
                                                        <td><?= $key1['jumat_s']; ?></td>
                                                        <?php error_reporting(0); ?>
                                                        <td><?= $total_a1 += $key1['senin_a'] + $key1['selasa_a'] + $key1['rabu_a'] + $key1['kamis_a'] + $key1['kamis_a'] + $key1['jumat_a']; ?></td>
                                                        <td><?= $total_i1 += $key1['senin_i'] + $key1['selasa_i'] + $key1['rabu_i'] + $key1['kamis_i'] + $key1['kamis_i'] + $key1['jumat_i']; ?></td>
                                                        <td><?= $total_s1 += $key1['senin_s'] + $key1['selasa_s'] + $key1['rabu_s'] + $key1['kamis_s'] + $key1['kamis_s'] + $key1['jumat_s']; ?></td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td><?= $total_a1; ?></td>
                                                        <td><?= $total_i1; ?></td>
                                                        <td><?= $total_s1; ?></td>
                                                        <td><?= $kompen_1 = ($total_a1 * 3) + $total_i1 +  $total_s1; ?></td>
                                                        <td>
                                                        <?php if ($kompen_1 >= 32 AND $kompen_1 < 64) : ?>
                                                            SP 1
                                                        <?php elseif ($kompen_1 >= 64 AND $kompen_1 < 128) : ?>
                                                            SP 2
                                                        <?php elseif ($kompen_1 >= 128) :?>
                                                            SP 3
                                                        <?php else: ?>
                                                            Aman
                                                        <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; ?>

                                                    <?php else: ?>
                                                        <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>Aman</td>
                                                    <?php endif; ?>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Minggu 2 -->
                            <div class="card shadow mb-3">
                                <!-- Card Header - Accordion -->
                                <a href="#card-2" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-2">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi Minggu Ke-2</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-2">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" valign="center">Nama</th><th rowspan="2" valign="center">NIM</th><th colspan="3" style="text-align: center;">Senin</th><th colspan="3" style="text-align: center;">Selasa</th><th colspan="3" style="text-align: center;">Rabu</th><th colspan="3" style="text-align: center;">Kamis</th><th colspan="3" style="text-align: center;">Jumat</th><th colspan="3" style="text-align: center;">Jumlah Minggu Ini</th><th colspan="3" style="text-align: center;">Jumlah Minggu Lalu</th><th colspan="3" style="text-align: center;">Total</th><th rowspan="2">Kompensasi</th><th rowspan="2">Keterangan</th>
                                                </tr>
                                                <tr class="ais">
                                                    <th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE kelas = '$kelas'"); ?>
                                                <?php foreach ($mahasiswa as $mhs) : ?>
                                                <tr>
                                                    <td><?= $mhs['nama']; ?></td>
                                                    <td><?= $mhs['nim']; ?></td>
                                                    <?php $nim = $mhs['nim']; ?>
                                                    <?php $cek2 = mysqli_query($conn, "SELECT * FROM absensi WHERE nim = $nim AND minggu_ke = 2"); ?>

                                                    <?php if (mysqli_num_rows($cek2) > 0) : ?>

                                                    <?php foreach ($cek2 as $key2) : ?>
                                                        <td><?= $key2['senin_a']; ?></td>
                                                        <td><?= $key2['senin_i']; ?></td>
                                                        <td><?= $key2['senin_s']; ?></td>
                                                        <td><?= $key2['selasa_a']; ?></td>
                                                        <td><?= $key2['selasa_i']; ?></td>
                                                        <td><?= $key2['selasa_s']; ?></td>
                                                        <td><?= $key2['rabu_a']; ?></td>
                                                        <td><?= $key2['rabu_i']; ?></td>
                                                        <td><?= $key2['rabu_s']; ?></td>
                                                        <td><?= $key2['kamis_a']; ?></td>
                                                        <td><?= $key2['kamis_i']; ?></td>
                                                        <td><?= $key2['kamis_s']; ?></td>
                                                        <td><?= $key2['jumat_a']; ?></td>
                                                        <td><?= $key2['jumat_i']; ?></td>
                                                        <td><?= $key2['jumat_s']; ?></td>
                                                        <?php error_reporting(0); ?>
                                                        <td><?= $total_a2 += $key2['senin_a'] + $key2['selasa_a'] + $key2['rabu_a'] + $key2['kamis_a'] + $key2['kamis_a'] + $key2['jumat_a']; ?></td>
                                                        <td><?= $total_i2 += $key2['senin_i'] + $key2['selasa_i'] + $key2['rabu_i'] + $key2['kamis_i'] + $key2['kamis_i'] + $key2['jumat_i']; ?></td>
                                                        <td><?= $total_s2 += $key2['senin_s'] + $key2['selasa_s'] + $key2['rabu_s'] + $key2['kamis_s'] + $key2['kamis_s'] + $key2['jumat_s']; ?></td>
                                                        <?php $minggu1 = mysqli_query($conn, "SELECT (senin_a + selasa_a + rabu_a + kamis_a + jumat_a) as total_a, (senin_i + selasa_i + rabu_i + kamis_i + jumat_i) as total_i, (senin_s + selasa_s + rabu_s + kamis_s + jumat_s) as total_s FROM absensi WHERE nim = $nim AND minggu_ke = 1"); ?>
                                                        <?php foreach ($minggu1 as $t1) : ?>
                                                            <td><?= $t1['total_a']; ?></td>
                                                            <td><?= $t1['total_i']; ?></td>
                                                            <td><?= $t1['total_s']; ?></td>
                                                        <?php endforeach; ?>
                                                        <td><?= $total_a2fix += $total_a2 + $t1['total_a']; ?></td>
                                                        <td><?= $total_i2fix += $total_i2 + $t1['total_i']; ?></td>
                                                        <td><?= $total_s2fix += $total_s2 + $t1['total_s']; ?></td>
                                                        <td><?= $kompen_2 = ($total_a2fix * 3) + $total_i2fix +  $total_s2fix; ?></td>
                                                        <td>
                                                        <?php if ($kompen_2 >= 32 AND $kompen_2 < 64) : ?>
                                                            SP 1
                                                        <?php elseif ($kompen_2 >= 64 AND $kompen_2 < 128) : ?>
                                                            SP 2
                                                        <?php elseif ($kompen_2 >= 128) :?>
                                                            SP 3
                                                        <?php else: ?>
                                                            Aman
                                                        <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; ?>

                                                    <?php else: ?>
                                                        <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>Aman</td>
                                                    <?php endif; ?>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Minggu 3 -->
                            <div class="card shadow mb-3">
                                <!-- Card Header - Accordion -->
                                <a href="#card-3" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi Minggu Ke-3</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-3">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" valign="center">Nama</th><th rowspan="2" valign="center">NIM</th><th colspan="3" style="text-align: center;">Senin</th><th colspan="3" style="text-align: center;">Selasa</th><th colspan="3" style="text-align: center;">Rabu</th><th colspan="3" style="text-align: center;">Kamis</th><th colspan="3" style="text-align: center;">Jumat</th><th colspan="3" style="text-align: center;">Jumlah Minggu Ini</th><th colspan="3" style="text-align: center;">Jumlah Minggu Lalu</th><th colspan="3" style="text-align: center;">Total</th><th rowspan="2">Kompensasi</th><th rowspan="2">Keterangan</th>
                                                </tr>
                                                <tr class="ais">
                                                    <th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE kelas = '$kelas'"); ?>
                                                <?php foreach ($mahasiswa as $mhs) : ?>
                                                <tr>
                                                    <td><?= $mhs['nama']; ?></td>
                                                    <td><?= $mhs['nim']; ?></td>
                                                    <?php $nim = $mhs['nim']; ?>
                                                    <?php $cek3 = mysqli_query($conn, "SELECT * FROM absensi WHERE nim = $nim AND minggu_ke = 3"); ?>

                                                    <?php if (mysqli_num_rows($cek3) > 0) : ?>

                                                    <?php foreach ($cek3 as $key3) : ?>
                                                        <td><?= $key3['senin_a']; ?></td>
                                                        <td><?= $key3['senin_i']; ?></td>
                                                        <td><?= $key3['senin_s']; ?></td>
                                                        <td><?= $key3['selasa_a']; ?></td>
                                                        <td><?= $key3['selasa_i']; ?></td>
                                                        <td><?= $key3['selasa_s']; ?></td>
                                                        <td><?= $key3['rabu_a']; ?></td>
                                                        <td><?= $key3['rabu_i']; ?></td>
                                                        <td><?= $key3['rabu_s']; ?></td>
                                                        <td><?= $key3['kamis_a']; ?></td>
                                                        <td><?= $key3['kamis_i']; ?></td>
                                                        <td><?= $key3['kamis_s']; ?></td>
                                                        <td><?= $key3['jumat_a']; ?></td>
                                                        <td><?= $key3['jumat_i']; ?></td>
                                                        <td><?= $key3['jumat_s']; ?></td>
                                                        <?php error_reporting(0); ?>
                                                        <td><?= $total_a3 += $key3['senin_a'] + $key3['selasa_a'] + $key3['rabu_a'] + $key3['kamis_a'] + $key3['kamis_a'] + $key3['jumat_a']; ?></td>
                                                        <td><?= $total_i3 += $key3['senin_i'] + $key3['selasa_i'] + $key3['rabu_i'] + $key3['kamis_i'] + $key3['kamis_i'] + $key3['jumat_i']; ?></td>
                                                        <td><?= $total_s3 += $key3['senin_s'] + $key3['selasa_s'] + $key3['rabu_s'] + $key3['kamis_s'] + $key3['kamis_s'] + $key3['jumat_s']; ?></td>
                                                        <?php $minggu2 = mysqli_query($conn, "SELECT (senin_a + selasa_a + rabu_a + kamis_a + jumat_a) as total_a, (senin_i + selasa_i + rabu_i + kamis_i + jumat_i) as total_i, (senin_s + selasa_s + rabu_s + kamis_s + jumat_s) as total_s FROM absensi WHERE nim = $nim AND minggu_ke = 2"); ?>
                                                        <?php foreach ($minggu2 as $t2) : ?>
                                                            <td><?= $t2['total_a']; ?></td>
                                                            <td><?= $t2['total_i']; ?></td>
                                                            <td><?= $t2['total_s']; ?></td>
                                                        <?php endforeach; ?>
                                                        <td><?= $total_a3ini += $total_a3 + $t2['total_a']; ?></td>
                                                        <td><?= $total_i3ini += $total_i3 + $t2['total_i']; ?></td>
                                                        <td><?= $total_s3ini += $total_s3 + $t2['total_s']; ?></td>

                                                        <?php $total_a3fix += $total_a3 + $t1['total_a']; + $t2['total_a']; ?>
                                                        <?php $total_i3fix += $total_i3 + $t1['total_i']; + $t2['total_i']; ?>
                                                        <?php $total_i3fix += $total_s3 + $t1['total_s']; + $t2['total_s']; ?>
                                                        <td><?= $kompen_3 = (($total_a3fix + $t2['total_a']) * 3) + ($total_i3fix + $t2['total_i']) +  ($total_s3fix + $t2['total_s']); ?>
                                                        </td>
                                                        <td>
                                                        <?php if ($kompen_3 >= 32 AND $kompen_3 < 64) : ?>
                                                            SP 1
                                                        <?php elseif ($kompen_3 >= 64 AND $kompen_3 < 128) : ?>
                                                            SP 2
                                                        <?php elseif ($kompen_3 >= 128) :?>
                                                            SP 3
                                                        <?php else: ?>
                                                            Aman
                                                        <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; ?>

                                                    <?php else: ?>
                                                        <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>Aman</td>
                                                    <?php endif; ?>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Minggu 4 -->
                            <div class="card shadow mb-3">
                                <!-- Card Header - Accordion -->
                                <a href="#card-4" class="d-block card-header py-4" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-4">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi Minggu Ke-4</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-4">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" valign="center">Nama</th><th rowspan="2" valign="center">NIM</th><th colspan="3" style="text-align: center;">Senin</th><th colspan="3" style="text-align: center;">Selasa</th><th colspan="3" style="text-align: center;">Rabu</th><th colspan="3" style="text-align: center;">Kamis</th><th colspan="3" style="text-align: center;">Jumat</th><th colspan="3" style="text-align: center;">Jumlah Minggu Ini</th><th colspan="3" style="text-align: center;">Jumlah Minggu Lalu</th><th colspan="3" style="text-align: center;">Total</th><th rowspan="2">Kompensasi</th><th rowspan="2">Keterangan</th>
                                                </tr>
                                                <tr class="ais">
                                                    <th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE kelas = '$kelas'"); ?>
                                                <?php foreach ($mahasiswa as $mhs) : ?>
                                                <tr>
                                                    <td><?= $mhs['nama']; ?></td>
                                                    <td><?= $mhs['nim']; ?></td>
                                                    <?php $nim = $mhs['nim']; ?>
                                                    <?php $cek4 = mysqli_query($conn, "SELECT * FROM absensi WHERE nim = $nim AND minggu_ke = 4"); ?>

                                                    <?php if (mysqli_num_rows($cek4) > 0) : ?>

                                                    <?php foreach ($cek4 as $key4) : ?>
                                                        <td><?= $key4['senin_a']; ?></td>
                                                        <td><?= $key4['senin_i']; ?></td>
                                                        <td><?= $key4['senin_s']; ?></td>
                                                        <td><?= $key4['selasa_a']; ?></td>
                                                        <td><?= $key4['selasa_i']; ?></td>
                                                        <td><?= $key4['selasa_s']; ?></td>
                                                        <td><?= $key4['rabu_a']; ?></td>
                                                        <td><?= $key4['rabu_i']; ?></td>
                                                        <td><?= $key4['rabu_s']; ?></td>
                                                        <td><?= $key4['kamis_a']; ?></td>
                                                        <td><?= $key4['kamis_i']; ?></td>
                                                        <td><?= $key4['kamis_s']; ?></td>
                                                        <td><?= $key4['jumat_a']; ?></td>
                                                        <td><?= $key4['jumat_i']; ?></td>
                                                        <td><?= $key4['jumat_s']; ?></td>
                                                        <?php error_reporting(0); ?>
                                                        <td><?= $total_a4 += $key4['senin_a'] + $key4['selasa_a'] + $key4['rabu_a'] + $key4['kamis_a'] + $key4['kamis_a'] + $key4['jumat_a']; ?></td>
                                                        <td><?= $total_i4 += $key4['senin_i'] + $key4['selasa_i'] + $key4['rabu_i'] + $key4['kamis_i'] + $key4['kamis_i'] + $key4['jumat_i']; ?></td>
                                                        <td><?= $total_s4 += $key4['senin_s'] + $key4['selasa_s'] + $key4['rabu_s'] + $key4['kamis_s'] + $key4['kamis_s'] + $key4['jumat_s']; ?></td>
                                                        <?php $minggu3 = mysqli_query($conn, "SELECT (senin_a + selasa_a + rabu_a + kamis_a + jumat_a) as total_a, (senin_i + selasa_i + rabu_i + kamis_i + jumat_i) as total_i, (senin_s + selasa_s + rabu_s + kamis_s + jumat_s) as total_s FROM absensi WHERE nim = $nim AND minggu_ke = 3"); ?>
                                                        <?php foreach ($minggu3 as $t3) : ?>
                                                            <td><?= $t3['total_a']; ?></td>
                                                            <td><?= $t3['total_i']; ?></td>
                                                            <td><?= $t3['total_s']; ?></td>
                                                        <?php endforeach; ?>
                                                        <td><?= $total_a4ini += $total_a4 + $t3['total_a']; ?></td>
                                                        <td><?= $total_i4ini += $total_i4 + $t3['total_i']; ?></td>
                                                        <td><?= $total_s4ini += $total_s4 + $t3['total_s']; ?></td>

                                                        <?php $total_a4fix += $total_a4 + $t1['total_a']; + $t2['total_a'] + $t3['total_a']; ?>
                                                        <?php $total_i4fix += $total_i4 + $t1['total_i']; + $t2['total_i'] + $t3['total_i']; ?>
                                                        <?php $total_i4fix += $total_s4 + $t1['total_s']; + $t2['total_s'] + $t3['total_s']; ?>
                                                        <td><?= $kompen_4 = (($total_a4fix + $t2['total_a'] + $t3['total_a']) * 3) + ($total_i4fix + $t2['total_i'] + $t3['total_i']) +  ($total_s4fix + $t2['total_s'] + $t3['total_s']); ?>
                                                        </td>
                                                        <td>
                                                        <?php if ($kompen_4 >= 32 AND $kompen_4 < 64) : ?>
                                                            SP 1
                                                        <?php elseif ($kompen_4 >= 64 AND $kompen_4 < 128) : ?>
                                                            SP 2
                                                        <?php elseif ($kompen_4 >= 128) :?>
                                                            SP 3
                                                        <?php else: ?>
                                                            Aman
                                                        <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; ?>

                                                    <?php else: ?>
                                                        <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>Aman</td>
                                                    <?php endif; ?>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Minggu 5 -->
                            <div class="card shadow mb-3">
                                <!-- Card Header - Accordion -->
                                <a href="#card-5" class="d-block card-header py-5" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-5">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi Minggu Ke-5</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-5">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" valign="center">Nama</th><th rowspan="2" valign="center">NIM</th><th colspan="3" style="text-align: center;">Senin</th><th colspan="3" style="text-align: center;">Selasa</th><th colspan="3" style="text-align: center;">Rabu</th><th colspan="3" style="text-align: center;">Kamis</th><th colspan="3" style="text-align: center;">Jumat</th><th colspan="3" style="text-align: center;">Jumlah Minggu Ini</th><th colspan="3" style="text-align: center;">Jumlah Minggu Lalu</th><th colspan="3" style="text-align: center;">Total</th><th rowspan="2">Kompensasi</th><th rowspan="2">Keterangan</th>
                                                </tr>
                                                <tr class="ais">
                                                    <th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE kelas = '$kelas'"); ?>
                                                <?php foreach ($mahasiswa as $mhs) : ?>
                                                <tr>
                                                    <td><?= $mhs['nama']; ?></td>
                                                    <td><?= $mhs['nim']; ?></td>
                                                    <?php $nim = $mhs['nim']; ?>
                                                    <?php $cek5 = mysqli_query($conn, "SELECT * FROM absensi WHERE nim = $nim AND minggu_ke = 5"); ?>

                                                    <?php if (mysqli_num_rows($cek5) > 0) : ?>

                                                    <?php foreach ($cek5 as $key5) : ?>
                                                        <td><?= $key5['senin_a']; ?></td>
                                                        <td><?= $key5['senin_i']; ?></td>
                                                        <td><?= $key5['senin_s']; ?></td>
                                                        <td><?= $key5['selasa_a']; ?></td>
                                                        <td><?= $key5['selasa_i']; ?></td>
                                                        <td><?= $key5['selasa_s']; ?></td>
                                                        <td><?= $key5['rabu_a']; ?></td>
                                                        <td><?= $key5['rabu_i']; ?></td>
                                                        <td><?= $key5['rabu_s']; ?></td>
                                                        <td><?= $key5['kamis_a']; ?></td>
                                                        <td><?= $key5['kamis_i']; ?></td>
                                                        <td><?= $key5['kamis_s']; ?></td>
                                                        <td><?= $key5['jumat_a']; ?></td>
                                                        <td><?= $key5['jumat_i']; ?></td>
                                                        <td><?= $key5['jumat_s']; ?></td>
                                                        <?php error_reporting(0); ?>

                                                        <td><?= $total_a5 += $key5['senin_a'] + $key5['selasa_a'] + $key5['rabu_a'] + $key5['kamis_a'] + $key5['kamis_a'] + $key5['jumat_a']; ?></td>
                                                        <td><?= $total_i5 += $key5['senin_i'] + $key5['selasa_i'] + $key5['rabu_i'] + $key5['kamis_i'] + $key5['kamis_i'] + $key5['jumat_i']; ?></td>
                                                        <td><?= $total_s5 += $key5['senin_s'] + $key5['selasa_s'] + $key5['rabu_s'] + $key5['kamis_s'] + $key5['kamis_s'] + $key5['jumat_s']; ?></td>

                                                        <?php $minggu4 = mysqli_query($conn, "SELECT (senin_a + selasa_a + rabu_a + kamis_a + jumat_a) as total_a, (senin_i + selasa_i + rabu_i + kamis_i + jumat_i) as total_i, (senin_s + selasa_s + rabu_s + kamis_s + jumat_s) as total_s FROM absensi WHERE nim = $nim AND minggu_ke = 4"); ?>

                                                        <?php foreach ($minggu4 as $t4) : ?>
                                                            <td><?= $t4['total_a']; ?></td>
                                                            <td><?= $t4['total_i']; ?></td>
                                                            <td><?= $t4['total_s']; ?></td>
                                                        <?php endforeach; ?>

                                                        <td><?= $total_a5ini += $total_a5 + $t4['total_a']; ?></td>
                                                        <td><?= $total_i5ini += $total_i5 + $t4['total_i']; ?></td>
                                                        <td><?= $total_s5ini += $total_s5 + $t4['total_s']; ?></td>

                                                        <?php $total_a5fix += $total_a5 + $t1['total_a']; + $t2['total_a'] + $t3['total_a'] + $t4['total_a']; ?>
                                                        <?php $total_i5fix += $total_i5 + $t1['total_i']; + $t2['total_i'] + $t3['total_i'] + $t4['total_i']; ?>
                                                        <?php $total_i5fix += $total_s5 + $t1['total_s']; + $t2['total_s'] + $t3['total_s'] + $t4['total_s']; ?>

                                                        <td><?= $kompen_5 = (
                                                            // A
                                                            ($total_a5fix + $t2['total_a'] + $t3['total_a'] + $t4['total_a']) * 3) + 
                                                            // I
                                                            ($total_i5fix + $t2['total_i'] + $t3['total_i'] + $t4['total_i']) +  
                                                            // S
                                                            ($total_s5fix + $t2['total_s'] + $t3['total_s'] + $t4['total_s']); ?>
                                                        </td>
                                                        <td>
                                                        <?php if ($kompen_5 >= 32 AND $kompen_5 < 64) : ?>
                                                            SP 1
                                                        <?php elseif ($kompen_5 >= 64 AND $kompen_5 < 128) : ?>
                                                            SP 2
                                                        <?php elseif ($kompen_5 >= 128) :?>
                                                            SP 3
                                                        <?php else: ?>
                                                            Aman
                                                        <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; ?>

                                                    <?php else: ?>
                                                        <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>Aman</td>
                                                    <?php endif; ?>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Minggu 6 -->
                            <div class="card shadow mb-3">
                                <!-- Card Header - Accordion -->
                                <a href="#card-6" class="d-block card-header py-6" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi Minggu Ke-6</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-6">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" valign="center">Nama</th><th rowspan="2" valign="center">NIM</th><th colspan="3" style="text-align: center;">Senin</th><th colspan="3" style="text-align: center;">Selasa</th><th colspan="3" style="text-align: center;">Rabu</th><th colspan="3" style="text-align: center;">Kamis</th><th colspan="3" style="text-align: center;">Jumat</th><th colspan="3" style="text-align: center;">Jumlah Minggu Ini</th><th colspan="3" style="text-align: center;">Jumlah Minggu Lalu</th><th colspan="3" style="text-align: center;">Total</th><th rowspan="2">Kompensasi</th><th rowspan="2">Keterangan</th>
                                                </tr>
                                                <tr class="ais">
                                                    <th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE kelas = '$kelas'"); ?>
                                                <?php foreach ($mahasiswa as $mhs) : ?>
                                                <tr>
                                                    <td><?= $mhs['nama']; ?></td>
                                                    <td><?= $mhs['nim']; ?></td>
                                                    <?php $nim = $mhs['nim']; ?>
                                                    <?php $cek6 = mysqli_query($conn, "SELECT * FROM absensi WHERE nim = $nim AND minggu_ke = 6"); ?>

                                                    <?php if (mysqli_num_rows($cek6) > 0) : ?>

                                                    <?php foreach ($cek6 as $key6) : ?>
                                                        <td><?= $key6['senin_a']; ?></td>
                                                        <td><?= $key6['senin_i']; ?></td>
                                                        <td><?= $key6['senin_s']; ?></td>
                                                        <td><?= $key6['selasa_a']; ?></td>
                                                        <td><?= $key6['selasa_i']; ?></td>
                                                        <td><?= $key6['selasa_s']; ?></td>
                                                        <td><?= $key6['rabu_a']; ?></td>
                                                        <td><?= $key6['rabu_i']; ?></td>
                                                        <td><?= $key6['rabu_s']; ?></td>
                                                        <td><?= $key6['kamis_a']; ?></td>
                                                        <td><?= $key6['kamis_i']; ?></td>
                                                        <td><?= $key6['kamis_s']; ?></td>
                                                        <td><?= $key6['jumat_a']; ?></td>
                                                        <td><?= $key6['jumat_i']; ?></td>
                                                        <td><?= $key6['jumat_s']; ?></td>
                                                        <?php error_reporting(0); ?>

                                                        <td><?= $total_a6 += $key6['senin_a'] + $key6['selasa_a'] + $key6['rabu_a'] + $key6['kamis_a'] + $key6['kamis_a'] + $key6['jumat_a']; ?></td>
                                                        <td><?= $total_i6 += $key6['senin_i'] + $key6['selasa_i'] + $key6['rabu_i'] + $key6['kamis_i'] + $key6['kamis_i'] + $key6['jumat_i']; ?></td>
                                                        <td><?= $total_s6 += $key6['senin_s'] + $key6['selasa_s'] + $key6['rabu_s'] + $key6['kamis_s'] + $key6['kamis_s'] + $key6['jumat_s']; ?></td>

                                                        <?php $minggu5 = mysqli_query($conn, "SELECT (senin_a + selasa_a + rabu_a + kamis_a + jumat_a) as total_a, (senin_i + selasa_i + rabu_i + kamis_i + jumat_i) as total_i, (senin_s + selasa_s + rabu_s + kamis_s + jumat_s) as total_s FROM absensi WHERE nim = $nim AND minggu_ke = 5"); ?>

                                                        <?php foreach ($minggu5 as $t5) : ?>
                                                            <td><?= $t5['total_a']; ?></td>
                                                            <td><?= $t5['total_i']; ?></td>
                                                            <td><?= $t5['total_s']; ?></td>
                                                        <?php endforeach; ?>

                                                        <td><?= $total_a6ini += $total_a6 + $t5['total_a']; ?></td>
                                                        <td><?= $total_i6ini += $total_i6 + $t5['total_i']; ?></td>
                                                        <td><?= $total_s6ini += $total_s6 + $t5['total_s']; ?></td>

                                                        <?php $total_a6fix += $total_a6 + $t1['total_a']; + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a']; ?>
                                                        <?php $total_i6fix += $total_i6 + $t1['total_i']; + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i']; ?>
                                                        <?php $total_i6fix += $total_s6 + $t1['total_s']; + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s']; ?>

                                                        <td><?= $kompen_5 = (
                                                            // A
                                                            ($total_a5fix + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a']) * 3) + 
                                                            // I
                                                            ($total_i5fix + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i']) +  
                                                            // S
                                                            ($total_s5fix + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s']); ?>
                                                        </td>
                                                        <td>
                                                        <?php if ($kompen_5 >= 32 AND $kompen_5 < 64) : ?>
                                                            SP 1
                                                        <?php elseif ($kompen_5 >= 64 AND $kompen_5 < 128) : ?>
                                                            SP 2
                                                        <?php elseif ($kompen_5 >= 128) :?>
                                                            SP 3
                                                        <?php else: ?>
                                                            Aman
                                                        <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; ?>

                                                    <?php else: ?>
                                                        <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>Aman</td>
                                                    <?php endif; ?>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Minggu 7 -->
                            <div class="card shadow mb-3">
                                <!-- Card Header - Accordion -->
                                <a href="#card-7" class="d-block card-header py-7" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-7">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi Minggu Ke-7</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-7">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" valign="center">Nama</th><th rowspan="2" valign="center">NIM</th><th colspan="3" style="text-align: center;">Senin</th><th colspan="3" style="text-align: center;">Selasa</th><th colspan="3" style="text-align: center;">Rabu</th><th colspan="3" style="text-align: center;">Kamis</th><th colspan="3" style="text-align: center;">Jumat</th><th colspan="3" style="text-align: center;">Jumlah Minggu Ini</th><th colspan="3" style="text-align: center;">Jumlah Minggu Lalu</th><th colspan="3" style="text-align: center;">Total</th><th rowspan="2">Kompensasi</th><th rowspan="2">Keterangan</th>
                                                </tr>
                                                <tr class="ais">
                                                    <th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE kelas = '$kelas'"); ?>
                                                <?php foreach ($mahasiswa as $mhs) : ?>
                                                <tr>
                                                    <td><?= $mhs['nama']; ?></td>
                                                    <td><?= $mhs['nim']; ?></td>
                                                    <?php $nim = $mhs['nim']; ?>
                                                    <?php $cek7 = mysqli_query($conn, "SELECT * FROM absensi WHERE nim = $nim AND minggu_ke = 7"); ?>

                                                    <?php if (mysqli_num_rows($cek7) > 0) : ?>

                                                    <?php foreach ($cek7 as $key7) : ?>
                                                        <td><?= $key7['senin_a']; ?></td>
                                                        <td><?= $key7['senin_i']; ?></td>
                                                        <td><?= $key7['senin_s']; ?></td>
                                                        <td><?= $key7['selasa_a']; ?></td>
                                                        <td><?= $key7['selasa_i']; ?></td>
                                                        <td><?= $key7['selasa_s']; ?></td>
                                                        <td><?= $key7['rabu_a']; ?></td>
                                                        <td><?= $key7['rabu_i']; ?></td>
                                                        <td><?= $key7['rabu_s']; ?></td>
                                                        <td><?= $key7['kamis_a']; ?></td>
                                                        <td><?= $key7['kamis_i']; ?></td>
                                                        <td><?= $key7['kamis_s']; ?></td>
                                                        <td><?= $key7['jumat_a']; ?></td>
                                                        <td><?= $key7['jumat_i']; ?></td>
                                                        <td><?= $key7['jumat_s']; ?></td>
                                                        <?php error_reporting(0); ?>

                                                        <td><?= $total_a7 += $key7['senin_a'] + $key7['selasa_a'] + $key7['rabu_a'] + $key7['kamis_a'] + $key7['kamis_a'] + $key7['jumat_a']; ?></td>
                                                        <td><?= $total_i7 += $key7['senin_i'] + $key7['selasa_i'] + $key7['rabu_i'] + $key7['kamis_i'] + $key7['kamis_i'] + $key7['jumat_i']; ?></td>
                                                        <td><?= $total_s7 += $key7['senin_s'] + $key7['selasa_s'] + $key7['rabu_s'] + $key7['kamis_s'] + $key7['kamis_s'] + $key7['jumat_s']; ?></td>

                                                        <?php $minggu6 = mysqli_query($conn, "SELECT (senin_a + selasa_a + rabu_a + kamis_a + jumat_a) as total_a, (senin_i + selasa_i + rabu_i + kamis_i + jumat_i) as total_i, (senin_s + selasa_s + rabu_s + kamis_s + jumat_s) as total_s FROM absensi WHERE nim = $nim AND minggu_ke = 6"); ?>

                                                        <?php foreach ($minggu6 as $t6) : ?>
                                                            <td><?= $t6['total_a']; ?></td>
                                                            <td><?= $t6['total_i']; ?></td>
                                                            <td><?= $t6['total_s']; ?></td>
                                                        <?php endforeach; ?>

                                                        <td><?= $total_a7ini += $total_a7 + $t6['total_a']; ?></td>
                                                        <td><?= $total_i7ini += $total_i7 + $t6['total_i']; ?></td>
                                                        <td><?= $total_s7ini += $total_s7 + $t6['total_s']; ?></td>

                                                        <?php $total_a7fix += $total_a7 + $t1['total_a']; + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a']; ?>
                                                        <?php $total_i7fix += $total_i7 + $t1['total_i']; + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i']; ?>
                                                        <?php $total_i7fix += $total_s7 + $t1['total_s']; + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s']; ?>

                                                        <td><?= $kompen_7 = (
                                                            // A
                                                            ($total_a7fix + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a']) * 3) + 
                                                            // I
                                                            ($total_i7fix + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i']) +  
                                                            // S
                                                            ($total_s7fix + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s']); ?>
                                                        </td>
                                                        <td>
                                                        <?php if ($kompen_7 >= 32 AND $kompen_7 < 64) : ?>
                                                            SP 1
                                                        <?php elseif ($kompen_7 >= 64 AND $kompen_7 < 128) : ?>
                                                            SP 2
                                                        <?php elseif ($kompen_7 >= 128) :?>
                                                            SP 3
                                                        <?php else: ?>
                                                            Aman
                                                        <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; ?>

                                                    <?php else: ?>
                                                        <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>Aman</td>
                                                    <?php endif; ?>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Minggu 8 -->
                            <div class="card shadow mb-3">
                                <!-- Card Header - Accordion -->
                                <a href="#card-8" class="d-block card-header py-8" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-8">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi Minggu Ke-8</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-8">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" valign="center">Nama</th><th rowspan="2" valign="center">NIM</th><th colspan="3" style="text-align: center;">Senin</th><th colspan="3" style="text-align: center;">Selasa</th><th colspan="3" style="text-align: center;">Rabu</th><th colspan="3" style="text-align: center;">Kamis</th><th colspan="3" style="text-align: center;">Jumat</th><th colspan="3" style="text-align: center;">Jumlah Minggu Ini</th><th colspan="3" style="text-align: center;">Jumlah Minggu Lalu</th><th colspan="3" style="text-align: center;">Total</th><th rowspan="2">Kompensasi</th><th rowspan="2">Keterangan</th>
                                                </tr>
                                                <tr class="ais">
                                                    <th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE kelas = '$kelas'"); ?>
                                                <?php foreach ($mahasiswa as $mhs) : ?>
                                                <tr>
                                                    <td><?= $mhs['nama']; ?></td>
                                                    <td><?= $mhs['nim']; ?></td>
                                                    <?php $nim = $mhs['nim']; ?>
                                                    <?php $cek8 = mysqli_query($conn, "SELECT * FROM absensi WHERE nim = $nim AND minggu_ke = 8"); ?>

                                                    <?php if (mysqli_num_rows($cek8) > 0) : ?>

                                                    <?php foreach ($cek8 as $key8) : ?>
                                                        <td><?= $key8['senin_a']; ?></td>
                                                        <td><?= $key8['senin_i']; ?></td>
                                                        <td><?= $key8['senin_s']; ?></td>
                                                        <td><?= $key8['selasa_a']; ?></td>
                                                        <td><?= $key8['selasa_i']; ?></td>
                                                        <td><?= $key8['selasa_s']; ?></td>
                                                        <td><?= $key8['rabu_a']; ?></td>
                                                        <td><?= $key8['rabu_i']; ?></td>
                                                        <td><?= $key8['rabu_s']; ?></td>
                                                        <td><?= $key8['kamis_a']; ?></td>
                                                        <td><?= $key8['kamis_i']; ?></td>
                                                        <td><?= $key8['kamis_s']; ?></td>
                                                        <td><?= $key8['jumat_a']; ?></td>
                                                        <td><?= $key8['jumat_i']; ?></td>
                                                        <td><?= $key8['jumat_s']; ?></td>
                                                        <?php error_reporting(0); ?>

                                                        <td><?= $total_a8 += $key8['senin_a'] + $key8['selasa_a'] + $key8['rabu_a'] + $key8['kamis_a'] + $key8['kamis_a'] + $key8['jumat_a']; ?></td>
                                                        <td><?= $total_i8 += $key8['senin_i'] + $key8['selasa_i'] + $key8['rabu_i'] + $key8['kamis_i'] + $key8['kamis_i'] + $key8['jumat_i']; ?></td>
                                                        <td><?= $total_s8 += $key8['senin_s'] + $key8['selasa_s'] + $key8['rabu_s'] + $key8['kamis_s'] + $key8['kamis_s'] + $key8['jumat_s']; ?></td>

                                                        <?php $minggu7 = mysqli_query($conn, "SELECT (senin_a + selasa_a + rabu_a + kamis_a + jumat_a) as total_a, (senin_i + selasa_i + rabu_i + kamis_i + jumat_i) as total_i, (senin_s + selasa_s + rabu_s + kamis_s + jumat_s) as total_s FROM absensi WHERE nim = $nim AND minggu_ke = 7"); ?>

                                                        <?php foreach ($minggu7 as $t7) : ?>
                                                            <td><?= $t7['total_a']; ?></td>
                                                            <td><?= $t7['total_i']; ?></td>
                                                            <td><?= $t7['total_s']; ?></td>
                                                        <?php endforeach; ?>

                                                        <td><?= $total_a8ini += $total_a8 + $t7['total_a']; ?></td>
                                                        <td><?= $total_i8ini += $total_i8 + $t7['total_i']; ?></td>
                                                        <td><?= $total_s8ini += $total_s8 + $t7['total_s']; ?></td>

                                                        <?php $total_a8fix += $total_a8 + $t1['total_a']; + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a'] + $t7['total_a']; ?>
                                                        <?php $total_i8fix += $total_i8 + $t1['total_i']; + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i'] + $t7['total_i']; ?>
                                                        <?php $total_i8fix += $total_s8 + $t1['total_s']; + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s'] + $t7['total_s']; ?>

                                                        <td><?= $kompen_8 = (
                                                            // A
                                                            ($total_a8fix + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a'] + $t7['total_a']) * 3) + 
                                                            // I
                                                            ($total_i8fix + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i'] + $t7['total_i']) +  
                                                            // S
                                                            ($total_s8fix + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s'] + $t7['total_s']); ?>
                                                        </td>
                                                        <td>
                                                        <?php if ($kompen_8 >= 32 AND $kompen_8 < 64) : ?>
                                                            SP 1
                                                        <?php elseif ($kompen_8 >= 64 AND $kompen_8 < 128) : ?>
                                                            SP 2
                                                        <?php elseif ($kompen_8 >= 128) :?>
                                                            SP 3
                                                        <?php else: ?>
                                                            Aman
                                                        <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; ?>

                                                    <?php else: ?>
                                                        <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>Aman</td>
                                                    <?php endif; ?>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Minggu 9 -->
                            <div class="card shadow mb-3">
                                <!-- Card Header - Accordion -->
                                <a href="#card-9" class="d-block card-header py-9" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-9">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi Minggu Ke-9</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-9">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" valign="center">Nama</th><th rowspan="2" valign="center">NIM</th><th colspan="3" style="text-align: center;">Senin</th><th colspan="3" style="text-align: center;">Selasa</th><th colspan="3" style="text-align: center;">Rabu</th><th colspan="3" style="text-align: center;">Kamis</th><th colspan="3" style="text-align: center;">Jumat</th><th colspan="3" style="text-align: center;">Jumlah Minggu Ini</th><th colspan="3" style="text-align: center;">Jumlah Minggu Lalu</th><th colspan="3" style="text-align: center;">Total</th><th rowspan="2">Kompensasi</th><th rowspan="2">Keterangan</th>
                                                </tr>
                                                <tr class="ais">
                                                    <th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE kelas = '$kelas'"); ?>
                                                <?php foreach ($mahasiswa as $mhs) : ?>
                                                <tr>
                                                    <td><?= $mhs['nama']; ?></td>
                                                    <td><?= $mhs['nim']; ?></td>
                                                    <?php $nim = $mhs['nim']; ?>
                                                    <?php $cek9 = mysqli_query($conn, "SELECT * FROM absensi WHERE nim = $nim AND minggu_ke = 9"); ?>

                                                    <?php if (mysqli_num_rows($cek9) > 0) : ?>

                                                    <?php foreach ($cek9 as $key9) : ?>
                                                        <td><?= $key9['senin_a']; ?></td>
                                                        <td><?= $key9['senin_i']; ?></td>
                                                        <td><?= $key9['senin_s']; ?></td>
                                                        <td><?= $key9['selasa_a']; ?></td>
                                                        <td><?= $key9['selasa_i']; ?></td>
                                                        <td><?= $key9['selasa_s']; ?></td>
                                                        <td><?= $key9['rabu_a']; ?></td>
                                                        <td><?= $key9['rabu_i']; ?></td>
                                                        <td><?= $key9['rabu_s']; ?></td>
                                                        <td><?= $key9['kamis_a']; ?></td>
                                                        <td><?= $key9['kamis_i']; ?></td>
                                                        <td><?= $key9['kamis_s']; ?></td>
                                                        <td><?= $key9['jumat_a']; ?></td>
                                                        <td><?= $key9['jumat_i']; ?></td>
                                                        <td><?= $key9['jumat_s']; ?></td>
                                                        <?php error_reporting(0); ?>

                                                        <td><?= $total_a9 += $key9['senin_a'] + $key9['selasa_a'] + $key9['rabu_a'] + $key9['kamis_a'] + $key9['kamis_a'] + $key9['jumat_a']; ?></td>
                                                        <td><?= $total_i9 += $key9['senin_i'] + $key9['selasa_i'] + $key9['rabu_i'] + $key9['kamis_i'] + $key9['kamis_i'] + $key9['jumat_i']; ?></td>
                                                        <td><?= $total_s9 += $key9['senin_s'] + $key9['selasa_s'] + $key9['rabu_s'] + $key9['kamis_s'] + $key9['kamis_s'] + $key9['jumat_s']; ?></td>

                                                        <?php $minggu8 = mysqli_query($conn, "SELECT (senin_a + selasa_a + rabu_a + kamis_a + jumat_a) as total_a, (senin_i + selasa_i + rabu_i + kamis_i + jumat_i) as total_i, (senin_s + selasa_s + rabu_s + kamis_s + jumat_s) as total_s FROM absensi WHERE nim = $nim AND minggu_ke = 8"); ?>

                                                        <?php foreach ($minggu8 as $t8) : ?>
                                                            <td><?= $t8['total_a']; ?></td>
                                                            <td><?= $t8['total_i']; ?></td>
                                                            <td><?= $t8['total_s']; ?></td>
                                                        <?php endforeach; ?>

                                                        <td><?= $total_a9ini += $total_a9 + $t8['total_a']; ?></td>
                                                        <td><?= $total_i9ini += $total_i9 + $t8['total_i']; ?></td>
                                                        <td><?= $total_s9ini += $total_s9 + $t8['total_s']; ?></td>

                                                        <?php $total_a9fix += $total_a9 + $t1['total_a']; + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a'] + $t7['total_a'] + $t8['total_a']; ?>
                                                        <?php $total_i9fix += $total_i9 + $t1['total_i']; + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i'] + $t7['total_i'] + $t8['total_i']; ?>
                                                        <?php $total_i9fix += $total_s9 + $t1['total_s']; + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s'] + $t7['total_s'] + $t8['total_s']; ?>

                                                        <td><?= $kompen_9 = (
                                                            // A
                                                            ($total_a9fix + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a'] + $t7['total_a'] + $t8['total_a']
                                                            ) * 3) + 
                                                            // I
                                                            ($total_i9fix + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i'] + $t7['total_i'] + $t8['total_i']
                                                            ) +  
                                                            // S
                                                            ($total_s9fix + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s'] + $t7['total_s'] + $t8['total_s']
                                                            ); ?>
                                                        </td>
                                                        <td>
                                                        <?php if ($kompen_9 >= 32 AND $kompen_9 < 64) : ?>
                                                            SP 1
                                                        <?php elseif ($kompen_9 >= 64 AND $kompen_9 < 128) : ?>
                                                            SP 2
                                                        <?php elseif ($kompen_9 >= 128) :?>
                                                            SP 3
                                                        <?php else: ?>
                                                            Aman
                                                        <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; ?>

                                                    <?php else: ?>
                                                        <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>Aman</td>
                                                    <?php endif; ?>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Minggu 10 -->
                            <div class="card shadow mb-3">
                                <!-- Card Header - Accordion -->
                                <a href="#card-10" class="d-block card-header py-10" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-10">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi Minggu Ke-10</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-10">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" valign="center">Nama</th><th rowspan="2" valign="center">NIM</th><th colspan="3" style="text-align: center;">Senin</th><th colspan="3" style="text-align: center;">Selasa</th><th colspan="3" style="text-align: center;">Rabu</th><th colspan="3" style="text-align: center;">Kamis</th><th colspan="3" style="text-align: center;">Jumat</th><th colspan="3" style="text-align: center;">Jumlah Minggu Ini</th><th colspan="3" style="text-align: center;">Jumlah Minggu Lalu</th><th colspan="3" style="text-align: center;">Total</th><th rowspan="2">Kompensasi</th><th rowspan="2">Keterangan</th>
                                                </tr>
                                                <tr class="ais">
                                                    <th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE kelas = '$kelas'"); ?>
                                                <?php foreach ($mahasiswa as $mhs) : ?>
                                                <tr>
                                                    <td><?= $mhs['nama']; ?></td>
                                                    <td><?= $mhs['nim']; ?></td>
                                                    <?php $nim = $mhs['nim']; ?>
                                                    <?php $cek10 = mysqli_query($conn, "SELECT * FROM absensi WHERE nim = $nim AND minggu_ke = 10"); ?>

                                                    <?php if (mysqli_num_rows($cek10) > 0) : ?>

                                                    <?php foreach ($cek10 as $key10) : ?>
                                                        <td><?= $key10['senin_a']; ?></td>
                                                        <td><?= $key10['senin_i']; ?></td>
                                                        <td><?= $key10['senin_s']; ?></td>
                                                        <td><?= $key10['selasa_a']; ?></td>
                                                        <td><?= $key10['selasa_i']; ?></td>
                                                        <td><?= $key10['selasa_s']; ?></td>
                                                        <td><?= $key10['rabu_a']; ?></td>
                                                        <td><?= $key10['rabu_i']; ?></td>
                                                        <td><?= $key10['rabu_s']; ?></td>
                                                        <td><?= $key10['kamis_a']; ?></td>
                                                        <td><?= $key10['kamis_i']; ?></td>
                                                        <td><?= $key10['kamis_s']; ?></td>
                                                        <td><?= $key10['jumat_a']; ?></td>
                                                        <td><?= $key10['jumat_i']; ?></td>
                                                        <td><?= $key10['jumat_s']; ?></td>
                                                        <?php error_reporting(0); ?>

                                                        <td><?= $total_a10 += $key10['senin_a'] + $key10['selasa_a'] + $key10['rabu_a'] + $key10['kamis_a'] + $key10['kamis_a'] + $key10['jumat_a']; ?></td>
                                                        <td><?= $total_i10 += $key10['senin_i'] + $key10['selasa_i'] + $key10['rabu_i'] + $key10['kamis_i'] + $key10['kamis_i'] + $key10['jumat_i']; ?></td>
                                                        <td><?= $total_s10 += $key10['senin_s'] + $key10['selasa_s'] + $key10['rabu_s'] + $key10['kamis_s'] + $key10['kamis_s'] + $key10['jumat_s']; ?></td>

                                                        <?php $minggu9 = mysqli_query($conn, "SELECT (senin_a + selasa_a + rabu_a + kamis_a + jumat_a) as total_a, (senin_i + selasa_i + rabu_i + kamis_i + jumat_i) as total_i, (senin_s + selasa_s + rabu_s + kamis_s + jumat_s) as total_s FROM absensi WHERE nim = $nim AND minggu_ke = 9"); ?>

                                                        <?php foreach ($minggu9 as $t9) : ?>
                                                            <td><?= $t9['total_a']; ?></td>
                                                            <td><?= $t9['total_i']; ?></td>
                                                            <td><?= $t9['total_s']; ?></td>
                                                        <?php endforeach; ?>

                                                        <td><?= $total_a10ini += $total_a10 + $t9['total_a']; ?></td>
                                                        <td><?= $total_i10ini += $total_i10 + $t9['total_i']; ?></td>
                                                        <td><?= $total_s10ini += $total_s10 + $t9['total_s']; ?></td>

                                                        <?php $total_a10fix += $total_a10 + $t1['total_a']; + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a'] + $t7['total_a'] + $t8['total_a'] + $t9['total_a']; ?>
                                                        <?php $total_i10fix += $total_i10 + $t1['total_i']; + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i'] + $t7['total_i'] + $t8['total_i'] + $t9['total_i']; ?>
                                                        <?php $total_i10fix += $total_s10 + $t1['total_s']; + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s'] + $t7['total_s'] + $t8['total_s'] + $t9['total_s']; ?>

                                                        <td><?= $kompen_10 = (
                                                            // A
                                                            ($total_a10fix + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a'] + $t7['total_a'] + $t8['total_a'] + $t9['total_a']
                                                            ) * 3) + 
                                                            // I
                                                            ($total_i10fix + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i'] + $t7['total_i'] + $t8['total_i'] + $t9['total_i']
                                                            ) +  
                                                            // S
                                                            ($total_s10fix + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s'] + $t7['total_s'] + $t8['total_s'] + $t9['total_s']
                                                            ); ?>
                                                        </td>
                                                        <td>
                                                        <?php if ($kompen_10 >= 32 AND $kompen_10 < 64) : ?>
                                                            SP 1
                                                        <?php elseif ($kompen_10 >= 64 AND $kompen_10 < 128) : ?>
                                                            SP 2
                                                        <?php elseif ($kompen_10 >= 128) :?>
                                                            SP 3
                                                        <?php else: ?>
                                                            Aman
                                                        <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; ?>

                                                    <?php else: ?>
                                                        <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>Aman</td>
                                                    <?php endif; ?>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Minggu 11 -->
                            <div class="card shadow mb-3">
                                <!-- Card Header - Accordion -->
                                <a href="#card-11" class="d-block card-header py-11" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-11">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi Minggu Ke-11</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-11">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" valign="center">Nama</th><th rowspan="2" valign="center">NIM</th><th colspan="3" style="text-align: center;">Senin</th><th colspan="3" style="text-align: center;">Selasa</th><th colspan="3" style="text-align: center;">Rabu</th><th colspan="3" style="text-align: center;">Kamis</th><th colspan="3" style="text-align: center;">Jumat</th><th colspan="3" style="text-align: center;">Jumlah Minggu Ini</th><th colspan="3" style="text-align: center;">Jumlah Minggu Lalu</th><th colspan="3" style="text-align: center;">Total</th><th rowspan="2">Kompensasi</th><th rowspan="2">Keterangan</th>
                                                </tr>
                                                <tr class="ais">
                                                    <th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE kelas = '$kelas'"); ?>
                                                <?php foreach ($mahasiswa as $mhs) : ?>
                                                <tr>
                                                    <td><?= $mhs['nama']; ?></td>
                                                    <td><?= $mhs['nim']; ?></td>
                                                    <?php $nim = $mhs['nim']; ?>
                                                    <?php $cek11 = mysqli_query($conn, "SELECT * FROM absensi WHERE nim = $nim AND minggu_ke = 11"); ?>

                                                    <?php if (mysqli_num_rows($cek11) > 0) : ?>

                                                    <?php foreach ($cek11 as $key11) : ?>
                                                        <td><?= $key11['senin_a']; ?></td>
                                                        <td><?= $key11['senin_i']; ?></td>
                                                        <td><?= $key11['senin_s']; ?></td>
                                                        <td><?= $key11['selasa_a']; ?></td>
                                                        <td><?= $key11['selasa_i']; ?></td>
                                                        <td><?= $key11['selasa_s']; ?></td>
                                                        <td><?= $key11['rabu_a']; ?></td>
                                                        <td><?= $key11['rabu_i']; ?></td>
                                                        <td><?= $key11['rabu_s']; ?></td>
                                                        <td><?= $key11['kamis_a']; ?></td>
                                                        <td><?= $key11['kamis_i']; ?></td>
                                                        <td><?= $key11['kamis_s']; ?></td>
                                                        <td><?= $key11['jumat_a']; ?></td>
                                                        <td><?= $key11['jumat_i']; ?></td>
                                                        <td><?= $key11['jumat_s']; ?></td>
                                                        <?php error_reporting(0); ?>

                                                        <td><?= $total_a11 += $key11['senin_a'] + $key11['selasa_a'] + $key11['rabu_a'] + $key11['kamis_a'] + $key11['kamis_a'] + $key11['jumat_a']; ?></td>
                                                        <td><?= $total_i11 += $key11['senin_i'] + $key11['selasa_i'] + $key11['rabu_i'] + $key11['kamis_i'] + $key11['kamis_i'] + $key11['jumat_i']; ?></td>
                                                        <td><?= $total_s11 += $key11['senin_s'] + $key11['selasa_s'] + $key11['rabu_s'] + $key11['kamis_s'] + $key11['kamis_s'] + $key11['jumat_s']; ?></td>

                                                        <?php $minggu10 = mysqli_query($conn, "SELECT (senin_a + selasa_a + rabu_a + kamis_a + jumat_a) as total_a, (senin_i + selasa_i + rabu_i + kamis_i + jumat_i) as total_i, (senin_s + selasa_s + rabu_s + kamis_s + jumat_s) as total_s FROM absensi WHERE nim = $nim AND minggu_ke = 10"); ?>

                                                        <?php foreach ($minggu10 as $t10) : ?>
                                                            <td><?= $t10['total_a']; ?></td>
                                                            <td><?= $t10['total_i']; ?></td>
                                                            <td><?= $t10['total_s']; ?></td>
                                                        <?php endforeach; ?>

                                                        <td><?= $total_a11ini += $total_a11 + $t10['total_a']; ?></td>
                                                        <td><?= $total_i11ini += $total_i11 + $t10['total_i']; ?></td>
                                                        <td><?= $total_s11ini += $total_s11 + $t10['total_s']; ?></td>

                                                        <?php $total_a11fix += $total_a11 + $t1['total_a']; + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a'] + $t7['total_a'] + $t8['total_a'] + $t9['total_a'] + $t10['total_a']; ?>
                                                        <?php $total_i11fix += $total_i11 + $t1['total_i']; + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i'] + $t7['total_i'] + $t8['total_i'] + $t9['total_i'] + $t10['total_i']; ?>
                                                        <?php $total_i11fix += $total_s11 + $t1['total_s']; + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s'] + $t7['total_s'] + $t8['total_s'] + $t9['total_s'] + $t10['total_s']; ?>

                                                        <td><?= $kompen_11 = (
                                                            // A
                                                            ($total_a11fix + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a'] + $t7['total_a'] + $t8['total_a'] + $t9['total_a'] + $t10['total_a']
                                                            ) * 3) + 
                                                            // I
                                                            ($total_i11fix + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i'] + $t7['total_i'] + $t8['total_i'] + $t9['total_i'] + $t10['total_i']
                                                            ) +  
                                                            // S
                                                            ($total_s11fix + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s'] + $t7['total_s'] + $t8['total_s'] + $t9['total_s'] + $t10['total_s']
                                                            ); ?>
                                                        </td>
                                                        <td>
                                                        <?php if ($kompen_11 >= 32 AND $kompen_11 < 64) : ?>
                                                            SP 1
                                                        <?php elseif ($kompen_11 >= 64 AND $kompen_11 < 128) : ?>
                                                            SP 2
                                                        <?php elseif ($kompen_11 >= 128) :?>
                                                            SP 3
                                                        <?php else: ?>
                                                            Aman
                                                        <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; ?>

                                                    <?php else: ?>
                                                        <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>Aman</td>
                                                    <?php endif; ?>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Minggu 12 -->
                            <div class="card shadow mb-3">
                                <!-- Card Header - Accordion -->
                                <a href="#card-12" class="d-block card-header py-12" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-12">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi Minggu Ke-12</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-12">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" valign="center">Nama</th><th rowspan="2" valign="center">NIM</th><th colspan="3" style="text-align: center;">Senin</th><th colspan="3" style="text-align: center;">Selasa</th><th colspan="3" style="text-align: center;">Rabu</th><th colspan="3" style="text-align: center;">Kamis</th><th colspan="3" style="text-align: center;">Jumat</th><th colspan="3" style="text-align: center;">Jumlah Minggu Ini</th><th colspan="3" style="text-align: center;">Jumlah Minggu Lalu</th><th colspan="3" style="text-align: center;">Total</th><th rowspan="2">Kompensasi</th><th rowspan="2">Keterangan</th>
                                                </tr>
                                                <tr class="ais">
                                                    <th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE kelas = '$kelas'"); ?>
                                                <?php foreach ($mahasiswa as $mhs) : ?>
                                                <tr>
                                                    <td><?= $mhs['nama']; ?></td>
                                                    <td><?= $mhs['nim']; ?></td>
                                                    <?php $nim = $mhs['nim']; ?>
                                                    <?php $cek12 = mysqli_query($conn, "SELECT * FROM absensi WHERE nim = $nim AND minggu_ke = 12"); ?>

                                                    <?php if (mysqli_num_rows($cek12) > 0) : ?>

                                                    <?php foreach ($cek12 as $key12) : ?>
                                                        <td><?= $key12['senin_a']; ?></td>
                                                        <td><?= $key12['senin_i']; ?></td>
                                                        <td><?= $key12['senin_s']; ?></td>
                                                        <td><?= $key12['selasa_a']; ?></td>
                                                        <td><?= $key12['selasa_i']; ?></td>
                                                        <td><?= $key12['selasa_s']; ?></td>
                                                        <td><?= $key12['rabu_a']; ?></td>
                                                        <td><?= $key12['rabu_i']; ?></td>
                                                        <td><?= $key12['rabu_s']; ?></td>
                                                        <td><?= $key12['kamis_a']; ?></td>
                                                        <td><?= $key12['kamis_i']; ?></td>
                                                        <td><?= $key12['kamis_s']; ?></td>
                                                        <td><?= $key12['jumat_a']; ?></td>
                                                        <td><?= $key12['jumat_i']; ?></td>
                                                        <td><?= $key12['jumat_s']; ?></td>
                                                        <?php error_reporting(0); ?>

                                                        <td><?= $total_a12 += $key12['senin_a'] + $key12['selasa_a'] + $key12['rabu_a'] + $key12['kamis_a'] + $key12['kamis_a'] + $key12['jumat_a']; ?></td>
                                                        <td><?= $total_i12 += $key12['senin_i'] + $key12['selasa_i'] + $key12['rabu_i'] + $key12['kamis_i'] + $key12['kamis_i'] + $key12['jumat_i']; ?></td>
                                                        <td><?= $total_s12 += $key12['senin_s'] + $key12['selasa_s'] + $key12['rabu_s'] + $key12['kamis_s'] + $key12['kamis_s'] + $key12['jumat_s']; ?></td>

                                                        <?php $minggu11 = mysqli_query($conn, "SELECT (senin_a + selasa_a + rabu_a + kamis_a + jumat_a) as total_a, (senin_i + selasa_i + rabu_i + kamis_i + jumat_i) as total_i, (senin_s + selasa_s + rabu_s + kamis_s + jumat_s) as total_s FROM absensi WHERE nim = $nim AND minggu_ke = 11"); ?>

                                                        <?php foreach ($minggu11 as $t11) : ?>
                                                            <td><?= $t11['total_a']; ?></td>
                                                            <td><?= $t11['total_i']; ?></td>
                                                            <td><?= $t11['total_s']; ?></td>
                                                        <?php endforeach; ?>

                                                        <td><?= $total_a12ini += $total_a12 + $t11['total_a']; ?></td>
                                                        <td><?= $total_i12ini += $total_i12 + $t11['total_i']; ?></td>
                                                        <td><?= $total_s12ini += $total_s12 + $t11['total_s']; ?></td>

                                                        <?php $total_a12fix += $total_a12 + $t1['total_a']; + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a'] + $t7['total_a'] + $t8['total_a'] + $t9['total_a'] + $t10['total_a'] + $t11['total_a']; ?>
                                                        <?php $total_i12fix += $total_i12 + $t1['total_i']; + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i'] + $t7['total_i'] + $t8['total_i'] + $t9['total_i'] + $t10['total_i'] + $t11['total_i']; ?>
                                                        <?php $total_i12fix += $total_s12 + $t1['total_s']; + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s'] + $t7['total_s'] + $t8['total_s'] + $t9['total_s'] + $t10['total_s'] + $t11['total_s']; ?>

                                                        <td><?= $kompen_12 = (
                                                            // A
                                                            ($total_a12fix + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a'] + $t7['total_a'] + $t8['total_a'] + $t9['total_a'] + $t10['total_a'] + $t11['total_a']
                                                            ) * 3) + 
                                                            // I
                                                            ($total_i12fix + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i'] + $t7['total_i'] + $t8['total_i'] + $t9['total_i'] + $t10['total_i'] + $t11['total_i']
                                                            ) +  
                                                            // S
                                                            ($total_s12fix + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s'] + $t7['total_s'] + $t8['total_s'] + $t9['total_s'] + $t10['total_s'] + $t11['total_s']
                                                            ); ?>
                                                        </td>
                                                        <td>
                                                        <?php if ($kompen_12 >= 32 AND $kompen_12 < 64) : ?>
                                                            SP 1
                                                        <?php elseif ($kompen_12 >= 64 AND $kompen_12 < 128) : ?>
                                                            SP 2
                                                        <?php elseif ($kompen_12 >= 128) :?>
                                                            SP 3
                                                        <?php else: ?>
                                                            Aman
                                                        <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; ?>

                                                    <?php else: ?>
                                                        <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>Aman</td>
                                                    <?php endif; ?>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Minggu 13 -->
                            <div class="card shadow mb-3">
                                <!-- Card Header - Accordion -->
                                <a href="#card-13" class="d-block card-header py-13" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-13">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi Minggu Ke-13</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-13">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" valign="center">Nama</th><th rowspan="2" valign="center">NIM</th><th colspan="3" style="text-align: center;">Senin</th><th colspan="3" style="text-align: center;">Selasa</th><th colspan="3" style="text-align: center;">Rabu</th><th colspan="3" style="text-align: center;">Kamis</th><th colspan="3" style="text-align: center;">Jumat</th><th colspan="3" style="text-align: center;">Jumlah Minggu Ini</th><th colspan="3" style="text-align: center;">Jumlah Minggu Lalu</th><th colspan="3" style="text-align: center;">Total</th><th rowspan="2">Kompensasi</th><th rowspan="2">Keterangan</th>
                                                </tr>
                                                <tr class="ais">
                                                    <th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE kelas = '$kelas'"); ?>
                                                <?php foreach ($mahasiswa as $mhs) : ?>
                                                <tr>
                                                    <td><?= $mhs['nama']; ?></td>
                                                    <td><?= $mhs['nim']; ?></td>
                                                    <?php $nim = $mhs['nim']; ?>
                                                    <?php $cek13 = mysqli_query($conn, "SELECT * FROM absensi WHERE nim = $nim AND minggu_ke = 13"); ?>

                                                    <?php if (mysqli_num_rows($cek13) > 0) : ?>

                                                    <?php foreach ($cek13 as $key13) : ?>
                                                        <td><?= $key13['senin_a']; ?></td>
                                                        <td><?= $key13['senin_i']; ?></td>
                                                        <td><?= $key13['senin_s']; ?></td>
                                                        <td><?= $key13['selasa_a']; ?></td>
                                                        <td><?= $key13['selasa_i']; ?></td>
                                                        <td><?= $key13['selasa_s']; ?></td>
                                                        <td><?= $key13['rabu_a']; ?></td>
                                                        <td><?= $key13['rabu_i']; ?></td>
                                                        <td><?= $key13['rabu_s']; ?></td>
                                                        <td><?= $key13['kamis_a']; ?></td>
                                                        <td><?= $key13['kamis_i']; ?></td>
                                                        <td><?= $key13['kamis_s']; ?></td>
                                                        <td><?= $key13['jumat_a']; ?></td>
                                                        <td><?= $key13['jumat_i']; ?></td>
                                                        <td><?= $key13['jumat_s']; ?></td>
                                                        <?php error_reporting(0); ?>

                                                        <td><?= $total_a13 += $key13['senin_a'] + $key13['selasa_a'] + $key13['rabu_a'] + $key13['kamis_a'] + $key13['kamis_a'] + $key13['jumat_a']; ?></td>
                                                        <td><?= $total_i13 += $key13['senin_i'] + $key13['selasa_i'] + $key13['rabu_i'] + $key13['kamis_i'] + $key13['kamis_i'] + $key13['jumat_i']; ?></td>
                                                        <td><?= $total_s13 += $key13['senin_s'] + $key13['selasa_s'] + $key13['rabu_s'] + $key13['kamis_s'] + $key13['kamis_s'] + $key13['jumat_s']; ?></td>

                                                        <?php $minggu12 = mysqli_query($conn, "SELECT (senin_a + selasa_a + rabu_a + kamis_a + jumat_a) as total_a, (senin_i + selasa_i + rabu_i + kamis_i + jumat_i) as total_i, (senin_s + selasa_s + rabu_s + kamis_s + jumat_s) as total_s FROM absensi WHERE nim = $nim AND minggu_ke = 12"); ?>

                                                        <?php foreach ($minggu12 as $t12) : ?>
                                                            <td><?= $t12['total_a']; ?></td>
                                                            <td><?= $t12['total_i']; ?></td>
                                                            <td><?= $t12['total_s']; ?></td>
                                                        <?php endforeach; ?>

                                                        <td><?= $total_a13ini += $total_a13 + $t12['total_a']; ?></td>
                                                        <td><?= $total_i13ini += $total_i13 + $t12['total_i']; ?></td>
                                                        <td><?= $total_s13ini += $total_s13 + $t12['total_s']; ?></td>

                                                        <?php $total_a13fix += $total_a13 + $t1['total_a']; + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a'] + $t7['total_a'] + $t8['total_a'] + $t9['total_a'] + $t10['total_a'] + $t11['total_a'] + $t11['total_a'] + $t12['total_a']
                                                        ; ?>
                                                        <?php $total_i13fix += $total_i13 + $t1['total_i']; + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i'] + $t7['total_i'] + $t8['total_i'] + $t9['total_i'] + $t10['total_i'] + $t11['total_i'] + $t12['total_i']
                                                        ; ?>
                                                        <?php $total_i13fix += $total_s13 + $t1['total_s']; + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s'] + $t7['total_s'] + $t8['total_s'] + $t9['total_s'] + $t10['total_s'] + $t11['total_s'] + $t12['total_s']
                                                        ; ?>

                                                        <td><?= $kompen_13 = (
                                                            // A
                                                            ($total_a13fix + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a'] + $t7['total_a'] + $t8['total_a'] + $t9['total_a'] + $t10['total_a'] + $t11['total_a'] + $t12['total_a']
                                                            ) * 3) + 
                                                            // I
                                                            ($total_i13fix + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i'] + $t7['total_i'] + $t8['total_i'] + $t9['total_i'] + $t10['total_i'] + $t11['total_i'] + $t12['total_i']
                                                            ) +  
                                                            // S
                                                            ($total_s13fix + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s'] + $t7['total_s'] + $t8['total_s'] + $t9['total_s'] + $t10['total_s'] + $t11['total_s'] + $t12['total_s']
                                                            ); ?>
                                                        </td>
                                                        <td>
                                                        <?php if ($kompen_13 >= 32 AND $kompen_13 < 64) : ?>
                                                            SP 1
                                                        <?php elseif ($kompen_13 >= 64 AND $kompen_13 < 128) : ?>
                                                            SP 2
                                                        <?php elseif ($kompen_13 >= 128) :?>
                                                            SP 3
                                                        <?php else: ?>
                                                            Aman
                                                        <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; ?>

                                                    <?php else: ?>
                                                        <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>Aman</td>
                                                    <?php endif; ?>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Minggu 14 -->
                            <div class="card shadow mb-3">
                                <!-- Card Header - Accordion -->
                                <a href="#card-14" class="d-block card-header py-14" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-14">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi Minggu Ke-14</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-14">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" valign="center">Nama</th><th rowspan="2" valign="center">NIM</th><th colspan="3" style="text-align: center;">Senin</th><th colspan="3" style="text-align: center;">Selasa</th><th colspan="3" style="text-align: center;">Rabu</th><th colspan="3" style="text-align: center;">Kamis</th><th colspan="3" style="text-align: center;">Jumat</th><th colspan="3" style="text-align: center;">Jumlah Minggu Ini</th><th colspan="3" style="text-align: center;">Jumlah Minggu Lalu</th><th colspan="3" style="text-align: center;">Total</th><th rowspan="2">Kompensasi</th><th rowspan="2">Keterangan</th>
                                                </tr>
                                                <tr class="ais">
                                                    <th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE kelas = '$kelas'"); ?>
                                                <?php foreach ($mahasiswa as $mhs) : ?>
                                                <tr>
                                                    <td><?= $mhs['nama']; ?></td>
                                                    <td><?= $mhs['nim']; ?></td>
                                                    <?php $nim = $mhs['nim']; ?>
                                                    <?php $cek14 = mysqli_query($conn, "SELECT * FROM absensi WHERE nim = $nim AND minggu_ke = 14"); ?>

                                                    <?php if (mysqli_num_rows($cek14) > 0) : ?>

                                                    <?php foreach ($cek14 as $key14) : ?>
                                                        <td><?= $key14['senin_a']; ?></td>
                                                        <td><?= $key14['senin_i']; ?></td>
                                                        <td><?= $key14['senin_s']; ?></td>
                                                        <td><?= $key14['selasa_a']; ?></td>
                                                        <td><?= $key14['selasa_i']; ?></td>
                                                        <td><?= $key14['selasa_s']; ?></td>
                                                        <td><?= $key14['rabu_a']; ?></td>
                                                        <td><?= $key14['rabu_i']; ?></td>
                                                        <td><?= $key14['rabu_s']; ?></td>
                                                        <td><?= $key14['kamis_a']; ?></td>
                                                        <td><?= $key14['kamis_i']; ?></td>
                                                        <td><?= $key14['kamis_s']; ?></td>
                                                        <td><?= $key14['jumat_a']; ?></td>
                                                        <td><?= $key14['jumat_i']; ?></td>
                                                        <td><?= $key14['jumat_s']; ?></td>
                                                        <?php error_reporting(0); ?>

                                                        <td><?= $total_a14 += $key14['senin_a'] + $key14['selasa_a'] + $key14['rabu_a'] + $key14['kamis_a'] + $key14['kamis_a'] + $key14['jumat_a']; ?></td>
                                                        <td><?= $total_i14 += $key14['senin_i'] + $key14['selasa_i'] + $key14['rabu_i'] + $key14['kamis_i'] + $key14['kamis_i'] + $key14['jumat_i']; ?></td>
                                                        <td><?= $total_s14 += $key14['senin_s'] + $key14['selasa_s'] + $key14['rabu_s'] + $key14['kamis_s'] + $key14['kamis_s'] + $key14['jumat_s']; ?></td>

                                                        <?php $minggu13 = mysqli_query($conn, "SELECT (senin_a + selasa_a + rabu_a + kamis_a + jumat_a) as total_a, (senin_i + selasa_i + rabu_i + kamis_i + jumat_i) as total_i, (senin_s + selasa_s + rabu_s + kamis_s + jumat_s) as total_s FROM absensi WHERE nim = $nim AND minggu_ke = 13"); ?>

                                                        <?php foreach ($minggu13 as $t13) : ?>
                                                            <td><?= $t13['total_a']; ?></td>
                                                            <td><?= $t13['total_i']; ?></td>
                                                            <td><?= $t13['total_s']; ?></td>
                                                        <?php endforeach; ?>

                                                        <td><?= $total_a14ini += $total_a14 + $t13['total_a']; ?></td>
                                                        <td><?= $total_i14ini += $total_i14 + $t13['total_i']; ?></td>
                                                        <td><?= $total_s14ini += $total_s14 + $t13['total_s']; ?></td>

                                                        <?php $total_a14fix += $total_a14 + $t1['total_a']; + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a'] + $t7['total_a'] + $t8['total_a'] + $t9['total_a'] + $t10['total_a'] + $t11['total_a'] + $t11['total_a'] + $t12['total_a'] + $t13['total_a']
                                                        ; ?>
                                                        <?php $total_i14fix += $total_i14 + $t1['total_i']; + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i'] + $t7['total_i'] + $t8['total_i'] + $t9['total_i'] + $t10['total_i'] + $t11['total_i'] + $t12['total_i'] + $t13['total_i']
                                                        ; ?>
                                                        <?php $total_i14fix += $total_s14 + $t1['total_s']; + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s'] + $t7['total_s'] + $t8['total_s'] + $t9['total_s'] + $t10['total_s'] + $t11['total_s'] + $t12['total_s'] + $t13['total_s']
                                                        ; ?>

                                                        <td><?= $kompen_14 = (
                                                            // A
                                                            ($total_a14fix + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a'] + $t7['total_a'] + $t8['total_a'] + $t9['total_a'] + $t10['total_a'] + $t11['total_a'] + $t12['total_a'] + $t13['total_a']
                                                            ) * 3) + 
                                                            // I
                                                            ($total_i14fix + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i'] + $t7['total_i'] + $t8['total_i'] + $t9['total_i'] + $t10['total_i'] + $t11['total_i'] + $t12['total_i'] + $t13['total_i']
                                                            ) +  
                                                            // S
                                                            ($total_s14fix + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s'] + $t7['total_s'] + $t8['total_s'] + $t9['total_s'] + $t10['total_s'] + $t11['total_s'] + $t12['total_s'] + $t13['total_s']
                                                            ); ?>
                                                        </td>
                                                        <td>
                                                        <?php if ($kompen_14 >= 32 AND $kompen_14 < 64) : ?>
                                                            SP 1
                                                        <?php elseif ($kompen_14 >= 64 AND $kompen_14 < 128) : ?>
                                                            SP 2
                                                        <?php elseif ($kompen_14 >= 128) :?>
                                                            SP 3
                                                        <?php else: ?>
                                                            Aman
                                                        <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; ?>

                                                    <?php else: ?>
                                                        <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>Aman</td>
                                                    <?php endif; ?>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Minggu 15 -->
                            <div class="card shadow mb-3">
                                <!-- Card Header - Accordion -->
                                <a href="#card-15" class="d-block card-header py-15" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-15">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi Minggu Ke-15</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-15">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" valign="center">Nama</th><th rowspan="2" valign="center">NIM</th><th colspan="3" style="text-align: center;">Senin</th><th colspan="3" style="text-align: center;">Selasa</th><th colspan="3" style="text-align: center;">Rabu</th><th colspan="3" style="text-align: center;">Kamis</th><th colspan="3" style="text-align: center;">Jumat</th><th colspan="3" style="text-align: center;">Jumlah Minggu Ini</th><th colspan="3" style="text-align: center;">Jumlah Minggu Lalu</th><th colspan="3" style="text-align: center;">Total</th><th rowspan="2">Kompensasi</th><th rowspan="2">Keterangan</th>
                                                </tr>
                                                <tr class="ais">
                                                    <th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE kelas = '$kelas'"); ?>
                                                <?php foreach ($mahasiswa as $mhs) : ?>
                                                <tr>
                                                    <td><?= $mhs['nama']; ?></td>
                                                    <td><?= $mhs['nim']; ?></td>
                                                    <?php $nim = $mhs['nim']; ?>
                                                    <?php $cek15 = mysqli_query($conn, "SELECT * FROM absensi WHERE nim = $nim AND minggu_ke = 15"); ?>

                                                    <?php if (mysqli_num_rows($cek15) > 0) : ?>

                                                    <?php foreach ($cek15 as $key15) : ?>
                                                        <td><?= $key15['senin_a']; ?></td>
                                                        <td><?= $key15['senin_i']; ?></td>
                                                        <td><?= $key15['senin_s']; ?></td>
                                                        <td><?= $key15['selasa_a']; ?></td>
                                                        <td><?= $key15['selasa_i']; ?></td>
                                                        <td><?= $key15['selasa_s']; ?></td>
                                                        <td><?= $key15['rabu_a']; ?></td>
                                                        <td><?= $key15['rabu_i']; ?></td>
                                                        <td><?= $key15['rabu_s']; ?></td>
                                                        <td><?= $key15['kamis_a']; ?></td>
                                                        <td><?= $key15['kamis_i']; ?></td>
                                                        <td><?= $key15['kamis_s']; ?></td>
                                                        <td><?= $key15['jumat_a']; ?></td>
                                                        <td><?= $key15['jumat_i']; ?></td>
                                                        <td><?= $key15['jumat_s']; ?></td>
                                                        <?php error_reporting(0); ?>

                                                        <td><?= $total_a15 += $key15['senin_a'] + $key15['selasa_a'] + $key15['rabu_a'] + $key15['kamis_a'] + $key15['kamis_a'] + $key15['jumat_a']; ?></td>
                                                        <td><?= $total_i15 += $key15['senin_i'] + $key15['selasa_i'] + $key15['rabu_i'] + $key15['kamis_i'] + $key15['kamis_i'] + $key15['jumat_i']; ?></td>
                                                        <td><?= $total_s15 += $key15['senin_s'] + $key15['selasa_s'] + $key15['rabu_s'] + $key15['kamis_s'] + $key15['kamis_s'] + $key15['jumat_s']; ?></td>

                                                        <?php $minggu14 = mysqli_query($conn, "SELECT (senin_a + selasa_a + rabu_a + kamis_a + jumat_a) as total_a, (senin_i + selasa_i + rabu_i + kamis_i + jumat_i) as total_i, (senin_s + selasa_s + rabu_s + kamis_s + jumat_s) as total_s FROM absensi WHERE nim = $nim AND minggu_ke = 14"); ?>

                                                        <?php foreach ($minggu14 as $t14) : ?>
                                                            <td><?= $t14['total_a']; ?></td>
                                                            <td><?= $t14['total_i']; ?></td>
                                                            <td><?= $t14['total_s']; ?></td>
                                                        <?php endforeach; ?>

                                                        <td><?= $total_a15ini += $total_a15 + $t14['total_a']; ?></td>
                                                        <td><?= $total_i15ini += $total_i15 + $t14['total_i']; ?></td>
                                                        <td><?= $total_s15ini += $total_s15 + $t14['total_s']; ?></td>

                                                        <?php $total_a15fix += $total_a15 + $t1['total_a']; + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a'] + $t7['total_a'] + $t8['total_a'] + $t9['total_a'] + $t10['total_a'] + $t11['total_a'] + $t11['total_a'] + $t12['total_a'] + $t13['total_a'] + $t14['total_a']
                                                        ; ?>
                                                        <?php $total_i15fix += $total_i15 + $t1['total_i']; + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i'] + $t7['total_i'] + $t8['total_i'] + $t9['total_i'] + $t10['total_i'] + $t11['total_i'] + $t12['total_i'] + $t13['total_i'] + $t14['total_i']
                                                        ; ?>
                                                        <?php $total_i15fix += $total_s15 + $t1['total_s']; + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s'] + $t7['total_s'] + $t8['total_s'] + $t9['total_s'] + $t10['total_s'] + $t11['total_s'] + $t12['total_s'] + $t13['total_s'] + $t14['total_s']
                                                        ; ?>

                                                        <td><?= $kompen_15 = (
                                                            // A
                                                            ($total_a15fix + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a'] + $t7['total_a'] + $t8['total_a'] + $t9['total_a'] + $t10['total_a'] + $t11['total_a'] + $t12['total_a'] + $t13['total_a'] + $t14['total_a'] 
                                                            ) * 3) + 
                                                            // I
                                                            ($total_i15fix + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i'] + $t7['total_i'] + $t8['total_i'] + $t9['total_i'] + $t10['total_i'] + $t11['total_i'] + $t12['total_i'] + $t13['total_i'] + $t14['total_i']
                                                            ) +  
                                                            // S
                                                            ($total_s15fix + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s'] + $t7['total_s'] + $t8['total_s'] + $t9['total_s'] + $t10['total_s'] + $t11['total_s'] + $t12['total_s'] + $t13['total_s'] + $t14['total_s']
                                                            ); ?>
                                                        </td>
                                                        <td>
                                                        <?php if ($kompen_15 >= 32 AND $kompen_15 < 64) : ?>
                                                            SP 1
                                                        <?php elseif ($kompen_15 >= 64 AND $kompen_15 < 128) : ?>
                                                            SP 2
                                                        <?php elseif ($kompen_15 >= 128) :?>
                                                            SP 3
                                                        <?php else: ?>
                                                            Aman
                                                        <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; ?>

                                                    <?php else: ?>
                                                        <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>Aman</td>
                                                    <?php endif; ?>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Minggu 16 -->
                            <div class="card shadow mb-3">
                                <!-- Card Header - Accordion -->
                                <a href="#card-16" class="d-block card-header py-16" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-16">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi Minggu Ke-16</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-16">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" valign="center">Nama</th><th rowspan="2" valign="center">NIM</th><th colspan="3" style="text-align: center;">Senin</th><th colspan="3" style="text-align: center;">Selasa</th><th colspan="3" style="text-align: center;">Rabu</th><th colspan="3" style="text-align: center;">Kamis</th><th colspan="3" style="text-align: center;">Jumat</th><th colspan="3" style="text-align: center;">Jumlah Minggu Ini</th><th colspan="3" style="text-align: center;">Jumlah Minggu Lalu</th><th colspan="3" style="text-align: center;">Total</th><th rowspan="2">Kompensasi</th><th rowspan="2">Keterangan</th>
                                                </tr>
                                                <tr class="ais">
                                                    <th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th><th>A</th><th>I</th><th>S</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE kelas = '$kelas'"); ?>
                                                <?php foreach ($mahasiswa as $mhs) : ?>
                                                <tr>
                                                    <td><?= $mhs['nama']; ?></td>
                                                    <td><?= $mhs['nim']; ?></td>
                                                    <?php $nim = $mhs['nim']; ?>
                                                    <?php $cek16 = mysqli_query($conn, "SELECT * FROM absensi WHERE nim = $nim AND minggu_ke = 16"); ?>

                                                    <?php if (mysqli_num_rows($cek16) > 0) : ?>

                                                    <?php foreach ($cek16 as $key16) : ?>
                                                        <td><?= $key16['senin_a']; ?></td>
                                                        <td><?= $key16['senin_i']; ?></td>
                                                        <td><?= $key16['senin_s']; ?></td>
                                                        <td><?= $key16['selasa_a']; ?></td>
                                                        <td><?= $key16['selasa_i']; ?></td>
                                                        <td><?= $key16['selasa_s']; ?></td>
                                                        <td><?= $key16['rabu_a']; ?></td>
                                                        <td><?= $key16['rabu_i']; ?></td>
                                                        <td><?= $key16['rabu_s']; ?></td>
                                                        <td><?= $key16['kamis_a']; ?></td>
                                                        <td><?= $key16['kamis_i']; ?></td>
                                                        <td><?= $key16['kamis_s']; ?></td>
                                                        <td><?= $key16['jumat_a']; ?></td>
                                                        <td><?= $key16['jumat_i']; ?></td>
                                                        <td><?= $key16['jumat_s']; ?></td>
                                                        <?php error_reporting(0); ?>

                                                        <td><?= $total_a16 += $key16['senin_a'] + $key16['selasa_a'] + $key16['rabu_a'] + $key16['kamis_a'] + $key16['kamis_a'] + $key16['jumat_a']; ?></td>
                                                        <td><?= $total_i16 += $key16['senin_i'] + $key16['selasa_i'] + $key16['rabu_i'] + $key16['kamis_i'] + $key16['kamis_i'] + $key16['jumat_i']; ?></td>
                                                        <td><?= $total_s16 += $key16['senin_s'] + $key16['selasa_s'] + $key16['rabu_s'] + $key16['kamis_s'] + $key16['jumat_s']; ?></td>

                                                        <?php $minggu15 = mysqli_query($conn, "SELECT (senin_a + selasa_a + rabu_a + kamis_a + jumat_a) as total_a, (senin_i + selasa_i + rabu_i + kamis_i + jumat_i) as total_i, (senin_s + selasa_s + rabu_s + kamis_s + jumat_s) as total_s FROM absensi WHERE nim = $nim AND minggu_ke = 15"); ?>

                                                        <?php foreach ($minggu15 as $t15) : ?>
                                                            <td><?= $t15['total_a']; ?></td>
                                                            <td><?= $t15['total_i']; ?></td>
                                                            <td><?= $t15['total_s']; ?></td>
                                                        <?php endforeach; ?>

                                                        <td><?= $total_a16ini += $total_a16 + $t15['total_a']; ?></td>
                                                        <td><?= $total_i16ini += $total_i16 + $t15['total_i']; ?></td>
                                                        <td><?= $total_s16ini += $total_s16 + $t15['total_s']; ?></td>

                                                        <?php $total_a16fix += $total_a16 + $t1['total_a']; + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a'] + $t7['total_a'] + $t8['total_a'] + $t9['total_a'] + $t10['total_a'] + $t11['total_a'] + $t11['total_a'] + $t12['total_a'] + $t13['total_a'] + $t14['total_a'] + $t15['total_a']
                                                        ; ?>
                                                        <?php $total_i16fix += $total_i16 + $t1['total_i']; + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i'] + $t7['total_i'] + $t8['total_i'] + $t9['total_i'] + $t10['total_i'] + $t11['total_i'] + $t12['total_i'] + $t13['total_i'] + $t14['total_i'] + $t15['total_i']
                                                        ; ?>
                                                        <?php $total_i16fix += $total_s16 + $t1['total_s']; + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s'] + $t7['total_s'] + $t8['total_s'] + $t9['total_s'] + $t10['total_s'] + $t11['total_s'] + $t12['total_s'] + $t13['total_s'] + $t14['total_s'] + $t15['total_s']
                                                        ; ?>

                                                        <td><?= $kompen_16 = (
                                                            // A
                                                            ($total_a16fix + $t2['total_a'] + $t3['total_a'] + $t4['total_a'] + $t5['total_a'] + $t6['total_a'] + $t7['total_a'] + $t8['total_a'] + $t9['total_a'] + $t10['total_a'] + $t11['total_a'] + $t12['total_a'] + $t13['total_a'] + $t14['total_a'] + $t15['total_a'] 
                                                            ) * 3) + 
                                                            // I
                                                            ($total_i16fix + $t2['total_i'] + $t3['total_i'] + $t4['total_i'] + $t5['total_i'] + $t6['total_i'] + $t7['total_i'] + $t8['total_i'] + $t9['total_i'] + $t10['total_i'] + $t11['total_i'] + $t12['total_i'] + $t13['total_i'] + $t14['total_i'] + $t15['total_i'] 
                                                            ) +  
                                                            // S
                                                            ($total_s16fix + $t2['total_s'] + $t3['total_s'] + $t4['total_s'] + $t5['total_s'] + $t6['total_s'] + $t7['total_s'] + $t8['total_s'] + $t9['total_s'] + $t10['total_s'] + $t11['total_s'] + $t12['total_s'] + $t13['total_s'] + $t14['total_s'] + $t15['total_s'] 
                                                            ); ?>
                                                        </td>
                                                        <td>
                                                        <?php if ($kompen_16 >= 32 AND $kompen_16 < 64) : ?>
                                                            SP 1
                                                        <?php elseif ($kompen_16 >= 64 AND $kompen_16 < 128) : ?>
                                                            SP 2
                                                        <?php elseif ($kompen_16 >= 128) :?>
                                                            SP 3
                                                        <?php else: ?>
                                                            Aman
                                                        <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; ?>

                                                    <?php else: ?>
                                                        <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>Aman</td>
                                                    <?php endif; ?>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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