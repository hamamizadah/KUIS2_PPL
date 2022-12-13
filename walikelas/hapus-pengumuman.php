<?php 
require 'functions.php';

function hapus_pengumuman($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM pengumuman WHERE id = $id");

	return mysqli_affected_rows($conn);
}

$id = $_GET["id"];
if (hapus_pengumuman($id) > 0 ) {
	echo "
		<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'pengumuman.php';
		</script>
	";
    } else {
	echo "
		<script>
			alert('Data gagal dihapus!');
			document.location.href = 'pengumuman.php';
		</script>
	";
	}
 ?>