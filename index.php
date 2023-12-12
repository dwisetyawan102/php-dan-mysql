<?php 
  session_start(); //gunakan method ini setiap kali menggunakan session

  // mengecek apakah tidak ada session login di halaman ini
  if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
  }

  require 'functions.php';
  $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");

  if( isset($_POST["cari"]) ) {
    $mahasiswa = cari($_POST["keyword"]);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
</head>
<body>
  
  <a href="logout.php">Logout</a>

  <h1>Daftar Mahasiswa</h1>

  <a href="tambah.php">Tambah data mahasiswa</a>
  <br><br>

  <form action="" method="post">
    <input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian..." autocomplete="off">
    <button type="submit" name="cari">Cari!</button>
  </form>
  <br>

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