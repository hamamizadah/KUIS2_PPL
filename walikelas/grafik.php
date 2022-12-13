<?php 
session_start();

if (!isset($_SESSION['wali'])) {
   echo "<script>
         window.location.replace('../session/login.php');
       </script>";
  exit;
}

require 'functions.php';


 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'link.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

                    <div class="card p-4 mx-5">
                        <center><h3>Grafik Konsultasi Mahasiswa</h3></center>
                        <canvas id="myChart"></canvas>
                    </div>
                    <br><br>
                    <div class="card p-4 mx-5">
                        <center><h3>Grafik Jumlah Topik Konsultasi</h3></center>
                        <canvas id="myChart2"></canvas>
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

    <?php $chat_b = mysqli_query($conn, "SELECT topik FROM chat WHERE topik != '' AND status = 'Belum Selesai'"); ?>
    <?php $chat_s = mysqli_query($conn, "SELECT topik FROM chat WHERE topik != '' AND status = 'Sudah Selesai'"); ?>
    <?php $chat_j = mysqli_query($conn, "SELECT topik FROM chat WHERE topik != ''"); ?>

    <?php $b = mysqli_num_rows($chat_b); ?>
    <?php $s = mysqli_num_rows($chat_s); ?>
    <?php $j = mysqli_num_rows($chat_j); ?>


    <script>
    
    const labels = [
        'Sedang Konsultasi',
        'Selesai'
      ];

      const data = {
        labels: labels,
        datasets: [{
          label: 'Mahasiswa',
          backgroundColor: ['rgb(0,181,226)', 'rgb(0,181,0)'],
          borderColor: 'grey',
          data: [<?= $b; ?>, 
          <?= $s; ?>],
        }]
      };

      const config = {
        type: 'doughnut',
        data: data,
        options: {
          plugins: {
            title: {
              display: true,
              text: 'Mahasiswa'
            }
          },
          scales:
          {
              y: {
                  grid: {
                      drawBorder: false, // <-- this removes y-axis line
                      lineWidth: 0.5,
                  }
              }
          }
        },
      };

      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
  </script>

  <script>
    
    const labels2 = [
        'Topik'
      ];

      const data2 = {
        labels: labels2,
        datasets: [{
          label: 'Jumlah',
          backgroundColor: 'rgb(0,181,226)',
          borderColor: 'grey',
          data: [<?= $j; ?>],
        }],
      };

      const config2 = {
        type: 'bar',
        data: data2,
        options: {
          plugins: {
            title: {
              display: true,
              text: 'Mahasiswa'
            }
          },
          scales:
          {
              y: {
                  grid: {
                      drawBorder: false, // <-- this removes y-axis line
                      lineWidth: 0.5,
                  }
              }
          }
        },
      };

      const myChart2 = new Chart(
        document.getElementById('myChart2'),
        config2
      );
  </script>
  
</body>

</html>