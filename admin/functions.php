<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "konseling");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    };
    return $rows;
};

function add_super_user($data) {
    global $conn;

    // htmlspecialchars berfungsi untuk tidak menjalankan script
    $username = htmlspecialchars($data["username"]);
    $password_sebelum = mysqli_real_escape_string($conn, $data["password"]);
    $foto = upload_foto();
    $nama = htmlspecialchars($data["nama"]);
    $nip = htmlspecialchars($data["nip"]);
    $nohp = htmlspecialchars($data["nohp"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $ttl = htmlspecialchars($data["ttl"]);
    $nidn = htmlspecialchars($data["nidn"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email = htmlspecialchars($data["email"]);
    $jabatan_fungsional = htmlspecialchars($data["jabatan_fungsional"]);
    $jabatan_struktural = htmlspecialchars($data["jabatan_struktural"]);
    
    
    // cek username sudah ada atau belum

    $cekusername = "SELECT * FROM super_user where username = '$username'";
    $prosescek= mysqli_query($conn, $cekusername);

    if (mysqli_num_rows($prosescek)>0) { 
        echo "<script>alert('Username Sudah Pernah Digunakan!');history.go(-1) </script>";
        exit;
    }

    // enkripsi password
    $password = password_hash($password_sebelum, PASSWORD_DEFAULT);

        // tambahkan ke database
        // NULL digunakan karena jika dikosongkan maka akan terjadi error di database yang sudah online
        // sedangkan jika masih di localhost, bisa memakai ''
    mysqli_query($conn, "INSERT INTO super_user VALUES('', '$username', '$password', '$nama', '$nip', '$nohp', '$foto', '$jabatan', '$kelas', '$jenis_kelamin' ,'$ttl' ,'$nidn' ,'$jurusan' ,'$email' ,'$jabatan_fungsional' ,'$jabatan_struktural')");
    return mysqli_affected_rows($conn);
}

function add_mahasiswa($data) {
    global $conn;

    // htmlspecialchars berfungsi untuk tidak menjalankan script
    $username = htmlspecialchars($data["username"]);
    $password_sebelum = mysqli_real_escape_string($conn, $data["password"]);
    $foto = upload_foto();
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $nohp = htmlspecialchars($data["nohp"]);
    $kelas = htmlspecialchars($data["kelas"]);
    
    
    // cek nim sudah ada atau belum

    $ceknim = "SELECT * FROM mahasiswa where nim = '$nim'";
    $prosescek= mysqli_query($conn, $ceknim);

    if (mysqli_num_rows($prosescek)>0) { 
        echo "<script>alert('NIM Sudah Pernah Digunakan!');history.go(-1) </script>";
        exit;
    }

    // enkripsi password
    $password = password_hash($password_sebelum, PASSWORD_DEFAULT);

        // tambahkan ke database
        // NULL digunakan karena jika dikosongkan maka akan terjadi error di database yang sudah online
        // sedangkan jika masih di localhost, bisa memakai ''
    mysqli_query($conn, "INSERT INTO mahasiswa VALUES('$nim', '$username', '$password', '$nama', '$nohp', '$foto', '$kelas')");
    return mysqli_affected_rows($conn);
}


function upload_foto() {
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];


    $ekstensifoto = explode('.', $namaFile);
    $ekstensifoto = strtolower(end($ekstensifoto));

    // generate nama foto baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensifoto;
    move_uploaded_file($tmpName, '../foto/' . $namaFileBaru);

    return $namaFileBaru;
}
