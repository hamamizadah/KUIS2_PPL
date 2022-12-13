<?php 
require 'functions.php';

function hapus_mahasiswa($nim) {
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim = $nim");

	return mysqli_affected_rows($conn);
}

$nim = $_GET["nim"];
if (hapus_mahasiswa($nim) > 0 ) {
	echo "
		<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'mahasiswa.php';
		</script>
	";
    } else {
	echo "
		<script>
			alert('Data gagal dihapus!');
			document.location.href = 'mahasiswa.php';
		</script>
	";
	}
 ?>