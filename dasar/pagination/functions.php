<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// pengambilan data / objek diubah menjadi array
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
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
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
    $cari = "SELECT * FROM mahasiswa 
                WHERE
                nama LIKE '%$keyword%' OR 
                nrp LIKE '%$keyword%'
            ";
    $jumlahDataPerHalaman = 3;
    $jumlahData = count(query($cari));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
    $query = "$cari" . "LIMIT $awalData, $jumlahDataPerHalaman";

    return query($query);
}

// register
function register ($data) {
    global $conn;
    $username = strtolower(stripslashes($data["username"])); // stripslashes() untuk mencegah user input \ , strtolow = to lowercase
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('Username sudah terdaftar!');
            </script>
        ";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "
            <script>
                alert('Konfirmasi password tidak sesuai');
            </script>
        ";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO users VALUES(
        '',
        '$username',
        '$password'
    )");
    return mysqli_affected_rows($conn);
}
?>