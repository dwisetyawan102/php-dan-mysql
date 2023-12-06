<?php
  require "functions.php";

  // ambil data di URL
  $id = $_GET["id"];

  // query data mahasiswa berdasarkan id
  $mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

  // cek apakah tombol sabmit sudah diklik atau belum
  if( isset($_POST["submit"]) ) {
    if( ubah($_POST) > 0 ) {
      echo "
        <script>
          alert('Berhasil ubah data');
          document.location.href = 'index.php';
        </script>
      ";
    } else {
      echo "
        <script>
          alert('Gagal ubah data');
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
  <title>Ubah data mahasiswa</title>
</head>
<body>
  
  <h1>Ubah data mahasiswa</h1>

  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $mhs["id"] ?>">
    <input type="hidden" name="gambarLama" value="<?php echo $mhs["gambar"] ?>">  
    <ul>
      <li>
        <label for="nim">NIM : </label>
        <input type="text" name="nim" id="nim" value="<?php echo $mhs["nim"] ?>" require>
      </li>
      <li>
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama" value="<?php echo $mhs["nama"] ?>" require>
      </li>
      <li>
        <label for="email">Email : </label>
        <input type="text" name="email" id="email" value="<?php echo $mhs["email"] ?>" require>
      </li>
      <li>
        <label for="jurusan">Jurusan : </label>
        <input type="text" name="jurusan" id="jurusan" value="<?php echo $mhs["jurusan"] ?>" require>
      </li>
      <li>
        <label for="gambar">Gambar : </label> <br>
        <img src="img/<?php echo $mhs["gambar"] ?>" alt="" width="40"> <br>
        <input type="file" name="gambar" id="gambar">
      </li>
      <li>
        <button type="submit" name="submit">Ubah data!</button>
      </li>
    </ul>
  </form>

</body>
</html>