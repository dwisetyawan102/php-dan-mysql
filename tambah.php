<?php
  // koneksi ke database
  $conn = mysqli_connect("localhost", "root", "", "phpdasar");

  // cek apakah tombol sabmit sudah diklik atau belum
  if( isset($_POST["submit"]) ) {

    // ambil data dari tiap elemen dalam form
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $jurusan = $_POST["jurusan"];
    $gambar = $_POST["gambar"];

    // query insert data
    $query = "INSERT INTO mahasiswa VALUES('', '$nama', '$nim', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    // cek apakah data berhasil ditambahkan atau tidak
    if( mysqli_affected_rows($conn) > 0 ) {
      echo "Data berhasil ditambahkan!";
    } else {
      echo "Data gagal ditambahkan";
      echo "<br>";
      echo mysqli_error($conn);
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

  <form action="" method="post">
    <ul>
      <li>
        <label for="nim">NIM : </label>
        <input type="text" name="nim" id="nim">
      </li>
      <li>
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama">
      </li>
      <li>
        <label for="email">Email : </label>
        <input type="text" name="email" id="email">
      </li>
      <li>
        <label for="jurusan">Jurusan : </label>
        <input type="text" name="jurusan" id="jurusan">
      </li>
      <li>
        <label for="gambar">Gambar : </label>
        <input type="text" name="gambar" id="gambar">
      </li>
      <li>
        <button type="submit" name="submit">Tambah data!</button>
      </li>
    </ul>
  </form>

</body>
</html>