<?php 
require './../functions.php';

$users = query("SELECT * FROM users");


$submitted = false;
if(isset($_POST["submit"])) {

    // cek apakah data berhasil atau tidak
    if(tambah($_POST) > 0) {
        $submitted = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>SMKN 4 Malang</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="./style.css">
		<link rel="shortcut icon" href="./../../img/favicon.ico" type="image/x-icon">
	</head>
	<body>
		<nav id="nav" class="nav position-fixed">
			<ul class="cta-list">
				<li class="list-head mt-4">
					<img src="./../../img/logo-grafika.webp" width="100" alt="Logo Grafika">
					<p>SMKN 4 MALANG</p>
				</li>
				<div class="cta-item">
					<li class="list-item home">
						<i class="fa fa-home"></i>
						<p>Home</p>
					</li>
					<li class="list-item link">
						<i class="fa fa-link"></i>
						<p>Register Link</p>
					</li>
				</div>
			</ul>
			<div class="info">
				<div class="alamat">
					<i class="fa fa-map-location"></i>
					<p>Jl. Tanimbar No.22, Kasin, Kec. Klojen,Kota Malang</p>
				</div>
				<div class="telepon">
					<i class="fa fa-phone"></i>
					<p>(0341) 353798</p>
				</div>
				<div class="email">
					<i class="fa fa-envelope"></i>
					<p>mail@smkn4malang.sch.id</p>
				</div>
			</div>
		</nav>

		
		<div id="menu" class="fa fa-bars"></div>


		<section id="daftar" class="daftar">
			<div class="desc">
				<h3 class="mt-5">Daftar Kelas Industri</h3>
                <hr>
                <div class="desc-p">
                    <p>Kelas Industri merupakan program pengadaan kelas khusus dalam lingkungan sekolah. Kelas ini dikelola secara bersama antara sekolah dengan industri. Sekolah diberikan kebebasan untuk mencari rekanan dan bekerja sama dengan industri yang sesuai dengan kompetensi di yang ada di sekolah tersebut.
                        Di SMKN 4 Malang, Kelas industri ada 2, yakni Kelas Web dan Kelas Game.
                    </p>
                    <div class="cta-btn">
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSc90XeGge1Dw2Ll9wyhA-ASJJLwh3DeLnyJGwhaUcfyAhhJ7g/viewform?usp=share_link" target="_blank"><div class="btn btn-primary">Daftar Game</div></a>
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSe6hsaGgVtEQ9wgVzgSJ-aKeopv-m3Gx6ZUqeSzMcr3XQlsxA/viewform?usp=share_link" target="_blank"><div class="btn btn-primary">Daftar Web</div></a>
                    </div>

                    <h3 class="mt-5">Isi Jika Sudah Daftar</h3>
                    <div class="row mt-3">
            <form name="x-rpl-c-contact-message" method="post" action="">
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="nama" class="form-control" id="name" placeholder="Darren Watkins Jr." name="nama" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" name="email" required>
              </div>
              <button type="submit" id="submit" class="btn btn-primary" name="submit">Kirim</button>
        <p>
        <?php
        if($submitted == true) {
            echo "Submitted✅";
        } else if ($submitted == false && isset($_POST['submit'])){
            echo "Error❌";
        }
        ?>
            </form>
          </div>
                </div>
                <div class="container-data" id="cta">
        <table <?= @$style ?>>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>

            <?php $i = 1;?>
            <?php foreach($users as $row) :?>
            <tr>
                <td><?= $i?></td>
                <td><?= $row["nama"]?></td>
                <td><?= $row["email"]?></td>
            </tr>
            <?php $i++;?>
            <?php endforeach;?>
        </table>
    </div>
            </div>
		</section>
		

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/5ec06aaeff.js" crossorigin="anonymous"></script>
		<script src="./script.js"></script>
	</body>
</html>
