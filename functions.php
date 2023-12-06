<?php 
  // koneksi ke database
  $conn = mysqli_connect("localhost", "root", "", "phpdasar");

  // melakukan query dari database
  function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
      $rows[] = $row;
    }
    return $rows;
  }

  // melakukan query tambah data ke database
  function tambah($data) {
    global $conn;

    // ambil data dari tiap elemen dalam form
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // upload gambar
    $gambar = upload();
    if( !$gambar ) {
      return false;
    }

    // query insert data
    $query = "INSERT INTO mahasiswa VALUES('', '$nama', '$nim', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }

  // membuat fungsi upload gambar
  function upload() {
    // ambil informasi gambar dari $_FILES
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ) {
      echo "<script>
              alert('pilih gambar terlebih dahulu!');
            </script>";
      return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
      echo "<script>
              alert('yang anda upload bukan gambar!');
            </script>";
      return false;
    }

    // cek jika ukuranya terlalu besar
    if( $ukuranFile > 1000000 ) {
      echo "<script>
              alert('ukuran gambar terlalu besar!');
            </script>";
      return false;
    }

    // lolos pengecekan 
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    // pindahkan file dari tmpfile ke direktori yang mau dituju
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
  }

  // melakukan query hapus data
  function hapus($id) {
    global $conn;

    // query delete data
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
  }

  function ubah($data) {
    global $conn;

    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if( $_FILES['gambar']['error'] === 4 ) {
      $gambar = $gambarLama;
    } else {
      $gambar = upload();
    }


    // query insert data
    $query = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', email = '$email', jurusan = '$jurusan', gambar = '$gambar' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);    
  }  

  function cari($keyword) {
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'";

    return query($query);
  }
?>