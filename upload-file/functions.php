<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// pengambilan data
function query ($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// tambah data
function tambah ($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    
    // upload gambar
    $gambar = upload();
    if(!$gambar) {
        return false;
    }

    $query = "INSERT INTO mahasiswa VALUES (
            '', '$nama', '$nrp', '$email', '$jurusan', '$gambar'
            )";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload () {
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    

    // cek gambar diupload atau tidak

    if($error === 4) {
        echo 
        '
            <script>
                alert("Silahkan Upload Gambar")
            </script>
        ';
        return false;
    }

    // cek ekstensi file

    $ekstensiGambar = explode('.', $namaFile); // seperti split() di js
    $ekstensiGambar = strtolower(end($ekstensiGambar)); // strtolower() = string to lowercase, end() = mengambil index terakhir array
    // if (!in_array($ekstensiGambar, $ekstensiValid)) {
    //     echo 
    //     '
    //         <script>
    //             alert("Hanya Gambar Yang Diperbolehkan")
    //         </script>
    //     ';
    //     return false;
    // }
    
    // cek ukuran

    if ($ukuranFile > 1000000) {
        echo 
        '
            <script>
                alert("Ukuran File Terlalu Besar")
            </script>
        ';
        return false;
    }

    // lolos pengecekan

    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, './img/'. $namaFileBaru);

    return $namaFileBaru;
}



// hapus data
function hapus ($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// ubah data
function ubah ($data) {
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    
    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nrp = '$nrp',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
            WHERE id = $id
            ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// mencari data
function cari ($keyword) {
    $query = "SELECT * FROM mahasiswa 
                WHERE
                nama LIKE '%$keyword%' OR 
                nrp LIKE '%$keyword%'
            ";
    return query($query);
}
?>