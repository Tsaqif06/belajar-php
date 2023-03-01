<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "projekkelasindustri");

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
    $email = htmlspecialchars($data["email"]);

    $query = "INSERT INTO users VALUES (
            '', '$nama', '$email')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

?>