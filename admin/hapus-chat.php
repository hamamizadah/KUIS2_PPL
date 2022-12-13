<?php 
require 'functions.php';

function hapus_chat() {
	global $conn;
	mysqli_query($conn, "DELETE FROM chat");

	return mysqli_affected_rows($conn);
}

if (hapus_chat() > 0 ) {
	echo "
		<script>
			alert('Data berhasil dihapus!');
			document.location.href = '../chat.php';
		</script>
	";
    } else {
	echo "
		<script>
			alert('Data gagal dihapus!');
			document.location.href = '../chat.php';
		</script>
	";
	}
 ?>