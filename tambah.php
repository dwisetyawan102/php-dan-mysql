<?php
  session_start(); //gunakan method ini setiap kali menggunakan session

  // mengecek apakah tidak ada session login di halaman ini
  if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
  }
  require "functions.php";

  // cek apakah tombol sabmit sudah diklik atau belum
  if( isset($_POST["submit"]) ) {
    
    if( tambah($_POST) > 0 ) {
      echo "
        <script>
          alert('Berhasil tambah data');
          document.location.href = 'index.php';
        </script>
      ";
    } else {
      echo "
        <script>
          alert('Gagal tambah data');
        </script>
      ";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah data mahasiswa</title>
</head>
<body>
  
  <h1>Tambah data mahasiswa</h1>

  <form action="" method="post" enctype="multipart/form-data">
    <ul>
      <li>
        <label for="nim">NIM : </label>
        <input type="text" name="nim" id="nim" required>
      </li>
      <li>
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama" required>
      </li>
      <li>
        <label for="email">Email : </label>
        <input type="text" name="email" id="email" required>
      </li>
      <li>
        <label for="jurusan">Jurusan : </label>
        <input type="text" name="jurusan" id="jurusan" required>
      </li>
      <li>
        <label for="gambar">Gambar : </label>
        <input type="file" name="gambar" id="gambar" required>
      </li>
      <li>
        <button type="submit" name="submit">Tambah data!</button>
      </li>
    </ul>
  </form>

</body>
</html>