<?php 
  // koneksi ke database
  $conn = mysqli_connect("localhost", "root", "", "phpdasar");

  // query data dari tabel mahasiswa
  $result = mysqli_query($conn, "SELECT * FROM mahasiswa");

  // mengecek apakah koneksi ke database berhasil atau tidak
  if( !$result ) {
    echo mysqli_error($conn);
  }

  // ambil data (fetch) mahasiswa dari object result
  // mysqli_fetch_row()
  // mysqli_fetch_assoc()
  // mysqli_fetch_array()
  // mysqli_fetch_object() 
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
    <?php while( $row = mysqli_fetch_assoc($result) ) { ?>
      <tr>
        <td><?php echo $i++ ?></td>
        <td>
          <a href="">Ubah</a> |
          <a href="">Hapus</a>
        </td>
        <td><img src="img/<?php echo $row["gambar"] ?>" alt="" width="50"></td>
        <td><?php echo $row["nim"] ?></td>
        <td><?php echo $row["nama"] ?></td>
        <td><?php echo $row["email"] ?></td>
        <td><?php echo $row["jurusan"] ?></td>
      </tr>
    <?php } ?>
  </table>

</body>
</html>