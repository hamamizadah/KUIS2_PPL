<?php 

if (isset($_POST['ubah_password'])) {
    
    function ubah_with_password($data) {
        global $conn;
        $id = $_GET["id"];
        $super_user = query("SELECT * FROM super_user WHERE id = $id")[0];
         
        $id = $_GET["id"];
        $username = $data["username"];
        $password_sebelum = mysqli_real_escape_string($conn, $data["password"]);
        $nama = $data["nama"];
        $nip = $data["nip"];
        $nohp = $data["nohp"];
        $kelas = $data["kelas"];
        $jenis_kelamin = $data["jenis_kelamin"];
        $ttl = $data["ttl"];
        $nidn = $data["nidn"];
        $jurusan = $data["jurusan"];
        $email = $data["email"];
        $jabatan_fungsional = $data["jabatan_fungsional"];
        $jabatan_struktural = $data["jabatan_struktural"];

        $jabatan = $data["jabatan"];
        
        // enkripsi password
        $password = password_hash($password_sebelum, PASSWORD_DEFAULT);

        $query = "UPDATE super_user SET 
                    username = '$username',
                    password = '$password',
                    nama = '$nama',
                    nip = '$nip',
                    nohp = '$nohp',
                    jabatan = '$jabatan',
                    kelas = '$kelas',
                    jenis_kelamin = '$jenis_kelamin',
                    ttl = '$ttl',
                    nidn = '$nidn',
                    jurusan = '$jurusan',
                    email = '$email',
                    jabatan_fungsional = '$jabatan_fungsional',
                    jabatan_struktural = '$jabatan_struktural'
                  WHERE id = $id
                ";
                
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

}

if (isset($_POST['ubah_gambar'])) {
    
    function ubah_with_gambar($data) {
        global $conn;
        $id = $_GET["id"];
        $super_user = query("SELECT * FROM super_user WHERE id = $id")[0];
         
        $id = $_GET["id"];
        $username = $data["username"];

        $nama = $data["nama"];
        $nip = $data["nip"];
        $nohp = $data["nohp"];
        $foto = upload_foto();
        $jabatan = $data["jabatan"];
        $kelas = $data["kelas"];
        $jenis_kelamin = $data["jenis_kelamin"];
        $ttl = $data["ttl"];
        $nidn = $data["nidn"];
        $jurusan = $data["jurusan"];
        $email = $data["email"];
        $jabatan_fungsional = $data["jabatan_fungsional"];
        $jabatan_struktural = $data["jabatan_struktural"];
        

        $query = "UPDATE super_user SET 
                    username = '$username',
                    nama = '$nama',
                    nip = '$nip',
                    nohp = '$nohp',
                    foto = '$foto',
                    jabatan = '$jabatan',
                    kelas = '$kelas',
                    jenis_kelamin = '$jenis_kelamin',
                    ttl = '$ttl',
                    nidn = '$nidn',
                    jurusan = '$jurusan',
                    email = '$email',
                    jabatan_fungsional = '$jabatan_fungsional',
                    jabatan_struktural = '$jabatan_struktural'
                  WHERE id = $id
                ";
                
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

}

if (!isset($_POST['ubah_password'], $_POST['ubah_gambar'])) {
    
    function ubah_without_both($data) {
        global $conn;
        $id = $_GET["id"];
        $super_user = query("SELECT * FROM super_user WHERE id = $id")[0];
         
        $id = $_GET["id"];
        $username = $data["username"];

        $nama = $data["nama"];
        $nip = $data["nip"];
        $nohp = $data["nohp"];

        $jabatan = $data["jabatan"];
        $kelas = $data["kelas"];
        $jenis_kelamin = $data["jenis_kelamin"];
        $ttl = $data["ttl"];
        $nidn = $data["nidn"];
        $jurusan = $data["jurusan"];
        $email = $data["email"];
        $jabatan_fungsional = $data["jabatan_fungsional"];
        $jabatan_struktural = $data["jabatan_struktural"];
    

        $query = "UPDATE super_user SET 
                    username = '$username',
                    nama = '$nama',
                    nip = '$nip',
                    nohp = '$nohp',
                    jabatan = '$jabatan',
                    kelas = '$kelas',
                    jenis_kelamin = '$jenis_kelamin',
                    ttl = '$ttl',
                    nidn = '$nidn',
                    jurusan = '$jurusan',
                    email = '$email',
                    jabatan_fungsional = '$jabatan_fungsional',
                    jabatan_struktural = '$jabatan_struktural'
                  WHERE id = $id
                ";
                
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

}