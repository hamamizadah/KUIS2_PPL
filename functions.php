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


function add_chat_grupp($data) {
    global $conn;

    // htmlspecialchars berfungsi untuk tidak menjalankan script
    $kelas = htmlspecialchars($data["kelas"]);
    $id_penerima = htmlspecialchars($data["id_penerima"]);
    $isi = htmlspecialchars($data["isi"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $status = htmlspecialchars($data["status"]);
    $username = htmlspecialchars($data["username"]);
    

    mysqli_query($conn, "INSERT INTO chat_grup VALUES('', '$kelas', '$id_penerima', NULL, '$isi', '$tanggal', 0, '$status', '$username')");
    return mysqli_affected_rows($conn);
}
