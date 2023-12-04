<?php 
  require 'functions.php';
  $mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
</head>
<body>
  
  <h1>Daftar Mahasiswa</h1>

  <a href="tambah.php">Tambah data mahasiswa</a>
  <br><br>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>No.</th>
      <th>Aksi</th>
      <th>Gambar</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jurusan</th>
    </tr>
    <?php $i = 1 ?>
    <?php foreach( $mahasiswa as $row ) : ?>
    <tr>
      <td><?php echo $i++; ?></td>
      <td>
        <a href="ubah.php?id=<?php echo $row["id"] ?>">Ubah</a> |
        <a href="hapus.php?id=<?php echo $row["id"] ?>" onclick="return confirm('Yakin hapus');">Hapus</a>
      </td>
      <td><img src="img/<?php echo $row["gambar"] ?>" alt="" width="50"></td>
      <td><?php echo $row["nim"] ?></td>
      <td><?php echo $row["nama"] ?></td>
      <td><?php echo $row["email"] ?></td>
      <td><?php echo $row["jurusan"] ?></td>
    </tr>
    <?php endforeach; ?> 
  </table>

</body>
</html>