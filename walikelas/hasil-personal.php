<?php 

session_start();
// $ps = $_POST['ps'];
// $jm = $_POST['jm'];
// $jh = $_POST['jh'];
// $wp = $_POST['wp'];
// $tp = $_POST['tp'];
// $uk = $_POST['uk'];
// $nd = $_POST['nd'];
// $nip = $_POST['nip'];
// $nk = $_POST['nk'];



include 'functions.php';

$username = $_SESSION['username'];

$nim = $_POST['nim'];
$mhs = query("SELECT * FROM mahasiswa WHERE nim = '$nim'")[0];
$username_mhs = $mhs['username'];

$super_user = query("SELECT * FROM super_user WHERE username = '$username'")[0];
$id_wali = $super_user['id'];
$username_wali = $super_user['username'];

$chat = mysqli_query($conn, "SELECT * FROM chat WHERE (id_pengirim = '$nim' OR id_pengirim = '$id_wali') AND (id_penerima = '$nim' OR id_penerima = '$id_wali')");

$chat_topik = mysqli_query($conn, "SELECT * FROM chat WHERE (id_pengirim = '$nim' OR id_pengirim = '$id_wali') AND (id_penerima = '$nim' OR id_penerima = '$id_wali') GROUP BY topik");

$total_topik = mysqli_num_rows($chat_topik);



?>
 	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lembar Konseling</title>
	<style>
		td {
			text-align: center;
		}
	</style>
</head>
<body>
	<center>

		<table>

			<tr>
				<td align="center">

					<!-- tabel pertama -->
					<table border="1" cellspacing="0"  style="width: 940px;">
						<tr>
							<td>
								<table>
									<tr>
										<td>
											<img src="../img/logo.jpg" width="150px" height="130px" style="margin-left: 90px; margin-right: 10px;">
										</td>
										<td align="center" ><h4>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN, <br>
											RISET DAN TEKNOLOGI<br>
											POLITEKNIK NEGERI FAKFAK <br>
											Jalan TPA Imam Bonjol Atas, Air Merah, Desa Tanama. Kec. Pariwari, Kab. Fakfak<br>
											Telp./Fax 0956-24886, PO-BOX 120, Kode Pos : 98612 Prov. Papua Barat<br>
											Website : www.polinef.ac.id E-mail : <a href="info@polinef.id">info@polinef.id</a>
										</h4></td>
									</tr>
								</table>

							</td>
						</tr>
						<tr>
							<td align="center"><b>LEMBAR KONSULTASI</b></td>
						</tr>
					</table>
				</td>
			</tr>



			<!-- tabel kedua -->

			<tr>
				<td>
					<br>

					<table style="width: 940px;">

						<tr>
							<td style="font-size: 20px; text-align: justify;">
								Pada hari ini <?php  switch(date("l"))
    {
        case 'Monday':$nmh="Senin";break; 
        case 'Tuesday':$nmh="Selasa";break; 
        case 'Wednesday':$nmh="Rabu";break; 
        case 'Thursday':$nmh="Kamis";break; 
        case 'Friday':$nmh="Jum'at";break; 
        case 'Saturday':$nmh="Sabtu";break; 
        case 'Sunday':$nmh="minggu";break; 
    }
    echo $nmh;
      ?>, tanggal <?php echo date('d'); ?>, Bulan <?php echo date('m'); ?>, Tahun <?php echo date('Y'); ?> telah dilaksanakan Bimbingan Konseling untuk Mahasiswa Politeknik Negeri Fakfak, semester ……… Tahun Akademik ………./………dengan keterangan sebagai berikut :
							</td>
						</tr>


					</table>
				</td>
			</tr>


			<!-- tabel ketiga -->

			<tr>
				<td>
					<br>
					<table border="1" style="width: 940px;" cellspacing="0" cellpadding="5">
						<tr>
							<td>1</td>
							<td>Program Studi</td>
							<td>MI</td>
						</tr>
						<tr>
							<td>2</td>
							<td>NIM / Nama Mahasiswa</td>
							<td><?= $mhs['nim']; ?> / <?= $mhs['nama']; ?></td>
						</tr>
						<tr>
							<td>3</td>
							<td>Jumlah Konsultasi</td>
							<td><?= $total_topik; ?></td>
						</tr>
						<tr>
							<td>4</td>
							<td>Waktu Pelaksanaan</td>
							<td><?php echo date('d M Y'); ?></td>
						</tr>
						<tr>
							<td>5</td>
							<td>Tempat Pelaksanaan</td>
							<td>Online via Website</td>
						</tr>
						<tr >
							<td style="padding-bottom: 240px;">6</td>
							<td style="padding-bottom: 240px;">Uraian Kegiatan</td>
							<td style="padding-bottom: 240px;">
								<?php foreach ($chat as $key) : ?>
									<?= $key['topik']; ?>
								<?php endforeach; ?>
							</td>
						</tr>

						<!-- <tr>
							<td></td>
						</tr>
						<tr>
							<td</td>
						</tr>
						<tr>
							<td></td>
						</tr>
						<tr>
							<td></td>
						</tr> -->
					</table>

				</td>
			</tr>

			<!-- tabel keempat -->
			<tr>
				<td>
					<table  style="width: 940px;">
						<tr>
							<br><br>
							<td>Demikian berita acara ini dibuat sebagaimana mestinya:</td>
							<td></td>
						</tr>

						<tr>
							<td></td>
							<td style="padding-top: 60px;">Fakfak, <?php echo date('d m Y'); ?> </td>
						</tr>
						<tr>
							<td style="padding-top: 20px;">Disetujui :</td>
						</tr>

						<tr>
							<td style="padding-top: 20px;">Wali Kelas</td>
							<td style="padding-top: 20px;">Ketua Kelas</td>
						</tr>
						<tr>
							<td style="padding-top: 75px;"><?= $super_user['nama']; ?></td>
							<td style="padding-top: 75px;"></td>
						</tr>
						<tr>
							<td>NIP. <?= $super_user['nip']; ?></td>
							<td>NIM. </td>
						</tr>
						
					</table>
				</td>
			</tr>

			<!-- tabel utana -->

		</table>

	<!-- </center>
	<center> -->
		<tr>
							<td style="padding-top: 75px;"></td>
							
						</tr>


<!-- <h2></h2>
<h2>Daftar Hadir</h2>
<h2>Daftar Hadir</h2>
<h2>Daftar Hadir</h2>
<h2>Daftar Hadir</h2>
<h2>Daftar Hadir</h2>
<h2>Daftar Hadir</h2> -->
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
   <br>
  <br>
  <br>
  <br>
  <br>
  <br>
   <br>
  <br>
  <br>
  <br>
  <br>
  <br>
   <br>
  <br>
  <br>
  <br>
  <br>
  <br>
		<!-- <h2>Daftar Hadir</h2>
		<h2>Bimbingan / Konseling</h2>

		<table border="1" cellspacing="0" cellpadding="0">
			<tr>
				<td style="padding: 0 10px 0 10px;">No</td>
				<td style="padding: 0 100px 0 100px;">Nama Mahasiswa</td>
				<td style="padding: 0 60px 0 60px;">NIM</td>
				<td style="padding: 0 80px 0 80px;">TTD</td>
				<td style="padding: 0 60px 0 60px;">Ket.</td>
			</tr>
			<?php $chat = mysqli_query($conn, "SELECT * FROM chat WHERE (id_pengirim = '$nim' OR id_pengirim = '$id_wali') AND (id_penerima = '$nim' OR id_penerima = '$id_wali')"); ?>
			<?php $i=1; ?>
			<?php foreach ($chat as $g) : ?>
				<?php $nim = $g['id_penerima']; ?>
				<?php $mhs = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = $nim"); ?>
				<?php foreach ($mhs as $m) : ?>
			<tr>
				<td><?= $i; ?></td>
				<td><?= $m['nama']; ?></td>
				<td><?= $m['nim']; ?></td>
				<td><input type="checkbox" checked></td>
				<td></td>
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>
		<?php endforeach; ?>
 -->
		</table>


		<!-- <table>

			<tr>
				<td style="padding-left: 300pt"></td>
				<td style="padding-top: 100px;">Fakfak, <?php echo date('d M Y'); ?> </td>
			</tr>

			<tr>
				<td ></td>
				<td style="padding-top: 20px;">Ketua Kelas</td>
			</tr>
			<tr>
				<td></td>
				<td style="padding-top: 50px;"><b>. . . . . . . . . . . . . . . . </b></td>
			</tr>
			<tr>
				<td></td>
				<td>NIM</td>
			</tr>

		</table> -->
	</center>
	
	<script type="text/javascript">
        window.print();
    </script>

</body>
</html>