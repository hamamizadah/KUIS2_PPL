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
    mysqli_query($conn, "INSERT INTO super_user VALUES('', '$username', '$password', '$nama', '$nip', '$nohp', '$foto', '$jabatan')");
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
    
    
    // cek username sudah ada atau belum

    $cekusername = "SELECT * FROM mahasiswa where username = '$username'";
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
    mysqli_query($conn, "INSERT INTO mahasiswa VALUES('', '$username', '$password', '$nama', '$nim', '$nohp', '$foto')");
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


function add_chat($data) {
    global $conn;

    // htmlspecialchars berfungsi untuk tidak menjalankan script
    $id_pengirim = htmlspecialchars($data["id_pengirim"]);
    $id_penerima = htmlspecialchars($data["id_penerima"]);
    $topik = htmlspecialchars($data["topik"]);
    $isi = htmlspecialchars($data["isi"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $smester = htmlspecialchars($data["smester"]);
    $status = htmlspecialchars($data["status"]);
    $username = htmlspecialchars($data["username"]);
    

    mysqli_query($conn, "INSERT INTO chat VALUES('', '$id_pengirim', '$id_penerima', '$topik', '$isi', '$tanggal', '$smester', '$status', '$username')");
    return mysqli_affected_rows($conn);
}
