<?php 
require './../functions.php';
$search = $_GET["search"];
$query = "SELECT * FROM mahasiswa WHERE
            nama LIKE '%$search%' OR
            nrp LIKE '%$search%'";
$mahasiswa = query($query);
if ($mahasiswa == false) {
    $notFound = true;
    $style = "style='visibility: hidden'";
} else {
    unset($notFound);
    $style = "style='visibility: visible'";
}
?>


<?php if (isset($notFound)) :?>
    <?= 
        "<p>Data Tidak Ditemukan</p>"    
    ?>
<?php endif;?>
<table <?= @$style ?>>
    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>

    <?php $i = 1;?>
    <?php foreach($mahasiswa as $row) :?>
    <tr>
        <td><?= $i?></td>
        <td>
            <a href="./ubah.php?id=<?= $row["id"]?>">ubah</a> |
            <a href="./hapus.php?id=<?= $row["id"]?>" onclick="return confirm('Yakin?');">hapus</a>
        </td>
        <td><img src="./img/<?= $row["gambar"]?>" width="65"></td>
        <td><?= $row["nrp"]?></td>
        <td><?= $row["nama"]?></td>
        <td><?= $row["email"]?></td>
        <td><?= $row["jurusan"]?></td>
    </tr>
    <?php $i++;?>
    <?php endforeach;?>
</table>